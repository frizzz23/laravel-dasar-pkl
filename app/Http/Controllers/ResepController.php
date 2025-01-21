<?php
namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Resep;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resep = Resep::with('kunjungan', 'obat')->orderBy('id', 'desc')->get();
        return view('resep.index', compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kunjungan = Kunjungan::all();
        $obat = Obat::all();
        return view('resep.tambah', compact('kunjungan', 'obat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'obat_id' => 'required|exists:obat,id',
            'jumlah' => 'required',
            'dosis' => 'required',
        ], [
            'kunjungan_id.required' => 'Kunjungan harus dipilih.',
            'kunjungan_id.exists' => 'Kunjungan yang dipilih tidak valid.',
            'obat_id.required' => 'Obat harus dipilih.',
            'obat_id.exists' => 'Obat yang dipilih tidak valid.',
            'jumlah.required' => 'Jumlah obat harus diisi.',
            'dosis.required' => 'Dosis obat harus diisi.',
        ]);

        Resep::create($validatedData);
        return redirect()->route('resep')->with('success', 'Data resep berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resep = Resep::with('kunjungan', 'obat')->findOrFail($id);
        return view('resep.lihat', compact('resep'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resep = Resep::findOrFail($id);
        $kunjungan = Kunjungan::all();
        $obat = Obat::all();
        return view('resep.edit', compact('resep', 'kunjungan', 'obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'obat_id' => 'required|exists:obat,id',
            'jumlah' => 'required',
            'dosis' => 'required',
        ], [
            'kunjungan_id.required' => 'Kunjungan harus dipilih.',
            'kunjungan_id.exists' => 'Kunjungan yang dipilih tidak valid.',
            'obat_id.required' => 'Obat harus dipilih.',
            'obat_id.exists' => 'Obat yang dipilih tidak valid.',
            'jumlah.required' => 'Jumlah obat harus diisi.',
            'dosis.required' => 'Dosis obat harus diisi.',
        ]);

        $resep = Resep::findOrFail($id);
        $resep->update($validatedData);
        return redirect()->route('resep')->with('success', 'Data resep berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resep = Resep::findOrFail($id);
        $resep->delete();
        return redirect()->route('resep')->with('success', 'Data resep berhasil dihapus');
    }
}
