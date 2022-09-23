@extends('layout.master')

@section('content')

<div class="container">

    <h1>Buat data</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('desa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Desa</label>
            <input type="text" name="nm_desa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nm_desa') }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal Berdiri</label>
            <input type="date" name="tgl" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('tgl') }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Kepala Desa</label>
            <input type="text" name="nm_kades" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nm_kades') }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah Rumah</label>
            <input type="number" name="jml_rumah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('jml_rumah') }}">
        </div>

        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
        <a href="{{ route('desa.index') }}" class="btn btn-danger">Kembali</a>


    </form>
</div>

@endsection