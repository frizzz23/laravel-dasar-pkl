<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kunjungan = Kunjungan::with('pasien', 'dokter')->orderBy('id', 'desc')->get();
        return view('kunjungan.index', compact('kunjungan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('kunjungan.tambah', compact('pasien', 'dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'tanggal_kunjungan' => 'required|date',
            'diagnosa' => 'required|string|max:255',
        ], [
            'pasien_id.required' => 'Pasien harus dipilih.',
            'pasien_id.exists' => 'Pasien tidak ditemukan.',
            'dokter_id.required' => 'Dokter harus dipilih.',
            'dokter_id.exists' => 'Dokter tidak ditemukan.',
            'tanggal_kunjungan.required' => 'Tanggal kunjungan harus diisi.',
            'tanggal_kunjungan.date' => 'Tanggal kunjungan harus berupa tanggal yang valid.',
            'diagnosa.required' => 'Diagnosa harus diisi.',
            'diagnosa.string' => 'Diagnosa harus berupa teks.',
            'diagnosa.max' => 'Diagnosa tidak boleh lebih dari 255 karakter.',
        ]);

        // Simpan data setelah validasi
        Kunjungan::create($validated);
        
        return redirect()->route('kunjungan')->with('success', 'Data kunjungan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implementasi metode show jika diperlukan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('kunjungan.edit', compact('kunjungan', 'pasien', 'dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'tanggal_kunjungan' => 'required|date',
            'diagnosa' => 'required|string|max:255',
        ], [
            'pasien_id.required' => 'Pasien harus dipilih.',
            'pasien_id.exists' => 'Pasien tidak ditemukan.',
            'dokter_id.required' => 'Dokter harus dipilih.',
            'dokter_id.exists' => 'Dokter tidak ditemukan.',
            'tanggal_kunjungan.required' => 'Tanggal kunjungan harus diisi.',
            'tanggal_kunjungan.date' => 'Tanggal kunjungan harus berupa tanggal yang valid.',
            'diagnosa.required' => 'Diagnosa harus diisi.',
            'diagnosa.string' => 'Diagnosa harus berupa teks.',
            'diagnosa.max' => 'Diagnosa tidak boleh lebih dari 255 karakter.',
        ]);

        // Update data setelah validasi
        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->update($validated);

        return redirect()->route('kunjungan')->with('success', 'Data kunjungan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
    $kunjungan = Kunjungan::findOrFail($id);
    $kunjungan->delete();

    return redirect()->route('kunjungan')->with('success', 'Kunjungan berhasil dihapus.');
    }
}
