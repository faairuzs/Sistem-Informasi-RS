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

        <h5 class="card-title fw-bolder mb-3">Tambah dokter</h5>

        <form method="post" action="{{ route('dokter.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_dokter" class="form-label">ID dokter</label>
                <input type="text" class="form-control" id="id_dokter" name="id_dokter">
            </div>
            <div class="mb-3">
                <label for="nama_dokter" class="form-label">Nama Dokter</label>
                <input type="text" class="form-control" id="nama_dokter" name="nama_dokter">
            </div>
            <div class="mb-3">
                <label for="spesialis" class="form-label">spesialis</label>
                <input type="text" class="form-control" id="spesialis" name="spesialis">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>

@stop

