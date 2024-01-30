@extends('layouts.master', ['title'=>'Tambah Foto'])

@section('content')
<div class="jumbotron">
   <div class="card">
      <div class="card-header">
         <i class="fas fa-plus-circle"></i> Tambah
      </div>
        <div class="card-body">
         <form action="{{ route('data-gambar.store') }}" method="post" id="data-gambar-form" enctype="multipart/form-data">
         @csrf

            <!-- hidden -->
            @inject('carbon', 'Carbon\Carbon')
            <input type="hidden" name="tgl_unggah" id="tgl_unggah" value="{{ $carbon::now()->format('m/d/Y') }}">
            <!-- end hidden -->

            <div class="card col-12">
            <div class="row">
               <div class="card-body">
                     <label for="nama_album">Pilih Kategori Foto</label>
                        <select name="nama_album" id="nama_album" class="form-control">
                           <option value="Arsitektur">Arsitektur</option>
                           <option value="Dokumenter">Dokumenter</option>
                           <option value="Seni rupa">Seni Rupa</option>
                           <option value="Fashion">Fashion</option>
                           <option value="Olahraga">Olahraga</option>
                           <option value="Makanan">Makanan</option>
                           <option value="Satwa liar">Satwa Liar</option>
                           <option value="Hewan">Hewan</option>
                           <option value="Laut">Laut</option>
                           <option value="Perjalanan">Perjalanan</option>
                           <option value="Lainnya">Lainnya</option>
                        </select>
                        @if ($errors->has('nama_album'))
                           <span class="text-danger text-left">{{ $errors->first('nama_album') }}</span>
                        @endif
                  </div>
               </div>
            </div>
            <!-- end select -->
            <div class="card col-12">
               <div class="row">
                  <div class="card-body">

                  </div>
               </div>
            </div>
            <!-- form lainnya  -->
            <div class="card col-12">
                  <div class="row">
                     <div class="card-body">
                        <label for="nama_lengkap">Nama User </label>
                           <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="{{ Auth::user()->nama_lengkap }}" readonly >
                           @if ($errors->has('nama_lengkap'))
                           <span class="text-danger text-left">{{ $errors->first('nama_lengkap') }}</span>
                           @endif
                     </div>
                  </div>
               </div>
            <!-- end input -->
            <div class="card col-12">
                  <div class="row">
                     <div class="card-body">
                           <label for="judul_foto">Nama Foto</label>
                           <input type="text" name="judul_foto" class="form-control" id="judul_foto" value="" placeholder="Nama Foto" >
                           @if ($errors->has('judul_foto'))
                           <span class="text-danger text-left">{{ $errors->first('judul_foto') }}</span>
                           @endif
                     </div>
                  </div>
               </div>
            <!-- end input -->
            <div class="card col-12">
               <div class="row">
                  <div class="card-body">
                     <label for="privasi">Set Privasi Foto</label>
                     <select name="privasi" id="privasi" class="form-control">
                              <option value="Public">Public</option>
                              <option value="Private">Private</option>
                           </select>
                              @if ($errors->has('privasi'))
                              <span class="text-danger text-left">{{ $errors->first('privasi') }}</span>
                              @endif
                           </div>
                        </div>
                     </div>
                     <!-- end input -->
                     <div class="card col-12">
                           <div class="row">
                              <div class="card-body">
                                    <label for="deskripsi_foto">Deskripsi Foto</label>
                                    <textarea name="deskripsi_foto" id="deskripsi_foto" cols="20" rows="5" class="form-control" placeholder="Tambahkan Deskripsi Foto"></textarea>
                                    @if ($errors->has('deskripsi_foto'))
                                    <span class="text-danger text-left">{{ $errors->first('deskripsi_foto') }}</span>
                                    @endif
                              </div>
                           </div>
                        </div>
                     <!-- end input -->
                     <div class="card col-12">
                        <div class="row">
                           <div class="card-body">
                                 <label for="lokasi_file">Upload Foto <i class="fas fa-upload"></i></label>
                                 <input type="file" name="lokasi_file" id="lokasi_file" class="form-control">
                           </div>
                        </div>
                     </div>
               <!-- end upload -->
                   <button type="submit" class="btn btn-success btn-block">Submit</button>
               </form>
        </div>
   </div>
</div>

<!-- <script>
      document.addEventListener('DOMContentLoaded', function () {
         const form = document.getElementById('data-gambar-form');

         form.addEventListener('submit', function (event) {
               // Get the current date and time in the desired format
               const currentDate = new Date();
               const formattedDate = currentDate.toISOString().slice(0, 19).replace('T', ' ');

               // Set the value of the hidden input field 'tgl_unggah' with the formatted date
               document.getElementById('tgl_unggah').value = formattedDate;
         });
      });
</script> -->
@endsection