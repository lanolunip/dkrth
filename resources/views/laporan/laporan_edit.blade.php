@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Penugasan - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            @if (Auth::user()->TipeUser->nama == "Ketua")
                <a href="/laporan" class="btn btn-primary">Kembali</a>
            @else
                <a href="/penugasan" class="btn btn-primary">Kembali</a>
            @endif
            <br/>
            <br/>
            

            <form method="post" action="/laporan/update/{{ $laporan->id }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <!-- Isi -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="isi" class="form-control" placeholder="Isi .." value="{{ $laporan->isi }}">

                    @if($errors->has('isi'))
                        <div class="text-danger">
                            {{ $errors->first('isi')}}
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