@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                    Tabel Data Pengguna
                    </h4>
                    <a href="{{ url('user/create/') }}" class="btn btn-success btn-sm mb-2">
                        Tambah 
                    </a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Tanggal Bergabung</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no=1;
                        ?>
                        @foreach ($data as $dt) 
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$dt->name}}</td>
                            <td>{{$dt->email}}</td>
                            <td>********</td>
                            <td>{{$dt->created_at}}</td>
                            <td>
                                <a href="{{ url('user/edit/'.$dt->id) }}" class="btn btn-primary btn-sm mb-2">
                                    Edit 
                                </a>
                                @if(auth()->user()->id != $dt->id)
                                <a href="{{ url('user/delete/'.$dt->id) }}" class="btn btn-danger btn-sm mb-2">  
                                    Hapus
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
