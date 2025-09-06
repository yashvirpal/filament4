<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\CustomerController;

// Route::get('/customer-login', [CustomerController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer-login', [CustomerController::class, 'login'])->name('customer.login.submit');
Route::get('/customer-detail', [CustomerController::class, 'detail'])->name('customer.detail');
Route::view('/', 'home')->name('customer.home');
Route::view('/about', 'about')->name('customer.about');


// Route::get('/', function () {
//     return view('welcome');
// });

