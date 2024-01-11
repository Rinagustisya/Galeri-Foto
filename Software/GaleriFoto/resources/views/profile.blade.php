@extends('layouts.master', ['title'=>'Profile'])

@section('content')
<div class="jumbotron">
   <h4><b>Profil</b></h4>
   <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
      <div class="card">
         <div class="card-body">
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Nama Lengkap</label>
                              <input type="text" name="nama_lengkap" class="form-control" id="" value="{{ Auth::user()->nama_lengkap }}" placeholder="Nama Lengkap" >
                              @if ($errors->has('nama_lengkap'))
                              <span class="text-danger text-left">{{ $errors->first('nama_lengkap') }}</span>
                              @endif
                        </div>
                     </div>
                  </div>
                  <!-- end input 1 -->
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Username</label>
                              <input type="text" name="username" class="form-control" id="" value="{{ Auth::user()->username }}" placeholder="Username" >
                              @if ($errors->has('username'))
                              <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                              @endif
                        </div>
                     </div>
                  </div>
                  <!-- end input 2 -->
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Email</label>
                              <input type="text" name="email" class="form-control" id="" value="{{ Auth::user()->email }}" placeholder="email" >
                              @if ($errors->has('email'))
                              <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                              @endif
                        </div>
                     </div>
                  </div>
                  <!-- end input 3 -->
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Alamat</label>
                              <input type="text" name="alamat" class="form-control" id="" value="{{ Auth::user()->alamat }}" placeholder="Alamat" >
                              @if ($errors->has('alamat'))
                              <span class="text-danger text-left">{{ $errors->first('alamat') }}</span>
                              @endif
                        </div>
                     </div>
                  </div>
                  <!-- end input 4 -->
                  <button type="submit" class="btn btn-primary btn-block">Ubah Profil</button>
         </div>
      </div>
   </form>

   <h4><b>Edit Password</b></h4>
   <form action="{{ route('profile.updatePassword') }}" method="post" enctype="multipart/form-data">
      <div class="card">
         <div class="card-body">
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Password</label>
                              <input type="password" name="password" class="form-control" id="" placeholder="Masukan Password Baru" >
                              @if ($errors->has('password'))
                              <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                              @endif
                        </div>
                     </div>
                  </div>
                  <!-- end input 1 -->
                  <div class="card col-12">
                     <div class="row">
                        <div class="card-body">
                              <label for="">Konfirmasi Password</label>
                              <input type="password" name="password_confirmation" class="form-control" id="" placeholder="Konfirmasikan Password" >
                              @if ($errors->has('password_confirmation'))
                              <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                              @endif
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