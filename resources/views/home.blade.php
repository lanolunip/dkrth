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
                        <!-- <div class="row mb-4">
                            Status Akun Anda :
                            {{Auth::user()->TipeUser->nama}}
                        </div> -->
                    @if (Auth::user()->TipeUser->nama == 'Ketua')
                        <center>
                            <h1 class="display-4"> Bagian Data</h1>
                        </center>
                        <div class="row my-2 justify-content-md-center">
                            <div class="card-deck">
                                <div class="card card-small">
                                    <img class="card-img-top" src="{{asset('images/home_card/user.jpg')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Manajemen User</h5>
                                        <p class="card-text">Manajemen user dapat digunakan untuk 
                                            Membuat Petugas, Mengedit, serta Menghapus User yang terdaftar pada sistem.
                                        </p>
                                    </div>
                                    <center>
                                    <div class="card-footer">
                                        <a href="/petugas" type="button" class="btn btn-primary btn-lg mx-auto">Click !</a>
                                    </div>
                                    </center>
                                </div>
                                <div class="card card-small">
                                    <img class="card-img-top" src="{{asset('images/home_card/team.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Manajemen Tim</h5>
                                        <p class="card-text">Manajemen tim dapat digunakan untuk 
                                            Membuat, Mengedit, serta Menghapus tim yang terdaftar pada sistem.
                                        </p>
                                    </div>
                                    <center>
                                    <div class="card-footer">
                                        <a href="/tim" type="button" class="btn btn-primary btn-lg mx-auto">Click !</a>
                                    </div>
                                    </center>
                                </div>
                                <div class="card card-small">
                                    <img class="card-img-top" src="{{asset('images/home_card/marker.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Manajemen Daerah</h5>
                                        <p class="card-text">Manajemen daerah dapat digunakan untuk 
                                            Membuat, Mengedit, serta Menghapus Daerah yang terdaftar pada sistem.
                                        </p>
                                    </div>
                                    <center>
                                    <div class="card-footer">
                                        <a href="/daerah" type="button" class="btn btn-primary btn-lg mx-auto">Click !</a>
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <center>
                            <h1 class="display-4"> Bagian Penugasan</h1>
                        </center>
                        <div class="row my-2 justify-content-md-center">
                            <div class="card-deck">
                                <div class="card card-small">
                                    <img class="card-img-top" src="{{asset('images/home_card/list.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Manajemen Penugasan</h5>
                                        <p class="card-text">Manajemen penugasan dapat digunakan untuk 
                                            Membuat, Mengedit, serta Menghapus Penugasan yang terdaftar pada sistem.
                                        </p>
                                    </div>
                                    <center>
                                    <div class="card-footer">
                                        <a href="/penugasan" type="button" class="btn btn-primary btn-lg mx-auto">Click !</a>
                                    </div>
                                    </center>
                                </div>
                                <div class="card card-small">
                                    <img class="card-img-top" src="{{asset('images/home_card/report.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Manajemen Laporan</h5>
                                        <p class="card-text">Manajemen laporan dapat digunakan untuk 
                                            Membuat, Mengedit, serta Menghapus laporan yang terdaftar pada sistem.
                                        </p>
                                    </div>
                                    <center>
                                    <div class="card-footer">
                                        <a href="/laporan" type="button" class="btn btn-primary btn-lg mx-auto">Click !</a>
                                    </div>
                                    </center>
                                </div>
                                <div class="card card-small">
                                    <img class="card-img-top" src="{{asset('images/home_card/exclamation-mark-in-a-circle.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Manajemen Pelaporan</h5>
                                        <p class="card-text">Manajemen pelaporan dapat digunakan untuk 
                                            Membuat, Mengedit, serta Menghapus pelaporan yang terdaftar pada sistem.
                                        </p>
                                    </div>
                                    <center>
                                    <div class="card-footer">
                                        <a href="/pelaporan" type="button" class="btn btn-primary btn-lg mx-auto">Click !</a>
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <center>
                            <h1 class="display-4"> Bagian Keuangan</h1>
                        </center>
                        <div class="row my-2 justify-content-md-center">
                            <div class="card-deck">
                                <div class="card card-small">
                                    <img class="card-img-top" src="{{asset('images/home_card/price-tag.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Keuangan</h5>
                                        <p class="card-text">Keuangan digunakan untuk 
                                            melihat banyak pengeluaran pada periode tertentu.
                                        </p>
                                    </div>
                                    <center>
                                    <div class="card-footer">
                                        <a href="/keuangan" type="button" class="btn btn-primary btn-lg mx-auto">Click !</a>
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    @elseif (Auth::user()->TipeUser->nama == 'Petugas')
                    <center>
                            <h1 class="display-4"> Bagian Penugasan</h1>
                        </center>
                        <div class="row my-2 justify-content-md-center">
                            <div class="card-deck">
                                <div class="card card-small">
                                    <img class="card-img-top" src="{{asset('images/home_card/list.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Manajemen Penugasan</h5>
                                        <p class="card-text">Manajemen penugasan dapat digunakan untuk 
                                            Membuat, Mengedit, serta Menghapus Penugasan yang terdaftar pada sistem.
                                        </p>
                                    </div>
                                    <center>
                                    <div class="card-footer">
                                        <a href="/penugasan" type="button" class="btn btn-primary btn-lg mx-auto">Click !</a>
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    @else
                    <center>
                            <h1 class="display-4"> Bagian Penugasan</h1>
                        </center>
                        <div class="row my-2 justify-content-md-center">
                            <div class="card-deck">
                                <div class="card card-small">
                                    <img class="card-img-top" src="{{asset('images/home_card/exclamation-mark-in-a-circle.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Manajemen Pelaporan</h5>
                                        <p class="card-text">Manajemen pelaporan dapat digunakan untuk 
                                            Membuat, Mengedit, serta Menghapus pelaporan yang terdaftar pada sistem.
                                        </p>
                                    </div>
                                    <center>
                                    <div class="card-footer">
                                        <a href="/pelaporan" type="button" class="btn btn-primary btn-lg mx-auto">Click !</a>
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div hidden>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
@endsection
