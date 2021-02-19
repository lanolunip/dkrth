@extends('layouts.app')

@section('custom')
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
                            <th scope="col">Foto Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($pengeluaran[0]->id))
                            @php
                                $index = 0;
                            @endphp
                            @foreach($penugasan->Pengeluaran as $p)
                            <tr id="pengeluaran0">
                                <td>
                                    <p> {{$p->nama_pengeluaran}} </p>
                                </td>
                                
                                <td>
                                    <p> {{$p->banyak_pengeluaran}} </p>
                                </td>
                                
                                <td>
                                <img class="img-thumbnail" src="{{Storage::url($penugasan->FotoPengeluaran[$index]->nama_file)}}" style=" max-width: 100%;height: auto;" width="350" height="auto"/>
                                </td>
                            </tr>
                            @php
                                $index++;
                            @endphp
                            @endforeach
                        @else
                            <tr>
                                <td colspan=2>
                                    <b>Tidak terdapat pengeluaran / belum diselesaikan.</b>
                                </td>
                            </tr>
                        @endif
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

            <!-- Daerah -->
            <div class="form-group">
                <label>Daerah</label>
                    <input type="text" name="daerah" class="form-control" placeholder="Daerah .." value="{{$penugasan->Pelaporan->Daerah->nama}}" readonly>

                    @if($errors->has('daerah'))
                    <div class="text-danger">
                        {{ $errors->first('daerah')}}
                    </div>
                    @endif
            </div>

            <!-- Koordinat -->
            <div class="form-group">
                   
                   <label>Koordinat</label>

                   <div id="googleMap" style="width:100%;height:400px;"></div>
                   <input id="longitude" type="hidden" name="koordinat[]" class="form-control">
                   <input id="latitude" type="hidden" name="koordinat[]" class="form-control">
                   <!-- <div id="lokasi_peta">Belum Ada</div> -->
                   @if($errors->has('koordinat'))
                       <div class="text-danger">
                           {{ $errors->first('koordinat')}}
                       </div>
                   @endif
               </div>

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
             <!-- <div class="form-group">
                <div class="form-col">
                    <div class="form-row">
                        <label>Foto Pengeluaran</label>
                    </div>
                @if(!empty($foto_pengeluaran[0]->id))
                    <div class="form-row mx-auto">
                    @foreach($foto_pengeluaran as $foto)
                        <div class="form-col mx-auto">
                            <img class="img-thumbnail" src="{{Storage::url($foto->nama_file)}}" style=" max-width: 100%;height: auto;" width="350" height="auto"/>
                        </div>
                    @endforeach
                    </div>
                @else
                    <b>Tidak terdapat pengeluaran / belum diselesaikan.</b>
                @endif
                </div>
            </div> -->

            <!-- File Penugasan -->
             <div class="form-group">
                <div class="form-col">
                    <div class="form-row">
                        <label>File Penugasan</label>
                    </div>
                    @if(!empty($foto_penugasan[0]->id))
                    <div class="form-row m-auto">
                        @foreach($foto_penugasan as $file)
                        <div class="form-col m-auto">
                            <!-- <img class="img-thumbnail" src="{{Storage::url($foto->nama_file)}}" style=" max-width: 100%;height: auto;" width="350" height="auto"/> -->
                            <a href="{{Storage::url($file->nama_file)}}" style=" max-width: 100%;height: auto;" width="500" height="auto">File Penugasan</a>
                        </div>
                        @endforeach
                    </div>
                    @else
                        <b>File belum ada karena belum diselesaikan.</b>
                    @endif
                </div>
            <!-- Foto Pelaporan -->
            <div class="form-group mt-3">
                <div class="form-col">
                    <div class="form-row">
                        <label>Foto Pelaporan</label>
                    </div>
                    @if(!empty($foto_pelaporan))
                        @php
                            $index = 0;   
                        @endphp
                        @foreach($foto_pelaporan as $foto)
                            @if ($index%2 == 0 && $index!=0)
                                </div>
                                <hr>
                            @endif
                            @if ($index%2 == 0)
                                <div class="row">
                            @endif
                            <div class="col m-auto">
                                <img src="{{Storage::url($foto->nama_file)}}" width="350px" height="auto"/>
                            </div>
                            @php
                                $index++;    
                            @endphp
                        @endforeach
                    @else
                        <b>Tidak terdapat gambar pelaporan (Bukan dibuat dari Pelaporan Masyarakat).</b>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 function myMap() {
    var koordinat_awal = {   lat:{{$penugasan->Koordinat->latitude}} ,lng:{{$penugasan->Koordinat->longitude}} };
    var mapProp= {
        center:new google.maps.LatLng({{$penugasan->Koordinat->latitude}},{{$penugasan->Koordinat->longitude}}),
        zoom:15,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker = new google.maps.Marker({
        position: koordinat_awal,
        map: map
    });   

    ubahLokasi();

    function ubahLokasi(){
        // document.getElementById("lokasi_peta").innerHTML="<p>Lat:" + marker.getPosition().lat() + "</p> <p>Long:" + marker.getPosition().lng() + "</p>"; 
        document.getElementById("longitude").value= marker.getPosition().lng();
        document.getElementById("latitude").value= marker.getPosition().lat();
    }
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=GOOGLE_MAP_KEY&callback=myMap"></script>
@endsection