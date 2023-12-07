<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BrandKendaraanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\KategoriKilometerKendaraanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenambahanSewaController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SeriKendaraanController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\SopirController;
use App\Models\PenambahanSewa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::fallback(function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'indexLogin')->name('login');
        Route::post('/login', 'login')->name('login.action');

        Route::get('/register', 'indexRegister')->name('register');
        Route::post('/register', 'register')->name('register.action');
    });
});

Route::middleware(['auth', 'owner'])->group(function () {
    // KENDARAAN
    Route::controller(KendaraanController::class)->group(function () {
        Route::get('/kendaraan', 'index')->name('kendaraan');
        Route::post('/kendaraan/cari', 'search')->name('kendaraan.search');
        Route::get('/kendaraan/getDetail/{id}', 'getDetail')->name('kendaraan.detail');
        Route::get('/kendaraan/detail/{id}', 'detail')->name('kendaraan.detail');
        Route::get('/kendaraan/getSeriKendaraan/{id}/{idBrand}', 'getSeriKendaraanByJenisBrand')->name('kendaraan.getSeriKendaraan');
        Route::post('/kendaraan/check', 'check')->name('kendaraan.check');

        Route::get('/kendaraan/tambah', 'create')->name('kendaraan.create');
        Route::post('/kendaraan/tambah', 'store')->name('kendaraan.store');
        Route::get('/kendaraan/edit/{id}', 'edit')->name('kendaraan.edit');
        Route::post('/kendaraan/edit/{id}', 'update')->name('kendaraan.update');
        Route::post('/kendaraan/hapus/{id}', 'delete')->name('kendaraan.delete');
    });

    // JENIS KENDARAAN
    Route::controller(JenisKendaraanController::class)->group(function () {
        Route::get('/jenis-kendaraan', 'index')->name('jenisKendaraan');
        Route::post('/jenis-kendaraan/cari', 'search')->name('jenisKendaraan.search');
        Route::get('/jenis-kendaraan/detail/{id}', 'detail')->name('jenisKendaraan.detail');
        Route::post('/jenis-kendaraan/tambah', 'store')->name('jenisKendaraan.store');
        Route::post('/jenis-kendaraan/edit/{id}', 'update')->name('jenisKendaraan.update');
        Route::post('/jenis-kendaraan/hapus/{id}', 'delete')->name('jenisKendaraan.delete');
    });

    // BRAND KENDARAAN
    Route::controller(BrandKendaraanController::class)->group(function () {
        Route::get('/brand-kendaraan', 'index')->name('brandKendaraan');
        Route::post('/brand-kendaraan/cari', 'search')->name('brandKendaraan.search');
        Route::get('/brand-kendaraan/detail/{id}', 'detail')->name('brandKendaraan.detail');
        Route::post('/brand-kendaraan/tambah', 'store')->name('brandKendaraan.store');
        Route::post('/brand-kendaraan/edit/{id}', 'update')->name('brandKendaraan.update');
        Route::post('/brand-kendaraan/hapus/{id}', 'delete')->name('brandKendaraan.delete');
    });

    // SERI KENDARAAN
    Route::controller(SeriKendaraanController::class)->group(function () {
        Route::get('/seri-kendaraan', 'index')->name('seriKendaraan');
        Route::post('/seri-kendaraan/cari', 'search')->name('seriKendaraan.search');
        Route::post('/seri-kendaraan/check', 'check')->name('seriKendaraan.check');
        Route::get('/seri-kendaraan/detail/{id}', 'detail')->name('seriKendaraan.detail');

        Route::get('/seri-kendaraan/tambah', 'create')->name('seriKendaraan.create');
        Route::post('/seri-kendaraan/tambah', 'store')->name('seriKendaraan.store');
        Route::get('/seri-kendaraan/edit/{id}', 'edit')->name('seriKendaraan.edit');
        Route::post('/seri-kendaraan/edit/{id}', 'update')->name('seriKendaraan.update');
        Route::post('/seri-kendaraan/hapus/{id}', 'delete')->name('seriKendaraan.delete');
    });

    // KATEGORI KILOMETER KENDARAAN
    Route::controller(KategoriKilometerKendaraanController::class)->group(function () {
        Route::get('/kilometer-kendaraan', 'index')->name('kilometerKendaraan');
        Route::post('/kilometer-kendaraan/cari', 'search')->name('kilometerKendaraan.search');
        Route::get('/kilometer-kendaraan/detail/{id}', 'detail')->name('kilometerKendaraan.detail');
        Route::post('/kilometer-kendaraan/tambah', 'store')->name('kilometerKendaraan.store');
        Route::post('/kilometer-kendaraan/edit/{id}', 'update')->name('kilometerKendaraan.update');
        Route::post('/kilometer-kendaraan/hapus/{id}', 'delete')->name('kilometerKendaraan.delete');
    });

    // PELANGGAN
    Route::controller(PelangganController::class)->group(function () {
        Route::get('/pelanggan', 'index')->name('pelanggan');
        Route::post('/pelanggan/cari', 'search')->name('pelanggan.search');
        Route::get('/pelanggan/detail/{id}', 'detail')->name('pelanggan.detail');
        Route::get('/pelanggan/tambah', 'create')->name('pelanggan.create');
        Route::post('/pelanggan/tambah', 'store')->name('pelanggan.store');
        Route::get('/pelanggan/edit/{id}', 'edit')->name('pelanggan.edit');
        Route::post('/pelanggan/edit/{id}', 'update')->name('pelanggan.update');
        Route::post('/pelanggan/hapus/{id}', 'delete')->name('pelanggan.delete');
    });

    // SOPIR
    Route::controller(SopirController::class)->group(function () {
        Route::get('/sopir', 'index')->name('sopir');
        Route::post('/sopir/cari', 'search')->name('sopir.search');
        Route::get('/sopir/detail/{id}', 'detail')->name('sopir.detail');
        Route::get('/sopir/tambah', 'create')->name('sopir.create');
        Route::post('/sopir/tambah', 'store')->name('sopir.store');
        Route::get('/sopir/edit/{id}', 'edit')->name('sopir.edit');
        Route::post('/sopir/edit/{id}', 'update')->name('sopir.update');
        Route::post('/sopir/hapus/{id}', 'delete')->name('sopir.delete');
    });

    // SERVIS
    Route::controller(ServisController::class)->group(function () {
        Route::get('/servis', 'index')->name('servis');
        Route::post('/servis/cari', 'search')->name('servis.search');
        Route::get('/servis/check/{id}', 'check')->name('servis.check');
        Route::post('/servis/check/{id}', 'checkAction')->name('servis.check.action');
    });

    // PAJAK
    Route::controller(PajakController::class)->group(function () {
        Route::get('/pajak', 'index')->name('pajak');
        Route::post('/pajak/cari', 'search')->name('pajak.search');
        Route::get('/pajak/transaksi/{id}', 'transaction')->name('pajak.transaction');
        Route::post('/pajak/transaksi/{id}', 'transactionAction')->name('pajak.transaction.action');
    });
});

Route::middleware('auth')->group(function () {
    // AUTH
    Route::controller(AuthController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });

    // DASHBOARD
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    // PENGGUNA
    Route::controller(PenggunaController::class)->group(function () {
        Route::get('/pengguna', 'index')->name('pengguna');
        Route::post('/pengguna/cari', 'search')->name('pengguna.search');
        Route::get('/pengguna/detail/{id}', 'detail')->name('pengguna.detail');
        Route::post('/pengguna/tambah', 'store')->name('pengguna.store');
        Route::post('/pengguna/edit/{id}', 'update')->name('pengguna.update');
        Route::post('/pengguna/hapus/{id}', 'delete')->name('pengguna.delete');
    });

    // BOOKING
    Route::controller(BookingController::class)->group(function () {
        Route::post('/booking/check', 'check')->name('booking.check');
        Route::get('/booking/get-pelanggan', 'getPelanggan');
        Route::get('/booking/check-pelanggan/{pelanggans_id}/{tanggal_mulai}/{tanggal_akhir}', 'checkPelanggan');
        Route::get('/booking/check-kendaraan/{tanggal_mulai}/{tanggal_akhir}', 'checkKendaraan');
        Route::get('/booking/check-sopir/{tanggal_mulai}/{tanggal_akhir}', 'checkSopir');
        Route::get('/booking/check-seri/{idSeri}/{tanggal_mulai}/{tanggal_akhir}', 'checkSeriKendaraan');

        Route::get('/booking/check-kendaraan-edit/{id}/{tanggal_mulai}/{tanggal_akhir}', 'checkKendaraanEdit');
        Route::get('/booking/check-sopir-edit/{id}/{tanggal_mulai}/{tanggal_akhir}', 'checkSopirEdit');
        Route::get('/booking/check-seri-edit/{id}/{idSeri}/{tanggal_mulai}/{tanggal_akhir}', 'checkSeriKendaraanEdit');

        Route::get('/booking/get-jenis', 'getJenisKendaraan');
        Route::get('/booking/get-brand', 'getBrandKendaraan');
        Route::get('/booking/detail/{id}', 'detail')->name('booking.detail');
        Route::get('/booking/tambah/', 'booking')->name('booking.create');
        Route::post('/booking/tambah/', 'bookingAction')->name('booking.create.action');
        Route::get('/booking/edit/{id}', 'edit')->name('booking.edit');
        Route::post('/booking/edit/{id}', 'update')->name('booking.update');
        Route::post('/booking/hapus/{id}', 'delete')->name('booking.delete');
    });

    // PEMESANAN
    Route::controller(PemesananController::class)->group(function () {
        Route::get('/pemesanan', 'index')->name('pemesanan');
        Route::post('/pemesanan/cari', 'search')->name('pemesanan.search');
        Route::get('/pemesanan/{id}', 'searchBooking')->name('pemesanan.search.booking');
        Route::get('/pemesanan/release/{id}', 'release')->name('pemesanan.release');
        Route::post('/pemesanan/release/{id}', 'releaseAction')->name('pemesanan.release.action');
        Route::get('/pemesanan/edit/{id}', 'edit')->name('pemesanan.edit');
        Route::post('/pemesanan/edit/{id}', 'update')->name('pemesanan.update');
        Route::post('/pemesanan/hapus/{id}', 'delete')->name('pemesanan.delete');
    });

    // KENDARAAN DISEWA
    Route::controller(PenambahanSewaController::class)->group(function () {
        Route::get('/penambahan-sewa/tambah-sewa/{id}', 'create')->name('penambahan.rent');
        Route::post('/penambahan-sewa/tambah-sewa/{id}', 'store')->name('penambahan.store');
    });

    // PENGEMBALIAN
    Route::controller(PengembalianController::class)->group(function () {
        Route::get('/pengembalian', 'index')->name('pengembalian');
        Route::post('/pengembalian/cari', 'search')->name('pengembalian.search');
        Route::get('/pengembalian/detail/kendaraan/{id}', 'detail')->name('pengembalian.detail');
        Route::get('/pengembalian/kendaraan/{id}', 'restoration')->name('pengembalian.restoration');
        Route::post('/pengembalian/kendaraan/{id}', 'restorationAction')->name('pengembalian.restoration.action');
    });

    // LAPORAN
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/laporan', 'index')->name('laporan');
        Route::get('/laporan/pelanggan', 'laporanPelanggan')->name('laporan.pelanggan');
        Route::get('/laporan/sopir', 'laporanSopir')->name('laporan.sopir');
        Route::get('/laporan/kendaraan', 'laporanKendaraan')->name('laporan.kendaraan');
        Route::get('/laporan/booking', 'laporanBooking')->name('laporan.booking');
        Route::get('/laporan/pemesanan', 'laporanPemesanan')->name('laporan.pemesanan');
        Route::post('/laporan/pemesanan/{id}', 'updatePemesanan')->name('laporan.pemesanan.update');
        Route::get('/laporan/pengembalian', 'laporanPengembalian')->name('laporan.pengembalian');
        Route::get('/laporan/penambahan', 'laporanPenambahan')->name('laporan.penambahan');
        Route::get('/laporan/servis', 'laporanServis')->name('laporan.servis');
        Route::get('/laporan/pajak', 'laporanPajak')->name('laporan.pajak');
        Route::get('/laporan/pemesanan/{id}', 'detailLaporan')->name('laporan.pemesanan.detail');
        Route::get('/laporan/pemesanan/{id}/print', 'generatePemesanan')->name('laporan.pemesanan.print');
        Route::get('/laporan/pengembalian/{id}/print', 'generatePengembalian')->name('laporan.pengembalian.print');
    });
});
