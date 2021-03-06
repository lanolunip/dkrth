@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Penugasan - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            <a href="{{url('/penugasan')}}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            

            <form method="post" action="{{url('/penugasan/update/' . $penugasan->id) }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Tim .." value="{{ $penugasan->nama }}">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <!-- Deskripsi -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi ..">{{ $penugasan->deskripsi }}</textarea>

                    @if($errors->has('deskripsi'))
                        <div class="text-danger">
                            {{ $errors->first('deskripsi')}}
                        </div>
                    @endif

                </div>
        
                <!-- Tim -->
                <div class="form-group">
                    <label>Tim</label>
                        <select name="tim" class="form-control" placeholder="Tim ..">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($tim as $t)

                                @if ($penugasan->tim == $t->id) 
                                <option value="{{$t->id}}" selected>{{ $i }} - {{ $t->nama }} - {{ $t->JenisTim->nama }} - {{ $t->KategoriDaerah->nama }} </option>
                                @else
                                <option value="{{$t->id}}">{{ $i }} - {{ $t->nama }} - {{ $t->JenisTim->nama }} - {{ $t->KategoriDaerah->nama }} </option>
                                @endif

                            @php
                            $i++
                            @endphp
                            @endforeach

                        </select>

                        @if($errors->has('tim'))
                        <div class="text-danger">
                            {{ $errors->first('tim')}}
                        </div>
                        @endif
                </div>
                <!-- Nama Pelapor -->
                <div class="form-group">
                    <label>Nama Pelapor</label>
                    @if(!empty($penugasan->Pelapor->nama))
                    <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$penugasan->Pelapor->nama}}" readonly>
                    @else
                    <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$penugasan->pelapor}}">
                    @endif
                    @if($errors->has('pelapor'))
                        <div class="text-danger">
                            {{ $errors->first('pelapor')}}
                        </div>
                    @endif
                </div>
                <!-- Nomor Telepon Pelapor -->
                <div class="form-group">
                    <label>Nomor Telepon Pelapor</label>
                    @if(!empty($penugasan->Pelapor->nomor_telepon))
                    <input type="text" name="nomor_telepon_pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$penugasan->Pelapor->nomor_telepon}}" readonly>
                    @else
                    <input type="text" name="nomor_telepon_pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$penugasan->nomor_telepon_pelapor}}">
                    @endif

                    @if($errors->has('nomor_telepon_pelapor'))
                        <div class="text-danger">
                            {{ $errors->first('nomor_telepon_pelapor')}}
                        </div>
                    @endif
                </div>
              
                <!-- Banyak Pengeluaran -->
                <!-- <div class="form-group">
                    <div class="form-row">
                        <label>Banyak Pengeluaran</label>
                    </div>
                    <div class="form-row">
                        <div class="col-auto">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                        </div>
                        <div class="col">
                            <input type="number" name="banyak_pengeluaran" class="form-control" placeholder="Banyak Pengeluaran .." value="{{$penugasan->banyak_pengeluaran}}">
                        </div>
                    </div>
                    
                    @if($errors->has('banyak_pengeluaran'))
                        <div class="text-danger">
                            {{ $errors->first('banyak_pengeluaran')}}
                        </div>
                    @endif

                </div> -->
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>

        </div>
    </div>
</div>
@endsection