<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\API\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function home () {
        return view('backend.home');
    }

    public function users () {
        $users = User::latest()->paginate(8);
        return view('backend.users.index', compact('users'));
    }

    public function adminUsers () {
        return view('backend.adminUsers.index');
    }

    public function adminUsersCreate () {
        return view('backend.adminUsers.create');
    }
}
