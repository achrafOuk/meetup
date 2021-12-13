<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    function index(){
        return view('pages.auth.register');
    }
    function signup(Request $request)
    {
        //signup new user
        User::create([
            'name'=>$request->username,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
        ]);
        //authentication
        auth()->attempt($request->only('password', 'email'));
        //redirect into index
        return redirect()->route('index');
    }
}
