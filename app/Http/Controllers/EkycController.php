<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EkycRegistration;
use Illuminate\Support\Facades\Auth;

class EkycController extends Controller
{
    //step1
    public function step1()
    {
        // Ambil data draft user jika sudah ada
        $ekyc = EkycRegistration::where('user_id', Auth::id())
            ->where('status', 'draft')
            ->first();

        // Simpan session agar bisa lanjut ke step berikutnya
        if ($ekyc) {
            session(['ekyc_id' => $ekyc->id]);
        }

        return view('ekyc.step1', compact('ekyc'));
    }

    public function storeStep1(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:100',
            'nik'           => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string',
        ]);

        $ekyc = EkycRegistration::updateOrCreate(
            ['id' => session('ekyc_id')],
            [
                'user_id'       => Auth::id(),
                'nama'          => $request->nama,
                'nik'           => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat'        => $request->alamat,
                'status'        => 'draft',
            ]
        );

        session(['ekyc_id' => $ekyc->id]);

        return redirect()->route('ekyc.step2')->with('success', 'Data pribadi disimpan, lanjut ke langkah berikutnya.');
    }


    //step2
    public function step2()
{
    $data = EkycRegistration::where('user_id', auth()->id())->first();
    return view('ekyc.step2', compact('data'));
}

public function storeStep2(Request $request)
{
    $validated = $request->validate([
        'file_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'file_selfie' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $ekyc = EkycRegistration::firstOrCreate(['user_id' => auth()->id()]);

    if ($request->hasFile('file_ktp')) {
        $validated['file_ktp'] = $request->file('file_ktp')->store('ekyc', 'public');
    }

    if ($request->hasFile('file_selfie')) {
        $validated['file_selfie'] = $request->file('file_selfie')->store('ekyc', 'public');
    }

    $ekyc->update($validated);

    // Jika ingin lanjut otomatis ke step 3, aktifkan baris di bawah:
    // return redirect()->route('ekyc.step3')->with('success', 'Step 2 tersimpan.');

    return redirect()->route('ekyc.step3')->with('success', 'Step 2 Tersimpan.');
}

public function showStep3()
{
    $data = \App\Models\EkycRegistration::where('user_id', auth()->id())->first();
    return view('ekyc.step3' , compact('data'));
}

public function storeStep3(Request $request)
{
    $request->validate([
        'asal_sd'=> 'nullable|string|max:255',
        'asal_smp'=> 'nullable|string|max:255',
        'asal_sma'=> 'nullable|string|max:255',
        'file_kk'=> 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_ijazah'=> 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);
    $data = \App\Models\EkycRegistration::where('user_id', auth()->id())->first();

    $data->asal_sd = $request->asal_sd;
    $data->asal_smp = $request->asal_smp;
    $data->asal_sma = $request->asal_sma;

    if($request->hasFile('file_kk')){
        $data->file_kk =$request->file('file_kk')->store('ekyc', 'public');
    }

    if($request->hasFile('file_ijazah')){
        $data->file_ijazah =$request->file('file_ijazah')->store('ekyc', 'public');
    }
    $data->save();

    return redirect()->route('ekyc.step3')->with('success', 'Data pendidikan berhasil disimpan');
}


//step4
public function showStep4()
{
    // Ambil data eKYC berdasarkan user yang login
    $data = \App\Models\EkycRegistration::where('user_id', auth()->id())->first();

    return view('ekyc.step4', compact('data'));
}

public function storeStep4(Request $request)
{
   
    $request->validate([
        'alamat_lengkap' => 'required|string|max:255',
        'provinsi' => 'required|string|max:100',
        'kota' => 'required|string|max:100',
        'kecamatan' => 'required|string|max:100',
        'kode_pos' => 'required|numeric|digits_between:1,6',
        'nama_ibu' => 'required|string|max:100',
        'referensi' => 'required|string|max:100',
    ]);

   
    \App\Models\EkycRegistration::updateOrCreate(
        ['user_id' => auth()->id()],
        [
            'alamat_lengkap' => $request->alamat_lengkap,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'nama_ibu' => $request->nama_ibu,
            'referensi' => $request->referensi,
        ]
    );

    
    return redirect()->route('dashboard')->with('success', 'Data Step 4 berhasil disimpan!');
}




}



