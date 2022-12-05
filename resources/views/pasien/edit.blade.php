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

        <h5 class="card-title fw-bolder mb-3">Ubah Data pasien</h5>

        <form method="post" action="{{ route('pasien.update', $data->id_pasien) }}">
            @csrf
            <div class="mb-3">
                <label for="id_pasien" class="form-label">ID pasien</label>
                <input type="text" class="form-control" id="id_pasien" name="id_pasien" value="{{ $data->id_pasien }}">
            </div>
            <div class="mb-3">
                <label for="id_dokter" class="form-label">ID Dokter</label>
                <input type="text" class="form-control" id="id_dokter" name="id_dokter">
            </div>
            <div class="mb-3">
                <label for="id_pasien" class="form-label">ID Obat</label>
                <input type="text" class="form-control" id="id_obat" name="id_obat">
            </div>
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien">
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon">
            </div>
            <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
                <textarea type="text" class="form-control" id="alamat" name="alamat"> </textarea>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>

@stop



