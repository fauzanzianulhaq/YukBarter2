<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Dashboard</title>
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
            <a class="nav-link" href="{{ route('admin.validasi') }}"><i class="fas fa-tasks"></i> Validasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kategori"><i class="fas fa-th-large"></i> Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rating"><i class="fas fa-star"></i> Rating</a>
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
                      <h5>Validasi Barang</h5>
                  </div>
                  <div class="card-body">
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Nama User</th>
                                <th>Status</th>
                                <th>Detail</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($barangPending as $index => $barang)
                              <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori->nama ?? 'Kategori Tidak Ditemukan' }}</td>
                                <td>{{ $barang->user->name ?? 'User Tidak Ditemukan' }}</td>
                                <td><button type="button" class="btn btn-warning">{{ ucfirst($barang->status) }}</button></td>
                                <td><a href="{{ route('admin.validasi-detail', $barang->id) }}">Lihat</a></td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center">
                              <li class="page-item">
                                  <a class="page-link" href="#">Previous</a>
                              </li>
                              <li class="page-item active">
                                  <a class="page-link" href="#">1</a>
                              </li>
                              <li class="page-item">
                                  <a class="page-link" href="#">Next</a>
                              </li>
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