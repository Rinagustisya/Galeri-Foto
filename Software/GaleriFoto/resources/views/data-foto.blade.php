@extends('layouts.master', ['title'=>'Data Foto'])

@section('content')
<div class="jumbotron">
   <div class="card">
        <div class="card-header">
            <x-btn-create :link="route('create')" />
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
                        
                </table>
            </div>
            <div class="card-body py-0">
                {{ $data->appends(['search' => request()->search ])->links('pagenation') }}
            </div>
   </div>
</div>
@endsection