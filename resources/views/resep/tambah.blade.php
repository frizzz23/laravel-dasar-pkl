<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Resep
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header">Form Tambah Resep</div>
                    <div class="card-body">
                        
                        <form action="{{ route('resep.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="kunjungan_id">Kunjungan</label>
                                    <select class="form-control" id="kunjungan_id" name="kunjungan_id" >
                                        <option value="">Pilih kunjungan</option>
                                        @foreach ($kunjungan as $k)
                                            <option value="{{ $k->id }}" {{ old('kunjungan_id') == $k->id ? 'selected' : '' }}>
                                                {{ $k->pasien->nama }} - {{ $k->dokter->nama }} - {{ $k->diagnosa }}  - {{ $k->tanggal_kunjungan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kunjungan_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="obat_id">Obat</label>
                                    <select class="form-control" id="obat_id" name="obat_id" >
                                        <option value="">Pilih Obat</option>
                                        @foreach ($obat as $o)
                                            <option value="{{ $o->id }}" {{ old('obat_id') == $o->id ? 'selected' : '' }}>
                                                {{ $o->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('obat_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" >
                                    @error('jumlah')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="dosis">Dosis</label>
                                    <input type="text" class="form-control" id="dosis" name="dosis" value="{{ old('dosis') }}" >
                                    @error('dosis')
                                        <div class="text-danger">{{ $message }}</div>
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
