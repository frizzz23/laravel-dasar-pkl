<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Pasien
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header">Form Tambah Pasien</div>
                    <div class="card-body">
                        <form action="{{ route('pasien.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama">Nama Pasien</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" >
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" >
                                    @error('alamat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nomor_telepon">Nomor HP</label>
                                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" >
                                    @error('nomor_telepon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>  
                                <div class="col-md-6">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" >
                                    @error('tanggal_lahir')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>      
                            </div>
                            <div class="row mb-3 justify-content-center">                               
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" style="display: block; text-align: center;">Jenis Kelamin</label>
                                    <select class="form-control text-center" id="jenis_kelamin" name="jenis_kelamin" >
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger text-center">{{ $message }}</div>
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
