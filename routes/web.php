<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', fn() => redirect()->route('login'));
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', function () {
    return back()->withErrors(['name' => 'Demo UI: proses register belum diaktifkan.']);
})->name('register.store');