<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukBarter Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/user/upload.css">
</head>
<body>
    <div class="main-container">
      <div class="sidebar bg-light border-right">
        <h4 class="p-3">YukBarter</h4>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="beranda"><i class="fas fa-home"></i> Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="validasi"><i class="fas fa-tasks"></i> Validasi</a>
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
                        <h5>Upload Barang</h5>
                        <button class="btn btn-dark" onclick="history.back()">Kembali</button>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="warningModalLabel">Peringatan!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Barang yang Anda kirim terlihat tidak sesuai. Jika Anda terus mengirim barang yang tidak sesuai, akun Anda dapat diblokir. Apakah Anda ingin melanjutkan?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="confirmSend">Kirim</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <form action="{{ route('upload.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                  <label for="nama_barang">Nama Barang</label>
                                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang" value="{{ old('nama_barang') }}">
                                  @error('nama_barang')<small class="text-danger">{{ $message }}</small>@enderror
                              </div>
                              <div class="form-group">
                                  <label for="kategori_id">Kategori</label>
                                  <select name="kategori_id" id="kategori" class="form-control">
                                      <option value="">Pilih Kategori</option>
                                      @foreach($kategoris as $kategori)
                                          <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                      @endforeach
                                  </select>
                                  @error('kategori_id')<small class="text-danger">{{ $message }}</small>@enderror
                              </div>
                              <div class="form-group">
                                  <label for="nomor_wa">Nomor Whatsapp</label>
                                  <input type="text" class="form-control" id="nomor_wa" name="nomor_wa" placeholder="Masukan Nomor Whatsapp" value="{{ old('nomor_wa') }}">
                                  @error('nomor_wa')<small class="text-danger">{{ $message }}</small>@enderror
                              </div>
                              <div class="form-group">
                                  <label for="deskripsi">Deskripsi</label>
                                  <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi" value="{{ old('deskripsi') }}">
                                  @error('deskripsi')<small class="text-danger">{{ $message }}</small>@enderror
                              </div>
                              <div class="form-group">
                                  <label for="foto">Unggah Foto Barang</label>
                                  <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                                  @error('foto')<small class="text-danger">{{ $message }}</small>@enderror
                              </div>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#warningModal">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        <footer class="text-center mt-4">
          <p>&copy; 2024 All Right Reserved YukBarter.xyz</p>
        </footer>
      </div>
    </div>
  
    <!-- Memuat jQuery terlebih dahulu -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Memuat Popper.js dan Bootstrap JS setelah jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Menampilkan modal ketika tombol Kirim diklik
            $('[data-toggle="modal"]').on('click', function() {
                $('#warningModal').modal('show');
            });

            // Menangani aksi tombol Kirim di dalam modal
            $('#confirmSend').on('click', function() {
                console.log('Tombol Kirim di klik'); // Debugging
                $('form').submit();  // Kirim form
                $('#warningModal').modal('hide');  // Tutup modal
            });
        });
    </script>

</body>
</html>
