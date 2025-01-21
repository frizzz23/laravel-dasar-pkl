<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pasien
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-4 d-flex justify-content-center">
                        <!-- Gambar Pasien (Foto) -->
                        <img src="{{ asset('img/profile.png') }}" alt="Foto Pasien" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <!-- Informasi Pasien -->
                        <h5 class="card-title">{{ $pasien->nama }}</h5>
                        <p class="card-text"><strong>Alamat:</strong> {{ $pasien->alamat }}</p>
                        <p class="card-text"><strong>Nomor HP:</strong> {{ $pasien->nomor_telepon }}</p>
                        <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $pasien->tanggal_lahir }}</p>
                        <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $pasien->jenis_kelamin }}</p>
                        <p class="card-text"><strong>Dibuat:</strong> {{ $pasien->created_at->format('d M Y H:i:s') }}</p>
                        <p class="card-text"><strong>Diperbarui:</strong> {{ $pasien->updated_at->format('d M Y H:i:s') }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div>
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-success me-2"><i class="bi bi-pencil-fill"></i> Edit</a>
                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</button>
                    </form>
                </div>
                <a href="{{ route('pasien') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>
