<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/validasi.css">
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
      <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Daftar Kategori</h5>
                        <a href="kategori/tambah"><button class="btn btn-dark"><i class="fas fa-plus"></i> Tambah</button></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori') }}" method="GET">
                        <div class="mb-3">
                            <input ttype="text" 
                            id="search-barang" 
                            name="search" 
                            class="form-control mr-2" 
                            placeholder="Cari Nama Kategori..." 
                            value="{{ request('search') ?? '' }}">
                        </div>
                        </form>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $no => $data)
    <tr>
        <!-- Nomor urut yang benar berdasarkan halaman -->
        <td>{{ $kategori->firstItem() + $no }}</td>
        <td>{{ $data->nama }}</td>
        <td>
            <div class="button-group">
                <a href="{{ route('kategori.edit', $data->id) }}">
                    <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></button>
                </a>
                <form action="{{ route('kategori.delete', $data->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </td>
    </tr>
@endforeach

                            </tbody>
                        </table>
                        <!-- Custom Pagination -->
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <!-- Previous Page Link -->
        @if ($kategori->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link">Previous</span>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $kategori->previousPageUrl() }}" aria-label="Previous">Previous</a>
        </li>
        @endif

        <!-- Pagination Links -->
        @foreach ($kategori->getUrlRange(1, $kategori->lastPage()) as $page => $url)
        <li class="page-item {{ $kategori->currentPage() == $page ? 'active' : '' }}">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
        </li>
        @endforeach

        <!-- Next Page Link -->
        @if ($kategori->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $kategori->nextPageUrl() }}" aria-label="Next">Next</a>
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
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
