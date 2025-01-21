<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Daftar Kunjungan
      </h2>
  </x-slot>

  <div class="container mt-2 m-auto p-4">
      <div class="d-flex justify-end m-2">
          <a href="{{ route('kunjungan.tambah') }}" class="btn btn-success"><i class="bi bi-plus-square"></i> Tambah Data!</a>
      </div>
      @if (session()->has('success'))
        <div class="alert alert-success my-3">{{ session('success') }}</div>
      @endif    
      @if (session()->has('error'))
        <div class="alert alert-danger my-3">{{ session('error') }}</div>
      @endif    
      <table class="table shadow-lg">
          <thead>
            <tr>
              <th class="p-3 text-center" scope="col">No</th>
              <th class="p-3 text-center" scope="col">Nama Pasien</th>
              <th class="p-3 text-center" scope="col">Nama Dokter</th>
              <th class="p-3 text-center" scope="col">Tanggal Kunjungan</th>
              <th class="p-3 text-center" scope="col">Diagnosa</th>
              <th class="p-3 text-center" scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            @foreach ($kunjungan as $k)
            <tr>
              <th class="p-3 text-center" scope="row">{{ $loop->iteration }}</th>
              <td class="p-3 text-center">{{ $k->pasien->nama }}</td>
              <td class="p-3 text-center">{{ $k->dokter->nama }}</td>
              <td class="p-3 text-center">{{ $k->tanggal_kunjungan }}</td>
              <td class="p-3 text-center">{{ $k->diagnosa }}</td>
              <td class="p-2 text-center">
                  <a href="{{ route('kunjungan.edit', $k->id) }}" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a>
                  
                  <form action="{{ route('kunjungan.destroy', $k->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
</x-app-layout>
