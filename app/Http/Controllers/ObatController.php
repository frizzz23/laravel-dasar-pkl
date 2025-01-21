<?php
namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::orderBy('id', 'desc')->get();
        return view('obat.index', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'nama' => 'required|string|max:255|unique:obat,nama',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
        ], [
            'nama.required' => 'Nama obat harus diisi.',
            'nama.unique' => 'Nama obat sudah terdaftar.',
            'nama.string' => 'Nama obat harus berupa teks.',
            'nama.max' => 'Nama obat tidak boleh lebih dari 255 karakter.',
            'jenis.required' => 'Jenis obat harus diisi.',
            'jenis.string' => 'Jenis obat harus berupa teks.',
            'deskripsi.required' => 'Deskripsi obat harus diisi.',
            'deskripsi.string' => 'Deskripsi obat harus berupa teks.',
        ]);

        // Menyimpan data obat ke dalam database
        Obat::create($request->all());

        // Redirect ke halaman index obat dengan pesan sukses
        return redirect()->route('obat')->with('success', 'Data obat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.lihat', compact('obat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang dikirim
        $request->validate([
            'nama' => 'required|string|max:255|unique:obat,nama',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
        ], [
            'nama.required' => 'Nama obat harus diisi.',
            'nama.unique' => 'Nama obat sudah terdaftar.',
            'nama.string' => 'Nama obat harus berupa teks.',
            'nama.max' => 'Nama obat tidak boleh lebih dari 255 karakter.',
            'jenis.required' => 'Jenis obat harus diisi.',
            'jenis.string' => 'Jenis obat harus berupa teks.',
            'deskripsi.required' => 'Deskripsi obat harus diisi.',
            'deskripsi.string' => 'Deskripsi obat harus berupa teks.',
        ]);

        // Mengupdate data obat di dalam database
        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        // Redirect ke halaman index obat dengan pesan sukses
        return redirect()->route('obat')->with('success', 'Data obat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);

        // Periksa apakah obat terkait dengan resep
        if ($obat->resep()->count() > 0) {
            return redirect()->route('obat')->with('error', 'Data obat tidak dapat dihapus karena masih terkait dengan data resep.');
        }

        $obat->delete();
        return redirect()->route('obat')->with('success', 'Data obat berhasil dihapus.');
    }
}
