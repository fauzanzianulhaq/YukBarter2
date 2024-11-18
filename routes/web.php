<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Models\Upload;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/beranda', function () {
//     return view('admin/beranda');
// });
Route::get('/login', function () {
    return view('login');
})->name('login');

// Route::get('/daftar', function () {
//     return view('daftar');
// });
Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');

Route::post('/daftar', [AuthController::class, 'daftar'])->name('daftar.custom');
Route::get('/berandaUser', function () {
    return view('user/beranda');
});
// Route::get('/login', [SessionController::class, 'index']);
// Route::post('/login/masuk', [SessionController::class, 'login']);
// Route::get('/admin/dashboard', [SessionController::class, 'index'])->name('admin.dashboard')->middleware('role:admin');
// Route::get('/user/dashboard', [SessionController::class, 'index'])->name('user.dashboard')->middleware('role:user');
// Route::post('/custom-login', [SessionController::class, 'login'])->name('custom.login');
// Route::get('/admin/beranda', function () {
//     return view('admin.beranda');
// })->name('admin.beranda')->middleware('role:admin');
Route::get('/admin/beranda', [AdminController::class, 'upload'])->name('admin.beranda')->middleware('role:admin');
Route::post('/report', [UserController::class, 'store'])->name('report.store');

// Route::get('/admin/validasi', function () {
//     return view('admin.validasi');
// });
// Route::get('/admin/validasi', [AdminController::class, 'validasi'])->name('admin.validasi');
Route::get('/admin/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/admin/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
Route::patch('/admin/reports/{id}/resolve', [ReportController::class, 'resolve'])->name('reports.resolve');
Route::delete('/admin/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');

// Route::get('/admin/validasi-detail/{id}', function ($id) {
//     $barang = Upload::findOrFail($id);
//     return view('admin.detail_validasi', compact('barang'));
// })->name('admin.validasi-detail');
// Route::post('/admin/ubah-status', [AdminController::class, 'ubahStatus'])->name('admin.ubahStatus');




Route::get('/admin/rating', function () {
    return view('admin.rating');
});
Route::get('/admin/rating-detail', function () {
    return view('admin.detail_rating');
});
Route::get('/admin/kategori/tambah', function () {
    return view('admin.tambah_kategori');
});
// Route::get('/admin/kategori', function () {
//     return view('admin.kategori');
// });
Route::get('/admin/kategori', [KategoriController::class, 'kategori'])->name('kategori');
Route::post('/admin/kategori/tambah/submit', [KategoriController::class, 'submit'])->name('kategori.submit');
Route::get('/admin/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::post('/admin/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::post('/admin/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');
// Route::get('/admin/profile', function () {
//     return view('admin.profile');
// });
Route::get('/admin/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/admin/profile-password', [ProfileController::class, 'password'])->name('password');
Route::get('/admin/profile-avatar', [ProfileController::class, 'avatar'])->name('avatar');
Route::post('/admin/update-password', [ProfileController::class, 'updatePassword'])->name('updatePassword');
Route::post('/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.updateName');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/admin/profile-avatar', function () {
//     return view('admin.avatar_profile');
// });
// Route::get('/admin/profile-password', function () {
//     return view('admin.password_profile');
// });


// USER



// Route::get('/user/beranda', function () {
//     return view('user.beranda');
// })->name('user.beranda')->middleware('role:user');
Route::get('/user/beranda', [UploadController::class, 'upload'])->name('user.beranda')->middleware('role:user');
Route::post('/user/beranda/tambah/submit', [UploadController::class, 'submit'])->name('upload.submit');
Route::get('/user/beranda/tambah', [UploadController::class, 'create'])->name('user.create');
Route::get('/user/beranda/edit/{id}', [UploadController::class, 'edit'])->name('upload.edit');
Route::post('/user/beranda/update/{id}', [UploadController::class, 'update'])->name('upload.update');
Route::delete('/user/beranda/delete/{id}', [UploadController::class, 'delete'])->name('upload.delete');
Route::get('/user/beranda', [UserController::class, 'index'])->name('user.beranda');



// Route::get('/user/profile', function () {
//     return view('user.profile');
// });
Route::get('/user/profile', [ProfileController::class, 'profileUser'])->name('profileUser');
Route::get('/user/profile-avatar', [ProfileController::class, 'avatarUser'])->name('avatarUser');
Route::get('/user/profile-password', [ProfileController::class, 'passwordUser'])->name('passwordUser');
Route::post('/profile/update-name-user', [ProfileController::class, 'updateNameUser'])->name('profile.updateNameUser');
Route::post('/admin/update-password-user', [ProfileController::class, 'updatePasswordUser'])->name('updatePasswordUser');
// Route::get('/user/profile-avatar', function () {
//     return view('user.avatar_profile');
// });
// Route::get('/user/profile-password', function () {
//     return view('user.password_profile');
// });
// Route::get('/user/jelajahi-barang', function () {
//     return view('user.jelajahiBarang');
// });
Route::get('/user/jelajahi-barang', [UserController::class, 'jelajahiBarang'])->name('jelajahiBarang');

// Route::get('/user/jelajahi-barang-detail', function () {
//     return view('user.detailBarang');
// });
Route::get('/user/jelajahi-barang-detail/{id}', [UserController::class, 'detail'])->name('barang.detail');


Route::post('/custom-login', [SessionController::class, 'login'])->name('custom.login');

