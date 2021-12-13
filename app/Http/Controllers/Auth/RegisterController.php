<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    function index(){
        return view('pages.auth.register');
    }
    function signup(Request $request)
    {
        //signup new user
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        //authentication
        Auth::attempt($request->only('password', 'email'));
        //redirect into index
        return redirect()->route('index');
    }
}
