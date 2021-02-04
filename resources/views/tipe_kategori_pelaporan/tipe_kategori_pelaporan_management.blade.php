@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Tipe Kategori Pelaporan - <strong>List Tipe Kategori Pelaporan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <div class="row ">
                <div class="col d-flex m-auto justify-content-center">
                    <a href="{{url('/tipe_kategori_pelaporan/tambah')}}" class="btn btn-primary">TAMBAH TIPE KATEGORI PELAPORAN</a>
                </div>
                <div class="col d-flex m-auto justify-content-center">
                    <a href="{{url('/kategori_pelaporan/')}}" class="btn btn-primary">MANAGEMENT KATEGORI LAPORAN</a>
                </div>
            </div>
            
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($tipe_kategori_pelaporan as $tkp)
                    
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $tkp->nama }}</td>
                        <td>
                            <a href="{{url('/tipe_kategori_pelaporan/edit/' . $tkp->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{url('/tipe_kategori_pelaporan/hapus/' . $tkp->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
            Halaman : {{ $tipe_kategori_pelaporan->currentPage() }} <br/>
            Jumlah Data : {{ $tipe_kategori_pelaporan->total() }} <br/>
            <!-- Data Per Halaman : {{ $tipe_kategori_pelaporan->perPage() }} <br/> -->
            {{ $tipe_kategori_pelaporan->links() }}
        </div>
    </div>
</div>
@endsection