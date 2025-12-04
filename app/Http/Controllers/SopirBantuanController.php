<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SopirBantuanController extends Controller
{
    public function index()
    {
        // arahkan ke view bantuan sopir
        return view('sopir.bantuan');
    }
}
