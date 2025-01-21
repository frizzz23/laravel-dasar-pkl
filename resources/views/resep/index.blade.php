<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Daftar Resep
      </h2>
  </x-slot>

  <div class="container mt-2 m-auto p-4">
      <div class="d-flex justify-end m-2">
          <a href="{{ route('resep.tambah') }}" class="btn btn-success">
              <i class="bi bi-plus-square"></i> Tambah Data!
          </a>
      </div>
      @if (session()->has('success'))
        <div class="alert alert-success my-3">{{ session('success') }}</div>
      @endif    
      <table class="table shadow-lg">
          <thead>
              <tr>
                  <th class="p-3 text-center" scope="col">No</th>
                  <th class="p-3 text-center" scope="col">Nama Pasien</th>
                  <th class="p-3 text-center" scope="col">Diagnosa</th>
                  <th class="p-3 text-center" scope="col">Nama Obat</th>
                  <th class="p-3 text-center" scope="col">Jumlah</th>
                  <th class="p-3 text-center" scope="col">Dosis</th>
                  <th class="p-3 text-center" scope="col">Aksi</th>
              </tr>
          </thead>
          <tbody class="table-group-divider">
              @foreach ($resep as $r)
              <tr>
                  <th class="p-3 text-center" scope="row">{{ $loop->iteration }}</th>
                  <td class="p-3 text-center">{{ $r->kunjungan->pasien->nama }}</td>
                  <td class="p-3 text-center">{{ $r->kunjungan->diagnosa }}</td>
                  <td class="p-3 text-center">{{ $r->obat->nama }}</td>
                  <td class="p-3 text-center">{{ $r->jumlah }}</td>
                  <td class="p-3 text-center">{{ $r->dosis }}</td>
                  <td class="p-2 text-center">
                      <a href="{{ route('resep.lihat' , $r->id) }}"><button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button></a>
                      <a href="{{ route('resep.edit', $r->id) }}" class="btn btn-success">
                          <i class="bi bi-pencil-fill"></i>
                      </a>
                      <form action="{{ route('resep.destroy', $r->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">
                              <i class="bi bi-trash"></i>
                          </button>
                      </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</x-app-layout>
