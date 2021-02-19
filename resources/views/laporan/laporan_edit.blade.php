@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Laporan - <strong>EDIT DATA</strong>
        </div>
        <div class="card-body">
            @if (Auth::user()->TipeUser->nama == "Ketua")
                <a href="{{url('/laporan')}}" class="btn btn-primary">Kembali</a>
            @else
                <a href="{{url('/penugasan')}}" class="btn btn-primary">Kembali</a>
            @endif
            <br/>
            <br/>
            

            <form method="post" enctype="multipart/form-data" action="{{url('/laporan/update/'. $laporan->id )}}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <!-- Isi -->
                <div class="form-group">
                    <label>Isi Laporan</label>
                    <input type="text" name="isi" class="form-control" placeholder="Isi .." value="{{ $laporan->isi }}">

                    @if($errors->has('isi'))
                        <div class="text-danger">
                            {{ $errors->first('isi')}}
                        </div>
                    @endif

                </div>
                <!-- Pengeluaran -->
                <div class="card">
                    <div class="card-header">
                        Pengeluaran
                    </div>
                    <b>Upload foto baru pada bagian yang ingin diubah </b>
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
                                @if(!empty($laporan->Penugasan->Pengeluaran))
                                    @php
                                        $index = 0;
                                    @endphp
                                    @foreach($laporan->Penugasan->Pengeluaran as $p)
                                        <tr id="pengeluaran0">
                                            <td class="align-middle">
                                                <input name="nama_pengeluaran[]" class="form-control" placeholder="Nama Pengeluaran" value="{{$p->nama_pengeluaran}}">
                                            </td>
                                            @if($errors->has('nama_pengeluaran'))
                                                <div class="text-danger">
                                                    {{ $errors->first('nama_pengeluaran')}}
                                                </div>
                                            @endif
                                            <td class="align-middle">
                                                <input type="number" name="banyak_pengeluaran[]" class="form-control" value="{{$p->banyak_pengeluaran}}"/>
                                            </td>
                                            @if($errors->has('banyak_pengeluaran'))
                                                <div class="text-danger">
                                                    {{ $errors->first('banyak_pengeluaran')}}
                                                </div>
                                            @endif
                                            <td class="align-middle">
                                                <img src="{{Storage::url($laporan->Penugasan->FotoPengeluaran[$index]->nama_file)}}"style=" max-width: 100%;height: auto;" width="300" height="auto"/>
                                            </td>
                                            <!-- <td>
                                                <input name="gambar_pengeluaran[]" type="file"> 
                                            </td>
                                            @if($errors->has('gambar_pengeluaran'))
                                                <div class="text-danger">
                                                    {{ $errors->first('gambar_pengeluaran')}}
                                                </div>
                                            @endif -->
                                        </tr>
                                        @php
                                            $index++;
                                        @endphp
                                    @endforeach    
                                @else
                                    <b>Tidak terdapat Pengeluaran</b>
                                @endif
                            </tbody>
                        </table>

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
                                    <input type="number" name="total_pengeluaran" class="form-control" placeholder="Banyak Pengeluaran .." value="{{$laporan->Penugasan->banyak_pengeluaran}}" readonly>
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
                
                <!-- File Penugasan -->
                <div class="form-group">
                    <div class="col">
                        <div class="row">
                            <label>File Penugasan</label>    
                        </div>
                        <div class="row">
                            @php
                                $index = 0;   
                            @endphp
                            @foreach($laporan->Penugasan->FilePenugasan as $file)
                            @if ($index%2 == 0 && $index!=0)
                                </div>
                                <hr>
                            @endif
                            @if ($index%2 == 0)
                                <div class="row">
                            @endif
                            <div class="col m-auto">
                                <!-- <img src="{{Storage::url($file->nama_file)}}" style=" max-width: 100%;height: auto;" width="500" height="auto"/> -->
                                <a href="{{Storage::url($file->nama_file)}}" style=" max-width: 100%;height: auto;" width="500" height="auto">File Penugasan</a>
                            </div>
                            @php
                                $index++;
                            @endphp
                            @endforeach
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
                            <b>(Upload file baru jika ingin mengganti file yang sudah diunggah sebelumnya)</b>
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
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
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
@endsection