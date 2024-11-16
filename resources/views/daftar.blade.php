<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/daftar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Daftar YukBarter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    {{-- ututu --}}
    <div class="register-container">
        <div class="register-box">
            <h2>Daftar</h2>
            <p>Sudah Memiliki Akun? <a href="login">Login Disini</a></p>
            <form action="{{ route('daftar.custom') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Nama">
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email">
                
                <label for="photo">Foto KTM</label>
                <input type="file" id="foto_ktm" name="foto_ktm" accept=".jpg,.jpeg,.png" required>
                <small>Hanya Mendukung Format JPG, JPEG, PNG Dengan Maksimal 1024x768px</small>
                
                <label for="password">Password</label>
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <span class="toggle-password">&#128065;</span>

                </div>
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
                <button type="submit" style="margin-top: 20px">Daftar</button>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
