<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Detail Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/user/detailBarang.css">
    <style>
        /* Tambahkan CSS Responsif */
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

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar .nav-link:hover {
            background-color: #f1f1f1;
            color: #007bff;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .detail-container .card {
            margin-top: 20px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .item-details p {
            margin-bottom: 10px;
        }

        .item-image {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .btn-custom {
            background-color: #4CAF50;
            color: #fff;
            border: none;
        }

        .btn-custom:hover {
            background-color: #4CAF50;
        }

        /* Responsif */
        @media (max-width: 767px) {
            .sidebar {
                width: 250px;
                transform: translateX(-100%);
                z-index: 1050;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
            }

            .detail-container {
                padding: 10px;
            }
        }

        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0);
            }

            .detail-container .row {
                flex-wrap: nowrap;
            }
        }
        .card-footer-0,
        .card-footer {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="sidebar bg-light border-right">
            <img src="/images/logo_yukbarter.png" alt="" class="logo_atas">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/user/beranda"><i class="fas fa-home"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/jelajahi-barang"><i class="fas fa-search"></i> Jelajahi Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/profile"><i class="fas fa-user"></i> Profil</a>
                </li>
            </ul>
        </div>

        <div class="content">
            <nav class="navbar bg-body-tertiary" style="background-color: #edf5ff;">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <strong>Detail Barang</strong>
                    <div class="back-button rounded-pill">
                        <button class="btn btn-dark" onclick="history.back()">Kembali</button>
                    </div>
                </div>
            </nav>

            <div class="container detail-container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Item Details Section -->
                            <div class="col-md-8 item-details">
                                <p><strong>Nama User</strong>: {{ $barang->user->name ?? 'Tidak Ditemukan' }}</p>
                                <p><strong>Nama Barang</strong>: {{ $barang->nama_barang }}</p>
                                <p><strong>Kategori</strong>: {{ $barang->kategori->nama ?? 'Tidak Ada Kategori' }}</p>
                                <p><strong>Nomor Whatsapp</strong>: {{ $barang->nomor_wa }}</p>
                                <p><strong>Deskripsi</strong>: {{ $barang->deskripsi }}</p>
                                <div class="card-footer">
                                    <a href="https://wa.me/{{ $barang->nomor_wa }}?text=Halo,%20saya%20tertarik%20dengan%20{{ urlencode($barang->nama_barang) }}" 
                                       target="_blank" class="btn btn-custom">Chat Pemilik</a>
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
    </div>

    <script>
        // Optional: Add a mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.createElement('button');
            menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
            menuToggle.classList.add('btn', 'btn-outline-secondary', 'd-md-none');
            menuToggle.style.position = 'fixed';
            menuToggle.style.top = '10px';
            menuToggle.style.left = '10px';
            menuToggle.style.zIndex = '1100';

            menuToggle.addEventListener('click', function () {
                const sidebar = document.querySelector('.sidebar');
                sidebar.classList.toggle('show');
            });

            document.body.prepend(menuToggle);
        });
    </script>
</body>
</html>
