@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Tim - <strong>List Penugasan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            @if (Auth::user()->TipeUser->nama == "Ketua")
                <div class="row ">
                    <div class="col d-flex m-auto justify-content-center">
                        <a href="/penugasan/tambah" class="btn btn-primary">TAMBAH PENUGASAN</a>
                    </div>
                    <div class="col d-flex m-auto justify-content-center">
                        <a href="/penugasan/rotasi" class="btn btn-primary">MANAGEMENT PENUGASAN ROTASI</a>
                    </div>
                </div>
            @endif
            <br/>
            
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Tim</th>
                        <th>Pelapor</th>
                        <th>Nomor Telepon Pelapor</th>
                        <th>Banyak Pengeluaran</th>
                        <th>Laporan</th>
                        <th>Tanggal Laporan Dibuat</th>
                        <th>Tanggal Laporan Diselesaikan</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($penugasan as $pn)
                    @if (Auth::user()->TipeUser->nama == "Ketua" || Auth::user()->id == $pn->Tim->Petugas->id)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $pn->nama }}</td>
                        <td>{{ $pn->deskripsi }}</td>

                        @if (!empty($pn->Tim->nama) && Auth::user()->tipe_user == 1)
                            <td><a href="/tim/edit/{{$pn->Tim->id}}">{{$pn->Tim->nama}}</a></td>
                        @elseif (!empty($pn->Tim->nama) && Auth::user()->tipe_user == 2)
                            <td><a href="/tim/view/{{$pn->Tim->id}}">{{$pn->Tim->nama}}</a></td>
                        @else
                            <td>Tim telah dihapus, Segera gantikan dengan Tim Baru !</td>
                        @endif

                        @if(!empty($pn->Pelapor->nama))
                            <td> {{$pn->Pelapor->nama}} </td>
                        @else
                            <td> {{$pn->pelapor}} </td>
                        @endif

                        @if(!empty($pn->Pelapor->nomor_telepon))
                            <td> {{$pn->Pelapor->nomor_telepon}} </td>
                        @else
                            <td> {{$pn->nomor_telepon_pelapor}} </td>
                        @endif

                        <td>{{ $pn->banyak_pengeluaran}}</td>
                        @if (!empty($pn->Laporan->penugasan))
                        
                            @if (Auth::user()->TipeUser->nama == "Ketua")
                                <td><a href="/laporan/edit/{{ $pn->Laporan->id }}">link laporan</a></td>
                            @elseif (Auth::user()->TipeUser->nama == "Petugas")
                                <td><a href="/laporan/view/{{ $pn->Laporan->id }}">link laporan</a></td>
                            @endif
                        @else
                            <td>Belum Terselesaikan</td>
                        @endif

                        <td>{{ $pn->created_at }}</td>
                        <td>{{ $pn->tanggal_berakhir }}</td>
                        <td>
                            @if (Auth::user()->TipeUser->nama == "Ketua")
                                <a href="/penugasan/view/{{ $pn->id }}" class="btn btn-warning">View</a>
                                <a href="/penugasan/hapus/{{ $pn->id }}" class="btn btn-danger">Hapus</a>
                                @if (empty($pn->Laporan->penugasan))
                                    <a href="/penugasan/laporan/{{ $pn->id }}" type="button" class="btn btn-info">Selesaikan Penugasan</a>
                                @endif
                            @elseif (Auth::user()->id == $pn->Tim->Petugas->id)
                                @if (empty($pn->Laporan->penugasan))
                                    <a href="/penugasan/laporan/{{ $pn->id }}" type="button" class="btn btn-info">Selesaikan Penugasan</a>
                                @endif
                            @endif
                            
                        </td>                   
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endif
                    @endforeach
                </tbody>
            </table>
            <!-- Halaman : {{ $penugasan->currentPage() }} <br/>
            Jumlah Data : {{ $penugasan->total() }} <br/> -->
            <!-- Data Per Halaman : {{ $penugasan->perPage() }} <br/> -->
            {{ $penugasan->links() }}
        </div>
    </div>
</div>
@endsection