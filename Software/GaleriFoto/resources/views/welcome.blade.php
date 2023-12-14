@extends('layouts.master', ['title'=>'Dashboard'])

@section('content')
<div class="jumbotron">
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <form class="form-inline">
                    <input class="form-control mr-sm-2 w-100" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </div>

    <!-- kategori -->
    <div class="card">
        <div class="card-body">
            <h3><strong>Kategori</strong></h3>
            <div class="container border p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="row first-row justify-content-center">
                            <div class="col-2">
                                <button><i class="fas fa-bars"></i></button>
                                <span class="label">Arsitektur</span>
                            </div>

                            <div class="col-2">
                                <button><i class="fas fa-bars"></i></button>
                                <span class="label">Dokumenter</span>
                            </div>

                            <div class="col-2">
                                <button><i class="fas fa-bars"></i></button>
                                <span class="label">Seni Rupa</span>
                            </div>

                            <div class="col-2">
                                <button><i class="fas fa-bars"></i></button>
                                <span class="label">Fashion</span>
                            </div>

                            <div class="col-2">
                                <button><i class="fas fa-bars"></i></button>
                                <span class="label">Olahraga</span>
                            </div>
                            </div>
                    </div>
                    <br>
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <button><i class="fas fa-bars"></i></button>
                                <span class="label">Makanan</span>
                            </div>

                            <div class="col-2">
                                <button><i class="fas fa-bars"></i></button>
                                <span class="label">Satwa Liar</span>
                            </div>

                            <div class="col-2">
                                <button><i class="fas fa-bars"></i></button>
                                <span class="label">Hewan</span>
                            </div>

                            <div class="col-2">
                                <button><i class="fas fa-bars"></i></button>
                                <span class="label">Laut</span>
                            </div>

                            <div class="col-2">
                                <button><i class="fas fa-bars"></i></button>
                                <span class="label">Perjalanan</span>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end kategori -->

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