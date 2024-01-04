<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Galeri Foto</title>

    <!-- Google Font: Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        display: flex;
        height: 100vh;
    }

    .left-side {
        flex: 1;
        background-color: #fff;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center; /* Center horizontally */
        justify-content: center; /* Center vertically */
        text-align: center; /* Center text */
    }

    .right-side {
        flex: 0.7;
        background-color: #f0f0f0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center; /* Center horizontally */
        justify-content: center; /* Center vertically */
        text-align: center; /* Center text */
    }

    .app-name {
        font-size: 20px;
        font-weight: 600;
    }

    .login-form {
        text-align: center;
        margin-top: 20px; /* Add margin to separate the logo and form */
    }

    .login-form form {
        width: 100%; /* Set the form width to 100% */
        max-width: 300px; /* Set a maximum width for better readability */
        margin: 0 auto; /* Center the form horizontally */
    }

    .login-form input,
    .login-form button {
        margin-bottom: 10px;
    }

    .register-section {
        text-align: center;
        margin-top: 20px;
    }

    .left-side .logo {
        position: absolute;
        top: 10px;
        left: 40px;
    }
</style>



</head>

<body>
    <div class="left-side">
        <div class="logo">
            <img src="path/to/your/logo.png" >
            <span>Galeri Foto</span>
        </div>

        <div class="login-form">
        <div class="app-name">Login ke Galeri Foto</div>
            <p>masuk dengan akun anda</p>
            <form>
                <!-- Your login form here -->
                <div>
                    <input type="text" placeholder="Username">
                </div>
                <div>
                    <input type="password" placeholder="Password">
                </div>
                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

    <div class="right-side">
        <div>
            <h2>Hallo, Selamat Datang!</h2>
          Masukkan akun lengkap Anda dan <br>
            mulai gunakan aplikasi. <br>
            Belum punya akun?
 
        </div>

        <div class="register-section">
            <button>Buat Akun</button>
            <button>Back</button>
        </div>
    </div>
</body>

</html>
