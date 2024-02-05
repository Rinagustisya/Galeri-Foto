<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Galeri Foto</title>

  <!-- Google Font: Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" crossorigin="anonymous" />
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">

  <style>
    body {
      background-color: #FFFFFF;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: 'Poppins', sans-serif;
    }

    .card {
      width: 60%;
      padding: 40px 50px;
      background-color: #F5F3F3;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 2%;
      margin-bottom: 20px;
    }

    h3 {
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    p {
      text-align: center;
      margin-bottom: 40px;
    }

    form {
      text-align: center;
    }

    button {
      display: block;
      margin: 20px auto 0;
    }

    .text-akhir {
      text-align: center;
      margin-top: 20px;
    }

    .logo {
      position: absolute;
      top: 10px;
      left: 40px;
      display: flex;
      align-items: center;
    }

  .logo span {
        font-weight: bold;
        white-space: nowrap;
        font-size: 18px;
        margin-left: -30%;
        /* margin-right: 10px; Adjust the margin to move the text to the left */
      }

  </style>
</head>

<body>
<div class="logo" style="display: flex; align-items: center;">
    <i class="fas fa-images"></i>
    <span>Galeri Foto</span>
</div>

  <div class="card">
    <h3>Pertama Kali ke Galeri Foto?</h3>
    <p>Yuk, lengkapi data diri dan buat akun kamu!</p>

    <form action="{{ route('register.perform') }}" method="post">
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap" name="nama_lengkap">
            @error('nama_lengkap')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat">
            @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username">
            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="password" class="form-control" id="confirm-password" placeholder="Konfirmasi password" name="password_confirmation">
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Buat Akun</button>
    </form>

    <div class="text-akhir">
      <p>Sudah punya akun? <a href="{{route('login.show')}}">Kembali ke halaman login</a></p>
    </div>

  </div>

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>