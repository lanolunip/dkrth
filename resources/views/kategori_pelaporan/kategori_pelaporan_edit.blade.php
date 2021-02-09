@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Tipe Kategori Pelaporan - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            
            <a href="{{url('/kategori_pelaporan')}}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            

            <form method="post" action="{{url('/kategori_pelaporan/update/'. $kategori_pelaporan->id)}}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Daerah .." value="{{ $kategori_pelaporan->nama }}">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <!-- Tipe Kategori Pelaporan -->
                <div class="form-group">
                    <label>Tipe Kategori Pelaporan</label>
                        <select name="tipe_kategori_pelaporan" class="form-control" placeholder="Tipe Kategori Pelaporan ..">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($tipe_kategori_pelaporan as $tkp)

                                @if($kategori_pelaporan->tipe_kategori_pelaporan == $tkp->id)
                                <option value="{{$tkp->id}}" selected>{{ $i }} - {{ $tkp->nama }} </option>
                                @else
                                <option value="{{$tkp->id}}">{{ $i }} - {{ $tkp->nama }} </option>
                                @endif

                            @php
                            $i++
                            @endphp
                            @endforeach

                        </select>

                        @if($errors->has('tipe_kategori_pelaporan'))
                        <div class="text-danger">
                            {{ $errors->first('tipe_kategori_pelaporan')}}
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