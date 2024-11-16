<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/landing.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <img src="/images/logo_yukbarter.png" alt="" width="190px" class="logo_atas">
        <div class="masuk_daftar">
            <a href="login"><button class="btn btn-primary" type="submit">Masuk</button></a>
            <a href="daftar"><button class="btn btn-primary" type="submit">Daftar</button></a>
        </div>
    </div>
    
    <div class="fade-in"> <!-- Tambahkan kelas fade-in di sini -->
        <div class="container_2">
            <div class="yukbarter">
                <p>YukBarter App</p>
                <p class="text">Tukar Barang Bekasmu dengan Barang yang <br> Kamu Butuhkan</p>
                <p>Aplikasi Barter Barang Bekas adalah tempat di mana kamu bisa menukar barang-barang<br> yang sudah tidak kamu 
                    pakai dengan barang yang kamu butuhkan, tanpa harus keluar <br> uang. Cukup unggah barang yang ingin kamu tukarkan, 
                    cari barang lain yang kamu inginkan,<br> lalu ajukan barter. Setiap barang yang diposting akan divalidasi oleh admin,
                    jadi kamu bisa barter<br> dengan aman. Selain bisa hemat, kamu juga ikut menjaga lingkungan dengan mengurangi sampah.<br>
                    Aplikasi ini cocok buat kamu yang ingin memberi manfaat baru pada barang-barang lama sambil<br> menemukan barang 
                    baru yang dibutuhkan.</p>
            </div>
            <img src="/images/payment.png" alt="" width="350px" class="image_payment">
        </div>
        
        <div>
            <p class="fitur_kami">Fitur Kami</p>
            <p style="text-align: center">Fitur Dalam Aplikasi</p>
        </div>

        {{-- card  --}}
        <div class="card-container">
            <div class="card">
                <div class="card-image">
                    <img src="your-image-url1.jpg" alt="Image 1" />
                </div>
                <div class="card-content">
                    <h2>Jelajahi Barang</h2>
                    <p>Fitur Jelajahi Barang memungkinkan pengguna mencari dan menemukan barang yang ditawarkan oleh orang lain, memudahkan proses barter dengan kategori yang beragam.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="your-image-url2.jpg" alt="Image 2" />
                </div>
                <div class="card-content">
                    <h2>Jelajahi Barang</h2>
                    <p>Fitur Jelajahi Barang memungkinkan pengguna mencari dan menemukan barang yang ditawarkan oleh orang lain, memudahkan proses barter dengan kategori yang beragam.</p>
                </div>
            </div>
        </div>
        
        <div class="card-container">
            <div class="card">
                <div class="card-image">
                    <img src="your-image-url1.jpg" alt="Image 1" />
                </div>
                <div class="card-content">
                    <h2>Jelajahi Barang</h2>
                    <p>Fitur Jelajahi Barang memungkinkan pengguna mencari dan menemukan barang yang ditawarkan oleh orang lain, memudahkan proses barter dengan kategori yang beragam.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="your-image-url2.jpg" alt="Image 2" />
                </div>
                <div class="card-content">
                    <h2>Jelajahi Barang</h2>
                    <p>Fitur Jelajahi Barang memungkinkan pengguna mencari dan menemukan barang yang ditawarkan oleh orang lain, memudahkan proses barter dengan kategori yang beragam.</p>
                </div>
            </div>
        </div>

        {{-- footer --}}
        <div class="faq-section">
            <h2>Frequently asked questions</h2>
            <p>Berikut adalah beberapa pertanyaan yang paling sering ditanyakan.</p>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleAnswer(this)">
                    <span>Bagaimana cara saya melakukan barter barang?</span>
                    <span class="arrow">&#9654;</span>
                </div>
                <div class="faq-answer">
                    <p>Anda bisa melakukan barter dengan cara mengunggah barang yang ingin Anda barter dan menemukan barang yang Anda inginkan dari pengguna lain.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleAnswer(this)">
                    <span>Bagaimana cara memastikan barang itu kondisi baik?</span>
                    <span class="arrow">&#9654;</span>
                </div>
                <div class="faq-answer">
                    <p>Pastikan untuk melihat foto dengan jelas, dan Anda juga bisa bertanya langsung kepada pengguna untuk menanyakan kondisi barang.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleAnswer(this)">
                    <span>Apakah ada biaya untuk menggunakan aplikasi ini?</span>
                    <span class="arrow">&#9654;</span>
                </div>
                <div class="faq-answer">
                    <p>Tidak ada biaya untuk menggunakan aplikasi ini. YukBarter dapat digunakan secara gratis.</p>
                </div>
            </div>
        </div>

        <footer>
            <p>Copyright © 2024 YukBarter. All Rights Reserved.</p>
            <p>Design with ♡ in Bandung</p>
        </footer>
    </div>
    
    <script>
        function toggleAnswer(element) {
            const item = element.parentNode;
            item.classList.toggle("active");
        }
    </script>
    <script>
        window.onload = function() {
            const fadeInElement = document.querySelector('.fade-in');
            fadeInElement.classList.add('active');
            fadeInElement.style.visibility = 'visible'; // Tampilkan konten
        };
    </script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>