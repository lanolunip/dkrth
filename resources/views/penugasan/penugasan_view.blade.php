@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
           <strong>Penugasan</strong>
        </div>
        <div class="card-body">
            <br/>
            <br/>
                
            <!-- Nama -->
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Tim .." value="{{ $penugasan->nama }}" readonly>
            </div>
            <!-- Deskripsi -->
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi .." readonly>{{ $penugasan->deskripsi }}</textarea>

            </div>
    
            <!-- Tim -->
            <div class="form-group">
                <label>Tim</label>
                    <input name="tim" class="form-control" placeholder="Tim .." value="{{$penugasan->Tim->nama}}" readonly>
    
            </div>
            <!-- Nama Pelapor -->
            
            <div class="form-group">
                <label>Nama Pelapor</label>
                @if(!empty($penugasan->Pelapor->nama))
                <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$penugasan->Pelapor->nama}}" readonly>
                @else
                <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$penugasan->pelapor}}" readonly>
                @endif
            </div>
                      
            <!-- Nomor Telepon Pelapor -->
            <div class="form-group">
                <label>Nomor Telepon Pelapor</label>
                @if(!empty($penugasan->Pelapor->nomor_telepon))
                <input type="text" name="pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$penugasan->Pelapor->nomor_telepon}}" readonly>
                @else
                <input type="text" name="pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$penugasan->nomor_telepon_pelapor}}" readonly>
                @endif
            </div>
            
            @if(!empty($penugasan->Laporan->isi))
            <!-- Isi Laporan -->
            <div class="form-group">
                <label>Isi Laporan</label>
                <textarea type="text" name="pelapor" class="form-control" placeholder="Isi Laporan .." readonly>{{$penugasan->Laporan->isi}}</textarea>
            </div>
            @else
                <!-- Isi Laporan -->
                <div class="form-group">
                    <label>Isi Laporan</label>
                    <textarea type="text" name="pelapor" class="form-control" placeholder="Isi Laporan Belum Diisi" readonly></textarea>
                </div>
            @endif
            <div class="card-body">
                <label>Pengeluaran</label>
                <table class="table" id="tabel_pengeluaran">
                    <thead>
                        <tr>
                            <th scope="col">Nama Pengeluaran</th>
                            <th scope="col">Banyak Pengeluaran (Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengeluaran as $p)
                        <tr id="pengeluaran0">
                            <td>
                                <p> {{$p->nama_pengeluaran}} </p>
                            </td>
                            
                            <td>
                                <p> {{$p->banyak_pengeluaran}} </p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Total Pengeluaran -->
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
                            <input type="number" name="banyak_pengeluaran" class="form-control" placeholder="Banyak Pengeluaran .." value="{{$penugasan->banyak_pengeluaran}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banyak Pengeluaran -->
             <!-- Tanggal Dibuat -->
             <div class="form-group">
                <label>Tanggal Dibuat (yyyy-mm-dd)</label>
                <input type="text" name="nama" class="form-control" placeholder="Tanggal Mulai .." value="{{ $penugasan->created_at }}" readonly>
            </div>

             <!-- Tanggal Selesai -->
             <div class="form-group">
                <label>Tanggal Selesai (yyyy-mm-dd)</label>
                <input type="text" name="nama" class="form-control" placeholder="Tanggal Selesai .." value="{{ $penugasan->tanggal_berakhir }}" readonly>
            </div>

            <!-- Foto Pengeluaran -->
             <div class="form-group">
                <div class="form-col">
                    <div class="form-row">
                        <label>Foto Pengeluaran</label>
                    </div>
                @if(!empty($foto_pengeluaran))
                    <div class="form-row mx-auto">
                    @foreach($foto_pengeluaran as $foto)
                        <div class="form-col mx-auto">
                            <img class="img-thumbnail" src="{{Storage::url($foto->nama_file)}}" width="100%" height="auto"/>
                        </div>
                    @endforeach
                    </div>
                @endif
                </div>
            </div>

            <!-- Foto Penugasan -->
             <div class="form-group">
                <div class="form-col">
                    <div class="form-row">
                        <label>Foto Penugasan</label>
                    </div>
                @if(!empty($foto_penugasan))
                    <div class="form-row mx-auto">
                    @foreach($foto_penugasan as $foto)
                        <div class="form-col mx-auto">
                            <img class="img-thumbnail" src="{{Storage::url($foto->nama_file)}}"width="100%" height="auto"/>
                        </div>
                    @endforeach
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection