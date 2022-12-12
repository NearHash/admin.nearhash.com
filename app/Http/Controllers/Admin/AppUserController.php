<?php

namespace App\Http\Controllers\Admin;

use App\Models\API\AppUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppUserController extends Controller
{
    public function index () {
        $users = AppUser::latest()->paginate(8);
        return view('backend.user.index', compact('users'));
    }
}
