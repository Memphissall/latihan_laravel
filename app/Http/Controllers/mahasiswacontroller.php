<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class mahasiswacontroller extends Controller
{
    public function index()
    {
        $data = mahasiswa::all();
        return
        view('mahasiswa.index',compact('data'));
    }

    public function store(Request $request)
    {
        mahasiswa::create($request->only('nama','nim'));
        return redirect()->back();
    }
    //
}
