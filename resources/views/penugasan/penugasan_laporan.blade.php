@extends('layouts.app')

@section('custom')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>Penyelesaian Penugasan</strong>
        </div>
        <div class="card-body">
            <a href="{{url('/penugasan')}}" class="btn btn-primary">Kembali</a>

            <br/>
            <br/>
                        
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{url('/penugasan/selesaikan/' . $penugasan->id) }}" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <!-- Nama -->
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Tim .." value="{{ $penugasan->nama }}" readonly>

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>
                <!-- Deskripsi -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi .." readonly>{{ $penugasan->deskripsi }}</textarea>

                    @if($errors->has('deskripsi'))
                        <div class="text-danger">
                            {{ $errors->first('deskripsi')}}
                        </div>
                    @endif

                </div>
            
                <!-- Tim -->
                <div class="form-group">
                    <label>Tim</label>
                        <input type="text" name="tim" class="form-control" placeholder="Tim .." value="{{$penugasan->Tim->nama}} - {{$penugasan->Tim->JenisTim->nama}} - {{$penugasan->Tim->KategoriDaerah->nama}}" readonly>

                        @if($errors->has('tim'))
                        <div class="text-danger">
                            {{ $errors->first('tim')}}
                        </div>
                        @endif
                </div>
                 <!-- Pelapor -->
                <div class="form-group">
                    <label>Pelapor</label>
                    @if(!empty($penugasan->Pelapor))
                        <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$penugasan->Pelapor->nama}}" disabled>
                        <input type="hidden" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$penugasan->Pelapor->id}}">
                    @else
                        <input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor .." value="{{$penugasan->pelapor}}" readonly>
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
                    <input type="tel" name="nomor_telepon_pelapor" class="form-control" placeholder="Nomor Telepon Pelapor .." value="{{$penugasan->nomor_telepon_pelapor}}" readonly>

                    @if($errors->has('nomor_telepon_pelapor'))
                        <div class="text-danger">
                            {{ $errors->first('nomor_telepon_pelapor')}}
                        </div>
                    @endif

                </div>
                <!-- Isi -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea type="text" name="isi" class="form-control" placeholder="Isi Dengan Apa Saja Yang Terjadi + Detail Uang .."></textarea>

                    @if($errors->has('isi'))
                        <div class="text-danger">
                            {{ $errors->first('isi')}}
                        </div>
                    @endif

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
                <!-- Pengeluaran -->
                <div class="card">
                    <div class="card-header">
                        Pengeluaran
                    </div>

                    <div class="card-body">
                        <table class="table" id="tabel_pengeluaran">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Pengeluaran</th>
                                    <th scope="col">Banyak Pengeluaran (Rp.)</th>
                                    <th scope="col">Bukti Pengeluaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="pengeluaran0">
                                    <td>
                                       <input name="nama_pengeluaran[]" class="form-control" placeholder="Nama Pengeluaran">
                                    </td>
                                    @if($errors->has('nama_pengeluaran'))
                                        <div class="text-danger">
                                            {{ $errors->first('nama_pengeluaran')}}
                                        </div>
                                    @endif
                                    <td>
                                        <input type="number" name="banyak_pengeluaran[]" class="form-control"/>
                                    </td>
                                    @if($errors->has('banyak_pengeluaran'))
                                        <div class="text-danger">
                                            {{ $errors->first('banyak_pengeluaran')}}
                                        </div>
                                    @endif
                                    <td>
                                        <input name="gambar_pengeluaran[]" type="file"> 
                                    </td>
                                    @if($errors->has('gambar_pengeluaran'))
                                        <div class="text-danger">
                                            {{ $errors->first('gambar_pengeluaran')}}
                                        </div>
                                    @endif
                                </tr>
                                <tr id="pengeluaran1"></tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <button id="add_row" class="btn btn-default pull-left">+ Tambah Baris</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Hapus Baris</button>
                            </div>
                        </div>
                        <!-- Total Pengeluaran -->
                        <div class="form-group mt-3">
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
                                    <input type="number" name="total_pengeluaran" class="form-control" placeholder="Banyak Pengeluaran .." value="{{$penugasan->banyak_pengeluaran}}" readonly>
                                </div>
                            </div>
                            
                            @if($errors->has('total_pengeluaran'))
                                <div class="text-danger">
                                    {{ $errors->first('total_pengeluaran')}}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <!-- Upload File Penugasan -->
                <div class="form-group">
                    <div class="col">
                        <div class="row">
                            <label>Upload File Penugasan</label>    
                        </div>
                        <div class="row">
                            <input multiple="multiple" name="file_penugasan[]" type="file"> 
                        </div>
                    </div>
                        @if($errors->has('file_penugasan'))
                        <div class="text-danger">
                            {{ $errors->first('file_penugasan')}}
                        </div>
                        @endif
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        let row_number = 1;
        $("#add_row").click(function(e){
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#pengeluaran' + row_number).html($('#pengeluaran' + new_row_number).html()).find('td:first-child');
            $('#tabel_pengeluaran').append('<tr id="pengeluaran' + (row_number + 1) + '"></tr>');
            row_number++;
        });

        $("#delete_row").click(function(e){
            e.preventDefault();
            if(row_number > 1){
                $("#pengeluaran" + (row_number - 1)).html('');
                row_number--;
                kalkulasi();
            }
        });
        $('#tabel_pengeluaran tbody').on('keyup change',function(){
            kalkulasi();
        });
        
        function kalkulasi(){
            let total = 0;
            $('input[name^="banyak_pengeluaran"]').each(function() {
                total += Number($(this).val());
            });
            $('input[name="total_pengeluaran').val(total);
        }
    });
</script>
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