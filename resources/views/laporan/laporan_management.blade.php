@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Laporan - <strong>List Laporan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Isi</th>
                        <th>Banyak Pengeluaran</th>
                        <th>Penugasan</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($laporan as $l)
                    
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $l->isi }}</td>
                        <td>{{ $l->Penugasan->banyak_pengeluaran }}</td>
                        <td><a href="/penugasan/edit/{{$l->Penugasan->id}}"> {{ $l->Penugasan->nama }}</a></td>
                        <td>
                            <a href="/laporan/edit/{{ $l->id }}" class="btn btn-warning">Edit</a>
                            <a href="/laporan/hapus/{{ $l->id }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection