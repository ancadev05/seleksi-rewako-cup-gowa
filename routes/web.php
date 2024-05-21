<?php

use App\Http\Controllers\AdminKejurnasController;
use App\Http\Controllers\AtletController;
use App\Http\Controllers\Coba;
use App\Http\Controllers\DownloadBerkasController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route Admin kejurnas
// Route::get('/admin-kejurnas', [AdminKejurnasController::class, 'index'])->name('admin-kejurnas');

// // Route Official
// Route::get('/official-kejurnas', [OfficialController::class, 'index'])->name('official-kejurnas');
// Route::resource('official-kejurnas/atlet', AtletController::class);

// #############################
Route::get('/', function () {
    return view('welcome');
});

// route registrasi
Route::post('/', [UserController::class, 'registrasi']);

// route sebelum login - guest
Route::middleware(['guest'])->group(function () {
    // route saat mau login ke aplikasi pendaftaran
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

// halaman yang bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    // halaman official
    Route::get('/official', [OfficialController::class, 'index'])->middleware('userAkses:official');
    Route::get('/official/download', [OfficialController::class, 'download'])->middleware('userAkses:official');
    Route::get('/official/download/invoice', [DownloadBerkasController::class, 'invoice'])->middleware('userAkses:official');
    Route::get('/official/download/kwitansi', [DownloadBerkasController::class, 'kwitansi'])->middleware('userAkses:official');
    Route::resource('/official/atlet', AtletController::class)->middleware('userAkses:official');
    
    
    // halaman admin kejurnas
    Route::get('/admin-kejurnas', [AdminKejurnasController::class, 'index'])->middleware('userAkses:admin-kejurnas');
    Route::get('/admin-kejurnas/kontingen', [AdminKejurnasController::class, 'kontingen'])->middleware('userAkses:admin-kejurnas');
    Route::get('/admin-kejurnas/atlet', [AdminKejurnasController::class, 'atlet'])->middleware('userAkses:admin-kejurnas'); // menampilkan keseluruhan atlet
    Route::get('/admin-kejurnas/atlet/{id}', [AdminKejurnasController::class, 'atletDetail'])->middleware('userAkses:admin-kejurnas'); // melihat detail user dari admin
    Route::get('/admin-kejurnas/kontingen', [AdminKejurnasController::class, 'kontingen'])->middleware('userAkses:admin-kejurnas');
    Route::get('/admin-kejurnas/pembayaran', [AdminKejurnasController::class, 'pembayaran'])->middleware('userAkses:admin-kejurnas');
    Route::post('/admin-kejurnas/pembayaran/{id}', [AdminKejurnasController::class, 'verifikasiPembayaran'])->middleware('userAkses:admin-kejurnas');
    Route::get('/admin-kejurnas/verifikasi-atlet', [AdminKejurnasController::class, 'verifikasiAtlet'])->middleware('userAkses:admin-kejurnas');
    Route::get('/admin-kejurnas/user', [UserController::class, 'index'])->middleware('userAkses:admin-kejurnas');
    Route::post('/admin-kejurnas/user', [UserController::class, 'store'])->middleware('userAkses:admin-kejurnas');
    Route::delete('/admin-kejurnas/user/{username}', [UserController::class, 'deleteUser'])->middleware('userAkses:admin-kejurnas');

    // halaman bisa akses semua
    Route::get('/setting/{username}', [UserController::class, 'setting']);
    Route::post('/setting/{username}', [UserController::class, 'update']);

    // ketika user logout
    Route::get('/logout', [SesiController::class, 'logout']);
});


// halaman umum
Route::get('/news', function(){
    return view('pages.news');
});
Route::get('/home', function(){
    return view('welcome');
});