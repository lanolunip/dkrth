<!-- @inject('tipe_user', 'App\Http\Controllers\TipeUserController') -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data User - <strong>List User</strong>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <a href="/petugas/tambah" class="btn btn-primary">TAMBAH PETUGAS</a>
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>NIP</th>
                        <th>Nomor Telepon</th>
                        <th>E-mail</th>
                        <th>Tipe User</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($petugas as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->nip }}</td>
                        <td>{{ $p->nomor_telepon }}</td>
                        <td>{{ $p->email }}</td>
                        <!-- <td>{{$tipe_user->getNama($p->tipe_user)}}</td> -->
                        <td>{{$p->TipeUser->nama}}</td>
                        <td>
                            <a href="/petugas/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                            <a href="/petugas/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            Halaman : {{ $petugas->currentPage() }} <br/>
            Jumlah Data : {{ $petugas->total() }} <br/>
            Data Per Halaman : {{ $petugas->perPage() }} <br/>
            {{ $petugas->links() }}
        </div>
    </div>
</div>
@endsection