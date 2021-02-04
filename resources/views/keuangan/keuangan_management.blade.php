@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Keuangan
        </div>
        <div class="card-body">
            <a href="{{url('/home')}}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
        
            <form method="get" action="{{url('/keuangan/hitung')}}">

                {{ csrf_field() }}

                <!-- Tanggal Mulai -->
                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" class="form-control" name="tanggal_mulai" value="{{$tanggal_mulai}}">
                    @if($errors->has('tanggal_mulai'))
                        <div class="text-danger">
                            {{ $errors->first('tanggal_mulai')}}
                        </div>
                    @endif

                </div>
                <!-- Tanggal Akhir -->
                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tanggal_akhir" value="{{$tanggal_akhir}}">
                    @if($errors->has('tanggal_akhir'))
                        <div class="text-danger">
                            {{ $errors->first('tanggal_akhir')}}
                        </div>
                    @endif

                </div>
                <!-- Banyak Pengeluaran -->
                <div class="form-group">
                    <div class="form-row">
                        <label>Total Pengeluaran</label>
                    </div>
                    <div class="form-row">
                        <div class="col-auto">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                        </div>
                        <div class="col">
                            <input type="number" name="total_pengeluaran" class="form-control" placeholder="Banyak Pengeluaran .." value="{{$keuangan}}" readonly>
                        </div>
                    </div>
                    
                    @if($errors->has('total_pengeluaran'))
                        <div class="text-danger">
                            {{ $errors->first('total_pengeluaran')}}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Cari">
                </div>
            </form>
            
            @if(!empty($penugasan))
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penugasan</th>
                        <th>Banyak Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($penugasan as $p)
                    
                    <tr>
                        <td>{{ $i }}</td>
                        <td><a href="{{url('/penugasan/view/'. $p->id)}}">{{ $p->nama }}</a></td>
                        <td>Rp.{{ $p->banyak_pengeluaran }}</td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection