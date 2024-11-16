<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter - Detail Laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/detail_validasi.css">
    <style>
       .action-buttons {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Jarak antar tombol */
}

        .card-body {
            padding: 20px;
        }
        .card {
            margin-top: 20px;
        }
        button {
    padding: 10px 20px; /* Ruang dalam tombol */
    font-size: 16px; /* Ukuran font agar lebih jelas */
    border: none; /* Hilangkan border jika tidak diperlukan */
    border-radius: 5px; /* Membuat sudut tombol sedikit melengkung */
    text-align: center; /* Rata tengah teks */
    white-space: nowrap; /* Mencegah teks terpotong jika terlalu panjang */
    display: inline-block; /* Memastikan tombol tidak aneh dalam layout */
}

button.btn-success,
button.btn-danger {
    width: auto; /* Sesuaikan lebar dengan teks */
    min-width: 120px; /* Tetapkan lebar minimum jika diperlukan */
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
                <a class="nav-link" href="{{ route('reports.index') }}"><i class="fas fa-tasks"></i> Laporan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kategori"><i class="fas fa-th-large"></i> Kategori</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="rating"><i class="fas fa-star"></i> Rating</a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="profile"><i class="fas fa-user"></i> Profil</a>
              </li>
            </ul>
          </div>

        <div class="main-content">
            <div class="back-button rounded-pill">
                <button class="btn btn-dark" onclick="history.back()">Kembali</button>
            </div>

            <div class="content">
                <div class="container detail-container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Item Details -->
                                <div class="col-md-8">
                                    <h5>Detail Laporan</h5>
                                    <p><strong>Nama User:</strong> {{ $barang->user->name ?? 'Tidak Ditemukan' }}</p>
                                    <p><strong>Nama Barang:</strong> {{$report->barang->nama_barang ?? 'Tidak Ditemukan'}}</p>
                                    {{-- <p><strong>Kategori:</strong> {{ $report->kategori->nama ?? 'Tidak Ada Kategori' }}</p> --}}
                                    <p><strong>Deskripsi:</strong> {{ $report->barang->deskripsi }}</p>
                                    <p><strong>Nomor WhatsApp:</strong> {{ $report->barang->nomor_wa }}</p>
                                    <hr>
                                    <h6>Detail Laporan</h6>
                                    <p><strong>Pelapor:</strong> {{ $report->user->name ?? 'Anonim' }}</p>
                                    <p><strong>Alasan:</strong> {{ $report->reason }}</p>
                                    <p><strong>Keterangan Tambahan:</strong> {{ $report->additional_info ?? 'Tidak ada' }}</p>
                                </div>

                                <!-- Image Section -->
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/foto/' . $barang->foto) }}" alt="Image of {{ $barang->nama_barang }}" class="img-fluid item-image">

                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-8">
                                    <div class="action-buttons d-flex flex-column gap-3">
                                        <!-- Form untuk Menyelesaikan Laporan -->
                                        <form action="{{ route('reports.resolve', $report->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="barang_id" value="{{ $report->id }}">
                                            <button type="submit" name="action" value="resolve" class="btn btn-success">
                                             Tandai Selesai
                                            </button>
                                        </form>

                                        <!-- Form untuk Menghapus Barang -->
                                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                 Hapus Barang
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="text-center mt-4">
                <p>&copy; 2024 YukBarter. All rights reserved.</p>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
