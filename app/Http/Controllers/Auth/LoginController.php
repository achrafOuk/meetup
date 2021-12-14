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
        if(!auth()->attempt($request->only('password', 'name')) ){
            return redirect()->back()->with('error', 'Username or password are uncorrect');   
        }
            return redirect()->route('index');
    }
}
