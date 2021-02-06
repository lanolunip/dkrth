@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Daerah - <strong>TAMBAH DATA</strong>
        </div>
        <div class="card-body">
            <a href="{{url('/daerah')}}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            
            <form method="post" action="{{url('/daerah/store')}}">

                {{ csrf_field() }}

                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Daerah ..">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <div class="form-group">
                    <label>Kategori Daerah</label>
                        <select name="kategori_daerah" class="form-control" placeholder="Kategori Daerah ..">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($kategori_daerah as $kd)

                                <option value="{{$kd->id}}">{{ $i }} - {{ $kd->nama }} </option>

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