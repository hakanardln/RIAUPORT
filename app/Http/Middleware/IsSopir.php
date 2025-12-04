<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSopir
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Kalau belum login atau bukan sopir → larang akses
        if (!Auth::check() || Auth::user()->role !== 'sopir') {
            abort(403); // atau bisa redirect()->route('home');
        }

        return $next($request);
    }
}
