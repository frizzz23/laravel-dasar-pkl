<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokter = Dokter::orderBy('id', 'desc')->get();
        return view('dokter.index', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20|unique:dokter,nomor_telepon',
            'email' => 'required|email|max:255|unique:dokter,email',
        ],[
            'nama.required' => 'nama harus diisi',
            'spesialis.required' => 'spesialis harus diisi',
            'nomor_telepon.required' => 'nomor telepon harus diisi',
            'email.required' => 'email harus diisi',
            'email.unique' => 'email tidak boleh sama atau email sudah terdaftar',
            'nomor_telepon.unique' => 'nomor tidak boleh sama atau nomor sudah terdaftar',

        ]);

        Dokter::create($validated);
        return redirect()->route('dokter')->with('success', 'Data dokter berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.lihat', compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20|unique:dokter,nomor_telepon',
            'email' => 'required|email|max:255|unique:dokter,email,' . $id,
        ],[
            
            'nama.required' => 'nama harus diisi',
            'spesialis.required' => 'spesialis harus diisi',
            'nomor_telepon.required' => 'nomor telepon harus diisi',
            'email.required' => 'email harus diisi',
            'email.unique' => 'email tidak boleh sama atau email sudah terdaftar',
            'nomor_telepon.unique' => 'nomor tidak boleh sama atau nomor sudah terdaftar',
    
            
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($validated);
        return redirect()->route('dokter')->with('success', 'Data dokter berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail($id);

        // Periksa apakah dokter terkait dengan kunjungan
        if ($dokter->kunjungan()->count() > 0) {
            return redirect()->route('dokter')->with('error', 'Data dokter tidak dapat dihapus karena masih terkait dengan data kunjungan.');
        }

        $dokter->delete();
        return redirect()->route('dokter')->with('success', 'Data dokter berhasil dihapus.');
    }
}
