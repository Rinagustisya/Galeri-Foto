@extends('layouts.master', ['title'=>'Data Foto'])

@section('content')
<div class="jumbotron">
   <div class="card">
        <div class="card-header">
            <x-btn-create :link="route('create')" />
            <div class="col-4">
            <form action="?" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari..." name="search" value="<?php request()->search ?>">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        </div>
            <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Nama User</th>
                                <th>Nama Foto</th> 
                                <th>Deskripsi</th> 
                                <th>Gambar</th> 
                                <th>Status</th> 
                                <th>Aksi</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $data->firstItem(); ?>
                            @foreach ( $data as $row ) 
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama_album }}</td>
                                <td>{{ $row->nama_lengkap }}</td>
                                <td>{{ $row->judul_foto }}</td>
                                <td>{{ $row->deskripsi_foto }}</td>
                                <td><img src="{{ route('show.foto', ['filename?' => basename($row->lokasi_file)]) }}" alt="gambar"></td>
                                <td>{{ $row->privasi }}</td>
                                <td>
                                    <x-btn-edit :link="route('data-foto.show',['data'=>$row->id])" />
                                    <x-btn-delete :link="route('data-foto.destroy',['data'=>$row->id])" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
            <div class="card-body py-0">
                {{ $data->appends(['search' => request()->search ])->links('pagenation') }}
            </div>
   </div>
</div>
@endsection