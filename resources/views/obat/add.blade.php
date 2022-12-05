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

        <h5 class="card-title fw-bolder mb-3">Tambah obat</h5>

        <form method="post" action="{{ route('obat.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_obat" class="form-label">ID obat</label>
                <input type="text" class="form-control" id="id_obat" name="id_obat">
            </div>
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat">
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">jenis</label>
                <select id="jenis" name="jenis" class="form-control">
                                    <option  value="Paracetamol">Paracetamol</option>
                                    <option value="Antibiotik">Antibiotik</option>
                                    <option value="Antiseptik">Antiseptik</option>                               
                            </select>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>

@stop
