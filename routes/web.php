<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route ::get('/',[IndexController::class,'index'])->name('index');
Route ::get('/login',[LoginController::class,'index'])->name('login');
Route ::post('/login',[LoginController::class,'login'])->name('Login');
Route ::get('/signup',[RegisterController::class,'index'])->name('signup');
Route ::post('/signup',[RegisterController::class,'signup'])->name('Signup');