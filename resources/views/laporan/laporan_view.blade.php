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
                <input type="text" name="nama" class="form-control" placeholder="Nama Tim .." value="{{ $penugasan->nama }}" readonly>

                @if($errors->has('nama'))
                    <div class="text-danger">
                        {{ $errors->first('nama')}}
                    </div>
                @endif

            </div>
            <!-- Deskripsi -->
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi .." readonly>{{ $penugasan->deskripsi }}</textarea>

            </div>
    
            <!-- Tim -->
            <div class="form-group">
                <label>Tim</label>
                    <input name="tim" class="form-control" placeholder="Tim .." value="{{$penugasan->Tim->nama}}" readonly>
    
            </div>
            <!-- Nama Pelapor -->
            
            <div class="form-group">
                <label>Nama Pelapor</label>
                @if(!empty($penugasan->Pelapor->nama))
                <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$penugasan->Pelapor->nama}}" readonly>
                @else
                <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$penugasan->pelapor}}" readonly>
                @endif
            </div>
                      
            <!-- Nomor Telepon Pelapor -->
            <div class="form-group">
                <label>Nomor Telepon Pelapor</label>
                @if(!empty($penugasan->Pelapor->nomor_telepon))
                <input type="text" name="pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$penugasan->Pelapor->nomor_telepon}}" readonly>
                @else
                <input type="text" name="pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$penugasan->nomor_telepon_pelapor}}" readonly>
                @endif
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
                        <input type="number" name="banyak_pengeluaran" class="form-control" placeholder="Banyak Pengeluaran .." value="{{$penugasan->banyak_pengeluaran}}" readonly>
                    </div>
                </div>
                

            </div>

        </div>
    </div>
</div>
@endsection