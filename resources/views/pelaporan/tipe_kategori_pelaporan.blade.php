@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>Pilih Tipe Kategori Pelaporan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
                <a href="/pelaporan" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            @php
                $i = 0;
            @endphp
            @foreach ($tipe_kategori_pelaporan as $tpk)
                @if ($i%2 == 0 && $i!=0)
                    </div>
                    <hr>
                @endif
                @if ($i%2 == 0)
                    <div class="row no-gutters bg-light position-relative">
                @endif
                    <div class="col position-static p-4 pl-md-0">                        
                        <div class="col position-static p-4 pl-md-0">
                            <div class="row d-flex justify-content-center">
                                <h5 class="mt-0">{{$tpk->nama}}</h5>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <a class="btn btn-primary" name="kategori" href="/pelaporan/kategori_pelaporan/{{$tpk->id}}" class="stretched-link">Pilih !</a>
                            </div>
                        </div>
                    </div>
                @php
                    $i++;
                @endphp
            @endforeach
        </div>
    </div>
</div>
@endsection