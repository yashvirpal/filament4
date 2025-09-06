<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\CustomerController;

// Route::get('/customer-login', [CustomerController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer-login', [CustomerController::class, 'login'])->name('customer.login.submit');
Route::get('/step-1', [CustomerController::class, 'detail'])->name('customer.detail');
Route::view('/', 'home')->name('customer.home');
Route::view('/step-2', 'step2')->name('customer.ad');


// Route::get('/', function () {
//     return view('welcome');
// });
