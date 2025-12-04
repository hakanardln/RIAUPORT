<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SopirPersonalisasiController extends Controller
{
    public function index()
    {
        // Tampilkan halaman pengaturan sopir
        return view('sopir.personalisasi');
    }
}
