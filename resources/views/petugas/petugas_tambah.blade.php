@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Petugas - <strong>TAMBAH DATA</strong>
        </div>
        <div class="card-body">
            <a href="/petugas" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            
            <form method="post" action="/petugas/store">

                {{ csrf_field() }}

                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Petugas ..">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <!-- Alamat -->
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat Petugas .."></textarea>

                    @if($errors->has('alamat'))
                        <div class="text-danger">
                            {{ $errors->first('alamat')}}
                        </div>
                    @endif

                </div>
                <!-- NIP -->
                <div class="form-group">
                    <label>NIP</label>
                    <input name="nip" class="form-control" placeholder="NIP Petugas .."></input>

                    @if($errors->has('nip'))
                        <div class="text-danger">
                            {{ $errors->first('nip')}}
                        </div>
                    @endif

                </div>
                <!-- Nomor Telepon -->
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="tel" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon Petugas .."></input>

                    @if($errors->has('nomor_telepon'))
                        <div class="text-danger">
                            {{ $errors->first('nomor_telepon')}}
                        </div>
                    @endif

                </div>
                <!-- Email -->
                <div class="form-group">
                    <label>E-Mail</label>
                    <input name="email" class="form-control" placeholder="E-Mail Petugas .."></input>

                    @if($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email')}}
                        </div>
                    @endif

                </div>
                <!-- Password -->
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password Petugas .."></input>

                    @if($errors->has('password'))
                        <div class="text-danger">
                            {{ $errors->first('password')}}
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