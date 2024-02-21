<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Galeri Foto</title>

  <!-- Google Font: Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
      background-color: #BFACE2;
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

    .logo img {
    height: 50px; /* Adjust the height according to your needs */
    margin-right: 30%; /* Add margin to move the text to the right */
    }

    .logo span {
        font-weight: bold;
        white-space: nowrap;
        font-size: 18px;
        margin-left: -30%;
        /* margin-right: 10px; Adjust the margin to move the text to the left */
      }

     
    /* ... existing styles ... */
    .input-group-prepend span {
      width: 40px; /* Adjust the width as needed */
      text-align: center;
    }

  </style>
</head>

<body>
<div class="logo" style="display: flex; align-items: center;">
    <img src="{{ url('logo.png') }}" alt="Logo" style="height: 65px;">
    <span>Galeri Foto</span>
</div>

  <div class="card">
    <h3>Pertama Kali ke Galeri Foto?</h3>
    <p>Yuk, lengkapi data diri dan buat akun kamu!</p>

    <form action="{{ route('register.perform') }}" method="post" id="form1">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap" name="nama_lengkap">
          </div>
          @error('nama_lengkap')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email">
          </div>
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
            </div>
            <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat">
          </div>
          @error('alamat')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username">
          </div>
          @error('username')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
            <div class="input-group-append">
              <span class="input-group-text toggle-password" style="background-color: #C7B7A3; color: white; cursor: pointer;"><i class="fas fa-eye"></i></span>
            </div>
          </div>
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" id="confirm-password" placeholder="Konfirmasi password"
              name="password_confirmation">
              <div class="input-group-append">
                <span class="input-group-text toggle-password" style="background-color: #C7B7A3; color: white; cursor: pointer;"><i class="fas fa-eye"></i></span>
              </div>
          </div>
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
  <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="..../dist/js/adminlte.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
  $(document).ready(function () {
    $('#form1').submit(function (event) {
      event.preventDefault();

      submitForm();
    });
  });

  function submitForm() {
    $.ajax({
      type: 'POST',
      url: $('#form1').attr('action'),
      data: $('#form1').serialize(),
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: 'Anda Berhasil Registrasi. Silahkan login!',
        }).then(function () {
          window.location.href = "{{ route('login.show') }}";
        });
      },
      error: function (xhr, status, error) {
        var errors = xhr.responseJSON.errors;
        var errorMessage = "";

        for (var key in errors) {
          errorMessage += errors[key][0] + "\n";
        }

        Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          text: errorMessage,
        });
      }
    });
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const togglePassword = document.querySelectorAll('.toggle-password');
      togglePassword.forEach(function (icon) {
        icon.addEventListener('click', function () {
          const passwordInput = icon.closest('.input-group').querySelector('input');
          const eyeIcon = icon.querySelector('i');

          if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
          } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
          }
        });
      });
    });
</script>

</body>

</html>
