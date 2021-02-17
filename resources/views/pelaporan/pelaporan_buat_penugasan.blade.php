@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Penugasan - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            <a href="{{url('/pelaporan')}}" class="btn btn-primary">Kembali</a>

            <br/>
            <br/>
            

            <form method="post" action="{{url('/pelaporan/selesai_buat_penugasan/' . $pelaporan->id)}}">

                {{ csrf_field() }}
                
                <!-- Nama Penugasan-->
                <div class="form-group">
                    <label>Nama Penugasan</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Penugasan ..">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <!-- Nama Pelapor-->
                <div class="form-group">
                    <label>Nama Pelapor</label>
                    <input type="text" name="nama_pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{ $pelaporan->Pelapor->nama }}" readonly>

                    @if($errors->has('nama_pelapor'))
                        <div class="text-danger">
                            {{ $errors->first('nama_pelapor')}}
                        </div>
                    @endif

                </div>
                <!-- Jenis Pelaporan -->
                <div class="form-group">
                    <label>Jenis Pelaporan</label>
                    <input type="text" name="jenis_pelaporan" class="form-control" placeholder="Deskripsi .." value="{{ $pelaporan->KategoriPelaporan->TipeKategoriPelaporan->nama }} - {{ $pelaporan->KategoriPelaporan->nama }}" disabled>

                    @if($errors->has('jenis_pelaporan'))
                        <div class="text-danger">
                            {{ $errors->first('jenis_pelaporan')}}
                        </div>
                    @endif
                </div>
                 <!-- Nomor Telepon Pelapor -->
                 <div class="form-group">
                    <label>Nomor Telepon Pelapor</label>
                    <input type="tel" name="nomor_telepon_pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$pelaporan->Pelapor->nomor_telepon}}" readonly>

                    @if($errors->has('nomor_telepon_pelapor'))
                        <div class="text-danger">
                            {{ $errors->first('nomor_telepon_pelapor')}}
                        </div>
                    @endif

                </div>
                <!-- Deskripsi -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi .." readonly>{{ $pelaporan->deskripsi }}</textarea>

                    @if($errors->has('deskripsi'))
                        <div class="text-danger">
                            {{ $errors->first('deskripsi')}}
                        </div>
                    @endif

                </div>
                <!-- Daerah -->
                <div class="form-group">
                    <label>Daerah</label>
                    <input type="text" name="daerah" class="form-control" placeholder="Nama Pelapor .." value="{{$pelaporan->Daerah->nama}} - {{ $pelaporan->Daerah->KategoriDaerah->nama }}" readonly>

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
                            @foreach($foto_pelaporan as $foto)
                            @if ($index%2 == 0 && $index!=0)
                                </div>
                                <hr>
                            @endif
                            @if ($index%2 == 0)
                                <div class="row">
                            @endif
                            <div class="col m-auto">
                                <img src="{{Storage::url($foto->nama_file)}}"width="100%" height="auto"/>
                            </div>
                            @php
                                $index++;    
                            @endphp
                            @endforeach
                        </div>
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