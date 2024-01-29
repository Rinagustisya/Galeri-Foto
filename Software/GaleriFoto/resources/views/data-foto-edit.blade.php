@extends('layouts.master', ['title'=>'Data Foto Edit'])

@section('content')
<div class="jumbotron">
    <h3><b>Edit Postingan</b></h3>
   <form action="{{ route('data-gambar.update',['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
    @method('put')
        <!-- input hidden -->
        @inject('carbon', 'Carbon\Carbon')
        <input type="hidden" name="tgl_unggah" id="tgl_unggah" value="{{ $carbon::now()->format('m/d/Y') }}">

            <div class="card">
                <div class="card-body">
                        <div class="card col-12">
                            <div class="row">
                                <div class="card-body">
                                    <label for="">Nama User</label>
                                    <input type="text" class="form-control" id="" value="{{ Auth::user()->nama_lengkap }}" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- end input 1 -->
                        <div class="card col-12">
                            <div class="row">
                                <div class="card-body">
                                    <label for="">Kategori Foto</label>
                                    <select name="nama_album" id="nama_album" class="form-control">
                                    @foreach($albums as $album)
                                        <option value="{{ $album }}" {{ $data->nama_album == $album ? 'selected' : '' }}>
                                            {{ $album }}
                                        </option>
                                    @endforeach
                                        <option value="Arsitektur" {{ $data->nama_album == 'Arsitektur' ? 'selected' : '' }}>Arsitektur</option>
                                        <option value="Dokumenter" {{ $data->nama_album == 'Dokumenter' ? 'selected' : '' }}>Dokumenter</option>
                                        <option value="Seni_rupa" {{ $data->nama_album == 'Seni_rupa' ? 'selected' : '' }}>Seni Rupa</option>
                                        <option value="Fashion" {{ $data->nama_album == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                        <option value="Olahraga" {{ $data->nama_album == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                                        <option value="Makanan" {{ $data->nama_album == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                                        <option value="Satwa_liar" {{ $data->nama_album == 'Satwa_liar' ? 'selected' : '' }}>Satwa Liar</option>
                                        <option value="Hewan" {{ $data->nama_album == 'Hewan' ? 'selected' : '' }}>Hewan</option>
                                        <option value="Laut" {{ $data->nama_album == 'Laut' ? 'selected' : '' }}>Laut</option>
                                        <option value="Perjalanan" {{ $data->nama_album == 'Perjalanan' ? 'selected' : '' }}>Perjalanan</option>
                                    </select>
                                    @if ($errors->has('nama_album'))
                                    <span class="text-danger text-left">{{ $errors->first('nama_album') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end input 2 -->
                        <div class="card col-12">
                            <div class="row">
                                <div class="card-body">
                                    <label for="">Nama Foto</label>
                                    <input type="text"  class="form-control" id="" value="{{ $data->judul_foto }}" name="judul_foto" >
                                    @if ($errors->has('judul_foto'))
                                    <span class="text-danger text-left">{{ $errors->first('judul_foto') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end input 3 -->
                        <div class="card col-12">
                            <div class="row">
                                <div class="card-body">
                                    <label for="">Deskripsi Foto</label>
                                    <input type="text" class="form-control" id="" value="{{ $data->deskripsi_foto }}" name="deskripsi_foto" >
                                    @if ($errors->has('deskripsi_foto'))
                                    <span class="text-danger text-left">{{ $errors->first('deskripsi_foto') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end input 4 -->
                        <div class="card col-12">
                            <div class="row">
                                <div class="card-body">
                                    <label for="">Ubah Privasi Foto</label>
                                    <select name="privasi" id="privasi" class="form-control">
                                        <option value="Public" {{ $data->privasi == 'Public' ? 'selected' : '' }}>Public</option>
                                        <option value="Private" {{ $data->privasi == 'Private' ? 'selected' : '' }}>Private</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- end input 4 -->      
                        <div class="card col-12">
                            <div class="row">
                                <div class="card-body">
                                    <label for="">Foto</label>
                                    <br>
                                        <img src="{{ route('show.foto', ['filename' => basename($data->lokasi_file)]) }}" alt="gambar" class="img-fluid">
                                        <input type="file" name="lokasi_file" id="lokasi_file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- end input 4 -->
                        <button type="submit" class="btn btn-success btn-block">Simpan Perubahan</button>
                </div>
            </div>
   </form>
</div>
@endsection