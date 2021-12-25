-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 09:38 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simanda_tiub`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_agama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `alat_latihan`
--

CREATE TABLE `alat_latihan` (
  `id` bigint(20) NOT NULL,
  `namaAlat` varchar(255) NOT NULL,
  `ukuran` char(5) NOT NULL,
  `kondisi` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `penyimpanan_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alat_latihan`
--

INSERT INTO `alat_latihan` (`id`, `namaAlat`, `ukuran`, `kondisi`, `jumlah`, `harga`, `keterangan`, `gambar`, `penyimpanan_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(2, 'Body Protector', '3', 'baik', 2, 30000, 'Baru', '', 1, 2, '2021-12-22 04:00:51', '2021-12-22 04:00:51'),
(3, 'Body Protector', '4', 'baik', 2, 30000, 'Baru', '', 1, 2, '2021-12-22 04:00:51', '2021-12-22 04:00:51'),
(4, 'Hand Gloves', 'M', 'baik', 3, 20000, 'Baru', '', 1, 2, '2021-12-22 04:00:51', '2021-12-22 04:00:51'),
(5, 'Hand Gloves', 'L', 'baik', 3, 20000, 'Baru', '', 1, 2, '2021-12-22 04:00:51', '2021-12-22 04:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` char(15) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama_id` bigint(20) UNSIGNED NOT NULL,
  `alamat_asal` text NOT NULL,
  `alamat_malang` text NOT NULL,
  `no_telp` char(15) NOT NULL,
  `id_line` varchar(255) NOT NULL,
  `fakultas_id` bigint(20) UNSIGNED NOT NULL,
  `prodi_jurusan` varchar(255) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `tingkatan` varchar(255) NOT NULL,
  `spab` char(5) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `nim`, `tempat_lahir`, `tgl_lahir`, `agama_id`, `alamat_asal`, `alamat_malang`, `no_telp`, `id_line`, `fakultas_id`, `prodi_jurusan`, `angkatan`, `tingkatan`, `spab`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Bram', '1831XXXXXXXXXXX', 'Kediri', '1999-08-20', 1, 'Jladlaks, daskdj , asdjk', 'aas,ldma. asdj,asda,das', '012931293912', '@kjdakdjalskd', 14, 'Teknologi Informasi/Sistem Informasi', 2018, 'Geup 10', '101', '', '2021-12-24 14:25:43', '2021-12-24'),
(2, 'Cesa Rahman Lathif', '183140914111074', 'Kediri', '1999-08-20', 1, 'Jl. Kenongo IV/15 Perumnas Ngronggo', 'Jl. Veteran, Malang, Indonesia', '081615576930', '@cesarahman20', 14, 'undefined', 2018, 'GEUP 10', '101', 'assets/upload/anggota/1640331269183140914111074 merah.jpg', '2021-12-24 07:34:29', '2021-12-24'),
(3, 'Alfeda Ivan Widiaputra', '183140914111075', 'Tulungagung', '1999-12-17', 1, 'Ngunut, Tulungagung', 'Jl. Taman Bunga Merak 2 No, 16', '081234568321', '@alfedaivan', 14, 'undefined', 2018, 'GEUP 5', '101', 'assets/upload/anggota/1640332290ivan.jpeg', '2021-12-24 07:51:30', '2021-12-24'),
(4, 'Farouq Hamzah', '185010101111059', 'Tulungagung', '2000-03-19', 1, 'Desa Bono, Kabupaten Tulungagung', 'Jl. Veteran, Malang, Indonesia', '081237274651', '@farouq_hamzah', 1, 'undefined', 2018, 'DAN 1', '101', 'assets/upload/anggota/1640334331iqbal.jpeg', '2021-12-24 08:25:31', '2021-12-24'),
(5, 'Bambang Sujatmiko', '183140914111076', 'Surabaya', '1999-12-31', 4, 'Jl. Jakarta No. 13, Surabaya', 'Jl. Terusan Jakarta No. 118', 'undefined', 'undefined', 2, 'Kewirausahaan/Manajemen', 2018, 'GEUP 5', '102', 'assets/upload/anggota/1640415906denny.jpeg', '2021-12-25 07:05:06', '2021-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `barang_rumah_tangga`
--

CREATE TABLE `barang_rumah_tangga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `penyimpanan_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_rumah_tangga`
--

INSERT INTO `barang_rumah_tangga` (`id`, `namaBarang`, `kondisi`, `jumlah`, `keterangan`, `penyimpanan_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'Televisi', 'Baik', 1, '', 1, 1, '2021-11-09 03:48:30', '2021-11-09 03:48:30'),
(2, 'Kasur', 'rusak', 1, 'Rusak Berat', 1, 1, '2021-12-04 05:31:39', '2021-12-04 05:31:39'),
(4, 'Papan Tulis', 'rusak', 2, '<p>Perlu penggantian barang menjadi barang baru</p>', 1, 1, '2021-12-14 21:33:17', '2021-12-14 21:33:17'),
(5, 'Lemari', 'rusak', 1, '<p>Perlu ganti unit1</p>', 1, 1, '2021-12-15 02:32:51', '2021-12-15 02:32:51'),
(6, 'Printer', 'cukup', 1, '<p>Perlu sedikit perbaikan dan tinta baru</p>', 1, 1, '2021-12-15 02:35:44', '2021-12-15 02:35:44'),
(7, 'Rak', 'rusak', 1, '<p>Perlu ganti baru</p>', 1, 1, '2021-12-15 02:54:48', '2021-12-15 02:54:48'),
(8, 'Galon', 'baik', 2, '<p>-</p>', 1, 1, '2021-12-15 07:08:35', '2021-12-15 07:08:35'),
(9, 'Box Termos', 'baik', 1, '<p>-</p>', 1, 1, '2021-12-15 07:40:46', '2021-12-15 07:40:46'),
(10, 'Papan Tulis', 'rusak', 1, '<p>-</p>', 1, 1, '2021-12-15 08:26:09', '2021-12-15 08:26:09'),
(11, 'Genset', 'cukup', 1, '<p>Perlu perbaikan ringan</p>', 1, 1, '2021-12-16 04:05:37', '2021-12-16 04:05:37'),
(12, 'Meja lipat', 'cukup', 1, '<p>Disarankan ganti baru</p>', 1, 1, '2021-12-16 20:23:14', '2021-12-16 20:23:14'),
(13, 'Papan Struktur Organisasi', 'baik', 1, '<p>Perlu dibersihkan</p>', 1, 1, '2021-12-16 20:28:59', '2021-12-16 20:28:59'),
(14, 'Speaker', 'cukup', 1, '<p>Perlu perbaikan ringan</p>', 1, 1, '2021-12-17 21:41:45', '2021-12-17 21:41:45'),
(15, 'Rak Plastik', 'baik', 1, '<p>Hanya perlu dibersihkan</p>', 1, 1, '2021-12-19 20:42:54', '2021-12-19 20:42:54'),
(16, 'Kemoceng', 'cukup', 1, '<p>Disarankan ganti baru</p>', 1, 1, '2021-12-19 20:46:46', '2021-12-19 20:46:46'),
(17, 'Rak Rotan', 'rusak', 1, '<p>Perlu penggantian</p>', 1, 1, '2021-12-22 19:12:33', '2021-12-22 19:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `initial` varchar(255) NOT NULL,
  `namaFakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `initial`, `namaFakultas`) VALUES
(1, 'FH', 'Fakultas Hukum'),
(2, 'FEB', 'Fakultas Ekonomi dan Bisnis'),
(3, 'FIA', 'Fakultas Ilmu Administrasi'),
(4, 'FP', 'Fakultas Pertanian'),
(5, 'FAPET', 'Fakultas Peternakan'),
(6, 'FT', 'Fakultas Teknik'),
(7, 'FK', 'Fakultas Kedokteran'),
(8, 'FPIK', 'Fakultas Perikanan dan Ilmu Kelautan'),
(9, 'FMIPA', 'Fakultas Matematikan dan Ilmu Pengetahuan Alam'),
(10, 'FTP', 'Fakultas Teknologi Pertanian'),
(11, 'FIB', 'Fakultas Ilmu Budaya'),
(12, 'FISIP', 'Fakultas Ilmu Sosial dan Ilmu Politik'),
(13, 'FKH', 'Fakultas Kedokteran Hewan'),
(14, 'VOKASI', 'Program Pendidikan Vokasi'),
(15, 'FILKOM', 'Fakultas Ilmu Komputer'),
(16, 'FKG', 'Fakultas Kedokteran Gigi'),
(17, 'UMUM', 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `nama`, `aksi`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Genset\'', 0, '2021-12-04 02:00:47', '2021-12-04 02:00:47'),
(2, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Genset\'', 0, '2021-12-04 02:02:35', '2021-12-04 02:02:35'),
(3, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Genset\'', 0, '2021-12-04 02:04:05', '2021-12-04 02:04:05'),
(4, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Papan Tulis\'', 0, '2021-12-14 21:33:17', '2021-12-14 21:33:17'),
(5, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Lemari\'', 0, '2021-12-15 02:32:51', '2021-12-15 02:32:51'),
(6, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Printer\'', 0, '2021-12-15 02:35:44', '2021-12-15 02:35:44'),
(7, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Rak\'', 0, '2021-12-15 02:54:48', '2021-12-15 02:54:48'),
(8, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Speaker\'', 0, '2021-12-15 03:01:19', '2021-12-15 03:01:19'),
(9, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Speaker\'', 0, '2021-12-15 03:01:36', '2021-12-15 03:01:36'),
(10, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Galon\'', 0, '2021-12-15 07:08:35', '2021-12-15 07:08:35'),
(11, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Box Termos\'', 0, '2021-12-15 07:40:46', '2021-12-15 07:40:46'),
(12, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Karpet\'', 0, '2021-12-15 08:23:29', '2021-12-15 08:23:29'),
(13, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Karpet\'', 0, '2021-12-15 08:24:58', '2021-12-15 08:24:58'),
(14, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Papan Tulis\'', 0, '2021-12-15 08:26:09', '2021-12-15 08:26:09'),
(15, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Genset\'', 0, '2021-12-16 04:05:37', '2021-12-16 04:05:37'),
(16, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Meja lipat\'', 0, '2021-12-16 20:23:14', '2021-12-16 20:23:14'),
(17, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Papan Struktur Organisasi\'', 0, '2021-12-16 20:28:59', '2021-12-16 20:28:59'),
(18, 'Cece', 'Hapus', 'Menghapus Barang Rumah Tangga \'Speaker\'', 0, '2021-12-17 03:35:57', '2021-12-17 03:35:57'),
(19, 'Cece', 'Hapus', 'Menghapus Barang Rumah Tangga \'Karpet\'', 0, '2021-12-17 03:37:39', '2021-12-17 03:37:39'),
(20, 'Cece', 'Hapus', 'Menghapus Barang Rumah Tangga \'Speaker\'', 0, '2021-12-17 20:48:48', '2021-12-17 20:48:48'),
(21, 'Cece', 'Hapus', 'Menghapus Barang Rumah Tangga \'Karpet\'', 0, '2021-12-17 20:49:11', '2021-12-17 20:49:11'),
(22, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Speaker\'', 0, '2021-12-17 21:41:45', '2021-12-17 21:41:45'),
(23, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Rak Plastik\'', 0, '2021-12-19 20:42:54', '2021-12-19 20:42:54'),
(24, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Kemoceng\'', 0, '2021-12-19 20:46:46', '2021-12-19 20:46:46'),
(25, 'Cece', 'Tambah', 'Menambahkan Data Prestasi\'Kejuprov Jatim 2021\'', 0, '2021-12-22 11:47:15', '2021-12-22 11:47:15'),
(26, 'Cece', 'Tambah', 'Menambahkan Data Prestasi\'Kejuprov Jatim 2021\'', 0, '2021-12-22 11:48:18', '2021-12-22 11:48:18'),
(27, 'Inti', 'Edit', 'Akun \'inti@email.com\' memperbarui Nama menjadi \'Cece\'', 0, '2021-12-22 13:24:08', '2021-12-22 13:24:08'),
(28, 'Cece', 'Edit', 'Akun \'inti@email.com\' mengubah passwordnya\'', 0, '2021-12-22 13:25:27', '2021-12-22 13:25:27'),
(29, 'Cece', 'Tambah', 'Menambahkan Akun \'staff1@email.com\'', 0, '2021-12-22 15:03:26', '2021-12-22 15:03:26'),
(30, 'staff1', 'Edit', 'Akun \'staff1@email.com\' memperbarui profilenya', 0, '2021-12-22 15:04:51', '2021-12-22 15:04:51'),
(32, 'Cece', 'Tambah', 'Menambahkan Akun \'bambang@email.com\'', 0, '2021-12-22 15:12:38', '2021-12-22 15:12:38'),
(33, 'SuperDuperAdmin', 'Edit', 'Akun \'superduperadmin@email.com\' memperbarui profilenya', 0, '2021-12-22 15:23:28', '2021-12-22 15:23:28'),
(34, 'Cece', 'Hapus', 'Menghapus Akun \'bambang@email.com\' beserta Historynya', NULL, '2021-12-22 15:36:18', '2021-12-22 15:36:18'),
(35, 'Cece', 'Tambah', 'Menambahkan Barang Rumah Tangga \'Rak Rotan\'', NULL, '2021-12-22 19:12:33', '2021-12-22 19:12:33'),
(36, 'Cece', 'Hapus', 'Menghapus Barang Rumah Tangga \'Logo TIUB\'', NULL, '2021-12-22 19:14:58', '2021-12-22 19:14:58'),
(37, 'Cece', 'Hapus', 'Menghapus Barang Rumah Tangga \'\'', NULL, '2021-12-22 19:20:03', '2021-12-22 19:20:03'),
(38, 'Cece', 'Tambah', 'Menambahkan Data Prestasi\'WALIKOTA CUP 2020\'', NULL, '2021-12-22 19:22:47', '2021-12-22 19:22:47'),
(39, 'Cece', 'Tambah', 'Menambahkan Data Prestasi\'KEJURPROV JATIM 2021\'', NULL, '2021-12-23 00:41:55', '2021-12-23 00:41:55'),
(40, 'Cece', 'Tambah', 'Menambahkan Anggota \'Cesa Rahman Lathif\'', NULL, '2021-12-24 00:34:29', '2021-12-24 00:34:29'),
(41, 'Cece', 'Tambah', 'Menambahkan Anggota \'Alfeda Ivan Widiaputra\'', NULL, '2021-12-24 00:51:30', '2021-12-24 00:51:30'),
(42, 'Cece', 'Tambah', 'Menambahkan Anggota \'Farouq Hamzah\'', NULL, '2021-12-24 01:25:31', '2021-12-24 01:25:31'),
(43, 'Cece', 'Tambah', 'Menambahkan Anggota \'Bambang Sujatmiko\'', NULL, '2021-12-25 00:05:06', '2021-12-25 00:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `ukuran` char(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama_barang`, `thumbnail`, `ukuran`, `jumlah`, `harga`) VALUES
(1, 'Televisi', '', '-', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Barang Rumah Tangga'),
(2, 'Alat Latihan');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL,
  `namaKejuaraan` varchar(255) NOT NULL,
  `capaian` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `namaAtlet` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `tahun`, `namaKejuaraan`, `capaian`, `kategori`, `kelas`, `namaAtlet`, `created_at`, `updated_at`) VALUES
(1, 2019, 'PEKAN OLAHRAGA PROVINSI VI JATIM', 'JUARA 1', 'PRESTASI', 'U-63 KG', 'ALFIAN DZULFIKAR', '2021-12-23 01:46:39', '2021-12-23 01:46:39'),
(2, 2019, 'PEKAN OLAHRAGA PROVINSI VI JATIM', 'JUARA 1', 'PRESTASI', 'U-49 KG', 'MEIDINA CHAERUNNISA', '2021-12-23 01:46:39', '2021-12-23 01:46:39'),
(3, 2021, 'Kejuprov Jatim 2021', 'Juara 1', 'Prestasi', 'U-72 KG', 'Ria SW', '2021-12-22 18:47:15', '2021-12-22 18:47:15'),
(4, 2021, 'Kejuprov Jatim 2021', 'Juara 1', 'Prestasi', 'U-72 KG', 'Puspita Dwi Utami', '2021-12-22 18:48:18', '2021-12-22 18:48:18'),
(5, 2020, 'WALIKOTA CUP 2020', 'JUARA 2', 'PRESTASI', 'U-58 KG', 'AZARIA H.', '2021-12-23 02:22:47', '2021-12-23 02:22:47'),
(6, 2021, 'KEJURPROV JATIM 2021', 'JUARA 1', 'PRESTASI', 'U-63 KG', 'Andra Justiawan', '2021-12-23 07:41:55', '2021-12-23 07:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `preview`
--

CREATE TABLE `preview` (
  `id` bigint(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `invent_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'SuperDuperAdmin'),
(2, 'Inti'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_penyimpanan`
--

CREATE TABLE `tempat_penyimpanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tempat_simpan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_penyimpanan`
--

INSERT INTO `tempat_penyimpanan` (`id`, `tempat_simpan`, `Alamat`) VALUES
(1, 'Gedung UKM Lantai 4/ Ruang IV.1', ''),
(2, 'UB Sport Center', ''),
(3, 'Dojang Rhino Figther', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role_id`, `gambar`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Cece', 'inti@email.com', '$2y$10$1Sug3j/7M5eErWStGfOfNuIVUeJkVpei0HrpJD1Or1/zUMFEJ/62m', 2, '', 'zNPOljV4BJ8mXl6ImSdTdDgIcljzUsZSEqD7LsOmRM8hZ2ukMIGGg0ejp2xv', '2021-11-30 01:11:11', '2021-12-22 13:25:27'),
(3, 'Staff', 'staff@email.com', '$2y$10$HTJm.XCGlg6H2wSn9/uYHOFuvI6XfDGy32qwcbCEzhHfVDXAE.dl6', 3, '', '', '2021-12-02 00:16:13', '2021-12-02 00:16:13'),
(4, 'SuperDuperAdmin', 'superduperadmin@email.com', '$2y$10$bkx8EYKBYh6oA0mpEJJUFO14U23IwICq1YLeylgg01WCMzmQTf54W', 1, '1640211808_body jicalicu.jpg', '', '2021-12-02 00:16:13', '2021-12-22 15:23:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alat_latihan`
--
ALTER TABLE `alat_latihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyimpanan_id` (`penyimpanan_id`,`kategori_id`),
  ADD KEY `alat_latihan_ibfk_1` (`kategori_id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `fakultas_id` (`fakultas_id`),
  ADD KEY `agama_id` (`agama_id`);

--
-- Indexes for table `barang_rumah_tangga`
--
ALTER TABLE `barang_rumah_tangga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyimpanan_id` (`penyimpanan_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preview`
--
ALTER TABLE `preview`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invent_id` (`invent_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_penyimpanan`
--
ALTER TABLE `tempat_penyimpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `alat_latihan`
--
ALTER TABLE `alat_latihan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_rumah_tangga`
--
ALTER TABLE `barang_rumah_tangga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `preview`
--
ALTER TABLE `preview`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tempat_penyimpanan`
--
ALTER TABLE `tempat_penyimpanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat_latihan`
--
ALTER TABLE `alat_latihan`
  ADD CONSTRAINT `alat_latihan_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alat_latihan_ibfk_2` FOREIGN KEY (`penyimpanan_id`) REFERENCES `tempat_penyimpanan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`agama_id`) REFERENCES `agama` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ibfk_4` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `barang_rumah_tangga`
--
ALTER TABLE `barang_rumah_tangga`
  ADD CONSTRAINT `barang_rumah_tangga_ibfk_1` FOREIGN KEY (`penyimpanan_id`) REFERENCES `tempat_penyimpanan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_rumah_tangga_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
