<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/beranda.css">
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
          <div class="row mb-4 justify-content-center">
            <div class="col-md-3">
              <div class="info-card">
                <h5>Total User</h5>
                <p>{{ $totalUsers }}</p>
                <i class="fas fa-user"></i>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-card">
                <h5>Total Kategori</h5>
                <p>{{ $totalCategories }}</p>
                <i class="fas fa-box"></i>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-card">
                <h5>Kategori Barang Populer</h5>
                <p>{{ $categoryName }}</p>
                <i class="fas fa-box"></i>
              </div>
            </div>
          </div>
  
          <div class="row mb-4 justify-content-center">
            <div class="col-md-3">
              <div class="info-card">
                <h5>Postingan Hari Ini</h5>
                <p>{{ $todayPosts }}</p>
                <i class="fas fa-paper-plane"></i>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-card">
                <h5>Postingan Bulan Ini</h5>
                <p>{{ $monthlyPosts }}</p>
                <i class="fas fa-paper-plane"></i>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-card">
                <h5>Postingan Tahun Ini</h5>
                <p>{{ $yearlyPosts }}</p>
                <i class="fas fa-paper-plane"></i>
              </div>
            </div>
          </div>
  
          <div class="card">
            <div class="card-header">Postingan Hari Ini</div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Nama User</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($upload as $no => $data)
                  <tr>
                    <td>{{ $upload->firstItem() + $no }}</td>
                    <td>{{ $data->nama_barang }}</td>
                     <td>{{ $data->kategori->nama }}</td>
                    <td>{{ $data->user->name }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- Previous Page Link -->
                    @if ($upload->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $upload->previousPageUrl() }}" aria-label="Previous">Previous</a>
                    </li>
                    @endif
            
                    <!-- Pagination Links -->
                    @foreach ($upload->getUrlRange(1, $upload->lastPage()) as $page => $url)
                    <li class="page-item {{ $upload->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endforeach
            
                    <!-- Next Page Link -->
                    @if ($upload->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $upload->nextPageUrl() }}" aria-label="Next">Next</a>
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
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.querySelector('.sidebar');
            const toggleButton = document.createElement('button');
            toggleButton.innerHTML = '<i class="fas fa-bars"></i>';
            toggleButton.classList.add('btn', 'btn-outline-secondary', 'd-md-none');
            toggleButton.style.position = 'fixed';
            toggleButton.style.top = '10px';
            toggleButton.style.left = '10px';
            toggleButton.style.zIndex = '1100';

            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('show');
            });

            document.body.prepend(toggleButton);

            document.addEventListener('click', function (e) {
                if (!sidebar.contains(e.target) && !toggleButton.contains(e.target) && sidebar.classList.contains('show')) {
                    sidebar.classList.remove('show');
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
