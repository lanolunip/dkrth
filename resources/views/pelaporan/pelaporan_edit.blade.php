@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Pelaporan - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            <a href="{{url('/pelaporan')}}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>

            <form method="post" action="{{url('/pelaporan/update/'. $pelaporan->id) }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <!-- Nama Pelapor-->
                <div class="form-group">
                    <label>Nama Pelapor</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama .." value="{{$pelaporan->Pelapor->nama}}" readonly>

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <!-- Nomor Telepon Pelapor -->
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="nomor_telepon_pelapor" class="form-control" placeholder="Nomor Telepon.." value="{{$pelaporan->Pelapor->nomor_telepon}}" readonly>

                    @if($errors->has('nomor_telepon_pelapor'))
                        <div class="text-danger">
                            {{ $errors->first('nomor_telepon_pelapor')}}
                        </div>
                    @endif

                </div>
                <!-- Kategori Pelaporan -->
                <div class="form-group">
                    <label>Kategori Pelaporan</label>
                    <input type="text" name="" class="form-control" placeholder="Nama Kategori Pelaporan .." value="{{$pelaporan->KategoriPelaporan->nama}}" disabled>
                    <input type="hidden" name="kategori_pelaporan" value="{{$pelaporan->KategoriPelaporan->id}}">
                    @if($errors->has('kategori_pelaporan'))
                        <div class="text-danger">
                            {{ $errors->first('kategori_pelaporan')}}
                        </div>
                    @endif

                </div>
                <!-- Deskripsi -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Masalah .. (Jangan lupa Masukan Nama Jalan , alamat / nama gedung(jika kejadian memang terjadi di suatu tempat yang spesifik)">{{$pelaporan->deskripsi}}</textarea>

                    @if($errors->has('deskripsi'))
                        <div class="text-danger">
                            {{ $errors->first('deskripsi')}}
                        </div>
                    @endif

                </div>

                <!-- Daerah -->
                <div class="form-group">
                    <label>Daerah</label>
                        <select size="0" name="daerah" class="form-control" placeholder="Daerah ..">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($daerah as $d)

                                @if ($pelaporan->daerah == $d->id) 
                                    <option value="{{$d->id}}" selected>{{ $i }} - {{ $d->nama }} - {{ $d->nama }} - {{ $d->KategoriDaerah->nama }} </option>
                                @else
                                    <option value="{{$d->id}}">{{ $i }} - {{ $d->nama }} - {{ $d->nama }} - {{ $d->KategoriDaerah->nama }} </option>
                                @endif


                            @php
                            $i++
                            @endphp
                            @endforeach

                        </select>

                        @if($errors->has('daerah'))
                        <div class="text-danger">
                            {{ $errors->first('daerah')}}
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