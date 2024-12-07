<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            overflow-x: hidden;
        }

        .main-container {
            display: flex;
            flex-wrap: wrap;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar .logo_atas {
            max-width: 190px;
            margin: 20px 15px 10px;
        }

        .sidebar .nav-link {
            font-size: 1.1rem;
            color: #333;
            padding: 10px 15px;
        }

        .sidebar .nav-link:hover {
            background-color: #f1f1f1;
            color: #007bff;
        }

        .profile-container {
            width: 100%;
            max-width: 1110px;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-left: 30px;
        }

        .profile-header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .profile-tabs {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .tab {
            background: none;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            padding: 5px 10px;
        }

        .tab.active {
            border-bottom: 3px solid #ffcc00;
        }

        .profile-content {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .left-section,
        .right-section {
            width: 100%;
            padding: 20px;
        }

        .right-section {
            border-top: 1px solid #ddd;
        }

        .resett-button,
        .save-button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .resett-button {
            background-color: #ff4d4d;
            color: #ffffff;
        }

        .save-button {
            background-color: #333;
            color: #fff;
        }

        @media (min-width: 768px) {
            .main-container {
                padding-left: 250px;
            }

            .profile-content {
                display: flex;
            }

            .left-section,
            .right-section {
                width: 50%;
            }

            .right-section {
                border-left: 1px solid #ddd;
            }
        }

        @media (max-width: 767px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }
        }
        /* Aturan default untuk desktop */
.sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    transition: transform 0.3s ease;
    background-color: #f8f9fa; /* Warna latar sidebar */
}

/* Sidebar dalam keadaan tersembunyi untuk layar kecil */
.sidebar.hidden {
    transform: translateX(-100%);
}

/* Aturan untuk perangkat kecil */
@media (max-width: 767px) {
    .sidebar {
        position: fixed;
        width: 250px;
        transform: translateX(-100%);
        z-index: 1050;
    }

    .sidebar.show {
        transform: translateX(0);
    }

    /* Atur ulang margin konten */
    .content {
        margin-left: 0;
    }
}

    </style>
</head>
<body>
    <div class="main-container">
        <div class="sidebar bg-light border-right">
            <img src="/images/logo_yukbarter.png" alt="" class="logo_atas">
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
                <div class="profile-tabs">
                    <a href="profile"><button class="tab">Profil</button></a>
                    <button class="tab active">Ubah Password</button>
                </div>
            </div>
            
            <div class="profile-content">
                <div class="left-section">
                    <p><strong>Nama</strong><br>{{ $user->name ?? 'Tidak Ada Nama' }}</p>
                    <p><strong>Email</strong><br>{{ $user->email ?? 'Tidak Ada Email' }}</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="resett-button">Logout</button>
                    </form>
                </div>
                <div class="right-section">
                    <form action="{{ route('updatePasswordUser') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="current-password">Password Saat Ini</label>
                            <input type="password" id="current-password" name="current_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="new-password">Password Baru</label>
                            <input type="password" id="new-password" name="new_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Konfirmasi Password</label>
                            <input type="password" id="confirm-password" name="new_password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="save-button">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
        // Optional: Add a mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Create mobile menu toggle button
            const menuToggle = document.createElement('button');
            menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
            menuToggle.classList.add('btn', 'btn-outline-secondary', 'd-md-none');
            menuToggle.style.position = 'fixed';
            menuToggle.style.top = '10px';
            menuToggle.style.left = '10px';
            menuToggle.style.zIndex = '1100';
            
            menuToggle.addEventListener('click', function() {
                const sidebar = document.querySelector('.sidebar');
                sidebar.classList.toggle('show');
            });

            document.body.prepend(menuToggle);

            // Close sidebar when clicking outside
            document.addEventListener('click', function(event) {
                const sidebar = document.querySelector('.sidebar');
                const menuToggle = document.querySelector('button');
                
                if (!sidebar.contains(event.target) && 
                    !menuToggle.contains(event.target) && 
                    sidebar.classList.contains('show') && 
                    window.innerWidth < 768) {
                    sidebar.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>
