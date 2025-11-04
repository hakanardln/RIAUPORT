<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::view('/', 'home')->name('home');
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed', // otomatis cocokkan dengan password_confirmation
    ]);

    return redirect()->route('login')->with('status', 'Register success. Please login.');
})->name('register.store');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
