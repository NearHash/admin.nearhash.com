<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Users\UserResource;
use App\Models\API\Profile;
use App\Models\API\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use HttpResponses;
    public function index()
    {
        $users = User::latest()->paginate(10);
        $user_resource = UserResource::collection($users);
        return $this->success($user_resource, 'Users', 200);
    }

    public function ban($id) {
        $user = User::where('id', $id)->first();
        if(!$user) {
            $this->error(null, 'Your user id is invalid.', 400);
        }
        $user->is_banned = 1;
        $user->save();
        return $this->success(null,'User has been successfully banned.', 200);
    }

    public function unBan($id)
    {
        $user = User::where('id', $id)->first();
        if(is_null($user)) {
            $this->error(null, 'Your user id is invalid.', 400);
        }
        $user->is_banned = 0;
        $user->save();
        return $this->success(null,'User has been successfully unbanned.', 200);
    }

    public function destroy($id)
    {
        $user = User::with('images')->findOrFail($id);
        if(!$user) {
            $this->error(null, 'Your user id is invalid.', 400);
        }
        foreach ($user->images as $image) {
            unlink("users/".$image->image);
//            Storage::disk('public')->delete('users/' . $image->image);
        }
        $user->images()->delete();
        $user->delete();
        return $this->success(null,'User has been successfully deleted.', 200);
    }
}
