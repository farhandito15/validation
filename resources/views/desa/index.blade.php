@extends('layout.master')

@section('content')
<div class="container">
    <h1>Data Desa</h1>
    <a href="{{ route('desa.create') }}" class="btn btn-primary">Tambah Data +</a>

    <table class="table table-hover">
        <tr>
            <th>No.</th>
            <th>Nama Desa</th>
            <th>Tanggal Berdiri</th>
            <th>Nama Kepala Desa</th>
            <th>Jumlah Rumah</th>

            <th>Action</th>
        </tr>
        @foreach ($desa as $w)

        <tr>
            <td>{{$w->id}}</td>
            <td>{{$w->nm_desa}}</td>
            <td>{{$w->tgl}}</td>
            <td>{{$w->nm_kades}}</td>
            <td>{{$w->jml_rumah}} Rumah</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('desa.edit', $w) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('desa.destroy', $w) }}" method="POST">
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