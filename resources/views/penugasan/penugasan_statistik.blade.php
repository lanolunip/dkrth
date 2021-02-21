@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Statistik Penugasan
        </div>
        <div class="card-body">
            <a href="{{url('/home')}}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
        
            <form method="get" action="{{url('/penugasan/statistik/cari')}}">

                {{ csrf_field() }}

                <!-- Tanggal Mulai -->
                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" class="form-control" name="tanggal_mulai" value="{{$tanggal_mulai}}">
                    @if($errors->has('tanggal_mulai'))
                        <div class="text-danger">
                            {{ $errors->first('tanggal_mulai')}}
                        </div>
                    @endif

                </div>
                <!-- Tanggal Akhir -->
                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tanggal_akhir" value="{{$tanggal_akhir}}">
                    @if($errors->has('tanggal_akhir'))
                        <div class="text-danger">
                            {{ $errors->first('tanggal_akhir')}}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <button type="submit" name="cari" class="btn btn-success" value="Cari">Cari</button>
                </div>
            </form>
            
            @if(!empty($penugasan[0]))
            <hr>
            <form method="get" action="{{url('/penugasan/statistik/print_pdf')}}" target="_blank">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="tanggal_mulai_penugasan" value="{{$tanggal_mulai}}">
                    <input type="hidden" class="form-control" name="tanggal_akhir_penugasan" value="{{$tanggal_berakhir}}">
                    <button type="submit" name="print_pdf" class="btn btn-success">PRINT PDF</button>
                </div>
            </form>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Penugasan</th>
                        <th>Jenis Penugasan</th>
                        <th>Tim Yang Bertugas</th>
                        <th>Banyak Pengeluaran</th>
                        <th>Status Penugasan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($penugasan as $p)
                    
                    <tr>
                        <td>{{ $i }}</td>
                        <td><a href="{{url('/penugasan/view/'. $p->id)}}">{{ $p->nama }}</a></td>
                        <td> {{$p->Pelaporan->KategoriPelaporan->TipeKategoriPelaporan->nama}} - {{ $p->Pelaporan->KategoriPelaporan->nama}}</td>
                        <td> {{$p->Tim->nama}}
                        <td>Rp.{{ $p->banyak_pengeluaran }}</td>
                        <td>
                            {{$p->Pelaporan->StatusPelaporan->nama}}
                            @if(!empty($p->tanggal_berakhir))
                                <hr>
                                Pada : <br>{{date('d-m-Y', strtotime($p->tanggal_berakhir))}}
                            @endif
                        </td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection