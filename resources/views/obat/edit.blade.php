<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Obat
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header">Form Edit Obat</div>
                    <div class="card-body">
                        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama">Nama Obat</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $obat->nama) }}" >
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="jenis">Jenis Obat</label>
                                    <input type="text" class="form-control" id="jenis" name="jenis" value="{{ old('jenis', $obat->jenis) }}" >
                                    @error('jenis')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-12">
                                    <label for="deskripsi" style="display: block; text-align: center;">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" >{{ old('deskripsi', $obat->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
