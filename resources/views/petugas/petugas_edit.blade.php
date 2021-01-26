@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data User - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            <a href="/petugas" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            

            <form method="post" action="/petugas/update/{{ $petugas->id }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Petugas .." value="{{ $petugas->nama }}">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <!-- Alamat -->
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat Petugas ..">{{ $petugas->alamat }}</textarea>

                    @if($errors->has('alamat'))
                        <div class="text-danger">
                            {{ $errors->first('alamat')}}
                        </div>
                    @endif

                </div>
                <!-- NIP -->
                <div class="form-group">
                    <label>NIP</label>
                    <input name="nip" class="form-control" placeholder="NIP Petugas .." value="{{ $petugas->nip }}"></input>

                    @if($errors->has('nip'))
                        <div class="text-danger">
                            {{ $errors->first('nip')}}
                        </div>
                    @endif

                </div>
                <!-- Nomor Telepon -->
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="tel" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon Petugas .."value="{{ $petugas->nomor_telepon }}"></input>

                    @if($errors->has('nomor_telepon'))
                        <div class="text-danger">
                            {{ $errors->first('nomor_telepon')}}
                        </div>
                    @endif

                </div>
                <!-- Email -->
                <div class="form-group">
                    <label>E-Mail</label>
                    <input name="email" class="form-control" placeholder="E-Mail Petugas .." value="{{ $petugas->email }}"></input>

                    @if($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email')}}
                        </div>
                    @endif

                </div>

                <!-- Tipe User -->
                <div class="form-group">
                    <label>Tipe User</label>
                        <select name="tipe_user" class="form-control" placeholder="Tipe User">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($tipe_user as $tu)

                                @if($petugas->tipe_user == $tu->id)
                                <option value="{{$tu->id}}" selected>{{ $i }} - {{ $tu->nama }} </option>
                                @else
                                <option value="{{$tu->id}}">{{ $i }} - {{ $tu->nama }} </option>
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