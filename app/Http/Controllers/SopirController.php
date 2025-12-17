<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Travel;

class SopirController extends Controller
{
    public function dashboard()
    {
        $travel = Travel::where('sopir_id', Auth::id())->first(); // 1 travel per sopir
        return view('sopir.dashboard', compact('travel'));
    }

    
    public function index()
    {
        return view('sopir.index');
    }

    public function create()
    {
        return view('sopir.create');
    }

    public function store(Request $request)
    {
        // logic simpan
    }

    public function edit($id)
    {
        return view('sopir.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // logic update
    }

    public function destroy($id)
    {
        // logic hapus
    }
    public function travel()
    {
        return view('sopir.travel'); // resources/views/sopir/travel.blade.php
    }
}
