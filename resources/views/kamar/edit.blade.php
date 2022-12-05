@extends('layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
    <div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data kamar</h5>

        <form method="post" action="{{ route('kamar.update', $data->id_kamar) }}">
            @csrf
            <div class="mb-3">
                <label for="id_kamar" class="form-label">ID kamar</label>
                <input type="text" class="form-control" id="id_kamar" name="id_kamar" value="{{ $data->id_kamar }}">
            </div>
            <div class="mb-3">
                <label for="id_pasien" class="form-label">ID Pasien</label>
                <input type="text" class="form-control" id="id_pasien" name="id_pasien" value="{{ $data->id_pasien }}">
            </div>
            <div class="mb-3">
                <label for="nama_ruang" class="form-label">Nama Ruang</label>
                <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" value="{{ $data->nama_ruang }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>

@stop


