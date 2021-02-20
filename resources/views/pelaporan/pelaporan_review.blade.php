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
                <input type="text" name="nama" class="form-control" placeholder="Nama Tim .." value="{{ $pelaporan->Penugasan->nama }}" readonly>
            </div>
            <!-- Deskripsi -->
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi .." readonly>{{ $pelaporan->Penugasan->deskripsi }}</textarea>

            </div>
    
            <!-- Tim -->
            <div class="form-group">
                <label>Tim</label>
                    <input name="tim" class="form-control" placeholder="Tim .." value="{{$pelaporan->Penugasan->Tim->nama}}" readonly>
    
            </div>

            <!-- Nama Pelapor -->
            <div class="form-group">
                <label>Nama Pelapor</label>
                @if(!empty($pelaporan->Penugasan->Pelapor->nama))
                <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$pelaporan->Penugasan->Pelapor->nama}}" readonly>
                @else
                <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$pelaporan->Penugasan->pelapor}}" readonly>
                @endif
            </div>
                      
            <!-- Nomor Telepon Pelapor -->
            <div class="form-group">
                <label>Nomor Telepon Pelapor</label>
                @if(!empty($pelaporan->Penugasan->Pelapor->nomor_telepon))
                <input type="text" name="pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$pelaporan->Penugasan->Pelapor->nomor_telepon}}" readonly>
                @else
                <input type="text" name="pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$pelaporan->Penugasan->nomor_telepon_pelapor}}" readonly>
                @endif
            </div>
            
            @if(!empty($pelaporan->Penugasan->Laporan->isi))
            <!-- Isi Laporan -->
            <div class="form-group">
                <label>Isi Laporan</label>
                <textarea type="text" name="pelapor" class="form-control" placeholder="Isi Laporan .." readonly>{{$pelaporan->Penugasan->Laporan->isi}}</textarea>
            </div>
            @else
                <!-- Isi Laporan -->
                <div class="form-group">
                    <label>Isi Laporan</label>
                    <textarea type="text" name="pelapor" class="form-control" placeholder="Isi Laporan Belum Diisi" readonly></textarea>
                </div>
            @endif

            <!-- Pengeluaran -->
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
                        @if(!empty($pelaporan->Penugasan->Pengeluaran[0]->id))
                            @php
                                $index = 0;
                            @endphp
                            @foreach($pelaporan->Penugasan->Pengeluaran as $p)
                            <tr id="pengeluaran0">
                                <td>
                                    <p> {{$p->nama_pengeluaran}} </p>
                                </td>
                                
                                <td>
                                    <p> {{$p->banyak_pengeluaran}} </p>
                                </td>
                                
                                <td>
                                <img class="img-thumbnail" src="{{Storage::url($pelaporan->Penugasan->FotoPengeluaran[$index]->nama_file)}}" style=" max-width: 100%;height: auto;" width="350" height="auto"/>
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
                            <input type="number" name="banyak_pengeluaran" class="form-control" placeholder="Banyak Pengeluaran .." value="{{$pelaporan->Penugasan->banyak_pengeluaran}}" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daerah -->
            <div class="form-group">
                <label>Daerah</label>
                    <input type="text" name="daerah" class="form-control" placeholder="Daerah .." value="{{$pelaporan->Penugasan->Pelaporan->Daerah->nama}}" readonly>

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
                <input type="text" name="nama" class="form-control" placeholder="Tanggal Mulai .." value="{{ $pelaporan->Penugasan->created_at }}" readonly>
            </div>

             <!-- Tanggal Selesai -->
             <div class="form-group">
                <label>Tanggal Selesai (yyyy-mm-dd)</label>
                <input type="text" name="nama" class="form-control" placeholder="Tanggal Selesai .." value="{{ $pelaporan->Penugasan->tanggal_berakhir }}" readonly>
            </div>

            <!-- File Penugasan -->
            <div class="form-group">
                <div class="form-col">
                    <div class="form-row">
                        <label>File Penugasan</label>
                    </div>
                    @if(!empty($pelaporan->Penugasan->FilePenugasan[0]->id))
                    <div class="form-row">
                        @foreach($pelaporan->Penugasan->FilePenugasan as $file)
                        <div class="form-col">
                            
                            <a href="{{Storage::url($file->nama_file)}}" style=" max-width: 100%;height: auto;" width="500" height="auto">File Penugasan</a>
                        </div>
                        @endforeach
                    </div>
                    @else
                        <b>File belum ada karena belum diselesaikan.</b>
                    @endif
                </div>
            </div>

            <!-- Foto Pelaporan -->
            <div class="form-group mt-3">
                <div class="form-col">
                    <div class="form-row">
                        <label>Foto Pelaporan</label>
                    </div>
                    @if(!empty($pelaporan->FotoPelaporan))
                        @php
                            $index = 0;   
                        @endphp
                        @foreach($pelaporan->FotoPelaporan as $foto)
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

            <form method="post" action="{{url('/pelaporan/review/selesai/'.$pelaporan->id)}}">
                {{ csrf_field() }}
                <!-- Review -->
                <div class="form-group">
                    <label>Review</label>
                    <textarea type="text" name="review" class="form-control" placeholder="Isi Kritik / Saran..."></textarea>

                    @if($errors->has('review'))
                        <div class="text-danger">
                            {{ $errors->first('review')}}
                        </div>
                    @endif

                </div>
                <div class="form-group">
                    <label>Rating</label>
                    <div class="form-row">
                        @for($index = 1;$index<=5;$index++)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio{{$index}}" value="{{$index}}">
                            <label class="form-check-label" for="inlineRadio{{$index}}">{{$index}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                            </label>
                        </div>
                        @endfor
                    </div>
                    @if($errors->has('rating'))
                        <div class="text-danger">
                            {{ $errors->first('rating')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
                    
            </form>

        </div>
    </div>
</div>
<script>
 function myMap() {
    var koordinat_awal = {   lat:{{$pelaporan->Penugasan->Koordinat->latitude}} ,lng:{{$pelaporan->Penugasan->Koordinat->longitude}} };
    var mapProp= {
        center:new google.maps.LatLng({{$pelaporan->Penugasan->Koordinat->latitude}},{{$pelaporan->Penugasan->Koordinat->longitude}}),
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