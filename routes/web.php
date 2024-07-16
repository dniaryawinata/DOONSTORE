<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\login;
use Illuminate\Support\Facades\Route;

//login
Route::get('/login', function () {
    return view('login',);
});

Route::get('/login', [login::class, 'login'])->name('login');
Route::post('/login', [login::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [login::class, 'logout'])->name('logout');
Route::get('/register', [login::class, 'authRegister'])->name('register');

//route homepage dengan nama index
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

//route cart
Route::get('/cart', function () {
    return view('cart');
});

//route produk
Route::get('/produk', function () {
    return view('produk');
});

//route payment
Route::get('/payment', function () {
    return view('payment');
});

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
