<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Detail Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/user/detailBarang.css">
    
</head>
<body>
    <div class="main-container">
        <div class="sidebar bg-light border-right">
            <img src="/images/logo_yukbarter.png" alt="" width="190px" class="logo_atas">
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

        {{-- <div class="content">
            <nav class="navbar bg-body-tertiary" style="background-color: #edf5ff;">
                <div class="container-fluid"><p>Detail Barang</p></div>
            </nav>
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <img class="card-img-top" src="{{ $barang->foto ? asset('storage/foto/' . $barang->foto) : asset('images/default.png') }}" alt="{{ $barang->nama_barang }}"> 
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $barang->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>    
                            </div>
                            <div class="card-footer">
                                <a href="https://wa.me/6283818988014?text=Halo,%20saya%20tertarik%20dengan%20{{ $barang->nama_barang }}" 
                                   target="_blank" class="btn btn-custom">Chat Pemilik</a>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-9">
                        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                        <h6 class="card-detail">Detail Barang</h6>
                        <p><span class="text-muted">Kategori Barang: </span>{{ $barang->kategori->nama }}</p>
                        <p><span class="text-muted">Deskripsi Barang: </span>{{ $barang->deskripsi }}</p>
                    </div>
                </div>
            </div>
        </div> --}}
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
                              <p><strong>Nama User</strong> : {{ $barang->user->name ?? 'Tidak Ditemukan' }}</p>
                              <p><strong>Nama Barang</strong> : {{ $barang->nama_barang }}</p>
                              <p><strong>Kategori</strong> : {{ $barang->kategori->nama ?? 'Tidak Ada Kategori' }}</p>
                              <p><strong>Nomor Whatsapp</strong>: {{ $barang->nomor_wa }}</p>
                              <p><strong>Deskripsi</strong> : {{ $barang->deskripsi }}</p>
                              
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
