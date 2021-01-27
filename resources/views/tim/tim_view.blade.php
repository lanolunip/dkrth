@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>DATA TIM</strong>
        </div>
        <div class="card-body">
    


            {{ csrf_field() }}

            <!-- Nama -->
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Tim .." value="{{ $tim->nama }}" readonly>

                @if($errors->has('nama'))
                    <div class="text-danger">
                        {{ $errors->first('nama')}}
                    </div>
                @endif

            </div>
            <!-- Petugas -->
            <div class="form-group">
                <label>Petugas Penanggung Jawab</label>
                    <input name="petugas" class="form-control" placeholder="Nama Petugas .." value="{{ $tim->Petugas->nama}}" readonly>
            
            </div>

             <!-- Nomor Telepon Petugas -->
             <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon" value="{{ $tim->Petugas->nomor_telepon }}" readonly>

                @if($errors->has('nomor_telepon'))
                    <div class="text-danger">
                        {{ $errors->first('nomor_telepon')}}
                    </div>
                @endif

            </div>
            <!-- Jenis Tim -->
            <div class="form-group">
                <label>Jenis Tim</label>
                    <input name="jenis_tim" class="form-control" placeholder="Jenis Tim .." value="{{ $tim->JenisTim->nama }}" readonly>
                        
            </div>
            <!-- Kategori Daerah -->
            <div class="form-group">
                <label>Kategori Daerah</label>
                    <input name="kategori_daerah" class="form-control" placeholder="Kategori Daerah .." value ="{{ $tim->KategoriDaerah->nama }}" readonly>
                        
            </div>

        </div>
    </div>
</div>
@endsection