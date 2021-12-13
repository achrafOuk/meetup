<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index(){
        return view('pages.auth.login');
    }
    function login(Request $request)
    {
        dd($request->username);
    }
}
