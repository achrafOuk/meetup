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

Route ::get('image/{filename}',[PostController::class,'getPubliclyStorgeFile'])->name('get-image');

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
        Route ::get('/myevent',[PostController::class,'getMyEvents'])->name('myevents');
        Route ::get('/add',[PostController::class,'newEventPage'])->name('add-event');
        Route ::post('/add',[PostController::class,'newEvent'])->name('Add-event');
        Route ::get('/edit/{id}',[PostController::class,'editEventPage'])->name('edit-event');
        Route ::post('/edit/{id}',[PostController::class,'editEvent'])->name('Edit-event');
    });
});
//Events 
Route ::get('/events/{id}',[PostController::class,'veiwEvent'])->name('view-event');
//Attempted event