@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>Pilih Kategori Pelaporan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
                <a href="{{url('/pelaporan/tipe_kategori_pelaporan')}}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            @php
                $i = 0;
            @endphp
            @foreach ($kategori_pelaporan as $k)
                @if ($i%2 == 0 && $i!=0)
                    </div>
                    <hr>
                @endif
                @if ($i%2 == 0)
                    <div class="row no-gutters bg-light position-relative">
                @endif
                    <div class="col position-static p-4 pl-md-0">
                        <div class="row d-flex justify-content-center">
                            <h5 class="mt-0">{{$k->nama}}</h5>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <a class="btn btn-primary" name="kategori" href="{{url('/pelaporan/tambah/' . $k->id)}}" class="stretched-link">Pilih !</a>
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