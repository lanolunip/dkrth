@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>List Pelaporan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
                <a href="/pelaporan/tambah" class="btn btn-primary">BUAT PELAPORAN</a>
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelapor</th>
                        <th>Nama Daerah</th>
                        <th>Deskripsi Masalah</th>
                        <th>Tim yang Mengurusi</th>
                        <th>Nomor Telepon Pelapor</th>
                        <th>Penugasan</th>
                        <th>Tanggal Laporan Dibuat</th>
                        <th>Tanggal Laporan Diselesaikan</th>
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
                        <td>{{ $pl->Pelapor->nama }}</td>
                        <td>{{ $pl->Daerah->nama }}</td>
                        <td>{{ $pl->deskripsi }}</td>
                        
                        @if (!empty($pl->Penugasan->Tim->nama) && Auth::user()->tipe_user == 1)
                            <td><a href="/tim/edit/{{ $pl->Penugasan->Tim->id }}">{{ $pl->Penugasan->Tim->nama}}</a></td>
                        @elseif (!empty($pl->Penugasan->Tim->nama) && Auth::user()->tipe_user == 2)
                            <td><a href="/tim/view/{{ $pl->Penugasan->Tim->id }}">{{ $pl->Penugasan->Tim->nama}}</a></td>
                        @else
                            <td>Belum Dikerjakan</td>
                        @endif

                        <td>{{ $pl->Pelapor->nomor_telepon }}</td>

                        @if (!empty($pl->Penugasan->id) && Auth::user()->tipe_user == 1)
                            <td><a href="/penugasan/edit/{{$pl->Penugasan->id}}">link penugasan</a></td>
                        @elseif (!empty($pl->Penugasan->id) && Auth::user()->tipe_user == 2)
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
                        
                        @if (Auth::user()->TipeUser->nama == "Ketua")
                            <td>
                                @if (empty($pl->Penugasan->id))
                                    <a href="/pelaporan/edit/{{ $pl->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/pelaporan/hapus/{{ $pl->id }}" class="btn btn-danger">Hapus</a>
                                @else
                                    <a href="/pelaporan/hapus/{{ $pl->id }}" class="btn btn-danger">Hapus</a>
                                @endif
                                @if (empty($pl->penugasan))
                                    <a href="/pelaporan/buat_penugasan/{{ $pl->id }}" type="button" class="btn btn-info">Buat Penugasan</a>
                                @endif
                            </td>
                        @elseif (empty($pl->Penugasan->id))
                            @if(Auth::user()->id == $pl->pelapor)
                                <td>
                                    <a href="/pelaporan/edit/{{ $pl->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/pelaporan/hapus/{{ $pl->id }}" class="btn btn-danger">Batalkan Pelaporan</a>
                                </td>
                            @endif
                        @else
                            <td>Sedang dikerjakan / Sudah Selesai</td>
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