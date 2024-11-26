<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Profil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/user/profileUser.css">
</head>
<body>
    <div class="main-container">
        <div class="sidebar bg-light border-right">
          <img src="/images/logo_yukbarter.png" alt="" width="190px" class="logo_atas">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="beranda"><i class="fas fa-home"></i> Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="jelajahi-barang"><i class="fas fa-search"></i> Jelajahi Barang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile"><i class="fas fa-user"></i> Profil</a>
              </li>
            </ul>
          </div>
      <div class="profile-container">
        <div class="profile-header">
          <div style="margin-right: 650px">
            {{-- <div class="profile-info" style="margin-right: 90px">
              <img src="{{ asset('storage/uploads/' . $user->foto_ktm) }}" alt="Image of avatar">
                <div class="profile-details">
                    <h3>{{ $user->name ?? 'Tidak Ada Nama' }}</h3>
                    <p>{{ $user->email ?? 'Tidak Ada Email' }}</p>
                </div>
            </div> --}}
            <div class="profile-tabs">
                <button class="tab active">Profil</button>
                {{-- <a href="profile-avatar"><button class="tab">Avatar</button></a> --}}
                <a href="profile-password"><button class="tab">Ubah Password</button></a>
            </div>
        </div>
        </div>
        
        <div class="profile-content">
            <div class="left-section">
                <p><strong>Nama</strong><br>{{ $user->name ?? 'Tidak Ada Nama' }}</p>
                <p><strong>Email</strong><br>{{ $user->email ?? 'Tidak Ada Email' }}</p>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                <div class="button-group">
                  <button class="resett-button">Logout</button>
              </div>
                </form>
            </div>
            
            <div class="right-section">
              <form action="{{ route('profile.updateName') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                </div>
                <button class="save-button" type="submit">Simpan</button>
            </form>
            </div>
        </div>
    </div>
      
    </div>
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
