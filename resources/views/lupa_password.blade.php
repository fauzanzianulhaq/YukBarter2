{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Lupa Password YukBarter</title>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="logo" style="margin-right: 140px">
                <img src="/images/logo2.png" alt="YukBarter" class="logo-img">
                <h1 class="logo-text">Yuk<span>Barter</span></h1>
            </div>
            <h2>Lupa Password</h2>
            <p>Masukkan email Anda untuk menerima link reset password.</p>
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                
                @if (session('status'))
                    <div class="alert alert-success" style="text-align: left;">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="validasi-forgot-password-act" ><button type="submit">Kirim Link Reset</button></a>
            </form>
            <div class="register-link">
                <a href="/login">Kembali ke Login</a>
            </div>
        </div>
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" placeholder="Enter your email">
        <button type="submit">Send Reset Link</button>
    </form>
</body>
</html>

