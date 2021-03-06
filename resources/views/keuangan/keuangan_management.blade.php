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
                    <button type="submit" name="cari" class="btn btn-success" value="Cari">Cari</button>
                </div>
            </form>
            
            @if(!empty($penugasan))
            <hr>
            <form method="get" action="{{url('/keuangan/print_pdf')}}" target="_blank">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="tanggal_mulai_penugasan" value="{{$tanggal_mulai}}">
                    <input type="hidden" class="form-control" name="tanggal_akhir_penugasan" value="{{$tanggal_berakhir}}">
                    <button type="submit" name="print_pdf" class="btn btn-success">PRINT PDF</button>
                </div>
            </form>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penugasan</th>
                        <th>Pengeluaran</th>
                        <th>Total Pengeluaran</th>
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
                        <td>
                            @foreach($p->Pengeluaran as $dp)
                            <ol>
                                <li>
                                    {{$dp->nama_pengeluaran}} - Rp.{{$dp->banyak_pengeluaran}}
                                </li>
                            </ol>
                            @endforeach
                        </td>
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