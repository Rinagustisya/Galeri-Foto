@extends('layouts.master', ['title'=>'Dashboard'])

@section('content')
<div class="jumbotron">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <input class="form-control mr-sm-2 w-100" type="search" placeholder="Search" aria-label="Search">
                </div>
                <div class="col-4">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        Kategori
                    </button>
                    <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Arsitektur</a>
                        <a class="dropdown-item" href="#">Dokumenter</a>
                        <a class="dropdown-item" href="#">Seni Rupa</a>
                        <a class="dropdown-item" href="#">Fashion</a>
                        <a class="dropdown-item" href="#">Olahraga</a>
                        <a class="dropdown-item" href="#">Makanan</a>
                        <a class="dropdown-item" href="#">Satwa Liar</a>
                        <a class="dropdown-item" href="#">Hewan</a>
                        <a class="dropdown-item" href="#">Laut</a>
                        <a class="dropdown-item" href="#">Perjalanan</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Foto Terbaru -->
    <div class="card">
        <div class="card-body">
            <h3><strong>Foto Terbaru</strong></h3>
            <div class="container border p-3">
            @foreach($fotos as $foto)
                <div class="container p-3">
                    <h5 class="nama-user-h5">Nama : <b>{{ optional($foto->user)->nama_lengkap ?? 'No Name' }}</b></h5>
                    <div class="img-container">
                        <img src="{{ route('all.foto', ['filename' => basename($foto->lokasi_file)]) }}" alt="gambar" class="img-fluid" style="height: 300px;">
                    </div>
                    <a href=""><i class="far fa-heart"></i></a>
                    <a href=""><i class="far fa-comments"></i></a>&nbsp;&nbsp;&nbsp;Disukai oleh...
                    <div class="custom-margin">Kategori :  &nbsp;{{ $foto->album->nama_album }}</div>
                    <div class="custom-margin">Deskripsi :  &nbsp;{{ $foto->deskripsi_foto }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- end foto -->
    </div> 
</div>
@endsection

@push('realtime')

@endpush