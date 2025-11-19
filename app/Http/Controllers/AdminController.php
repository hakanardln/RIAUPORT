<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'adminName'      => Auth::user()->name ?? 'Admin',
            'sopirAktif'     => 5,   // sementara angka dummy
            'sopirNonAktif'  => 2,
            'totalRute'      => 8,
            'totalPelanggan' => 20,
            'dbError'        => null,
        ]);
    }
}
