@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data daerah - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            <a href="/tim" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            

            <form method="post" action="/tim/update/{{ $tim->id }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Tim .." value="{{ $tim->nama }}">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <!-- Petugas -->
                <div class="form-group">
                    <label>Jenis Tim</label>
                        <select name="petugas" class="form-control" placeholder="Nama Petugas ..">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($petugas as $p)

                                @if($tim->petugas == $p->id)
                                <option value="{{$p->id}}" selected>{{ $i }} - {{ $p->nama }} </option>
                                @else
                                <option value="{{$p->id}}">{{ $i }} - {{ $p->nama }} </option>
                                @endif

                            @php
                            $i++
                            @endphp
                            @endforeach

                        </select>

                        @if($errors->has('petugas'))
                        <div class="text-danger">
                            {{ $errors->first('petugas')}}
                        </div>
                        @endif
                </div>
                <!-- Jenis Tim -->
                <div class="form-group">
                    <label>Jenis Tim</label>
                        <select name="jenis_tim" class="form-control" placeholder="Jenis Tim ..">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($jenis_tim as $jt)

                                @if($tim->jenis_tim == $jt->id)
                                <option value="{{$jt->id}}" selected>{{ $i }} - {{ $jt->nama }} </option>
                                @else
                                <option value="{{$jt->id}}">{{ $i }} - {{ $jt->nama }} </option>
                                @endif

                            @php
                            $i++
                            @endphp
                            @endforeach

                        </select>

                        @if($errors->has('jenis_tim'))
                        <div class="text-danger">
                            {{ $errors->first('jenis_tim')}}
                        </div>
                        @endif
                </div>
                <!-- Kategori Daerah -->
                <div class="form-group">
                    <label>Kategori Daerah</label>
                        <select name="kategori_daerah" class="form-control" placeholder="Kategori Daerah ..">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($kategori_daerah as $kd)

                                @if($tim->kategori_daerah == $kd->id)
                                <option value="{{$kd->id}}" selected>{{ $i }} - {{ $kd->nama }} </option>
                                @else
                                <option value="{{$kd->id}}">{{ $i }} - {{ $kd->nama }} </option>
                                @endif

                            @php
                            $i++
                            @endphp
                            @endforeach

                        </select>

                        @if($errors->has('kategori_daerah'))
                        <div class="text-danger">
                            {{ $errors->first('kategori_daerah')}}
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