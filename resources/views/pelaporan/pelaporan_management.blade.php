@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>List Pelaporan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
                <a href="{{url('/pelaporan/tipe_kategori_pelaporan')}}" class="btn btn-primary">BUAT PELAPORAN</a>
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
                            <td><a href="{{url('/penugasan/view/'.$pl->Penugasan->id)}}">link penugasan</a></td>
                        @elseif (!empty($pl->Penugasan->id) && Auth::user()->tipe_user == 2)
                            <td><a href="{{url('/penugasan/view/'.$pl->Penugasan->id)}}">link penugasan</a></td>
                        @elseif (!empty($pl->Penugasan->id))
                            <td><a href="{{url('/penugasan/view/'.$pl->Penugasan->id)}}">link penugasan</a></td>
                        @else
                            <td>Belum Dikerjakan</td>
                        @endif

                        <td>{{ $pl->created_at}}</td>
                        @if (!empty($pl->Penugasan->tanggal_berakhir))
                            <td>{{ $pl->Penugasan->tanggal_berakhir}}</td>
                        @else
                            <td>Belum Terselesaikan</td>
                        @endif
                        
                        <td>
                            <div class="container m-auto">
                                <div class="row">
                                    {{ $pl->StatusPelaporan->nama }}
                                </div>
                                @if(!empty($pl->Review))
                                <hr>
                                <div class="row">
                                    <div class="container mt-1">
                                        <div class="row">
                                            Rating : {{$pl->Review->rating}} 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                            </svg>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            Review : {{$pl->Review->review}}
                                        </div>
                                    </div>
                                </div>
                                @endif  
                            </div>
                        </td>
                        

                        @if (Auth::user()->TipeUser->nama == "Ketua")
                            <td>
                                @if (empty($pl->Penugasan->id))
                                    @if($pl->status == 1)
                                        <a href="{{url('/pelaporan/tolak/' . $pl->id) }}" class="btn btn-dark">Tolak</a>
                                        <a href="{{url('/pelaporan/edit/' . $pl->id) }}" class="btn btn-warning">Edit</a>
                                        @if (empty($pl->penugasan))
                                            <a href="{{url('/pelaporan/buat_penugasan/' . $pl->id) }}" type="button" class="btn btn-info">Buat Penugasan</a>
                                        @endif
                                    @else
                                        <a href="{{url('/pelaporan/hapus/' . $pl->id) }}" class="btn btn-danger">Hapus</a>
                                    @endif
                                @else
                                    <a href="{{url('/pelaporan/hapus/' . $pl->id) }}" class="btn btn-danger">Hapus</a>
                                    @if(empty($pl->Review))
                                    <a href="{{url('/pelaporan/review/' . $pl->id) }}" class="btn btn-secondary">Review</a>
                                    @endif
                                @endif
                                
                            </td>
                        @elseif (empty($pl->Penugasan->id))
                            @if(Auth::user()->id == $pl->pelapor)
                                <td>
                                @if($pl->status != 2)
                                    <a href="{{url('/pelaporan/edit/' . $pl->id) }}" class="btn btn-warning">Edit</a>
                                @endif
                                    @if(empty($pl->Review))
                                        <a href="{{url('/pelaporan/review/' . $pl->id) }}" class="btn btn-secondary">Review</a>
                                    @endif
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