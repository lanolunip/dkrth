<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penugasan</title>
	
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
</head>
<body>
    <center>
        <h4>Laporan Penugasan</h4>
    </center>
    Tanggal Mulai : {{date('d-m-Y', strtotime($tanggal_mulai))}} 
    <br>
    Tanggal Akhir : {{date('d-m-Y', strtotime($tanggal_akhir))}}
    <br>
    Total Pengeluaran : Rp.{{$total_pengeluaran}}
    <br>
    <br>
    <table style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penugasan</th>
                <th>Jenis Penugasan</th>
                <th>Tim Yang Bertugas</th>
                <th>Banyak Pengeluaran</th>
                <th>Status Penugasan</th>
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
                <td> {{$p->Pelaporan->KategoriPelaporan->TipeKategoriPelaporan->nama}} - {{ $p->Pelaporan->KategoriPelaporan->nama}}</td>
                <td> {{$p->Tim->nama}}
                <td>Rp.{{ $p->banyak_pengeluaran }}</td>
                <td>
                    {{$p->Pelaporan->StatusPelaporan->nama}}
                    @if(!empty($p->tanggal_berakhir))
                        <hr>
                        Pada : <br>{{date('d-m-Y', strtotime($p->tanggal_berakhir))}}
                    @endif
                </td>
            </tr>
            @php
            $i++
            @endphp
            @endforeach
            <!-- <tr>
                <td colspan="4"> <b>Total Pengeluaran :</b> </td>
                <td colspan="2"> Rp.{{$total_pengeluaran}} </td>
            </tr> -->
        </tbody>
    </table>
</body>
</html>