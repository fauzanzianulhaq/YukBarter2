<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/detail_validasi.css">
    <style>
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px; /* Space between the buttons and rating input */
        }
        .action-buttons input {
            margin-bottom: 10px; /* Space below the rating input */
        }
        .card-body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="sidebar bg-light border-right">
            <h4 class="p-3">YukBarter</h4>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.beranda') }}"><i class="fas fa-home"></i> Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.validasi') }}"><i class="fas fa-tasks"></i> Validasi</a>
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

        <div class="main-content">
            <!-- Back Button - Positioned independently above the content -->
            <div class="back-button rounded-pill">
                <button class="btn btn-dark" onclick="history.back()">Kembali</button>
            </div>

            <!-- Detail Content Section -->
            <div class="content">
                <div class="container detail-container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Item Details Section -->
                                <div class="col-md-8 item-details">
                                    <p><strong>Nama User</strong> : {{ $barang->user->name ?? 'Tidak Ditemukan' }}</p>
                                    <p><strong>Nama Barang</strong> : {{ $barang->nama_barang }}</p>
                                    <p><strong>Kategori</strong> : {{ $barang->kategori->nama ?? 'Tidak Ada Kategori' }}</p>
                                    <p><strong>Nomor Whatsapp</strong>: {{ $barang->nomor_wa }}</p>
                                    <p><strong>Deskripsi</strong> : {{ $barang->deskripsi }}</p>
                                    
                                    <div class="action-buttons mt-3">
                                        <!-- Form untuk mengubah status barang -->
                                        <form action="{{ route('admin.ubahStatus') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                                            <label for="rating">Rating Kualitas Barang</label>
                                            <input type="number" id="rating" name="rating" min="1" max="5" value="{{ $barang->rating ?? '' }}" class="form-control mb-3">

                                            <!-- Pilihan untuk mengubah status -->
                                            <button type="submit" name="status" value="disetujui" class="btn btn-success">Terima</button>
                                            <button type="submit" name="status" value="ditolak" class="btn btn-danger">Tolak</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Image Section -->
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/foto/' . $barang->foto) }}" alt="Image of {{ $barang->nama_barang }}" class="img-fluid item-image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="text-center mt-4">
                <p>&copy; 2024 All Right Reserved YukBarter.xyz</p>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
