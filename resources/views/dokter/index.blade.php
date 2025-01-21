<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Dokter
        </h2>
    </x-slot>

    <div class="container mt-2 m-auto p-4">
      <div class="d-flex justify-end m-2">
        <a href="{{ route('dokter.tambah') }}"><button type="button" class="btn btn-success"><i class="bi bi-plus-square"></i> Tambah Data!</button></a>
      </div>
      @if (session()->has('success'))
        <div class="alert alert-success my-3">{{ session('success') }}</div>
      @endif    
      @if (session()->has('error'))
        <div class="alert alert-danger my-3">{{ session('error') }}</div>
      @endif    
        <table class="table shadow-lg ">
            <thead>
              <tr>
                <th class="p-3 text-center" scope="col">No</th>
                <th class="p-3 text-center" scope="col">Nama</th>
                <th class="p-3 text-center" scope="col">Spesialis</th>
                <th class="p-3 text-center" scope="col">No. HP</th>
                <th class="p-3 text-center" scope="col">Email</th>
                <th class="p-3 text-center" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ( $dokter as $d )
                         
              <tr>
                <th class="p-3 text-center" scope="row">{{ $loop->iteration }}</th>
                <td class="p-3 text-center">{{ $d->nama }}</td>
                <td class="p-3 text-center">{{ $d->spesialis }}</td>
                <td class="p-3 text-center">{{ $d->nomor_telepon}}</td>
                <td class="p-3 text-center">{{ $d->email}}</td>
                <td class="p-2 text-center">
                  <a href="{{ route('dokter.lihat' , $d->id) }}"><button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button></a>
                  <a href="{{ route('dokter.edit' , $d->id) }}"><button type="button" class="btn btn-success"><i class="bi bi-pencil-fill"></i></button></a>
                  <form action="{{ route('dokter.destroy', $d->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</x-app-layout>
