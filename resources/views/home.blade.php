@extends('layouts.app')

@section('content')
<div class="container-liquid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row mb-4">
                        Status Akun Anda :
                        {{Auth::user()->TipeUser->nama}}
                    </div>
                    @if (Auth::user()->TipeUser->nama == 'Ketua')
                    <div class="row my-2 ">
                        <div class="col-2">
                            <strong>Bagian Data :</strong>
                        </div>
                        <div class="col">
                            <a href="/petugas" type="button" class="btn btn-primary btn-lg mx-auto">Manajemen User</a>
                        </div>
                        <div class="col">
                            <a href="/tim" type="button" class="btn btn-primary btn-lg mx-auto">Manajemen Tim</a>
                        </div>
                        <div class="col">
                            <a href="/daerah" type="button" class="btn btn-primary btn-lg mx-auto">Manajemen Daerah</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-2">
                        <div class="col-2">
                            <strong>Bagian Penugasan :</strong>
                        </div>
                        <div class="col">
                            <a href="/penugasan" type="button" class="btn btn-primary btn-lg mx-auto">Manajemen Penugasan</a>
                        </div>
                        <div class="col">
                            <a href="/laporan" type="button" class="btn btn-primary btn-lg mx-auto">Manajemen Laporan</a>
                        </div>
                        <div class="col">
                            <a href="/pelaporan" type="button" class="btn btn-primary btn-lg mx-auto">Manajemen Pelaporan</a>
                        </div>

                    </div>
                    <hr>
                    <!-- <div class="row my-2 ">
                        <strong>Bagian Hasil dan Laporan</strong>
                        <div class="col">
                            <a href="/laporan" type="button" class="btn btn-primary btn-lg mx-auto">Laporan Keuangan</a>
                        </div>
                    </div> -->

                    @elseif (Auth::user()->TipeUser->nama == 'Petugas')
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="/penugasan" type="button" class="btn btn-primary btn-lg mx-auto">Manajemen Penugasan</a>
                        </div>
                    </div>
                    @else
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="/pelaporan" type="button" class="btn btn-primary btn-lg mx-auto">Manajemen Pelaporan</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
