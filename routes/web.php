<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\CustomerController;

// Route::get('/customer-login', [CustomerController::class, 'showLoginForm'])->name('customer.login');
 Route::post('/customer-login', [CustomerController::class, 'login'])->name('customer.login.submit');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');