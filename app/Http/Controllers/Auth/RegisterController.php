<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:100',
            'email'                 => 'required|email:rfc,dns|unique:users,email',
            'password'              => 'required|min:8|confirmed', // butuh field password_confirmation
        ]);

        // Jika tidak pakai casts hashed:
        // $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        // Optional: login otomatis
        // auth()->login($user);

        return redirect()
            ->route('login')
            ->with('status', 'Register success. Please login.');
    }
}