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
                <div class="container p-3" id="latest-entry-container">
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- end foto -->

</div>
@endsection

@push('realtime')
<script>
    const eventSource = new EventSource("{{ route('sse.stream') }}");
    const authenticatedUserName = '{{ Auth::user()->nama_lengkap }}';

    eventSource.onmessage = function (event) {
        const latestEntry = JSON.parse(event.data);
        updateLatestEntry(latestEntry, authenticatedUserName);
    };

    function updateLatestEntry(entry, authenticatedUserName) {
        try {
            if (entry && entry.user && entry.user.nama_lengkap) {
                const container = document.getElementById('latest-entry-container');
                container.innerHTML = `
                        <h5 class="nama-user-h5">Nama User: ${authenticatedUserName}</h5>
                        <div class="img-container">
                            <img src="${entry.lokasi_file}" alt="gambar" class="img-fluid" style="height: 300px;">
                        </div>
                        <div class="custom-margin"><b>Kategori :</b> ${entry.album.nama_album}</div>
                        <div class="custom-margin"><b>Deskripsi :</b> ${entry.deskripsi_foto}</div>
                `;
            } else {
                throw new Error("Invalid entry structure");
            }
        } catch (error) {
            console.error(error.message, entry);
        }
    }
</script>

<!-- <script>
    const eventSource = new EventSource("{{ route('sse.stream') }}");
    const userNamaLengkap = '{{ Auth::user()->nama_lengkap }}';
    eventSource.onmessage = function (event) {
        const latestEntry = JSON.parse(event.data);
        updateLatestEntry(latestEntry);
    };

    function updateLatestEntry(entry) {
    try {
        if (entry && entry.user && entry.user.nama_lengkap) {
            // Update HTML content with the latest entry details
            const container = document.getElementById('latest-entry-container');
            container.innerHTML = `
                <div class="container p-3">
                    <h5 class="nama-user-h5">Nama User: ${entry.user.nama_lengkap}</h5>
                    <div class="img-container">
                        <img src="${entry.lokasi_file}" alt="gambar" class="img-fluid" style="height: 300px;">
                    </div>
                    <div class="custom-margin"><b>Kategori :</b> ${entry.album.nama_album}</div>
                    <div class="custom-margin"><b>Deskripsi :</b> ${entry.deskripsi_foto}</div>
                </div>
            `;
        } else {
            throw new Error("Invalid entry structure");
        }
    } catch (error) {
        console.error(error.message, entry);
    }
} -->
<!-- 
//     function updateLatestEntry(entry) {
//     if (entry) {
//         const container = document.getElementById('latest-entry-container');

//         if (entry.hasOwnProperty('user') && entry.user && entry.user.hasOwnProperty('nama_lengkap')) {
//             // Entry memiliki properti 'user' dan 'nama_lengkap' di dalamnya
//             container.innerHTML = `
//                 <div class="container p-3">
//                     <h5 class="nama-user-h5">Nama User: ${entry.user.nama_lengkap}</h5>
//                     <div class="img-container">
//                         <img src="${entry.lokasi_file}" alt="gambar" class="img-fluid" style="height: 300px;">
//                     </div>
//                     <div class="custom-margin"><b>Kategori :</b> ${entry.album.nama_album}</div>
//                     <div class="custom-margin"><b>Deskripsi :</b> ${entry.deskripsi_foto}</div>
//                 </div>
//             `;
//         } else {
//             // Entry tidak memiliki properti 'user' atau 'nama_lengkap'
//             console.error("Invalid entry structure:", entry);
//             // Clear the container if the entry structure is invalid
//             container.innerHTML = '';
//         }
//     }
// }

    // function updateLatestEntry(entry) {
    // console.log(entry);
    // if (entry && entry.user) {
    //     const user = entry.user; // Access the user object
    //     if (user && user.nama_lengkap) {
    //         // Update HTML content with the latest entry details
    //         const container = document.getElementById('latest-entry-container');
    //         container.innerHTML = `
    //             <div class="container p-3">
    //                 <h5 class="nama-user-h5">Nama User: ${user.nama_lengkap}</h5>
    //                 <div class="img-container">
    //                     <img src="${entry.lokasi_file}" alt="gambar" class="img-fluid" style="height: 300px;">
    //                 </div>
    //                 <div class="custom-margin"><b>Kategori :</b> ${entry.album.nama_album}</div>
    //                 <div class="custom-margin"><b>Deskripsi :</b> ${entry.deskripsi_foto}</div>
    //             </div>
    //         `;
    //     } else {
    //         console.error("Invalid user structure:", user);
    //     }
    // } else {
    //     console.error("Invalid entry structure:", entry);
    // }
//     if (entry && entry.hasOwnProperty('user') && entry.user && entry.user.hasOwnProperty('nama_lengkap')) {
//         // Update HTML content with the latest entry details
//         const container = document.getElementById('latest-entry-container');
//         container.innerHTML = `
//             <div class="container p-3">
//                 <h5 class="nama-user-h5">Nama User: ${entry.user.nama_lengkap}</h5>
//                 <div class="img-container">
//                     <img src="${entry.lokasi_file}" alt="gambar" class="img-fluid" style="height: 300px;">
//                 </div>
//                 <div class="custom-margin"><b>Kategori :</b> ${entry.album.nama_album}</div>
//                 <div class="custom-margin"><b>Deskripsi :</b> ${entry.deskripsi_foto}</div>
//             </div>
//         `;
//     } else {
//         console.error("Invalid entry structure:", entry);
//     }
// }

</script> -->
@endpush