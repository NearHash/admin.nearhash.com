<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function home () {
        return view('backend.home');
    }

    public function index () {
        return view('backend.admin_user.index');
    }

    public function create () {
        return view('backend.admin_user.create');
    }
}
