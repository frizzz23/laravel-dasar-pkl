<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lihat Obat
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-4 d-flex justify-content-center">
                        <!-- Gambar obat (Foto) -->
                        <img src="{{ asset('img/obat.png') }}" alt="Foto Obat" class="img-fluid rounded" style="width: 250px; height:250px;">
                    </div>
                    <div class="col-md-4">
                        <!-- Informasi obat -->
                        <h1 class="card-title">{{ $obat->nama }}</h1>
                        <p class="card-text"><strong>Jenis Obat:</strong> {{ $obat->jenis }}</p>
                        <p class="card-text"><strong>Dibuat:</strong> {{ $obat->created_at->format('d M Y H:i:s') }}</p>
                        <p class="card-text"><strong>Diperbarui:</strong> {{ $obat->updated_at->format('d M Y H:i:s') }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="card-text"><strong>Deskripsi:</strong> {{ $obat->deskripsi }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div>
                    <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-success me-2"><i class="bi bi-pencil-fill"></i> Edit</a>
                    <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</button>
                    </form>
                </div>
                <a href="{{ route('obat') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>