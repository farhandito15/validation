@extends('layout.master')

@section('content')
<div class="container">
    <h1>Data Warga</h1>
    <a href="{{ route('warga.create') }}" class="btn btn-primary">Tambah Data +</a>

    <table class="table table-hover">
        <tr>
            <th>No.</th>
            <th>Nama Warga</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($warga as $d)

        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->nama}}</td>
            <td>{{$d->gender}}</td>
            <td>{{$d->tgl}}</td>
            <td>{{$d->status}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('warga.edit', $d) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('warga.destroy', $d) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Hapus" class="btn btn-danger">
                    </form>
                </div>
            </td>
        </tr>
        @endforeach

    </table>
</div>
@endsection