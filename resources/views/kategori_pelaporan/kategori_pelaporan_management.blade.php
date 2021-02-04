@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Kategori Pelaporan - <strong>List Kategori Pelaporan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <a href="{{url('/kategori_pelaporan/tambah')}}" class="btn btn-primary">TAMBAH KATEGORI PELAPORAN</a>
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
                    @foreach($kategori_pelaporan as $tkp)
                    
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $tkp->nama }}</td>
                        <td>{{ $tkp->TipeKategoriPelaporan->nama }}</td>
                        <td>
                            <a href="{{url('/kategori_pelaporan/edit/'. $tkp->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{url('/kategori_pelaporan/hapus/'. $tkp->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
            Halaman : {{ $kategori_pelaporan->currentPage() }} <br/>
            Jumlah Data : {{ $kategori_pelaporan->total() }} <br/>
            <!-- Data Per Halaman : {{ $kategori_pelaporan->perPage() }} <br/> -->
            {{ $kategori_pelaporan->links() }}
        </div>
    </div>
</div>
@endsection