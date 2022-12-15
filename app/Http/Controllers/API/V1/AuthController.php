<?php

namespace App\Http\Controllers\API\V1;

use Exception;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\API\Otp;
use App\Models\API\User;
use App\Models\API\AppUser;
use App\Models\API\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\API\V1\Users\UserResource;
use Illuminate\Auth\Access\AuthorizationException;
use App\Http\Requests\API\V1\Users\CreateOtpRequest;
use App\Http\Requests\API\V1\Users\CreateLoginRequest;
use App\Http\Requests\API\V1\Users\CreateRegisterRequest;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AuthController extends Controller
{
    use HttpResponses;

    public function uploadNow($image, $path) {
        try {
            $image_name = strtolower(uniqid().'.'.$image->getClientOriginalExtension());
            $success = $image->move($path,$image_name);
            if ($success)
            {
                return $image_name;
            }
        } catch (\Exception $e) {
            return response()->json(['error'=>$e], 422);
        }
    }

    public function chrGenerator()
    {
        $UpperCase = chr(rand(65,90));
        $NewCase = chr(rand(65,90));
        $LowerCase = chr(rand(97,122));
        return 'NH'.$UpperCase.$NewCase;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:25',
            'phone' => ['required', 'unique:app_users,phone', 'min:8', 'max:13'],
            'email' => [ 'email', 'unique:app_users,email'],
            'country_code' => ['required', 'min:3', 'max:6'],
            'password' => ['required', 'min:6'],
            'image' => ['required']
        ]);
        if ( $validator->fails() ) {
            return $this->error(null, $validator->errors()->first(), 422);
        }

        try {
            $user = new AppUser();
            $user->name = $request->name;
            $user->name_id = $this->chrGenerator();
            $user->country_code = $request->country_code;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->token = str_shuffle(md5(date("ymdhis")));
            $user->date_of_birth = $request->date_of_birth;
            $user->password = Hash::make($request->password);
            $otp = Otp::where('phone', $request->phone)->where('is_verify', true)->orderBy('id', 'desc')->first();
            if (!$otp)
            {
                return $this->error(null, 'OTP verify failed.',500);
            }
            if($user->save())
            {
                if($request->image)
                {
                    $photo = $this->uploadNow($request->image, "uploads/users/$user->id");
                    $profile = new Profile();
                    $profile->image = $photo;
                    $profile->token = str_shuffle(md5(date("ymdhis")));
                    $profile->app_user_id = $user->id;
                    if ($profile->save())
                    {
                        $token = $user->createToken('AccessToken');
                        return $this->success([
                            'user' => new UserResource($user),
                            "access_token" => $token->plainTextToken,
                        ], 'Your account successfully registered.');
                    }else{
                        unlink("uploads/users/$user->id/".$profile->image);
                        $user->delete();
                        return $this->error(null, 'User profile upload error',500);
                    }
                }
            }else{
                return $this->error(null, 'Saving user in internal server error occurred.',500);
            }
        }catch (ClientException $e) {
            return $this->error(null, $e->getMessage(),500);
        }

    }

    public function login(Request $request)
    {
        try {
            $username = $request->username;
            $password = $request->password;
            $user = AppUser::where('phone', $username)->orWhere('email', $username)->orWhere('name_id', $username)->first(); // azp
            if (!$user) {
                return $this->error(null, 'Sorry, we couldn\'t find an account.', 400);
            }
            $hashed = $user->password;
            $match = Hash::check($password, $hashed);
            if (!$match) {
                return $this->error(
                    null, 'The phone number or password you entered is incorrect.', 400,
                );
            }

            $res = new UserResource($user);
            $token = $user->createToken("authToken")->plainTextToken;
            if (isset($request->validator) && $request->validator->fails()) {
                $validator = $request->validator;
                $message = $validator->errors();
                return $this->error(null, $message, 422);
            } else {
                return $this->success([
                    'user' => $res,
                    'access_token' => $token,
                ], "You have successfully logged in.", 200);

            }
        }catch (ClientException $e) {
            return $this->error(null, 'Internal server error occurred',500);
        }
    }

    public function logout(Request $request)
    {
        if (!$request->user()) {
            return $this->error('Something went wronged.', null, 400);
        }
        $request->user()->tokens()->delete();
        return $this->success(null,'You have successfully logged out.',  200);
    }

    public function sendSMS($phone, $otp, $message = 'is Your NearHash OTP number.')
    {
        $token = config('sms_poh.access_token');
        //send sms here
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://smspoh.com/api/v2/send', [
                'headers' => [
                    'Authorization' => "Bearer $token",
                ],
                'json' => [
                    'to' => $phone,
                    'message' => $otp . ' ' . $message,
//                    'sender' => 'SMSPoh',
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch (ClientException $e) {
            if ($e->getCode() === 401) {
                throw new AuthorizationException(
                    "Authorization failed. Please provide correct token for SmsPoh in configuration file.",
                    401
                );
            } elseif ($e->getCode() === 403) {
                throw new BadRequestException(
                    $e->getMessage(),
                    403
                );
            }
        }
    }

    public function sendOtp(Request $request)
    {
        $phone = $request->phone;
        $validator = Validator::make($request->all(), [
            'phone' => ['required','min:8', 'max:14'],
        ]);
        if ( $validator->fails() ) {
            return $this->error(null, $validator->errors()->first(), 422);
        }else {
//            $otp = Otp::where('phone', $phone_no)->orderBy('id', 'desc')->first();
//            $otpVerified = Otp::where('phone', $phone_no)->where('is_verify', 0)->whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->first();
//            $otpVerified = Otp::where('phone', $phone_no)->where('is_verify', 0)->orderBy('id', 'desc')->first();
//            if ($otp) {
            if($this->checkUser($phone))
            {
                return $this->error(null, 'User already registered . | Go to login', 422);
            }
            $generateOtp = $this->generateOTP($phone);
            if ($this->sendSMS($phone, $generateOtp, 'is your NearHash OTP number.')) {
                return $this->success([
                    'otp' => $generateOtp,
                    'phone' => $phone,
                ], "OTP successfully sent!", 200);
            }
//            }
        }
    }

    public function VerifyOtp(CreateOtpRequest $request)
    {
        $phone = $request->phone;
        $otp = $request->otp;
        if (isset($request->validator) && $request->validator->fails()) {
            $validator = $request->validator();
            $message = $validator->errors();
            return $this->error(null, $message, 422);
        } else {
            $phone_no = $phone;
            $otpVerify = Otp::where('phone', $phone_no)->orderBy('id', 'desc')->first();
            if (!$otpVerify) {
                return $this->error(null, 'Sorry, we couldn\'t find that phone number.', 422);
            }
            if ($otpVerify->otp == $otp) {
                $otpVerify->is_verify = 1;
                $otpVerify->save();
                return $this->success(null, "OTP verified successfully! || Go to register screen .", 200);
            } else {
                return $this->error(null, 'Your OTP is incorrect', 422);
            }
        }
    }

    public function checkUser($phone)
    {
        $OutUsers = AppUser::where('phone',$phone)->get();
        if (count($OutUsers) >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function generateOTP($incomingPhone)
    {
        $generateOtp = mt_rand(100000, 999999);
        $otpDb = new Otp();
        $otpDb->phone = $incomingPhone;
        $otpDb->otp = $generateOtp;
        $otpDb->is_verify = 0;
        if ($otpDb->save()) {
            return $generateOtp;
        } else {
            return false;
        }
    }
}
