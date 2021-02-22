@extends('layouts.app')

@section('custom')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Pelaporan - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            <a href="{{url('/pelaporan')}}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>

            <form method="post" enctype="multipart/form-data" action="{{url('/pelaporan/update/'. $pelaporan->id) }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <!-- Nama Pelapor-->
                <div class="form-group">
                    <label>Nama Pelapor</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama .." value="{{$pelaporan->Pelapor->nama}}" readonly>

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <!-- Nomor Telepon Pelapor -->
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="nomor_telepon_pelapor" class="form-control" placeholder="Nomor Telepon.." value="{{$pelaporan->Pelapor->nomor_telepon}}" readonly>

                    @if($errors->has('nomor_telepon_pelapor'))
                        <div class="text-danger">
                            {{ $errors->first('nomor_telepon_pelapor')}}
                        </div>
                    @endif

                </div>
                <!-- Kategori Pelaporan -->
                <div class="form-group">
                    <label>Kategori Pelaporan</label>
                    <input type="text" name="" class="form-control" placeholder="Nama Kategori Pelaporan .." value="{{$pelaporan->KategoriPelaporan->nama}}" disabled>
                    <input type="hidden" name="kategori_pelaporan" value="{{$pelaporan->KategoriPelaporan->id}}">
                    @if($errors->has('kategori_pelaporan'))
                        <div class="text-danger">
                            {{ $errors->first('kategori_pelaporan')}}
                        </div>
                    @endif

                </div>
                <!-- Deskripsi -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Masalah .. (Jangan lupa Masukan Nama Jalan , alamat / nama gedung(jika kejadian memang terjadi di suatu tempat yang spesifik)">{{$pelaporan->deskripsi}}</textarea>

                    @if($errors->has('deskripsi'))
                        <div class="text-danger">
                            {{ $errors->first('deskripsi')}}
                        </div>
                    @endif

                </div>

                <!-- Daerah -->
                <div class="form-group">
                    <label>Daerah</label>
                        <select size="0" name="daerah" class="form-control" placeholder="Daerah ..">
                           
                            @php
                            $i = 1
                            @endphp
                            @foreach($daerah as $d)

                                @if ($pelaporan->daerah == $d->id) 
                                    <option value="{{$d->id}}" selected>{{ $i }} - {{ $d->nama }} - {{ $d->nama }} - {{ $d->KategoriDaerah->nama }} </option>
                                @else
                                    <option value="{{$d->id}}">{{ $i }} - {{ $d->nama }} - {{ $d->nama }} - {{ $d->KategoriDaerah->nama }} </option>
                                @endif


                            @php
                            $i++
                            @endphp
                            @endforeach

                        </select>

                        @if($errors->has('daerah'))
                        <div class="text-danger">
                            {{ $errors->first('daerah')}}
                        </div>
                        @endif
                </div>
                <!-- Koordinat -->
                <div class="form-group">
                    <div class="row">
                        <label>Koordinat</label>
                    </div>
                    <div class="row">
                        <b>Klik tempat baru jika ingin merubah lokasi</b>
                    </div>
                    <div id="googleMap" style="width:100%;height:400px;"></div>
                    <input id="longitude" type="hidden" name="koordinat[]" class="form-control" value="{{$pelaporan->Koordinat->longitude}}">
                    <input id="latitude" type="hidden" name="koordinat[]" class="form-control" value="{{$pelaporan->Koordinat->latitude}}">
                    <!-- <div id="lokasi_peta">Belum Ada</div> -->
                    @if($errors->has('koordinat'))
                        <div class="text-danger">
                            {{ $errors->first('koordinat')}}
                        </div>
                    @endif
                </div>
                <!-- Gambar Pelaporan -->
                <div class="form-group">
                    <div class="col">
                        <div class="row">
                            <label>Gambar Pelaporan</label>    
                        </div>
                        <div class="row">
                            @php
                                $index = 0;   
                            @endphp
                            @foreach($pelaporan->FotoPelaporan as $gambar)
                            @if ($index%2 == 0 && $index!=0)
                                </div>
                                <hr>
                            @endif
                            @if ($index%2 == 0)
                                <div class="row">
                            @endif
                            <div class="col m-auto">
                                <img src="{{Storage::url($gambar->nama_file)}}"style=" max-width: 100%;height: auto;" width="350" height="auto"/>
                            </div>
                            @php
                                $index++;    
                            @endphp
                            @endforeach
                        </div>
                    </div>
                </div> 
                 <!-- Upload Gambar Pelaporan -->
                 <div class="form-group">
                    <div class="col">
                        <div class="row">
                            <label>Upload Gambar Pelaporan</label>    
                        </div>
                        <div class="row">
                            <b>(Upload foto baru jika ingin mengganti foto yang sudah diunggah sebelumnya)</b>
                        </div>
                        <div class="row">
                            <input multiple="multiple" name="gambar[]" type="file"> 
                        </div>
                    </div>
                        @if($errors->has('gambar'))
                        <div class="text-danger">
                            {{ $errors->first('gambar')}}
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
    var koordinat_awal = {   lat:{{$pelaporan->Koordinat->latitude}} ,lng:{{$pelaporan->Koordinat->longitude}} };
    var mapProp= {
        center:new google.maps.LatLng({{$pelaporan->Koordinat->latitude}},{{$pelaporan->Koordinat->longitude}}),
        zoom:15,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker = new google.maps.Marker({
        position: koordinat_awal,
        map: map
    });   

    google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng);
    });


    function placeMarker(location) {

        if (marker == null)
        {
            marker = new google.maps.Marker({
                position: location,
                map: map
            }); 
        } 
        else 
        {
            marker.setPosition(location); 
            
        } 
        ubahLokasi();
    }

    function ubahLokasi(){
        // document.getElementById("lokasi_peta").innerHTML="<p>Lat:" + marker.getPosition().lat() + "</p> <p>Long:" + marker.getPosition().lng() + "</p>"; 
        document.getElementById("longitude").value= marker.getPosition().lng();
        document.getElementById("latitude").value= marker.getPosition().lat();
    }
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=GOOGLE_MAP_KEY&callback=myMap"></script>
@endsection