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
                    <form action="{{ route('home') }}" method="GET" id="categoryForm">
                        <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                            Kategori
                        </button>
                        <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" data-category="Arsitektur">Arsitektur</a>
                            <a class="dropdown-item" href="#" data-category="Dokumenter">Dokumenter</a>
                            <a class="dropdown-item" href="#" data-category="Seni Rupa">Seni Rupa</a>
                            <a class="dropdown-item" href="#" data-category="Fashion">Fashion</a>
                            <a class="dropdown-item" href="#" data-category="Olahraga">Olahraga</a>
                            <a class="dropdown-item" href="#" data-category="Makanan">Makanan</a>
                            <a class="dropdown-item" href="#" data-category="Satwa Liar">Satwa Liar</a>
                            <a class="dropdown-item" href="#" data-category="Hewan">Hewan</a>
                            <a class="dropdown-item" href="#" data-category="Laut">Laut</a>
                            <a class="dropdown-item" href="#" data-category="Perjalanan">Perjalanan</a>
                            <a class="dropdown-item" href="#" data-category="Lainnya">Lainnya</a>
                        </div>
                        <input type="hidden" name="category" id="selectedCategory" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Foto Terbaru -->
    <div class="card">
        <div class="card-body">
            <h3><strong>Foto Terbaru</strong></h3>
            <div class="container border p-3">
            @if(count($fotos) > 0)
                @foreach($fotos as $foto)
                    <div class="container p-3" id="container-{{ $foto->id }}">
                            <h5 class="nama-user-h5" style="position: relative;">
                                <b>{{ optional($foto->user)->nama_lengkap ?? 'No Name' }}</b>
                                <span class="badge badge-pill badge-info" style="position: absolute; top: 0; right: 0;">
                                    {{ $foto->album->nama_album }}
                                </span>
                            </h5>
                        <div class="img-container">
                            <img src="{{ route('all.foto', ['filename' => basename($foto->lokasi_file)]) }}" alt="gambar" class="img-fluid" style="height: 300px;">
                        </div>
                        @auth  
                            <button class="like-button" @if($foto) data-foto-id="{{ $foto->id }}" @endif data-user-id="{{ auth()->user()->id }}">
                                <i class="far fa-heart"></i> Like
                            </button>
                            <button class="comment-button" @if($foto) data-foto-id="{{ $foto->id }}" @endif data-user-id="{{ auth()->user()->id }}" onclick="commentButtonClicked()">
                                <i class="far fa-comment"></i> Comment
                            </button>
                        @else
                            <button class="like-button" onclick="likeButtonClicked()">
                                <i class="far fa-heart"></i> Like
                            </button>
                            <button class="comment-button" onclick="commentButtonClicked()">
                                <i class="far fa-comment"></i> Comment
                            </button>
                        @endauth
                        <div class="custom-margin">
                            <p class="liked-by-text">Disukai oleh: 
                            @foreach ($foto->likes as $like)
                                {{ $like->user->username }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                            </p>
                        </div>
                        <div class="custom-margin"><b>{{ $foto->judul_foto }}</b></div>
                        <div class="custom-margin">{{ $foto->deskripsi_foto }}</div>
                    </div>
                @endforeach
            @else
                <p style="text-align: center; font-style: italic;">Tidak ada data</p>
            @endif
            </div>
        </div>
    <!-- end foto -->
    </div> 
</div>

<!-- modal -->
<div class="comment-modal" id="commentModal">
    <div class="modal-content small-modal">
        <span class="close" onclick="closeCommentModal()">&times;</span>
        <h4>Comment on Photo</h4>
        
        @if(count($fotos) > 0)
            <form id="commentForm" method="POST" action="{{ route('komentar') }}">
                @csrf

                <div class="form-group">
                    <label for="comment">Your Comment:</label>
                    <textarea name="isi_komentar" id="comment" class="form-control" placeholder="Tulis Komentarmu..." rows="3"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <!-- hidden -->
                @inject('carbon', 'Carbon\Carbon')
                @auth
                    <input type="hidden" name="tgl_komentar" value="{{ $carbon::now()->format('m/d/Y') }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    @if(count($fotos) > 0)
                        <input type="hidden" name="foto_id" value="{{ $fotos[0]->id }}">
                    @endif
                @endauth
                <!-- end hidden -->
            </form>
            <div id="container-{{ $foto->id }}" class="custom-margin">
                    <div class="komentar-container">
                        <span class="komentar-title">Komentar:</span>
                            <ul class="custom-ul">
                                @foreach($foto->komentar as $comment)
                                    <li>{{ $comment->user->username }}:&ensp;{{ $comment->isi_komentar }}</li>
                                @endforeach
                            </ul>
                    </div>
            </div>
        @else
            <p class="text-center font-italic">Tidak ada data untuk komentar</p>
        @endif
    </div>
</div>

@endsection

@push('like')
<script>
    @auth
    $(document).ready(function () {
        $('.like-button').on('click', function () {
            var fotoId = $(this).data('foto-id');
            var userId = $(this).data('user-id');
            var button = $(this);
            var isLiked = button.hasClass('liked');

            $.ajax({
                type: 'POST',
                url: '/like-foto',
                data: {
                    _token: '{{ csrf_token() }}',
                    foto_id: fotoId,
                    user_id: userId,
                    unlike: isLiked
                },
                success: function (response) {
                    console.log(response.message);

                    button.toggleClass('liked', !isLiked);

                    var likedByUsers = response.liked_by;
                    var currentUserID = '{{ auth()->id() }}';

                    var userHasLiked = likedByUsers.includes(currentUserID);
                    var likedByText;
                    var likedByText = "Disukai oleh: " + (likedByUsers.length>0 ? likedByUsers.join(', ') : "-");

                    $(`#container-${fotoId} .liked-by-text`).text(likedByText);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
});
@endauth
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

    window.onclick = function (event) {
        var commentModal = document.getElementById('commentModal');
        if (event.target === commentModal) {
            commentModal.style.display = 'none';
        }
    };
</script>
@endpush

@push('daftar-komen')
<script>
    $(document).ready(function () {
        $('.comment-button').on('click', function () {
            var fotoId = $(this).data('foto-id');
            var userId = $(this).data('user-id');
            var commentText = $('#comment-' + fotoId).val();
            var container = $('#container-' + fotoId);

            $.ajax({
                type: 'POST',
                url: '/komen',
                data: {
                    foto_id: fotoId,
                    user_id: userId,
                    isi_komentar: commentText
                },
                success: function (response) {
                    console.log(response.message);
                    var newComment = response.new_comment;
                    container.find('.comments-container').append(
                        '<li>' + newComment.user.username + ': ' + newComment.isi_komentar + '</li>'
                    );
                    $('#comment-' + fotoId).val('');
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
@endpush

@push('kategori')
<script>
$(document).ready(function () {
    $('.dropdown-item').click(function (e) {
        e.preventDefault();
        var selectedCategory = $(this).data('category');
        console.log('Selected Category:', selectedCategory);
        $('#dropdownMenuButton').text(selectedCategory);
        $('#selectedCategory').val(selectedCategory);
        $('#categoryForm').submit();
    });
});

$(document).ready(function () {
        var categoryFilter = '{{ $categoryFilter }}';
        if (categoryFilter) {
            $('#dropdownMenuButton').text(categoryFilter);
            $('#selectedCategory').val(categoryFilter);
        }
    });
</script>
@endpush