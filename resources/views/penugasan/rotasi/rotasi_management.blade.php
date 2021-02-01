@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Tim - <strong>List Penugasan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <br/>
            <br/>
            @php
                $i = 0;
            @endphp
            @foreach ($kategori_daerah as $kd)
                @if ($i%2 == 0 && $i!=0)
                    </div>
                    <hr>
                @endif
                @if ($i%2 == 0)
                    <div class="row no-gutters bg-light position-relative">
                @endif
                    <div class="col position-static p-4 pl-md-0">                        
                        <div class="row d-flex justify-content-center">
                            <h5 class="mt-0">{{$kd->nama}}</h5>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <a class="btn btn-primary" name="kategori" href="/pelaporan/kategori_pelaporan/{{$kd->id}}" class="stretched-link">Pilih !</a>
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