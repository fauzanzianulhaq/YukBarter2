<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>YukBarter</title>
    <style>
        /* Styling tambahan */
        .logo_atas {
            max-width: 190px;
        }

        .masuk_daftar {
            display: flex;
            gap: 10px;
        }

        .header-container {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .content-section {
            padding: 2rem;
        }

        @media (min-width: 1200px) {
            .content-section {
                padding-left: 8rem;
                padding-right: 8rem;
            }
        }

        @media (max-width: 768px) {
            /* Responsif untuk layar kecil */
            .header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .masuk_daftar {
                margin-top: 10px;
            }

            .content-section {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="container-fluid header-container py-3">
        <div class="d-flex justify-content-between align-items-center header">
            <img src="/images/logo_yukbarter.png" alt="Logo YukBarter" class="logo_atas">
            <div class="masuk_daftar">
                <a href="login">
                    <button class="btn btn-primary" type="submit">Masuk</button>
                </a>
                <a href="daftar">
                    <button class="btn btn-primary" type="submit">Daftar</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Gambar dan Teks -->
    <div class="container-fluid content-section my-5">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-left">
                <h2>YukBarter App</h2>
                <p class="lead">Tukar Barang Bekasmu dengan Barang yang Kamu Butuhkan</p>
                <p>Aplikasi Barter Barang Bekas adalah tempat di mana kamu bisa menukar barang-barang<br> yang sudah tidak kamu 
                    pakai dengan barang yang kamu butuhkan, tanpa harus keluar <br> uang. Cukup unggah barang yang ingin kamu tukarkan, 
                    cari barang lain yang kamu inginkan, lalu ajukan barter. Setiap barang yang diposting akan divalidasi oleh admin,
                    jadi kamu bisa barterdengan aman. Selain bisa hemat, kamu juga ikut menjaga lingkungan dengan mengurangi sampah.
                    Aplikasi ini cocok buat kamu yang ingin memberi manfaat baru pada barang-barang lama sambil menemukan barang 
                    baru yang dibutuhkan.</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="/images/payment.png" alt="Payment Illustration" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Fitur Kami -->
    <div class="container-fluid content-section my-5">
        <h2 class="text-center mb-4">Fitur Kami</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Jelajahi Barang</h5>
                        <p class="card-text">Fitur Jelajahi Barang memungkinkan pengguna mencari dan menemukan barang yang ditawarkan oleh orang lain dengan kategori beragam.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Kategori Barang</h5>
                        <p class="card-text">Fitur Kategori Barang membagi barang yang tersedia ke dalam kelompok tertentu seperti elektronik, pakaian, dan lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="container-fluid content-section my-5">
        <h2 class="text-center">Frequently Asked Questions</h2>
        <p class="text-center">Berikut adalah beberapa pertanyaan yang paling sering ditanyakan.</p>
        <div class="accordion" id="faqAccordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Bagaimana cara saya melakukan barter barang?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Anda bisa melakukan barter dengan cara mengunggah barang yang ingin Anda barter dan menemukan barang yang diunggah pengguna lain.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Bagaimana cara memastikan barang itu kondisi baik?
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        Pastikan untuk melihat foto dengan jelas, dan tanyakan langsung kepada pengguna untuk detail kondisi barang.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>Copyright © 2024 YukBarter. All Rights Reserved.</p>
        <p>Design with ♡ in Bandung</p>
    </footer>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
