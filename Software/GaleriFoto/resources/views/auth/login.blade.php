<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Galeri Foto</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

    <style>
        /* keseluruhan login */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            height: 100vh;
        }

        /* sisi kiri(yang ada formnya) */
        .left-side {
            background-color: #fff;
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }


        /* form login keseluruhan */
        .login-form {
            text-align: center;
            margin-top: 20px;
        }

        /* Tulisan Login ke galeri foto */
        .app-name {
            font-size: 20px;
            font-weight: 600;
        }

        /* keseluruhan username & password */
        .login-form form {
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }

        .input-container1,
        .input-container2 {
            position: relative;
        }

        /* input username & password */
        .login-form input {
            padding: 12px 50px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            color: #000000;
            /* Text color */
            font-size: 14px;
            background-color: #F1EFEF;
            transition: border 0.3s;
            /* Add transition for border color change */
        }

        /* input username & password */
        .login-form input:focus {
            border: none;
            /* border: solid #007BFF; Change border color on focus */
            outline: none;
        }

        .login-form input::placeholder {
            color: #000000;
        }

        /* icon username & password */
        .input-container1 .icon {
            position: absolute;
            top: 38%;
            left: 8%;
            transform: translateY(-50%);
        }

        /* icon username & password */
        .input-container2 .icon {
            position: absolute;
            top: 26%;
            left: 9%;
            transform: translateY(-50%);
        }


        /* button login */
        .login-form button {
            margin-top: 10px;
            margin-right: 20px;
            padding: 12px px;
            margin-bottom: 15px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            background-color: #F1EFEF;
            color: #fff;
            background-color: #7077A1;
            cursor: pointer;
        }

        /* hover login */
        .login-form button:hover {
            background-color: #F6B17A;
        }

        /* ceklis lihat password */
        .show-password-checkbox {
            margin-right: 50%;
            margin-top: -6%;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .show-password-checkbox input {
            margin-top: 15px;
            margin-right: 5px;
        }

        /* sisi kanan ada welcomenya */
        .right-side {
            background-color: #f0f0f0;
            flex: 0.7;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 100vh;
        }

        /* letak dua button */
        .register-section {
            text-align: center;
            margin-top: 20px;
        }

        /* dua button */
        .register-section button {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        /* hover buat akun */
        .register-section button:first-child {
            background-color: #2D3250;
            color: #fff;
            margin-right: 10px;
        }

        /* hover back */
        .register-section button:last-child {
            background-color: #7077A1;
            color: #fff;
        }

        /* logo */
        .left-side .logo {
            position: absolute;
            top: 10px;
            left: 40px;
        }


        @keyframes fallIn {
            from {
                transform: translateY(-100vh);
            }

            to {
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(60%);
            }

            to {
                transform: translateX(0);
            }
        }
    </style>

</head>

<div class="left-side">
    <div class="logo">
        <img src="{{ url('logo.png') }}" alt="Logo" style="height: 65px;">
        <span>Galeri Foto</span>
    </div>

    <div class="login-form">
        <div class="app-name" style="font-weight: bold;">Login ke Galeri Foto</div>
        <p>masuk dengan akun anda</p>
        <form action="{{ route('login.perform') }}" method="post">
            @csrf
            <!-- form login -->
            <div class="input-container1">
                <i class="fas fa-at icon"></i>
                <input type="text" placeholder="Username" name="username">
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="input-container2">
                <i class="fas fa-lock icon"></i>
                <input type="password" id="passwordInput" placeholder="Password" name="password">
                <div class="show-password-checkbox">
                    <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password
                </div>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-block">Login</button>
        </form>
    </div>
</div>

<div class="right-side">
    <div class="welcome-section" style="transform: translateY(-100vh); animation: fallIn 1s ease-in-out forwards;">
        <h3 style="font-weight: bold;">Hallo, Selamat Datang!</h3>
        Masukkan akun lengkap Anda dan <br>
        mulai gunakan aplikasi. <br>
        Belum punya akun?
    </div>

    <div class="register-section" style="transform: translateX(100%); animation: slideIn 1s ease-in-out forwards;">
        <button type="button" onclick="window.location.href='{{ route('register.show') }}'">Buat Akun</button>
        <button type="button" onclick="window.location.href='{{ route('home') }}'">Home</button>
    </div>
</div>

<!-- javascript show password uhuy -->

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("passwordInput");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>


<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>