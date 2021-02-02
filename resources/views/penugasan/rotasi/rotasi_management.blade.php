@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Tim - <strong>List Penugasan</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
        <a href="/penugasan" class="btn btn-primary"> Kembali</a>
            <br/>
            <br/>
            @php
                $i = 0;
                $step_kategori_daerah_1 = 10;
            @endphp
            @foreach ($kategori_daerah as $kd)
                @if ($i%2 == 0 && $i!=0)
                    </div>
                    <hr>
                @endif
                @if ($i%2 == 0)
                    <div class="row no-gutters bg-light position-relative">
                @endif
                    <div class="col position-static p-4">                        
                        <div class="card">
                            <div class="card-header text-center">
                                <h5 class="mt-0">{{$kd->nama}}</h5>
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                @for($j = 0; $j <= $kd->Daerah->count()-1;$j++)
                                    @if($step_tracker->step % $kd->daerah->count() == $j)
                                        <div class="col">
                                            <div class="row d-flex justify-content-center">
                                                {{$kd->Daerah[$step_tracker->step % $kd->daerah->count()]->nama}}
                                            </div>
                                            @if($step_tracker[$kd->id - 1]->status != 2)
                                            <div class="row d-flex justify-content-center">
                                                <a href="/penugasan/rotasi/buat_penugasan/{{$kd->Daerah[$step_tracker->step % $kd->daerah->count()]->id}}" class="btn btn-primary"> Buat Penugasan</a>
                                            </div>
                                            @else
                                            <div class="row d-flex justify-content-center">
                                                <a href="/penugasan/rotasi/buat_penugasan/{{$kd->Daerah[$step_tracker->step % $kd->daerah->count()]->id}}" class="btn btn-primary disabled" aria-disabled="true"> Sedang Dikerjakan</a>
                                            </div>
                                            @endif
                                        </div>
                                    @endif
                                @endfor
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