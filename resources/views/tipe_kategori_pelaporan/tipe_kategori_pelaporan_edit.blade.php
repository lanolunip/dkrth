@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Tipe Kategori Pelaporan - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            <a href="{{url('/tipe_kategori_pelaporan')}}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            

            <form method="post" action="{{url('/tipe_kategori_pelaporan/update/' . $tipe_kategori_pelaporan->id) }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Daerah .." value="{{ $tipe_kategori_pelaporan->nama }}">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
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