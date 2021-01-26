@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data daerah - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            <a href="/daerah" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            

            <form method="post" action="/daerah/update/{{ $daerah->id }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Daerah .." value="{{ $daerah->nama }}">

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

                                @if($daerah->kategori_daerah == $kd->id)
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