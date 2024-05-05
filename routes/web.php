<?php

use Illuminate\Support\Facades\Route;

// ==== Authnication
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\HomeController;

// ===== All Masters
use App\Http\Controllers\AgentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InsuranceCompanyController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\RtoController;
use App\Http\Controllers\VehicleController;
use App\Http\Middleware\PreventBackHistoryMiddleware;

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

Route::group(['prefix' => 'square-motor','middleware'=>['auth', PreventBackHistoryMiddleware::class]],function(){
    // =============== Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // ==== Update Password
    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('update-password');

    // ==== Agent resources routes
    Route::resource('agent', AgentController::class);

    // ==== Vehicle resources routes
    Route::resource('vehicle', VehicleController::class);

    // ===== Retailer resources routes
    Route::resource('retailer', RetailerController::class);

    // ==== RTO resources routes
    Route::resource('rto', RtoController::class);

    // ===== Employee resources routes
    Route::resource('employee', EmployeeController::class);

    // ===== Insurance Company resources routes
    Route::resource('insurance_company', InsuranceCompanyController::class);

    // ==== Policies resources routes
    Route::resource('policy', PolicyController::class);

    // === fetch Agent Commission in percentage
    Route::post ('agent_commission_percentage', [AgentController::class,'agent_commission_percentage'])->name('agent_commission_percentage');

    // === fetch Retailer Commission in percentage
    Route::post ('fetch_retailer_commission_percentage', [AgentController::class,'retailer_commission_percentage'])->name('fetch_retailer_commission_percentage');

    // === fetch Company Commission in percentage
    Route::post ('fetch_agent_profit_amt', [AgentController::class,'fetch_agent_profit_amt'])->name('fetch_agent_profit_amt');

});
