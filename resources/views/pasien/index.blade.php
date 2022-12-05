@extends('layout')

@section('content')

<h2 class="mt-4 fw-bold">Data Pasien</h2>

<form action="">
<div class="input-group mt-3 mb-2">
  <input name="search" type="text" class="form-control" placeholder="Cari Nama Pasien" aria-label="Cari Nama Pasien" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
</div>
</form>

<a href="{{ route('pasien.create') }}" type="button" class="btn btn-success rounded-3 mt-3">Tambah Data</a>


@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-4 text-center align-middle">
    <thead>
      <tr>
        <th>ID Pasien</th>
        <th>ID Dokter</th>
        <th>ID Obat</th>
        <th>Nama Pasien</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_pasien }}</td>
                <td>{{ $data->id_dokter }}</td>
                <td>{{ $data->id_obat }}</td>
                <td>{{ $data->nama_pasien }}</td>
                <td>{{ $data->telepon }}</td>
                <td>{{ $data->alamat }}</td>
                <td>
                    <a href="{{ route('pasien.edit', $data->id_pasien) }}" type="button" class="btn btn-warning rounded-3 mx-1 my-1">Ubah</a>

                 
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_pasien }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_pasien }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('pasien.delete', $data->id_pasien) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#recycle{{ $data->id_pasien }}">
                        Recycle
                    </button>

                    <div class="modal fade" id="recycle{{ $data->id_pasien }}" tabindex="-1" aria-labelledby="recycleLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="recycleLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('pasien.recycle', $data->id_pasien) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h2 class="mt-4 fw-bold">Recycle</h2>



<table class="table table-hover mt-4 text-center align-middle">
    <thead>
      <tr>
        <th>ID Pasien</th>
        <th>ID Dokter</th>
        <th>ID Obat</th>
        <th>Nama Pasien</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datasrecycle as $data)
            <tr>
                <td>{{ $data->id_pasien }}</td>
                <td>{{ $data->id_dokter }}</td>
                <td>{{ $data->id_obat }}</td>
                <td>{{ $data->nama_pasien }}</td>
                <td>{{ $data->telepon }}</td>
                <td>{{ $data->alamat }}</td>
                <td>

                    <a href="{{ route('pasien.restore', $data->id_pasien) }}" type="button" class="btn btn-secondary rounded-3">Restore</a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop



