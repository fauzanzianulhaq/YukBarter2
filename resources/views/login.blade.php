<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login YukBarter</title>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="logo" style="margin-right: 140px">
                <img src="/images/logo2.png" alt="YukBarter" class="logo-img" width="">
                <h1 class="logo-text">Yuk<span>Barter</span></h1>
            </div>
            <h2>Masuk Akun</h2>
            <p>Masuk dan mulailah barter barang anda!</p>
            <form action="{{ route('custom.login') }}" method="post">
                @csrf
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="toggle-password">&#128065;</span>
                </div>
                
                {{-- <div class="remember-forgot">
                    <label><input type="checkbox"> Ingat Saya?</label>
                    <a href="password/reset">Lupa Password?</a>
                </div> --}}
                
                <button name="submit" type="submit">Masuk</button>
            </form>
            <div class="register-link">
                Belum Punya Akun? <a href="daftar">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</body>
</html>
