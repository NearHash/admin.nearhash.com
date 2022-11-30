<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\API\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use HttpResponses;
    public function profile(Request $request)
    {
        $user = User::where('id', $request->user()->id)->first();
        if (!$user) {
            return $this->error(null, 'Sorry, we couldn\'t find that user.', 400);
        }

        $data = $user;
        return $this->success($data, "Your profile has been successfully updated.", 200);

    }
}
