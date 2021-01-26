@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Daerah - <strong>List Daerah</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <a href="/daerah/tambah" class="btn btn-primary">TAMBAH DAERAH</a>
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori Daerah</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($daerah as $d)
                    
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->KategoriDaerah->nama}}</td>
                        <td>
                            <a href="/daerah/edit/{{ $d->id }}" class="btn btn-warning">Edit</a>
                            <a href="/daerah/hapus/{{ $d->id }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
            Halaman : {{ $daerah->currentPage() }} <br/>
            Jumlah Data : {{ $daerah->total() }} <br/>
            <!-- Data Per Halaman : {{ $daerah->perPage() }} <br/> -->
            {{ $daerah->links() }}
        </div>
    </div>
</div>
@endsection