@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>LAPORAN</strong>
        </div>
        <div class="card-body">
            <br/>
            <br/>
                
            <!-- Nama -->
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Tim .." value="{{ $laporan->Penugasan->nama }}" readonly>

                @if($errors->has('nama'))
                    <div class="text-danger">
                        {{ $errors->first('nama')}}
                    </div>
                @endif

            </div>
            <!-- Deskripsi -->
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi .." readonly>{{ $laporan->Penugasan->deskripsi }}</textarea>

            </div>
    
            <!-- Tim -->
            <div class="form-group">
                <label>Tim</label>
                    <input name="tim" class="form-control" placeholder="Tim .." value="{{$laporan->Penugasan->Tim->nama}}" readonly>
    
            </div>
            <!-- Nama Pelapor -->
            
            <div class="form-group">
                <label>Nama Pelapor</label>
                @if(!empty($laporan->Penugasan->Pelapor->nama))
                <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$laporan->Penugasan->Pelapor->nama}}" readonly>
                @else
                <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$laporan->Penugasan->pelapor}}" readonly>
                @endif
            </div>
                      
            <!-- Nomor Telepon Pelapor -->
            <div class="form-group">
                <label>Nomor Telepon Pelapor</label>
                @if(!empty($laporan->Penugasan->Pelapor->nomor_telepon))
                <input type="text" name="pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$laporan->Penugasan->Pelapor->nomor_telepon}}" readonly>
                @else
                <input type="text" name="pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$laporan->Penugasan->nomor_telepon_pelapor}}" readonly>
                @endif
            </div>
            <!-- Isi Laporan Pengerjaan -->
            <div class="form-group">
                <label>Isi Laporan Pengerjaan</label>
                <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi .." readonly>{{ $laporan->isi }}</textarea>
            </div>
            <!-- Banyak Pengeluaran -->
            <div class="form-group">
                <div class="form-row">
                    <label>Banyak Pengeluaran</label>
                </div>
                <div class="form-row">
                    <div class="col-auto">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                    </div>
                    <div class="col">
                        <input type="number" name="banyak_pengeluaran" class="form-control" placeholder="Banyak Pengeluaran .." value="{{$laporan->Penugasan->banyak_pengeluaran}}" readonly>
                    </div>
                </div>
            </div>
            <!-- Tanggal Dibuat -->
            <div class="form-group">
                <label>Tanggal Dibuat (yyyy-mm-dd)</label>
                <input type="text" name="nama" class="form-control" placeholder="Tanggal Mulai .." value="{{ $laporan->Penugasan->created_at }}" readonly>

                @if($errors->has('nama'))
                    <div class="text-danger">
                        {{ $errors->first('nama')}}
                    </div>
                @endif

            </div>

            <!-- Tanggal Selesai -->
            <div class="form-group">
                <label>Tanggal Selesai (yyyy-mm-dd)</label>
                <input type="text" name="nama" class="form-control" placeholder="Tanggal Selesai .." value="{{ $laporan->Penugasan->tanggal_berakhir }}" readonly>

                @if($errors->has('nama'))
                    <div class="text-danger">
                        {{ $errors->first('nama')}}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection