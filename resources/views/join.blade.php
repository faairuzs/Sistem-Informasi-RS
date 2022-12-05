@extends('layout')

@section('content')

<h2 class="mt-4 fw-bold">Rekam Medis</h2>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<form action="">
<div class="input-group mt-3 mb-2">
  <input name="search" type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
</div>
</form>

<table class="table table-hover mt-4 text-center align-middle">
    <thead>
      <tr>
      <th>ID Pasien</th>
        <th>Nama Pasien</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Ditangani oleh Dokter</th>
        <th>Obat</th>
        <th>jenis Obat</th>
        <th>Nama Ruang Kamar</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_pasien }}</td>
                <td>{{ $data->nama_pasien }}</td>
                <td>{{ $data->telepon }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->nama_dokter }}</td>
                <td>{{ $data->nama_obat }}</td>
                <td>{{ $data->jenis }}</td>
                <td>{{ $data->nama_ruang }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop