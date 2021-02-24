@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Penugasan - <strong>TAMBAH DATA</strong>
        </div>
        <div class="card-body">
            <a href="{{url('/penugasan/rotasi')}}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            @if(session()->has('message'))
                <div class="alert alert-info">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form method="post" action="{{url('/penugasan/rotasi/store')}}">

                {{ csrf_field() }}

                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Penugasan .." value="{{$daerah->nama}}" readonly>

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
                <!-- Daerah -->
                <div class="form-group">
                    <label>Daerah</label>
                    <input type="text" name="daerah" class="form-control" placeholder="Deskripsi .." value="{{ $daerah->KategoriDaerah->nama}} - {{$daerah->nama}}" disabled>
                    <input type="hidden" name="daerah" class="form-control" placeholder="Deskripsi .." value="{{$daerah->id}}">
                    @if($errors->has('daerah'))
                        <div class="text-danger">
                            {{ $errors->first('daerah')}}
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
                
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>

        </div>
    </div>
</div>
@endsection