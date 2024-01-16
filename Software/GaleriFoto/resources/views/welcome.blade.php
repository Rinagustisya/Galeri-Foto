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
            </div>
        </div>
    </div>
    <!-- end foto -->

</div>
@endsection