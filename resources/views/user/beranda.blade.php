<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Beranda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link rel="stylesheet" href="/css/user/berandaUser.css">
    <style>
        /* Responsif Utama */
.main-container {
    display: flex;
    flex-wrap: wrap;
}

.sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    z-index: 1050;
    transform: translateX(-100%);
    transition: transform 0.3s ease-in-out;
}

.sidebar.show {
    transform: translateX(0);
}

.content {
    margin-left: 0;
    padding: 20px;
    width: 100%;
}

@media (min-width: 768px) {
    .sidebar {
        transform: translateX(0);
    }

    .content {
        margin-left: 250px;
    }
}
/* Default untuk layar besar (tidak berubah) */
.table-container {
    overflow-x: unset; /* Tidak ada scroll secara default */
}

/* Untuk layar kecil (mode HP) */
@media (max-width: 767px) {
    .table-container {
        overflow-x: auto; /* Scroll horizontal untuk layar kecil */
        -webkit-overflow-scrolling: touch; /* Smooth scrolling untuk perangkat sentuh */
    }

    .table-container table {
        min-width: 600px; /* Pastikan tabel tetap proporsional meskipun digeser */
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

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Daftar Barang</h5>
                        <a href="beranda/tambah"><button class="btn btn-outline-primary">
                            <i class="fas fa-plus"></i> Tambah Barang
                        </button></a>
                    </div>              
                    <div class="card-body">
                        <div class="table-container">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangs as $no => $data)
                                        <tr>
                                            <td>{{ $no+1 }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>{{ $data->kategori->nama }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td><span class="badge badge-dark">{{ $data->status }}</span></td>
                                            <td>
                                                <div class="button-group">
                                                    <a href="{{ route('upload.edit', $data->id) }}">
                                                        <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></button>
                                                    </a>
                                                    <form action="{{ route('upload.delete', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <!-- Pagination -->
                                @if ($barangs->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $barangs->previousPageUrl() }}" aria-label="Previous">Previous</a>
                                    </li>
                                @endif
                        
                                @foreach ($barangs->getUrlRange(1, $barangs->lastPage()) as $page => $url)
                                    <li class="page-item {{ $barangs->currentPage() == $page ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                        
                                @if ($barangs->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $barangs->nextPageUrl() }}" aria-label="Next">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <footer class="text-center mt-4">
                <p>&copy; 2024 All Right Reserved YukBarter.xyz</p>
            </footer>
        </div>
    </div>

    <script>
        // Toggle Sidebar untuk responsivitas
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
