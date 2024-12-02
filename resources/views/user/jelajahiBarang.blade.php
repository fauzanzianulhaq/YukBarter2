<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Jelajahi-barang</title>
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
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Laporkan Postingan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reportForm" action="{{ route('report.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" id="reportPostId">
                        <div class="form-group">
                            <label for="reportReason">Alasan Pelaporan</label>
                            <select class="form-control" id="reportReason" name="reason" required>
                                <option value="">Pilih alasan</option>
                                <option value="inappropriate">Barang tidak sesuai kategori</option>
                                <option value="spam">Konten melanggar aturan</option>
                                <option value="fake">Informasi tidak benar</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="reportAdditionalInfo">Keterangan Tambahan (opsional)</label>
                            <textarea class="form-control" id="reportAdditionalInfo" name="additional_info" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Kirim Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
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
                    <form class="d-flex" role="search" action="{{ route('jelajahiBarang') }}" method="GET">
                        <input 
                    type="text" 
                    id="search-barang" 
                    name="search" 
                    class="form-control mr-2" 
                    placeholder="Cari Barang..." 
                    value="{{ request('search') ?? '' }}">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i> Cari</button>
                    </form>
                </div>
            </nav>
            
            <div class="container my-5">
                <div class="row">
                    @foreach($barang as $item)
                    <div class="col-md-3 mb-5">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $item->nama_barang }}</h5>
                                <img src="{{ asset('storage/foto/' . $item->foto) }}" alt="Image of {{ $item->nama_barang }}" class="img-fluid item-image">
                            </div>
                            <div class="card-footer-0">
                                <a href="{{ route('barang.detail', $item->id) }}" class="btn btn-custom">Detail Barang</a>
                            </div>
                            <div class="card-footer">
                                <a href="https://wa.me/{{$item->nomor_wa}}?text=Halo,%20saya%20tertarik%20dengan%20{{ $item->nama_barang }}" 
                                   target="_blank" class="btn btn-custom">Chat Pemilik</a>
                                <button class="btn btn-warning btn-sm mt-2" data-toggle="modal" 
                                        data-target="#reportModal" 
                                        onclick="setReportData({{ $item->id }}, '{{ $item->nama_barang }}')">
                                    <i class="fas fa-exclamation-circle"></i> Laporkan
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Memuat jQuery terlebih dahulu -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Memuat Popper.js dan Bootstrap JS setelah jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script>
        function setReportData(barangId, barangName) {
    $('#reportPostId').val(barangId); // ID barang dari tabel 'barang'
    $('#reportModalLabel').text(`Laporkan Postingan: ${barangName}`);
}
    </script>
    
