@extends('layouts.master', ['title'=>'Dashboard'])

@section('content')
<div class="jumbotron">
   <div class="card align-items-center justify-content-center">
        <div class="card-body">
            <div style="background-color: #3498db; height: 5px; width: 50px; margin-bottom: 10px;"></div>
            <h3 style="color: black; font-weight: bold;">Selamat Datang, {{ Auth::user()->nama_lengkap }}</h3>
        </div>
   </div>

   <div class="card mt-3">
        <div class="card-body">
            <h3><strong>Foto Saya</strong></h3>
            <div class="container border p-3">
                <div class="row">
                    @if(count($fotos) > 0)
                        @foreach($fotos as $foto)
                            <div class="col-md-2 mb-3">
                                <div class="card" style="width: 100%; background-color: #BFACE2; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                                    <img src="{{ route('foto.saya', ['filename' => basename($foto->lokasi_file)]) }}" alt="gambar" class="card-img-top mx-auto my-3 mb-3 " style="width: 80px; height: 80px;">
                                    <div class="card-footer text-center">
                                        <p class="card-text">{{ $foto->judul_foto }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12 text-center">
                            <p style="font-style: italic;">Tidak ada data</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection