<!DOCTYPE html>
<html>
<head>
	<title>Surat Penugasan</title>
	
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
            border:1px solid black;
            text-align:center;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .left-align{
            text-align:left;
        }
        
    </style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <center>
        <h4>Surat Penugasan</h4>
    </center>
    <hr>
    Tanggal Dibuat : {{date('d-m-Y', strtotime($penugasan->created_at))}} 
    <br>
    Penugasan : {{$penugasan->Pelaporan->KategoriPelaporan->TipeKategoriPelaporan->nama}} - {{$penugasan->Pelaporan->KategoriPelaporan->nama}}
    <br>
    Nama Tim : {{$penugasan->Tim->nama}}
    <br>
    Penanggung Jawab : {{$penugasan->Tim->Petugas->nama}}
    <br>
    Nama Pelapor : {{$penugasan->Pelapor->nama}}
    <br>
    Nomor Telepon Pelapor : {{$penugasan->Tim->Petugas->nomor_telepon}}
    <br>
    <hr>
    <div class="w3-container">
        Daerah Penugasan : {{$penugasan->Pelaporan->Daerah->KategoriDaerah->nama}} - {{$penugasan->Pelaporan->Daerah->nama}}
        <br>
        
        <img src="{{Storage::url('public/3WsWJeMsyCL8mujNGDZiPQqXBgfSm4UAvceO4dOc.jpg')}}"/>
    </div>
    
    
</body>
</html>