@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>List Pelaporan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
                <a href="/pelaporan/tipe_kategori_pelaporan" class="btn btn-primary">BUAT PELAPORAN</a>
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        @if (Auth::user()->TipeUser->nama == "Ketua")
                            <th>Nama Pelapor</th>
                        @endif
                        <th>Nama Daerah</th>
                        <th>Kategori Pelaporan</th>
                        <th>Deskripsi Masalah</th>
                        @if (Auth::user()->TipeUser->nama == "Ketua")
                            <th>Nomor Telepon Pelapor</th>
                        @endif
                        <th>Penugasan</th>
                        <th>Tanggal Laporan Dibuat</th>
                        <th>Tanggal Laporan Diselesaikan</th>
                        <th>Status</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($pelaporan as $pl)
                    @if (Auth::user()->TipeUser->nama == "Ketua" || Auth::user()->id == $pl->pelapor)
                    <tr>
                        <td>{{ $i }}</td>
                        @if (Auth::user()->TipeUser->nama == "Ketua")
                            <td>{{ $pl->Pelapor->nama }}</td>
                        @endif
                        <td>{{ $pl->Daerah->nama }}</td>
                        <td> {{ $pl->KategoriPelaporan->TipeKategoriPelaporan->nama }} - {{ $pl->KategoriPelaporan->nama }}</td>
                        <td>{{ $pl->deskripsi }}</td>
                        
                        @if (Auth::user()->TipeUser->nama == "Ketua")
                            <td>{{ $pl->Pelapor->nomor_telepon }}</td>
                        @endif
                        
                        @if (!empty($pl->Penugasan->id) && Auth::user()->tipe_user == 1)
                            <td><a href="/penugasan/edit/{{$pl->Penugasan->id}}">link penugasan</a></td>
                        @elseif (!empty($pl->Penugasan->id) && Auth::user()->tipe_user == 2)
                            <td><a href="/penugasan/view/{{$pl->Penugasan->id}}">link penugasan</a></td>
                        @elseif (!empty($pl->Penugasan->id))
                            <td><a href="/penugasan/view/{{$pl->Penugasan->id}}">link penugasan</a></td>
                        @else
                            <td>Belum Dikerjakan</td>
                        @endif

                        <td>{{ $pl->created_at}}</td>
                        @if (!empty($pl->Penugasan->tanggal_berakhir))
                            <td>{{ $pl->Penugasan->tanggal_berakhir}}</td>
                        @else
                            <td>Belum Terselesaikan</td>
                        @endif
                        
                        <td>{{ $pl->StatusPelaporan->nama }}</td>

                        @if (Auth::user()->TipeUser->nama == "Ketua")
                            <td>
                                @if (empty($pl->Penugasan->id))
                                    @if($pl->status == 1)
                                        <a href="/pelaporan/tolak/{{ $pl->id }}" class="btn btn-dark">Tolak</a>
                                        <a href="/pelaporan/edit/{{ $pl->id }}" class="btn btn-warning">Edit</a>
                                        @if (empty($pl->penugasan))
                                            <a href="/pelaporan/buat_penugasan/{{ $pl->id }}" type="button" class="btn btn-info">Buat Penugasan</a>
                                        @endif
                                    @else
                                        <a href="/pelaporan/hapus/{{ $pl->id }}" class="btn btn-danger">Hapus</a>
                                    @endif
                                @else
                                    <a href="/pelaporan/hapus/{{ $pl->id }}" class="btn btn-danger">Hapus</a>
                                @endif
                                
                            </td>
                        @elseif (empty($pl->Penugasan->id))
                            @if(Auth::user()->id == $pl->pelapor)
                                <td>
                                @if($pl->status != 2)
                                    <a href="/pelaporan/edit/{{ $pl->id }}" class="btn btn-warning">Edit</a>
                                @endif
                                    <a href="/pelaporan/hapus/{{ $pl->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                                
                            @endif
                        @elseif($pl->status==3)
                            <td></td>
                        @else
                            <td>Sedang dikerjakan</td>
                        @endif
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endif
                    @endforeach
                </tbody>
            </table>
            <!-- Halaman : {{ $pelaporan->currentPage() }} <br/>
            Jumlah Data : {{ $pelaporan->total() }} <br/> -->
            <!-- Data Per Halaman : {{ $pelaporan->perPage() }} <br/> -->
            {{ $pelaporan->links() }}
        </div>
    </div>
</div>
@endsection