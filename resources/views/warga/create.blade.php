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

    <form action="{{ route('warga.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Warga</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" aria-describedby="emailHelp">Jenis Kelamin</label>
            <br>
            <select name="gender" for="exampleInputEmail1" class="form-control">
                <option value="">~ Pilih Jenis Kelamin ~</option>
                <option value="Laki-Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgl" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('penerbit') }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Status</label>
            <input type="text" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('tgl_terbit') }}">
        </div>

        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
        <a href="{{ route('warga.index') }}" class="btn btn-danger">Kembali</a>


    </form>
</div>

@endsection