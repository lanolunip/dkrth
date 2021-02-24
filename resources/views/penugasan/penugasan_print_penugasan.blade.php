<!DOCTYPE html>
<html>
<head>
	<title>Surat Penugasan</title>
    <style>
        .right{
        float:right;
    }

    .left{
        float:left;
    }
    .Nama_Instansi{
        font-weight:bold;
        font-size:24px;
    }
    .Nama_Departemen{
        font-weight:bold;
        font-size:20px;
    }
    .Alamat .Nomor_telepon{
        font-size:18px;
    }
    .Judul{
        font-weight:bold;
    }

    .GoogleMap{
        height:100px;
        width:auto;
    }
    .FotoPelaporan{
        height:100px;
        width:auto;
    }
    </style>
</head>
<body>
    <center>
        <span class="Nama_Instansi">DINAS KEBERSIHAN DAN RUANG TERBUKA HIJAU</span>
        <br>
        <span class="Nama_Departemen">DEPARTEMEN POHON DAN TANAMAN</span>
        <br>
        <span class="Alamat">Jl. Raya Menur No.31A, Surabaya</span>
        <br>
        <span class="Nomor_telepon">No.Telp (031) 5967387</span>
        <hr>
        <br>
        <span class="Judul"><u>SURAT PENUGASAN</u></h2>
    </center>
    <div class="w3-container">
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini Kepala Departemen Pohon dan Tanaman DKRTH 
            memberikan ijin untuk melakukan penugasan kepada :</p>
        <!-- Tanggal Dibuat      : {{date('d-m-Y', strtotime($penugasan->created_at))}}  -->
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        Nama Tim 
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;
        : {{$penugasan->Tim->nama}}
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        Nama Petugas 
        &nbsp;
        : {{$penugasan->Tim->Petugas->nama}}
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        NIP 
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        : {{$penugasan->Tim->Petugas->nip}}
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        Telp/HP 
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;
        : {{$penugasan->Tim->Petugas->nomor_telepon}}
        <br>

        @if($penugasan->tipe_penugasan != 2)
            <!-- Jika ada Pelapor -->
            <p>&nbsp;&nbsp;&nbsp;&nbsp;Untuk dapat melakukan penugasan {{$penugasan->nama}} yang
            telah dilaporkan/diminta oleh pelapor/pemohon, dengan keterangan :</p>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Nama  
            &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;
            : {{$penugasan->Pelapor->nama}}
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;
            No.Telp 
            &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;
            : {{$penugasan->Tim->Petugas->nomor_telepon}}
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Tujuan   
            &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;
            : {{$penugasan->Pelaporan->KategoriPelaporan->TipeKategoriPelaporan->nama}} - {{$penugasan->Pelaporan->KategoriPelaporan->nama}}
            <br>
            <div class="w3-container">
                <div class="w3-container">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    Daerah 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    : {{$penugasan->Pelaporan->Daerah->KategoriDaerah->nama}} - {{$penugasan->Pelaporan->Daerah->nama}}
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    Garis Lintang  
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    : {{$penugasan->Koordinat->latitude}}
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    Garis Bujur 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;
                    : {{$penugasan->Koordinat->longitude}}
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- Foto Lokasi 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;
                    :
                    <br>
                    <br>
                    <div class="GoogleMap">
                        <img src="https://maps.googleapis.com/maps/api/staticmap?center={{$penugasan->Koordinat->latitude}},{{$penugasan->Koordinat->longitude}}&zoom=15&format=png&markers=color:blue%7Clabel:Lokasi%7C{{$penugasan->Koordinat->latitude}},{{$penugasan->Koordinat->longitude}}&size=400x400&key=GOOGLE_MAP_KEY" alt="Google Map">
                    </div> -->
                </div>
                <br>
                <!-- &nbsp;&nbsp;&nbsp;&nbsp;
                Foto Pelaporan 
                &nbsp;&nbsp;
                : 
                <br>
                <br>
                <div class="FotoPelaporan">
                    @foreach($penugasan->Pelaporan->FotoPelaporan as $foto)
                        <img src="{{Storage::url($foto->nama_file)}}" width="350px" height="auto" alt="Foto Pelaporan"/>
                    @endforeach
                <div> -->
            </div>
        </div>
    @else
    <p>&nbsp;&nbsp;&nbsp;&nbsp;Untuk dapat melakukan PENUGASAN {{$penugasan->TipePenugasan->nama}} di daerah {{$penugasan->nama}}.</p>
    @endif
    <br>
    <br>
    <div class="w3-container">
        <!-- <span class="left">Penanggung Jawab</span> -->
        <span class="right">Surabaya, &nbsp;{{date("d-m-Y")}}</span>
        <br>
        <span class="right">Kepala Departemen</span>
        @for($i=0;$i < 7 ;$i++)
            <br>
        @endfor
        <!-- <span class="left">{{$penugasan->Tim->Petugas->nama}}</span> -->
        <span class="right">__________________</span>
    </div>

</body>
</html>