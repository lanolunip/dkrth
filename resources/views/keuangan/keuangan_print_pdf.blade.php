<!DOCTYPE html>
<html>
<head>
	<title>Laporan Keuangan</title>
	
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
        <h4>Laporan Keuangan</h4>
    </center>
    Tanggal Mulai : {{date('d-m-Y', strtotime($tanggal_mulai))}} 
    <br>
    Tanggal Akhir : {{date('d-m-Y', strtotime($tanggal_akhir))}}
    <br>
    Banyak Penugasan : {{count($penugasan)}}
    <br>
    <br>
    <table style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penugasan</th>
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
                    <ol class="left-align">
                        <li class="">{{$dp->nama_pengeluaran}} - Rp.{{$dp->banyak_pengeluaran}}</li>
                    </ol>
                    @endforeach
                </td>
                <td>Rp.{{ $p->banyak_pengeluaran }}</td>
            </tr>
            @php
            $i++
            @endphp
            @endforeach
            <tr>
                <td colspan="3"> <b>Total Pengeluaran :</b> </td>
                <td> Rp.{{$total_pengeluaran}} </td>
            </tr>
        </tbody>
    </table>
</body>
</html>