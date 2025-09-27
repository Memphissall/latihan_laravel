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


public function edit($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mhs'));
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim'  => 'required'
        ]);

        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update($request->only('nama','nim'));

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diupdate!');
    }

    // delete
    public function destroy($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus!');
    }
}