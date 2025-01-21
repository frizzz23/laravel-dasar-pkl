<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Resep
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header">Detail Resep</div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Kolom Kunjungan -->
                            <div class="col-md-6">
                                <div class="border p-3 mb-3">
                                    <h4 class="font-semibold mb-3">Informasi Kunjungan</h4>
                                    <p class="mb-1"><strong>Nama Pasien:</strong> <span class="text-muted">{{ $resep->kunjungan->pasien->nama }}</span></p>
                                    <p class="mb-1"><strong>Nama Dokter:</strong> <span class="text-muted">{{ $resep->kunjungan->dokter->nama }}</span></p>
                                    <p class="mb-1"><strong>Tanggal Kunjungan:</strong> <span class="text-muted">{{ $resep->kunjungan->tanggal_kunjungan }}</span></p>
                                </div>
                            </div>

                            <!-- Kolom Resep -->
                            <div class="col-md-6">
                                <div class="border p-3 mb-3">
                                    <h4 class="font-semibold mb-3">Informasi Resep</h4>
                                    <p class="mb-1"><strong>Nama Obat:</strong> <span class="text-muted">{{ $resep->obat->nama }}</span></p>
                                    <p class="mb-1"><strong>Dosis:</strong> <span class="text-muted">{{ $resep->dosis }}</span></p>
                                    <p><strong>Jumlah:</strong> <span class="text-muted">{{ $resep->jumlah }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('resep') }}" class="btn btn-primary">Kembali ke Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
