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
                    <button class="like-button" @if($foto) data-foto-id="{{ $foto->id }}" @endif data-user-id="{{ auth()->user()->id }}">
                        <i class="fas fa-heart"></i> Like
                    </button>
                    <a href=""><i class="far fa-comments"></i></a>
                    <div class="custom-margin">
                        <p id="liked-by-text">Disukai oleh: 
                            @foreach ($foto->likes as $like)
                                {{ $like->user->name }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </p>
                    </div>
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

@push('like')
<script>
   $(document).ready(function () {
        $('.like-button').on('click', function () {
            var fotoId = $(this).data('foto-id');
            var userId = $(this).data('user-id');
            var button = $(this);

            $.ajax({
                type: 'POST',
                url: '/like-foto',
                data: {
                    foto_id: fotoId,
                    user_id: userId
                },
                success: function (response) {
                    console.log(response.message);

                    // Perbarui teks "Disukai oleh" di dalam elemen dengan id "liked-by-text"
                    var liked_by = response.liked_by.join(', ');
                    $('#liked-by-text').text('Disukai oleh: ' + liked_by);

                    button.toggleClass('liked');
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
@endpush