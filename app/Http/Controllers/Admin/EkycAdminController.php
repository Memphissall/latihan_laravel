<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EkycRegistration;
use Illuminate\Http\Request;

class EkycAdminController extends Controller
{
    // Tampilkan semua data eKYC
    public function index()
    {
        $list = EkycRegistration::with('user')->latest()->paginate(10);
        return view('admin.ekyc.index', compact('list'));
    }

    // Tampilkan detail user pendaftar
    public function show($id)
    {
        $data = EkycRegistration::with('user')->findOrFail($id);
        return view('admin.ekyc.show', compact('data'));
    }

    // Proses verifikasi / ubah status
    public function verify(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected,submitted,draft',
        ]);

        $data = EkycRegistration::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()
            ->route('admin.ekyc.index')
            ->with('success', 'Status eKYC berhasil diperbarui.');
    }
}
