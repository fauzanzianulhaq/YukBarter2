<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Edit Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/user/upload.css">
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
      <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Upload Barang</h5>
                        <button class="btn btn-dark" onclick="history.back()">Kembali</button>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('upload.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                  <label for="nama_barang">Nama Barang</label>
                                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang" value="{{ old('nama_barang', $barang->nama_barang) }}">
                                  @error('nama_barang')<small class="text-danger">{{ $message }}</small>@enderror
                              </div>
                              <div class="form-group">
                                  <label for="kategori_id">Kategori</label>
                                  <select name="kategori_id" id="kategori" class="form-control">
                                      <option value="">Pilih Kategori</option>
                                      @foreach($kategoris as $kategori)
                                          <option value="{{ $kategori->id }}" {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                      @endforeach
                                  </select>
                                  @error('kategori_id')<small class="text-danger">{{ $message }}</small>@enderror
                              </div>
                              <div class="form-group">
                                  <label for="nomor_wa">Nomor Whatsapp</label>
                                  <input type="text" class="form-control" id="nomor_wa" name="nomor_wa" placeholder="Masukan Nomor Whatsapp"  value="{{ old('nomor_wa', $barang->nomor_wa) }}">
                                  @error('nomor_wa')<small class="text-danger">{{ $message }}</small>@enderror
                              </div>
                              <div class="form-group">
                                  <label for="deskripsi">Deskripsi</label>
                                  <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi"  value="{{ old('deskripsi', $barang->deskripsi) }}">
                                  @error('deskripsi')<small class="text-danger">{{ $message }}</small>@enderror
                              </div>
                              <!-- Pratinjau gambar lama -->
                                @if($barang->foto)
                                <div class="form-group">
                                <label>Gambar Saat Ini:</label><br>
                                <img src="{{ asset('storage/foto/' . $barang->foto) }}" alt="Gambar Barang" width="150">
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="foto">Unggah Gambar Baru</label>
                                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                                        @error('foto')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>

                              <button type="submit" class="btn btn-primary">Edit</button>
                          </form>
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
    <script>
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
    
            // Close sidebar when clicking outside
            document.addEventListener('click', function (event) {
                const sidebar = document.querySelector('.sidebar');
                const menuToggle = document.querySelector('button');
    
                if (!sidebar.contains(event.target) &&
                    !menuToggle.contains(event.target) &&
                    sidebar.classList.contains('show') &&
                    window.innerWidth < 768) {
                    sidebar.classList.remove('show');
                }
            });
        });
    </script>
  </body>
</html>
