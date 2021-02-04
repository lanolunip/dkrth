@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Tim - <strong>List Tim</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <a href="{{url('/tim/tambah')}}" class="btn btn-primary">TAMBAH TIM</a>
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Petugas yang Bertanggun Jawab</th>
                        <th>Jenis Tim</th>
                        <th>Kategori Daerah</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($tim as $t)
                    
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $t->nama }}</td>
                        @if (!empty($t->Petugas->nama))
                            <td>{{$t->Petugas->nama}}</td>
                        @else
                            <td>Belum Memiliki Penanggung Jawab</td>
                        @endif
                        <td>{{ $t->JenisTim->nama }}</td>
                        <td>{{ $t->KategoriDaerah->nama}}</td>
                        <td>
                            <a href="{{url('/tim/edit/' . $t->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{url('/tim/hapus/' . $t->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
            Halaman : {{ $tim->currentPage() }} <br/>
            Jumlah Data : {{ $tim->total() }} <br/>
            <!-- Data Per Halaman : {{ $tim->perPage() }} <br/> -->
            {{ $tim->links() }}
        </div>
    </div>
</div>
@endsection