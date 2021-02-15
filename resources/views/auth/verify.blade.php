@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi Alamat E-mail Anda Terlebih Dahulu') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link Verifikasi telah dikirim ke alamat E-mail yang anda daftarkan.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, harap melakukan verifikasi E-mail terlebih dahulu.') }}
                    {{ __('Jika Belum Menerima E-mail maka dapat') }} <a href="{{ route('verification.resend') }}">{{ __('Kirim Ulang Kembali') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

