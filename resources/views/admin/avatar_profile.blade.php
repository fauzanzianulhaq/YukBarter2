<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/avataradmin.css">
</head>
<body>
    <div class="main-container">
      <div class="sidebar bg-light border-right">
        <h4 class="p-3">YukBarter</h4>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="beranda"><i class="fas fa-home"></i> Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="validasi"><i class="fas fa-tasks"></i> Validasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kategori"><i class="fas fa-th-large"></i> Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rating"><i class="fas fa-star"></i> Rating</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile"><i class="fas fa-user"></i> Profil</a>
          </li>
        </ul>
      </div>
      <div class="profile-container">
        <div class="profile-header">
          <div style="margin-right: 650px">
            <div class="profile-info" style="margin-right: 90px">
                <img src="https://via.placeholder.com/80" alt="User Avatar" class="avatar">
                <div class="profile-details">
                    <h3>{{ $admin->name ?? 'Tidak Ada Nama' }}</h3>
                    <p>{{ $admin->email ?? 'Tidak Ada Email' }}</p>
                </div>
            </div>
            <div class="profile-tabs">
                <a href="profile"><button class="tab">Profil</button></a>
                <button class="tab active">Avatar</button>
                <a href="profile-password"><button class="tab">Ubah Password</button></a>
            </div>
        </div>
        </div>
        
        <div class="profile-content">
            <div class="left-section">
                <p><strong>Nama</strong><br>{{ $admin->name ?? 'Tidak Ada Nama' }}</p>
                <p><strong>Email</strong><br>{{ $admin->email ?? 'Tidak Ada Email' }}</p>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                <div class="button-group">
                  <button class="resett-button">Logout</button>
              </div>
                </form>
            </div>
            
            <div class="right-section">
                <img src="https://via.placeholder.com/80" alt="User Avatar" class="avatar" style="margin-left: 43%">
                <div class="button-group" style="margin-left: 130px">
                    <button class="cancel-button"><img src="/images/upload.png" width="20px" class="img-button" style="margin-right: 10px;">Ubah Avatar</button>
                    <button class="save-button">Hapus</button>
                </div>
            </div>
        </div>
    </div>
      
    </div>
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
