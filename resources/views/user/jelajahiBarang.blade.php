<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/user/jelajahiBarang.css">
    <style>
        .card {
            margin-bottom: 20px;
        }
        .item-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-footer-0,
        .card-footer {
            padding: 10px;
        }
        .rating {
            margin-top: 10px;
        }
    </style>
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

        <div class="content">
            <nav class="navbar" style="background-color: #edf5ff;">
                <div class="container-fluid">
                    <a class="navbar-brand"></a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Cari Barang di sini" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i> Cari</button>
                    </form>
                </div>
            </nav>
            
            <div class="container my-5">
                <div class="row">
                    @foreach($barang as $item)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $item->nama_barang }}</h5>
                                <img src="{{ asset('storage/foto/' . $item->foto) }}" alt="Image of {{ $item->nama_barang }}" class="img-fluid item-image">
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $item->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="card-footer-0">
                                <a href="jelajahi-barang-detail" class="btn btn-custom" id="detailBtn">Detail Barang</a>
                            </div>
                            <div class="card-footer">
                                <a href="https://wa.me/6283818988014?text=Halo,%20saya%20tertarik%20dengan%20iMac%20Late%202015%20yang%20Anda%20jual." target="_blank" class="btn btn-custom">Chat Pemilik</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fak
