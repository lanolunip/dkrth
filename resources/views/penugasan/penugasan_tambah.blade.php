@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Penugasan - <strong>TAMBAH DATA</strong>
        </div>
        <div class="card-body">
            <a href="/penugasan" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            @if(session()->has('message'))
                <div class="alert alert-info">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form method="post" action="/penugasan/store">

                {{ csrf_field() }}

                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Penugasan ..">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <!-- Deskripsi -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi .."></textarea>

                    @if($errors->has('deskripsi'))
                        <div class="text-danger">
                            {{ $errors->first('deskripsi')}}
                        </div>
                    @endif

                </div>
                <!-- Tim -->
                <div class="form-group">
                    <label>Tim</label>
                        <select size="0" name="tim" class="form-control" placeholder="Tim ..">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($tim as $t)

                                <option value="{{$t->id}}">{{ $i }} - {{ $t->nama }} - {{ $t->JenisTim->nama }} - {{ $t->KategoriDaerah->nama }} </option>

                            @php
                            $i++
                            @endphp
                            @endforeach

                        </select>

                        @if($errors->has('tim'))
                        <div class="text-danger">
                            {{ $errors->first('tim')}}
                        </div>
                        @endif
                </div>
                <!-- Pelapor -->
                <div class="form-group">
                    <label>Pelapor</label>
                    <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor ..">

                    @if($errors->has('pelapor'))
                        <div class="text-danger">
                            {{ $errors->first('pelapor')}}
                        </div>
                    @endif

                </div>
                <!-- Nomor Telepon Pelapor -->
                <div class="form-group">
                    <label>Nomor Telepon Pelapor</label>
                    <input type="tel" name="nomor_telepon_pelapor" class="form-control" placeholder="Nomor Telepon Pelapor ..">

                    @if($errors->has('nomor_telepon_pelapor'))
                        <div class="text-danger">
                            {{ $errors->first('nomor_telepon_pelapor')}}
                        </div>
                    @endif

                </div>
                <!-- Banyak Pengeluaran -->
                <!-- <div class="form-group">
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
                            <input type="number" name="banyak_pengeluaran" class="form-control" placeholder="Banyak Pengeluaran ..">
                        </div>
                    </div>
                    
                    @if($errors->has('banyak_pengeluaran'))
                        <div class="text-danger">
                            {{ $errors->first('banyak_pengeluaran')}}
                        </div>
                    @endif

                </div> -->
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>

        </div>
    </div>
</div>
@endsection