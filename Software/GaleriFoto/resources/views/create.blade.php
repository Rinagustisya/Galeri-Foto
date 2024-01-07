@extends('layouts.master', ['title'=>'Tambah Foto'])

@section('content')
<div class="jumbotron">
   <div class="card">
      <div class="card-header">
         <i class="fas fa-plus-circle"></i> Tambah
      </div>
        <div class="card-body">
         <form action="" method="post" enctype="multipart/form-data">
            <div class="card col-12">
            <div class="row">
               <div class="card-body">
                     <label for="">Pilih Kategori Foto</label>
                        <select name="nama_album" id="nama_album" class="form-control">
                           <option value="Arsitektur">Arsitektur</option>
                           <option value="Dokumenter">Dokumenter</option>
                           <option value="Seni_rupa">Seni Rupa</option>
                           <option value="Fashion">Fashion</option>
                           <option value="Olahraga">Olahraga</option>
                           <option value="Makanan">Makanan</option>
                           <option value="Satwa_liar">Satwa Liar</option>
                           <option value="Hewan">Hewan</option>
                           <option value="Laut">Laut</option>
                           <option value="Perjalanan">Perjalanan</option>
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
                        <label for="">Nama User </label>
                           <input type="text" name="nama_lengkap" class="form-control" id="" value="" placeholder="Gisellma Firmansyah" readonly >
                     </div>
                  </div>
               </div>
            <!-- end input -->
            <div class="card col-12">
                  <div class="row">
                     <div class="card-body">
                           <label for="">Nama Foto</label>
                           <input type="text" name="judul_foto" class="form-control" id="" value="" placeholder="Nama Foto" >
                     </div>
                  </div>
               </div>
            <!-- end input -->
            <div class="card col-12">
               <div class="row">
                  <div class="card-body">
                     <label for="">Set Privasi Foto</label>
                     <select name="nama_album" id="nama_album" class="form-control">
                        <option value="Public">Public</option>
                              <option value="Private">Private</option>
                           </select>
                              @if ($errors->has('nama_album'))
                              <span class="text-danger text-left">{{ $errors->first('nama_album') }}</span>
                              @endif
                           </div>
                        </div>
                     </div>
                     <!-- end input -->
                     <div class="card col-12">
                           <div class="row">
                              <div class="card-body">
                                    <label for="">Deskripsi Foto</label>
                                    <textarea name="" id="" cols="20" rows="5" class="form-control" placeholder="Tambahkan Deskripsi Foto"></textarea>
                              </div>
                           </div>
                        </div>
                     <!-- end input -->
                     <div class="card col-12">
                        <div class="row">
                           <div class="card-body">
                                 <label for="">Upload Foto <i class="fas fa-upload"></i></label>
                                 <input type="file" name="" id="" class="form-control">
                           </div>
                        </div>
                     </div>
               <!-- end upload -->
                   <button type="submit" class="btn btn-primary">Submit</button>
               </form>
        </div>
   </div>
</div>
@endsection