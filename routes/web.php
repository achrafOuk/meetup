<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
Route ::get('/',[PostController::class,'index'])->name('index');
// make auth router accessable only by the geust
Route::group(['middleware'=>'guest'],function(){
    Route ::get('/login',[LoginController::class,'index'])->name('login');
    Route ::post('/login',[LoginController::class,'login'])->name('Login');
    Route ::get('/signup',[RegisterController::class,'index'])->name('signup');
    Route ::post('/signup',[RegisterController::class,'signup'])->name('Signup');
    //Logout
});
Route::group(['middleware'=>'auth'],function(){
    Route ::post('/logout',[LoginController::class,'logout'])->name('logout');
    Route::group(['prefix'=>'events'],function(){
        Route ::get('/add',[PostController::class,'newEventPage'])->name('add-event');
        Route ::post('/add',[PostController::class,'newEvent'])->name('Add-event');
    });
});
//Events 
//Attempted event