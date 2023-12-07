-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2023 at 10:03 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `auths`
--

CREATE TABLE `auths` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','staff') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auths`
--

INSERT INTO `auths` (`id`, `nama_pengguna`, `email`, `password`, `role`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Putu Aditya Prayatna', 'adityaprayatna@gmail.com', '$2y$10$WqeG9fNCpV4FBEZYGow11.a20EUC.nVvtZDQGEI0Pnhnz9ZL8LGIS', 'admin', NULL, '2023-12-07 08:50:35', '2023-12-07 08:50:35'),
(2, 'Dewi Ratnasari', 'dewiratnasari@gmail.com', '$2y$10$Ru02xp6qWD8c3vXOmPUXVeK.gGcCqMS.1IyCootYXvPwxRyuBBMNm', 'staff', NULL, '2023-12-07 08:50:36', '2023-12-07 08:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `brand_kendaraans`
--

CREATE TABLE `brand_kendaraans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_kendaraans`
--

INSERT INTO `brand_kendaraans` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Honda', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(2, 'Toyota', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraans`
--

CREATE TABLE `jenis_kendaraans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kendaraans`
--

INSERT INTO `jenis_kendaraans` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kendaraan Beroda 2', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(2, 'Kendaraan Beroda 4', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kilometer_kendaraans`
--

CREATE TABLE `kategori_kilometer_kendaraans` (
  `id` bigint UNSIGNED NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_kilometer_kendaraans`
--

INSERT INTO `kategori_kilometer_kendaraans` (`id`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2500', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(2, '5000', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(3, '10000', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_kendaraans_id` bigint NOT NULL,
  `brand_kendaraans_id` bigint NOT NULL,
  `seri_kendaraans_id` bigint NOT NULL,
  `kategori_kilometer_kendaraans_id` bigint NOT NULL,
  `foto_kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stnk_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometer_saat_ini` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_sewa_hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_sewa_minggu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_sewa_bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_pembuatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rangka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_mesin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ready','booking','dipesan','servis') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `jenis_kendaraans_id`, `brand_kendaraans_id`, `seri_kendaraans_id`, `kategori_kilometer_kendaraans_id`, `foto_kendaraan`, `stnk_nama`, `nomor_plat`, `kilometer`, `kilometer_saat_ini`, `tarif_sewa_hari`, `tarif_sewa_minggu`, `tarif_sewa_bulan`, `tahun_pembuatan`, `tanggal_pembelian`, `warna`, `nomor_rangka`, `nomor_mesin`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 3, 'sample-1.jpg', 'Dimas Saputra', 'DK 234 JGH', '10000', '10000', '300000', '1200000', '4600000', '2018', '2023-09-10', 'Kuning', '63456457457', '23453254657', 'ready', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(2, 2, 2, 2, 2, 'sample-2.jpg', 'Putri Sekar Wangi', 'B 754 POA', '5000', '5000', '200000', '1000000', '3000000', '2020', '2023-10-08', 'Merah', '345646577', '235234354657', 'ready', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(3, 1, 2, 1, 2, 'sample-3.jpg', 'Ranti Sekarini', 'L 453 HAU', '7000', '7000', '300000', '1200000', '3000000', '2023', '2023-10-08', 'Kuning', '3456456575687', '234234345456', 'ready', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(4, 2, 1, 2, 1, 'sample-4.jpg', 'Dewa Putra', 'A 81 JQB', '10000', '10000', '400000', '1500000', '4000000', '2021', '2023-10-08', 'Merah', '674567687684', '98785454657', 'ready', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint UNSIGNED NOT NULL,
  `penggunas_id` bigint NOT NULL,
  `relations_id` bigint NOT NULL,
  `kategori_laporan` enum('pelanggan','sopir','kendaraan','booking','pemesanan','pengembalian','penambahan','servis','pajak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporans`
--

INSERT INTO `laporans` (`id`, `penggunas_id`, `relations_id`, `kategori_laporan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'pelanggan', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(2, 1, 2, 'pelanggan', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(3, 1, 3, 'pelanggan', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(4, 1, 1, 'sopir', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(5, 1, 2, 'sopir', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(6, 1, 3, 'sopir', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(7, 1, 1, 'kendaraan', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(8, 1, 2, 'kendaraan', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(9, 1, 3, 'kendaraan', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(10, 1, 4, 'kendaraan', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_09_12_080027_create_auths_table', 1),
(5, '2023_09_20_000003_create_kendaraans_table', 1),
(6, '2023_09_20_011548_create_penambahan_sewas_table', 1),
(7, '2023_09_20_102202_create_jenis_kendaraans_table', 1),
(8, '2023_09_20_102223_create_brand_kendaraans_table', 1),
(9, '2023_09_20_102241_create_seri_kendaraans_table', 1),
(10, '2023_09_20_102745_create_kategori_kilometer_kendaraans_table', 1),
(11, '2023_09_21_065548_create_pelanggans_table', 1),
(12, '2023_09_21_074852_create_sopirs_table', 1),
(13, '2023_09_21_080548_create_laporans_table', 1),
(14, '2023_09_21_134932_create_pemesanans_table', 1),
(15, '2023_09_22_013247_create_pengembalians_table', 1),
(16, '2023_09_22_014618_create_servis_table', 1),
(17, '2023_09_22_024301_create_pajaks_table', 1),
(18, '2023_09_24_174451_create_pelepasan_pemesanans_table', 1),
(19, '2023_09_25_184935_create_pembayaran_pemesanans_table', 1),
(20, '2023_10_22_155043_add_data_nomor_telepon_to_pelanggans', 1),
(21, '2023_10_22_155313_add_data_nomor_telepon_to_sopirs', 1),
(22, '2023_10_22_155534_add_total_harian_mingguan_bulanan_to_pemesanans', 1),
(23, '2023_10_22_200406_add_total_kembalian_to_pembayaran_pemesanans_table', 1),
(24, '2023_10_22_204600_add_total_kembalian_to_pengembalians_table', 1),
(25, '2023_11_03_131840_add_finance_to_pajaks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pajaks`
--

CREATE TABLE `pajaks` (
  `id` bigint UNSIGNED NOT NULL,
  `kendaraans_id` bigint NOT NULL,
  `jenis_pajak` enum('samsat','angsuran','ganti nomor polisi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `metode_bayar` enum('transfer bank','internet banking','mobile banking','virtual account','online credit card','rekening bersama','payPal','e-money') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `finance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_ktp` enum('benar','salah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_kk` enum('benar','salah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan_ktp` enum('lengkap','belum lengkap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan_kk` enum('lengkap','belum lengkap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan_nomor_telepon` enum('lengkap','belum lengkap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `data_nomor_telepon` enum('benar','salah') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `nik`, `nomor_telepon`, `nomor_ktp`, `nomor_kk`, `foto_ktp`, `foto_kk`, `alamat`, `data_ktp`, `data_kk`, `kelengkapan_ktp`, `kelengkapan_kk`, `kelengkapan_nomor_telepon`, `created_at`, `updated_at`, `deleted_at`, `data_nomor_telepon`) VALUES
(1, 'Bayu Pradana', '00454654435', '08123456789', '34265768645', '34556565734', NULL, NULL, 'Jl. Ahmad Yani', 'benar', 'benar', 'belum lengkap', 'belum lengkap', 'lengkap', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL, 'benar'),
(2, 'Ayu Saputri', '3454657568', '08987654321', '45634645657', '34354657657', NULL, NULL, 'Jl. Dalung', 'benar', 'benar', 'belum lengkap', 'belum lengkap', 'lengkap', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL, 'benar'),
(3, 'Pratama Yoga', '34564575678', '08123456789', '8956757567678', '45646578686', NULL, NULL, 'Jl. Cargo Sari', 'benar', 'benar', 'belum lengkap', 'belum lengkap', 'lengkap', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL, 'benar');

-- --------------------------------------------------------

--
-- Table structure for table `pelepasan_pemesanans`
--

CREATE TABLE `pelepasan_pemesanans` (
  `id` bigint UNSIGNED NOT NULL,
  `pemesanans_id` bigint NOT NULL,
  `kendaraans_id` bigint NOT NULL,
  `foto_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_nota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_nota_ttd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kilometer_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bensin_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sarung_jok` enum('ada','tidak ada','kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `karpet` enum('ada','tidak ada','kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_kendaraan` enum('baik','rusak ringan','rusak berat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban_serep` enum('ada','tidak ada','kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_pemesanans`
--

CREATE TABLE `pembayaran_pemesanans` (
  `id` bigint UNSIGNED NOT NULL,
  `pelepasan_pemesanans_id` bigint NOT NULL,
  `kendaraans_id` bigint NOT NULL,
  `sopirs_id` bigint DEFAULT NULL,
  `foto_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_sewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran` enum('lunas','dp','belum bayar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_tarif_sewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode_bayar` enum('transfer bank','internet banking','mobile banking','virtual account','online credit card','rekening bersama','payPal','e-money') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `total_kembalian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` bigint UNSIGNED NOT NULL,
  `pelanggans_id` bigint NOT NULL,
  `sopirs_id` bigint DEFAULT NULL,
  `kendaraans_id` bigint NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `kode_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_mingguan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bulanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_akhir_awal` date DEFAULT NULL,
  `status` enum('booking','selesai booking','selesai') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penambahan_sewas`
--

CREATE TABLE `penambahan_sewas` (
  `id` bigint UNSIGNED NOT NULL,
  `pelepasan_pemesanans_id` bigint NOT NULL,
  `kendaraans_id` bigint NOT NULL,
  `jumlah_hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalians`
--

CREATE TABLE `pengembalians` (
  `id` bigint UNSIGNED NOT NULL,
  `pelepasan_pemesanans_id` bigint NOT NULL,
  `foto_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran` enum('lunas','dp','belum bayar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode_bayar` enum('transfer bank','internet banking','mobile banking','virtual account','online credit card','rekening bersama','payPal','e-money') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kembali` date NOT NULL,
  `kilometer_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bensin_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketepatan_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terlambat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sarung_jok` enum('ada','tidak ada','kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `karpet` enum('ada','tidak ada','kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_kendaraan` enum('baik','rusak ringan','rusak berat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban_serep` enum('ada','tidak ada','kosong') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_tambahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `total_kembalian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seri_kendaraans`
--

CREATE TABLE `seri_kendaraans` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_kendaraans_id` bigint NOT NULL,
  `brand_kendaraans_id` bigint NOT NULL,
  `nomor_seri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seri_kendaraans`
--

INSERT INTO `seri_kendaraans` (`id`, `jenis_kendaraans_id`, `brand_kendaraans_id`, `nomor_seri`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '00656676867', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL),
(2, 2, 2, '00546546768', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `id` bigint UNSIGNED NOT NULL,
  `kendaraans_id` bigint NOT NULL,
  `tanggal_servis` date NOT NULL,
  `kilometer_sebelum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometer_setelah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `air_accu` enum('ada','tidak ada','kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `air_waiper` enum('ada','tidak ada','kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban` enum('ada','tidak ada','kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `oli` enum('ada','tidak ada','kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` text COLLATE utf8mb4_unicode_ci,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sopirs`
--

CREATE TABLE `sopirs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_sim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_sim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_ktp` enum('benar','salah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_sim` enum('benar','salah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ada','tidak ada') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan_ktp` enum('lengkap','belum lengkap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan_sim` enum('lengkap','belum lengkap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan_nomor_telepon` enum('lengkap','belum lengkap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `data_nomor_telepon` enum('benar','salah') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sopirs`
--

INSERT INTO `sopirs` (`id`, `nama`, `nik`, `nomor_telepon`, `nomor_ktp`, `nomor_sim`, `foto_ktp`, `foto_sim`, `alamat`, `data_ktp`, `data_sim`, `status`, `kelengkapan_ktp`, `kelengkapan_sim`, `kelengkapan_nomor_telepon`, `created_at`, `updated_at`, `deleted_at`, `data_nomor_telepon`) VALUES
(1, 'Agus Wirawan', '867745675676', '089734536453', '345465768', '32435466576', NULL, NULL, 'Jl. Cargo', 'benar', 'benar', 'ada', 'belum lengkap', 'belum lengkap', 'lengkap', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL, 'benar'),
(2, 'Dewi Cindrawati', '0845345456554', '0897645312', '457567686789', '65678686767', NULL, NULL, 'Jl. Gatsu Utara', 'benar', 'benar', 'ada', 'belum lengkap', 'belum lengkap', 'lengkap', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL, 'benar'),
(3, 'Segara Putra', '45645657564545', '0875674565475', '6756435657567', '2343534545675', NULL, NULL, 'Jl. Dalung Permai', 'benar', 'benar', 'ada', 'belum lengkap', 'belum lengkap', 'lengkap', '2023-12-07 08:50:36', '2023-12-07 08:50:36', NULL, 'benar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auths`
--
ALTER TABLE `auths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_kendaraans`
--
ALTER TABLE `brand_kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_kendaraans`
--
ALTER TABLE `jenis_kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_kilometer_kendaraans`
--
ALTER TABLE `kategori_kilometer_kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kendaraans_jenis_kendaraans_id_index` (`jenis_kendaraans_id`),
  ADD KEY `kendaraans_brand_kendaraans_id_index` (`brand_kendaraans_id`),
  ADD KEY `kendaraans_seri_kendaraans_id_index` (`seri_kendaraans_id`),
  ADD KEY `kendaraans_kategori_kilometer_kendaraans_id_index` (`kategori_kilometer_kendaraans_id`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporans_penggunas_id_index` (`penggunas_id`),
  ADD KEY `laporans_relations_id_index` (`relations_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pajaks`
--
ALTER TABLE `pajaks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pajaks_kendaraans_id_index` (`kendaraans_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelepasan_pemesanans`
--
ALTER TABLE `pelepasan_pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelepasan_pemesanans_pemesanans_id_index` (`pemesanans_id`),
  ADD KEY `pelepasan_pemesanans_kendaraans_id_index` (`kendaraans_id`);

--
-- Indexes for table `pembayaran_pemesanans`
--
ALTER TABLE `pembayaran_pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_pemesanans_pelepasan_pemesanans_id_index` (`pelepasan_pemesanans_id`),
  ADD KEY `pembayaran_pemesanans_kendaraans_id_index` (`kendaraans_id`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanans_pelanggans_id_index` (`pelanggans_id`),
  ADD KEY `pemesanans_sopirs_id_index` (`sopirs_id`),
  ADD KEY `pemesanans_kendaraans_id_index` (`kendaraans_id`);

--
-- Indexes for table `penambahan_sewas`
--
ALTER TABLE `penambahan_sewas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penambahan_sewas_pelepasan_pemesanans_id_index` (`pelepasan_pemesanans_id`),
  ADD KEY `penambahan_sewas_kendaraans_id_index` (`kendaraans_id`);

--
-- Indexes for table `pengembalians`
--
ALTER TABLE `pengembalians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengembalians_pelepasan_pemesanans_id_index` (`pelepasan_pemesanans_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `seri_kendaraans`
--
ALTER TABLE `seri_kendaraans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seri_kendaraans_jenis_kendaraans_id_index` (`jenis_kendaraans_id`),
  ADD KEY `seri_kendaraans_brand_kendaraans_id_index` (`brand_kendaraans_id`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servis_kendaraans_id_index` (`kendaraans_id`);

--
-- Indexes for table `sopirs`
--
ALTER TABLE `sopirs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auths`
--
ALTER TABLE `auths`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand_kendaraans`
--
ALTER TABLE `brand_kendaraans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kendaraans`
--
ALTER TABLE `jenis_kendaraans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_kilometer_kendaraans`
--
ALTER TABLE `kategori_kilometer_kendaraans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pajaks`
--
ALTER TABLE `pajaks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelepasan_pemesanans`
--
ALTER TABLE `pelepasan_pemesanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_pemesanans`
--
ALTER TABLE `pembayaran_pemesanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penambahan_sewas`
--
ALTER TABLE `penambahan_sewas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalians`
--
ALTER TABLE `pengembalians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seri_kendaraans`
--
ALTER TABLE `seri_kendaraans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sopirs`
--
ALTER TABLE `sopirs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
