<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lihat Dokter
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-4 d-flex justify-content-center">
                        <!-- Gambar dokter (Foto) -->
                        <img src="{{ asset('img/profile.png') }}" alt="Foto Dokter" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <!-- Informasi dokter -->
                        <h5 class="card-title">{{ $dokter->nama }}</h5>
                        <p class="card-text"><strong>Spesialis:</strong> {{ $dokter->spesialis }}</p>
                        <p class="card-text"><strong>Nomor HP:</strong> {{ $dokter->nomor_telepon }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $dokter->email }}</p>
                        <p class="card-text"><strong>Dibuat:</strong> {{ $dokter->created_at->format('d M Y H:i:s') }}</p>
                        <p class="card-text"><strong>Diperbarui:</strong> {{ $dokter->updated_at->format('d M Y H:i:s') }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div>
                    <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-success me-2"><i class="bi bi-pencil-fill"></i> Edit</a>
                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</button>
                    </form>
                </div>
                <a href="{{ route('dokter') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>