<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Data Kunjungan
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header">Form Tambah Kunjungan</div>
                    <div class="card-body">
                        <form action="{{ route('kunjungan.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pasien_id">Nama Pasien</label>
                                    <select class="form-control @error('pasien_id') is-invalid @enderror" id="pasien_id" name="pasien_id">
                                        <option value="">Pilih Pasien</option>
                                        @foreach($pasien as $p)
                                            <option value="{{ $p->id }}" {{ old('pasien_id') == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pasien_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="dokter_id">Nama Dokter</label>
                                    <select class="form-control @error('dokter_id') is-invalid @enderror" id="dokter_id" name="dokter_id">
                                        <option value="">Pilih Dokter</option>
                                        @foreach($dokter as $d)
                                            <option value="{{ $d->id }}" {{ old('dokter_id') == $d->id ? 'selected' : '' }}>
                                                {{ $d->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('dokter_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                                    <input type="date" class="form-control @error('tanggal_kunjungan') is-invalid @enderror" id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}">
                                    @error('tanggal_kunjungan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="diagnosa">Diagnosa</label>
                                    <input type="text" class="form-control @error('diagnosa') is-invalid @enderror" id="diagnosa" name="diagnosa" value="{{ old('diagnosa') }}">
                                    @error('diagnosa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
