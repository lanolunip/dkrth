@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Kategori Pelaporan - <strong>TAMBAH DATA</strong>
        </div>
        <div class="card-body">
            <a href="/kategori_pelaporan" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            
            <form method="post" action="{{url('/kategori_pelaporan/store')}}">

                {{ csrf_field() }}

                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Tipe Kategori Pelaporan ..">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif
                    <!-- Tipe Kategori Pelaporan -->
                    <div class="form-group">
                        <label>Tipe Kategori Pelaporan</label>
                        <select name="tipe_kategori_pelaporan" class="form-control" placeholder="Tipe Kategori Pelaporan ..">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($tipe_kategori_pelaporan as $tkp)

                                <option value="{{$tkp->id}}">{{ $i }} - {{ $tkp->nama }} </option>

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
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>

        </div>
    </div>
</div>
@endsection