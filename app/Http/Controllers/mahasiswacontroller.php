<?php

namespace App\Http\Controllers;
use App\Models\Clases;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class mahasiswacontroller extends Controller
{
    public function index()
    {
        // $data = mahasiswa::all();
        // return view('mahasiswa.index',compact('data'));
        $data = Mahasiswa::with('kelas')->get();
        $kelas = Clases::all();
        return view('mahasiswa.index', compact('data','kelas'));
    }

    public function store(Request $request)
    {
        // dd([$request->nama,$request->nim,$request->kelas_id]);
        $request->validate([
            'nama' => 'required|string|max:255|unique:mahasiswa,nama',
            'nim' => 'required|string|max:50|unique:mahasiswa,nim',
            'kelas_id' => 'required|exists:clases,id',
        ]);

       
        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
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