<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Users\UserResource;
use App\Models\API\AppUser;
use App\Models\API\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use HttpResponses;
    public function profile(Request $request)
    {
        $user = AppUser::where('id', $request->user()->id)->first();
        if (!$user) {
            return $this->error(null, 'Sorry, we couldn\'t find that user.', 400);
        }

        $user_resource = new UserResource($user);
        return $this->success($user_resource, "Your profile has been successfully .", 200);
    }
}
