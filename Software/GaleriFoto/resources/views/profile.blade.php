@extends('layouts.master', ['title'=>'Data Foto'])

@section('content')
<div class="jumbotron">
   <h4><b>Profil</b></h4>
   <form action="" method="post" enctype="multipart/form-data">
      <div class="card">
         <div class="card-body">
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Nama Lengkap</label>
                              <input type="text" name="nama_lengkap" class="form-control" id="" value="{{ Auth::user()->nama_lengkap }}" placeholder="Nama Lengkap" >
                        </div>
                     </div>
                  </div>
                  <!-- end input 1 -->
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Username</label>
                              <input type="text" name="username" class="form-control" id="" value="{{ Auth::user()->username }}" placeholder="Username" >
                        </div>
                     </div>
                  </div>
                  <!-- end input 2 -->
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Email</label>
                              <input type="text" name="email" class="form-control" id="" value="{{ Auth::user()->email }}" placeholder="email" >
                        </div>
                     </div>
                  </div>
                  <!-- end input 3 -->
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Alamat</label>
                              <input type="text" name="alamat" class="form-control" id="" value="{{ Auth::user()->alamat }}" placeholder="Alamat" >
                        </div>
                     </div>
                  </div>
                  <!-- end input 4 -->
                  <button type="submit" class="btn btn-primary btn-block">Ubah Profil</button>
         </div>
      </div>
   </form>

   <h4><b>Edit Password</b></h4>
   <form action="" method="post" enctype="multipart/form-data">
      <div class="card">
         <div class="card-body">
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Password</label>
                              <input type="password" name="password" class="form-control" id="" placeholder="Masukan Password Baru" >
                        </div>
                     </div>
                  </div>
                  <!-- end input 1 -->
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Konfirmasi Password</label>
                              <input type="password" name="password_confirmation" class="form-control" id="" placeholder="Konfirmasikan Password" >
                        </div>
                     </div>
                  </div>
                  <!-- end input 2 -->
                  <button type="submit" class="btn btn-danger btn-block">Ubah Password</button>
         </div>
      </div>
   </form>
</div>
@endsection