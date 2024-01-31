@extends('layouts.master', ['title'=>'Data Foto'])

@section('content')
<div class="jumbotron">
   <div class="card">
        <div class="card-header">
            <x-btn-create :link="route('create')" />
            <x-search />
            @if(isset($row))
                {{ dd($row) }}
            @endif
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
                                <td>
                                    @if ($row->nama_album == 'Lainnya')
                                        {{ $row->custom_category }}
                                    @else
                                        {{ $row->nama_album }}
                                    @endif
                                </td>
                                <td>{{ $row->nama_lengkap }}</td>
                                <td>{{ $row->judul_foto }}</td>
                                <td>{{ $row->deskripsi_foto }}</td>
                                <td><img src="{{ route('show.foto', ['filename' => basename($row->lokasi_file)]) }}" alt="gambar" class="img-fluid" style="width: 100px; height: 100px;"></td>
                                <td>{{ $row->privasi }}</td>
                                <td>
                                    <x-btn-edit :link="route('data-foto.show',['id'=>$row->id])" />
                                    <x-btn-delete :link="route('foto.destroy', ['fotoId' => $row->id])" :extra="$row->id"/>
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

@section('modal')
<x-modal-delete />
@endsection