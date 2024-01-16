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
                <div class="container p-3">
                    <h5 class="nama-user-h5">Nama User : Watson Winters </h5>
                    <div class="img-container">
                        <img src="/contoh-img/gacoan.jpg" alt="gambar" class="img-fluid" style="height: 300px;">
                    </div>
                    <button class="icon-button"><i class="far fa-heart"></i></button>
                    <button class="icon-button"><i class="far fa-comments"></i></button>Disukai oleh...
                    <div class="custom-margin"><b>Kategori :</b> Makanan</div>
                    <div class="custom-margin"><b>Deskripsi :</b> Mie Gacoan adalah salah satu jenis mie pedas yang belakangan ini memang begitu diminati, terutama oleh kaum muda.</div>
                </div>
            </div>
        </div>
            <!-- contoh data2 -->
            <div class="card-body">
                <div class="container border p-3">
                    <div class="container p-3">
                        <h5 class="nama-user-h5">Nama User : Kathrina </h5>
                        <div class="img-container">
                            <img src="/contoh-img/kakatua.jpg" alt="gambar" class="img-fluid" style="height: 300px;">
                        </div>   
                        <button class="icon-button"><i class="far fa-heart"></i></button>
                        <button class="icon-button"><i class="far fa-comments"></i></button>Disukai oleh...
                        <div class="custom-margin"><b>Kategori :</b> Hewan</div>
                        <div class="custom-margin"><b>Deskripsi :</b> Burung kakatua merupakan burung yang banyak disukai kerena memiliki bulu jambul yang indah di ubun – ubun kepalanya.</div>
                    </div>
                </div>
            </div>
             <!-- contoh data3 -->
             <div class="card-body">
                <div class="container border p-3">
                    <div class="container p-3">
                        <h5 class="nama-user-h5">Nama User : Izuma  </h5>
                        <div class="img-container">
                            <img src="/contoh-img/koala.jpg" alt="gambar" class="img-fluid" style="height: 300px;">
                        </div>
                        <button class="icon-button"><i class="far fa-heart"></i></button>
                        <button class="icon-button"><i class="far fa-comments"></i></button>Disukai oleh...
                        <div class="custom-margin"><b>Kategori :</b> Satwa Liar</div>
                        <div class="custom-margin"><b>Deskripsi :</b> Koala dapat ditemukan di sepanjang pesisir timur Australia mulai dari Adelaide sampai ke Semenanjung Cape York</div>
                    </div>
                </div>
            </div>
             <!-- contoh data4 -->
             <div class="card-body">
                <div class="container border p-3">
                    <div class="container p-3">
                        <h5 class="nama-user-h5">Nama User : Kazehaya</h5>
                        <div class="img-container">
                            <img src="/contoh-img/laut.jpg" alt="gambar" class="img-fluid" style="height: 300px;">
                        </div>
                        <button class="icon-button"><i class="far fa-heart"></i></button>
                        <button class="icon-button"><i class="far fa-comments"></i></button>Disukai oleh...
                        <div class="custom-margin"><b>Kategori :</b> Laut</div>
                        <div class="custom-margin"><b>Deskripsi :</b>Laut merupakan suatu kumpulan air asin dalam jumlah yang banyak dan luas yang menggenangi dan membagi daratan atas benua atau pulau.</div>
                    </div>
                </div>
            </div>
             <!-- contoh data5 -->
             <div class="card-body">
                <div class="container border p-3">
                    <div class="container p-3">
                        <h5 class="nama-user-h5">Nama User : Sasako </h5>
                        <div class="img-container">
                            <img src="/contoh-img/nasgor.jpeg" alt="gambar" class="img-fluid" style="height: 300px;">
                        </div>        
                        <button class="icon-button"><i class="far fa-heart"></i></button>
                        <button class="icon-button"><i class="far fa-comments"></i></button>Disukai oleh...
                        <div class="custom-margin"><b>Kategori :</b> Makanan</div>
                        <div class="custom-margin"><b>Deskripsi :</b>Nasi goreng adalah makanan berupa nasi yang digoreng dan dicampur dalam minyak goreng, margarin atau mentega.</div>
                    </div>
                </div>
            </div>
             <!-- contoh data6 -->
             <div class="card-body">
                <div class="container border p-3">
                    <div class="container p-3">
                        <h5 class="nama-user-h5">Nama User : Watson Winters </h5>
                        <div class="img-container">
                            <img src="/contoh-img/rubah.jpg" alt="gambar" class="img-fluid" style="height: 300px;">
                        </div>
                        <button><i class="far fa-heart"></i></button>
                        <button><i class="far fa-comments"></i></button>Disukai oleh...
                        <div class="custom-margin"><b>Kategori :</b> Makanan</div>
                        <div class="custom-margin"><b>Deskripsi :</b> Mie Gacoan adalah salah satu jenis mie pedas yang belakangan ini memang begitu diminati, terutama oleh kaum muda.</div>
                    </div>
                </div>
            </div>
             <!-- contoh data7 -->
             <div class="card-body">
                <div class="container border p-3">
                    <div class="container p-3">
                        <h5 class="nama-user-h5">Nama User : Asuna </h5>
                        <div class="img-container">
                            <img src="/contoh-img/perjalanan.jpg" alt="gambar" class="img-fluid" style="height: 300px;">
                        </div>               
                        <button class="icon-button"><i class="far fa-heart"></i></button>
                        <button class="icon-button"><i class="far fa-comments"></i></button>Disukai oleh...
                        <div class="custom-margin"><b>Kategori :</b> Perjalanan</div>
                        <div class="custom-margin"><b>Deskripsi :</b>Sungguh surga tersendiri ketika dapat melepaskan rasa lelah ini</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end foto -->

</div>
@endsection