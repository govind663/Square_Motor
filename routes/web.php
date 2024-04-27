<?php

use Illuminate\Support\Facades\Route;

// ==== Authnication
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\HomeController;

// ==== Agent resources
use App\Http\Controllers\AgentController;

Route::get('/', function () {
    return view('auth.login');
})->name('/');

Route::group(['prefix' => 'Square_Motor'],function(){
    // ======================= Admin Register
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');

    // ======================= Admin Login/Logout
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login/store', [LoginController::class, 'authenticate'])->name('login.store');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'square-motor','middleware'=>['auth']],function(){
    // =============== Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // ==== Agent resources routes
    Route::resource('agent', AgentController::class);

});
