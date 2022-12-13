<?php

namespace App\Http\Controllers\Admin;

use App\Models\API\AppUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;

class AppUserController extends Controller
{
    public function index () {
        $users = AppUser::latest()->paginate(8);
        return view('backend.user.index', compact('users'));
    }

    public function detail ($id) {
        $user = AppUser::find($id);
        if(!$user){
            abort(403);
        }
        return view('backend.user.detail', compact('user'));
    }

    public function delete ($id) {
        try {
            $app_user = AppUser::find($id);
            if(!$app_user){
                abort(403);
            }
            foreach($app_user->images as $image){
                unlink("uploads/users/$id/".$image->image);
            }
            $app_user->images()->delete();
            $app_user->delete();
            return redirect()->route('admin.user.index')->with('delete', 'Successfully Deleted');
        } catch (ClientException $e) {
            return redirect()->route('admin.user.index')->with('error', 'Internal Server Error');
        }
    }

    public function post ($userID, $postID) {
        return view('backend.user.post');
    }
}
