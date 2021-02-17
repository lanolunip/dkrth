@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Penugasan - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            @if (Auth::user()->TipeUser->nama == "Ketua")
                <a href="{{url('/laporan')}}" class="btn btn-primary">Kembali</a>
            @else
                <a href="{{url('/penugasan')}}" class="btn btn-primary">Kembali</a>
            @endif
            <br/>
            <br/>
            

            <form method="post" enctype="multipart/form-data" action="{{url('/laporan/update/'. $laporan->id )}}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <!-- Isi -->
                <div class="form-group">
                    <label>Isi Laporan</label>
                    <input type="text" name="isi" class="form-control" placeholder="Isi .." value="{{ $laporan->isi }}">

                    @if($errors->has('isi'))
                        <div class="text-danger">
                            {{ $errors->first('isi')}}
                        </div>
                    @endif

                </div>

                <!-- Banyak Pengeluaran -->
                <div class="form-group">
                    <label>Banyak Pengeluaran</label>
                    <div class="form-row">
                        <div class="col-auto">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                        </div>
                        <div class="col">
                            <input type="number" name="banyak_pengeluaran" class="form-control" placeholder="Banyak Pengeluaran .." value="{{ $laporan->Penugasan->banyak_pengeluaran }}">
                        </div>
                    </div> 

                    @if($errors->has('banyak_pengeluaran'))
                        <div class="text-danger">
                            {{ $errors->first('banyak_pengeluaran')}}
                        </div>
                    @endif

                </div>
                <!-- Gambar Penugasan -->
                <div class="form-group">
                    <div class="col">
                        <div class="row">
                            <label>Gambar Penugasan</label>    
                        </div>
                        <div class="row">
                            @php
                                $index = 0;   
                            @endphp
                            @foreach($laporan->Penugasan->FotoPenugasan as $gambar)
                            @if ($index%2 == 0 && $index!=0)
                                </div>
                                <hr>
                            @endif
                            @if ($index%2 == 0)
                                <div class="row">
                            @endif
                            <div class="col m-auto">
                                <img src="{{Storage::url($gambar->nama_file)}}" style=" max-width: 100%;height: auto;" width="500" height="auto"/>
                            </div>
                            @php
                                $index++;
                            @endphp
                            @endforeach
                        </div>
                    </div>
                </div> 
                 <!-- Upload Gambar Penugasan -->
                 <div class="form-group">
                    <div class="col">
                        <div class="row">
                            <label>Upload Gambar Penugasan</label>    
                        </div>
                        <div class="row">
                            <b>(Upload foto baru jika ingin mengganti foto yang sudah diunggah sebelumnya)</b>
                        </div>
                        <div class="row">
                            <input multiple="multiple" name="gambar[]" type="file"> 
                        </div>
                    </div>
                        @if($errors->has('gambar'))
                        <div class="text-danger">
                            {{ $errors->first('gambar')}}
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