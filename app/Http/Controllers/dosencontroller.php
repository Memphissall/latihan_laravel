<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Illuminate\Http\Request;

class dosencontroller extends Controller
{
    public function index()
    {
        $data = dosen::all();
        return
        view('dosen.index',compact('data'));
    }

    public function store(Request $request)
    {
        dosen::create($request->only('nama','nid','jenis_kelamin'));
        return redirect()->back();
    }
    //
}
