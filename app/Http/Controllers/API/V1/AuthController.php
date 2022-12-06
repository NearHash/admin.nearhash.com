<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Users\CreateLoginRequest;
use App\Http\Requests\API\V1\Users\CreateOtpRequest;
use App\Http\Requests\API\V1\Users\CreateRegisterRequest;
use App\Http\Resources\API\V1\Users\UserResource;
use App\Models\API\Otp;
use App\Models\API\Profile;
use App\Models\API\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function CharGenerate()
    {
        $UpperCase = chr(rand(65,90));
        $NewCase = chr(rand(65,90));
        $LowerCase = chr(rand(97,122));
        return 'NH'.$UpperCase.$NewCase;
    }

    public function register(CreateRegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->name_id = $this->CharGenerate();
        $user->country_code = $request->country_code;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->token = str_shuffle(md5(date("ymdhis")));
        $user->date_of_birth = $request->date_of_birth;
        $user->password = Hash::make($request->password);

        if($request->image)
        {
            $photo = $this->uploadNow($request->image, 'users/');
            $profile = new Profile();
            $profile->image = $photo;
            $profile->token = str_shuffle(md5(date("ymdhis")));
            $profile->user_id = $user->id;
            if ($profile->save())
            {
                if ($user->save())
                {
                    $token = $user->createToken('AccessToken');
                    return $this->success([
                        'user' => $user->orderBy('id', 'desc')->first(),
                        "access_token" => $token->plainTextToken,
                    ], 'Your account has been registered.');
                }
            }else{
                return $this->error(null, 'User profile upload error',500);
            }
        }

    }

    public function login(CreateLoginRequest $request)
    {
        $phone = $request->phone;
        $password = $request->password;
        $user = User::where('phone', $phone)->first();
        if (!$user) {
            return $this->error(null, 'Sorry, we couldn\'t find an account with that phone number.', 400);
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
        // $data['success'] = true;
        // $data['message'] = 'You have successfully logged in.';
        // $data['data'] = $res;
        // $data['access_token'] = $user->createToken('authToken')->plainTextToken;
        // return response()->json($data, 200);
    }

    public function logout(Request $request)
    {
        if (!$request->user()) {
            return $this->error('Something went wronged.', null, 400);
        }
        $request->user()->tokens()->delete();
        return $this->success([
            'You have successfully logged out.', true, 200
        ]);
    }

    public function sendSMS($phone, $otp, $message = 'is Your OTP Number')
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

    public function sendOtp(CreateOtpRequest $request)
    {
        $phone = $request->phone;
        if (isset($request->validator) && $request->validator->fails()) {
            $validator = $request->validator;
            $message = $validator->errors();
            return $this->error(null, $message, 422);
        } else {
            $phone_no = $phone;
            $generateOtp = $this->generateOTP($phone_no);
            $phoneOtp = Otp::where('phone', $phone_no)->where('otp', $generateOtp)->first();
            if(Otp::where('phone', $phone_no)->exists()) {
                if (strlen($generateOtp) == 6) {
                    if ($this->sendSMS($phone_no, $generateOtp, 'is your OTP number .')) {
                        return $this->success([
                            'otp' => $generateOtp,
                            'phone' => $phone_no,
                        ], "OTP successfully sent!", 200);
                    }
                } else {
                    return $this->error(null, "Server error", 500);
                }
            }
            else {
                return $this->error(null, "Already sent opt code with that phone number", 422);
            }
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
//            $user = User::where('phone', $phone_no)->first();
//            if(!$user) {
//                return $this->error(null,'Sorry, we couldn\'t find that phone number.', 422);
//            }
            $otpVerify = Otp::where('phone', $phone_no)->orderBy('id', 'desc')->first();
            if (!$otpVerify) {
                return $this->error(null, 'Sorry, we couldn\'t find that phone number.', 422);
            }
            if ($otpVerify->otp == $otp) {
//                $tokenResult = $user->createToken('Personal Access Token');
//                $token = $tokenResult->plainTextToken;
                return $this->success(null, "OTP verified successfully!", 200);
            } else {
                return $this->error(null, 'Your OTP is incorrect', 422);
            }
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
