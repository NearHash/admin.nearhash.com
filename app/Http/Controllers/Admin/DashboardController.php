<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function home () {
        return view('backend.home');
    }

    public function users () {
        return view('backend.users.index');
    }

    public function adminUsers () {
        return view('backend.adminUsers.index');
    }

    public function adminUsersCreate () {
        return view('backend.adminUsers.create');
    }
}
