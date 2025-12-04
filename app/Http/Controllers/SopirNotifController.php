<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SopirNotifController extends Controller
{
    public function index()
    {
        return view('sopir.notifikasi');
    }
}
