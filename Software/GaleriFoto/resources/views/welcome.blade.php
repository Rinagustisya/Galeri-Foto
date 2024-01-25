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
                    @auth  
                        <button class="like-button" @if($foto) data-foto-id="{{ $foto->id }}" @endif data-user-id="{{ auth()->user()->id }}">
                            <i class="fas fa-heart"></i> Like
                        </button>
                        <button class="comment-button" @if($foto) data-foto-id="{{ $foto->id }}" @endif data-user-id="{{ auth()->user()->id }}" onclick="commentButtonClicked()">
                            <i class="far fa-comments"></i> Comment
                        </button>
                    @else
                        <button class="like-button" onclick="likeButtonClicked()">
                            <i class="fas fa-heart"></i> Like
                        </button>
                        <button class="comment-button" onclick="commentButtonClicked()">
                            <i class="far fa-comments"></i> Comment
                        </button>
                    @endauth
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

<!-- modal -->
<div class="comment-modal" id="commentModal">
    <div class="modal-content">
        <span class="close" onclick="closeCommentModal()">&times;</span>
        <h2>Comment on Photo</h2>
        <form id="commentForm" method="POST" action="{{ route('komentar') }}">
            <!-- hidden -->
            @inject('carbon', 'Carbon\Carbon')
            <input type="hidden" name="tgl_komentar" id="tgl_komentar" value="{{ $carbon::now()->format('m/d/Y') }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="foto_id" value="{{ $foto->id }}">
            <!-- end hidden -->
            <textarea name="isi_komentar" id="comment" placeholder="Write your comment" cols="20" rows="5"></textarea>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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

@push('sweet')
<script>
    function likeButtonClicked() {
        Swal.fire({
            icon: 'warning',
            title: 'Login Required',
            text: 'You need to log in to like this photo.',
            showCancelButton: true,
            confirmButtonText: 'Log In',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('login.show') }}';
            }
        });
    }

    function commentButtonClicked() {
        @auth
        var fotoId = document.querySelector('.comment-button').getAttribute('data-foto-id');
        console.log('Foto ID:', fotoId);
        openCommentModal();
        @else
            Swal.fire({
                icon: 'info',
                title: 'Login Required',
                text: 'You need to log in to comment on this photo.',
                showCancelButton: true,
                confirmButtonText: 'Log In',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('login.show') }}';
                }
            });
        @endauth
    }
</script>
@endpush

@push('komen')
<script>
    function openCommentModal() {
        var commentModal = document.getElementById('commentModal');
        if (commentModal) {
            commentModal.style.display = 'block';
        }
    }

    function closeCommentModal() {
        var commentModal = document.getElementById('commentModal');
        if (commentModal) {
            commentModal.style.display = 'none';
        }
    }

    // Close the modal if the user clicks outside the modal content
    window.onclick = function (event) {
        var commentModal = document.getElementById('commentModal');
        if (event.target === commentModal) {
            commentModal.style.display = 'none';
        }
    };
</script>
@endpush