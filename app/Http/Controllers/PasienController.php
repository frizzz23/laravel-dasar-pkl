<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data pasien dengan urutan terbaru
        $pasien = Pasien::orderBy('id', 'desc')->get();

        return view('pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15|unique:pasien,nomor_telepon',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ], [
            'nama.required' => 'nama harus diisi',
            'alamat.required' => 'alamat harus diisi',
            'nomor_telepon.required' => 'nomor telepon harus diisi',
            'nomor_telepon.unique' => 'nomor tidak boleh sama atau nomor sudah terdaftar',
            'tanggal_lahir.required' => 'tanggal lahir harus diisi',
            'jenis_kelamin.required' => 'jenis kelamin harus dipilih salah satu',
        ]);

        // Simpan data setelah validasi
        Pasien::create($validated);
        
        return redirect()->route('pasien')->with('success', 'Data pasien berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.lihat', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15|unique:pasien,nomor_telepon',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ], [
            'nama.required' => 'nama harus diisi',
            'alamat.required' => 'alamat harus diisi',
            'nomor_telepon.required' => 'nomor telepon harus diisi',
            'nomor_telepon.unique' => 'nomor tidak boleh sama atau nomor sudah terdaftar',
            'tanggal_lahir.required' => 'tanggal lahir harus diisi',
            'jenis_kelamin.required' => 'jenis kelamin harus dipilih salah satu',
        ]);

        // Update data setelah validasi
        $pasien = Pasien::findOrFail($id);
        $pasien->update($validated);

        return redirect()->route('pasien')->with('success', 'Data pasien berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);

        // Periksa apakah pasien terkait dengan kunjungan
        if ($pasien->kunjungan()->count() > 0) {
            // Hapus pasien dengan soft delete
            $pasien->delete();
            return redirect()->route('pasien')->with('success', 'Data pasien berhasil dihapus.');
        }

        // Hapus data pasien secara permanen jika tidak ada kunjungan terkait
        $pasien->delete();
        return redirect()->route('pasien')->with('success', 'Data pasien berhasil dihapus.');
    }
    
}
