-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 12:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tsukamoto_diagnosis`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturans`
--

CREATE TABLE `aturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_aturan` varchar(255) NOT NULL,
  `diagnosa_id` varchar(255) NOT NULL,
  `h1` varchar(255) DEFAULT NULL,
  `h2` varchar(255) DEFAULT NULL,
  `h3` varchar(255) DEFAULT NULL,
  `h4` varchar(255) DEFAULT NULL,
  `h5` varchar(255) DEFAULT NULL,
  `a_predikat` varchar(255) NOT NULL,
  `z_score` varchar(255) NOT NULL,
  `hasil_akurasi` double(10,5) NOT NULL,
  `persentase` double(10,5) NOT NULL,
  `total` varchar(255) NOT NULL,
  `operator` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aturans`
--

INSERT INTO `aturans` (`id`, `no_aturan`, `diagnosa_id`, `h1`, `h2`, `h3`, `h4`, `h5`, `a_predikat`, `z_score`, `hasil_akurasi`, `persentase`, `total`, `operator`, `created_at`, `updated_at`) VALUES
(7, 'R1', '3', '1', '20', '26', '29', '39', '0.17', '0.17', 0.14450, 14.45000, '0.0289', 'AND', '2023-08-02 00:44:29', '2023-08-02 00:44:29'),
(8, 'R2', '2', '4', '19', '22', '30', '38', '0.17', '0.37', 0.15730, 15.72000, '0.0629', 'AND', '2023-08-02 00:46:11', '2023-08-02 00:46:11'),
(9, 'R3', '1', '2', '9', '21', '31', '40', '0.14', '0.54', 0.12600, 12.60000, '0.0756', 'AND', '2023-08-02 00:47:33', '2023-08-02 00:47:33'),
(10, 'R4', '5', '6', '15', '27', '32', '37', '0', '0', 0.00000, 0.00000, '0.0000', 'AND', '2023-08-02 00:48:53', '2023-08-02 00:48:53'),
(11, 'R5', '4', '8', '17', '25', '33', '38', '0.14', '0.94', 0.13160, 13.16000, '0.1316', 'AND', '2023-08-02 00:49:44', '2023-08-02 00:49:44'),
(12, 'R6', '2', '5', '10', '28', '34', '39', '0.29', '0.49', 0.35530, 35.52000, '0.1421', 'AND', '2023-08-02 00:50:35', '2023-08-02 00:50:35'),
(16, 'R7', '4', '3', '18', '23', '35', '37', '0.17', '0.97', 0.16490, 16.49000, '0.1649', 'AND', '2023-08-02 00:55:54', '2023-08-02 00:55:54'),
(17, 'R8', '5', '7', '16', '24', '36', '40', '0.14', '0.74', 0.12950, 12.95000, '0.1036', 'AND', '2023-08-02 00:56:51', '2023-08-02 00:56:51'),
(18, 'R9', '3', '6', '9', '23', '31', '37', '0.14', '0.14', 0.09800, 9.80000, '0.0196', 'AND', '2023-08-02 00:57:35', '2023-08-02 00:57:35'),
(19, 'R10', '1', '2', '15', '21', '29', '39', '0.29', '0.69', 0.33350, 33.35000, '0.2001', 'AND', '2023-08-02 00:58:35', '2023-08-02 00:58:35'),
(20, 'R11', '2', '7', '20', '27', '36', '39', '0.17', '0.37', 0.15725, 15.73000, '0.0629', 'AND', '2023-08-02 00:59:34', '2023-08-02 00:59:34'),
(22, 'R12', '4', '8', '19', '22', '32', '40', '0', '0', 0.00000, 0.00000, '0.0000', 'AND', '2023-08-02 01:02:19', '2023-08-02 01:02:19'),
(23, 'R13', '5', '4', '10', '25', '34', '39', '0.14', '0.74', 0.12950, 12.95000, '0.1036', 'AND', '2023-08-02 01:03:04', '2023-08-02 01:03:04'),
(24, 'R14', '1', '1', '17', '28', '30', '37', '0.17', '0.57', 0.16150, 16.15000, '0.0969', 'AND', '2023-08-02 01:04:07', '2023-08-02 01:04:07'),
(25, 'R15', '3', '3', '16', '26', '33', '40', '0.17', '0.17', 0.14450, 14.45000, '0.0289', 'AND', '2023-08-02 01:05:27', '2023-08-02 01:05:27'),
(26, 'R16', '1', '5', '18', '24', '35', '38', '0.14', '0.54', 0.12600, 12.60000, '0.0756', 'AND', '2023-08-02 01:06:11', '2023-08-02 01:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(64) NOT NULL,
  `diagnosis` varchar(64) NOT NULL,
  `bobot` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `kode`, `diagnosis`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'DGA001', 'Autistic Disorder', 0.60, '2023-07-30 19:29:21', '2023-07-31 02:24:33'),
(2, 'DGA002', 'Sindrom Asperger', 0.40, '2023-07-31 00:05:48', '2023-07-31 02:24:57'),
(3, 'DGA003', 'PDD-NOS', 0.20, '2023-07-31 00:06:05', '2023-07-31 02:25:17'),
(4, 'DGA004', 'CDD (Childhood Disintegrative Disorder)', 1.00, '2023-07-31 00:06:32', '2023-07-31 02:25:35'),
(5, 'DGA005', 'Sindrom Rett', 0.80, '2023-07-31 00:06:46', '2023-07-31 02:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosissolusis`
--

CREATE TABLE `diagnosissolusis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diagnosa_id` int(11) NOT NULL,
  `solusi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosissolusis`
--

INSERT INTO `diagnosissolusis` (`id`, `diagnosa_id`, `solusi`, `created_at`, `updated_at`) VALUES
(4, 1, 'Membantu mengembangkan kemampuan anak secara perlahan-lahan dalam berinteraksi sosial, berkomunikasi, berperilaku menyesuaikan diri dengan situasi lingkungan sekitar. Serta selalu memperhatikan pola makan, minum, dan udara yang diterima oleh anak, agar saraf otak anak tidak terdorong memberikan reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', '2023-08-02 01:07:43', '2023-08-02 01:07:43'),
(5, 2, 'Mengurangi obsesi anak terhadap hal-hal yang disukai secara perlahan-lahan, agar anak belajar untuk mengembangkan kemampuan berkomunikasi, berinteraksi sosial, berperilaku, serta mampu mengendalikan diri saat memersepsikan respon rangsangan yang diterima.', '2023-08-02 01:08:43', '2023-08-02 01:08:43'),
(6, 3, 'Memenuhi kebutuhan anak sesuai kondisi perilaku anak. menghindari tindakan menghakimi anak dengan bersuara atau tindakan menghakimi dengan gerakan tubuh. memberikan rutinitas yang teratur dan menarik di rumah secara berkala, agar anak tidak cepat jenuh dan tidak terdorong memberi reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', '2023-08-02 01:08:54', '2023-08-02 01:08:54'),
(7, 4, 'Hindari anak memersepsikan diri dari rasa depresi, lingkungan sosial yang mencekam, komunikasi sensitif yang mengarah kepada anak, dan selalu mewaspadai pergerakan perilaku anak yang mengancam dirinya sendiri maupun lingkungan disekitarnya.', '2023-08-02 01:09:17', '2023-08-02 01:09:17'),
(8, 5, 'Meningkatkan kemampuan persepsi, seperti aktifitas fisik ringan, mengunyah, menelan, menggigit. Meningkatkan kemampuan komunikasi , berperilaku dan berinteraksi sosial yang benar secara perlahan, serta menghindari obesitas dengan menjaga pola asupan nutrisi yang seimbang.', '2023-08-02 01:09:29', '2023-08-02 01:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `himpunanfuzzifikasis`
--

CREATE TABLE `himpunanfuzzifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `kode_himpunan` varchar(32) NOT NULL,
  `nama_himpunan` varchar(255) NOT NULL,
  `batas_bawah` double(10,2) NOT NULL,
  `batas_tengah1` double(10,2) NOT NULL,
  `batas_tengah2` double(10,2) NOT NULL,
  `batas_atas` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `himpunanfuzzifikasis`
--

INSERT INTO `himpunanfuzzifikasis` (`id`, `kriteria_id`, `kode_himpunan`, `nama_himpunan`, `batas_bawah`, `batas_tengah1`, `batas_tengah2`, `batas_atas`, `created_at`, `updated_at`) VALUES
(1, 1, 'IS001', 'Kurangnya rasa ingin tahu  terhadap lingkungan.', 0.20, 0.70, 0.70, 0.80, '2023-07-30 19:30:29', '2023-08-02 00:18:44'),
(2, 1, 'IS002', 'Mengabaikan diri saat  dipanggil.', 0.40, 0.60, 0.60, 0.80, '2023-07-30 19:50:50', '2023-08-02 00:19:00'),
(3, 1, 'IS003', 'Ekspresi wajah tidak sesuai  situasi.', 0.20, 0.50, 0.50, 0.70, '2023-07-31 00:07:10', '2023-08-02 00:19:17'),
(4, 1, 'IS004', 'Tidak suka keramaian.', 0.20, 0.70, 0.70, 0.80, '2023-07-31 00:07:33', '2023-08-02 00:19:39'),
(5, 1, 'IS005', 'Mengabaikan rasa nyeri.', 0.30, 0.50, 0.50, 0.60, '2023-07-31 00:07:47', '2023-08-02 00:20:04'),
(6, 1, 'IS006', 'Takut atau cemas tanpa  sebab yang jelas.', 0.60, 0.40, 0.40, 0.20, '2023-07-31 02:32:57', '2023-07-31 02:32:57'),
(7, 1, 'IS007', 'Ekspresi tidak normal saat  melihat orang tua', 0.20, 0.30, 0.30, 0.70, '2023-07-31 02:33:39', '2023-08-02 00:20:26'),
(8, 1, 'IS008', 'Kontak mata yang buruk  atau menatap dari sudut  yang tidak biasa.', 0.40, 0.70, 0.70, 0.80, '2023-07-31 02:34:11', '2023-08-02 00:20:45'),
(9, 2, 'KM001', 'Suara lebih keras dari yang  dibutuhkan.', 0.40, 0.80, 0.80, 0.90, '2023-07-31 02:34:40', '2023-08-02 00:21:05'),
(10, 2, 'KM002', 'Suka berbicara sendirian.', 0.80, 0.60, 0.60, 0.30, '2023-07-31 02:35:09', '2023-08-02 00:21:19'),
(15, 2, 'KM003', 'Mengulangi kata-kata yang didengar.', 0.20, 0.70, 0.70, 0.80, '2023-08-02 00:22:37', '2023-08-02 00:22:37'),
(16, 2, 'KM004', 'Menggunakan bahasa yang sama tanpa mengenal batas usia.', 0.40, 0.50, 0.50, 0.60, '2023-08-02 00:23:18', '2023-08-02 00:23:18'),
(17, 2, 'KM005', 'Pengucapan yang berulang.', 0.30, 0.60, 0.60, 0.80, '2023-08-02 00:24:18', '2023-08-02 00:24:18'),
(18, 2, 'KM006', 'Menggunakan bahasa yang tidak tepat.', 0.20, 0.40, 0.40, 0.60, '2023-08-02 00:24:54', '2023-08-02 00:24:54'),
(19, 2, 'KM007', 'Bercerita secara monoton tanpa tanda jeda bicara.', 0.20, 0.50, 0.50, 0.70, '2023-08-02 00:25:26', '2023-08-02 00:25:26'),
(20, 2, 'KM008', 'Kesulitan mengekspresikan keinginan dengan bahasa tubuh.', 0.40, 0.70, 0.70, 0.90, '2023-08-02 00:26:02', '2023-08-02 00:26:02'),
(21, 3, 'PE001', 'Terobsesi dengan objek atau topik yang disukai.', 0.40, 0.70, 0.70, 0.80, '2023-08-02 00:28:04', '2023-08-02 00:28:04'),
(22, 3, 'PE002', 'Memiliki ritual dan rutinitas yang sulit diubah.', 0.20, 0.40, 0.40, 0.60, '2023-08-02 00:28:45', '2023-08-02 00:28:45'),
(23, 3, 'PE003', 'Mengepakkan tangan dan kaki.', 0.40, 0.60, 0.60, 0.80, '2023-08-02 00:29:16', '2023-08-02 00:29:16'),
(24, 3, 'PE004', 'Menyakiti diri sendiri pada objek yang menjadi sasaran.', 0.20, 0.80, 0.80, 0.90, '2023-08-02 00:29:53', '2023-08-02 00:29:53'),
(25, 3, 'PE005', 'Postur tubuh kaku saat berjalan.', 0.40, 0.80, 0.80, 0.80, '2023-08-02 00:30:28', '2023-08-02 00:30:28'),
(26, 3, 'PE006', 'Kesulitan berhenti dari aktifitas yang membosankan.', 0.20, 0.70, 0.70, 0.90, '2023-08-02 00:30:55', '2023-08-02 00:30:55'),
(27, 3, 'PE007', 'Sangat berminat pada bagian tertentu pada objek yang dipilih.', 0.20, 0.50, 0.50, 0.50, '2023-08-02 00:31:22', '2023-08-02 00:31:22'),
(28, 3, 'PE008', 'Tertarik dengan benda yang berputar.', 0.20, 0.40, 0.40, 0.60, '2023-08-02 00:31:48', '2023-08-02 00:31:48'),
(29, 4, 'PP001', 'Menyendiri didalam dunianya.', 0.20, 0.50, 0.50, 0.60, '2023-08-02 00:32:51', '2023-08-02 00:32:51'),
(30, 4, 'PP002', 'Sulit menyampaikan perasaan.', 0.30, 0.40, 0.40, 0.60, '2023-08-02 00:33:28', '2023-08-02 00:34:12'),
(31, 4, 'PP003', 'Memukul, mencium, menjilat, dan mengigit objek sasaran yang salah', 0.40, 0.70, 0.70, 0.80, '2023-08-02 00:34:02', '2023-08-02 00:34:02'),
(32, 4, 'PP004', 'Kemampuan membaca, menulis, mengingat dan berhitung dibawah rata-rata.', 0.60, 0.90, 0.90, 0.90, '2023-08-02 00:34:43', '2023-08-02 00:34:43'),
(33, 4, 'PP005', 'Pengetahuan sulit berkembang.', 0.40, 0.70, 0.70, 0.80, '2023-08-02 00:35:18', '2023-08-02 00:35:18'),
(34, 4, 'PP006', 'Keterbatasan melihat sesuatu.', 0.20, 0.60, 0.60, 0.80, '2023-08-02 00:35:55', '2023-08-02 00:35:55'),
(35, 4, 'PP007', 'Sensitif terhadap sentuhan dan suara asing.', 0.40, 0.50, 0.50, 0.70, '2023-08-02 00:36:29', '2023-08-02 00:36:29'),
(36, 4, 'PP008', 'Sulit menggambarkan sesuatu yang sering diingat.', 0.20, 0.60, 0.60, 0.80, '2023-08-02 00:37:10', '2023-08-02 00:37:10'),
(37, 5, 'FP001', 'Memiliki riwayat gejala turunan genetik.', 0.20, 0.30, 0.30, 0.40, '2023-08-02 00:37:52', '2023-08-02 00:37:52'),
(38, 5, 'FP002', 'Memiliki riwayat penyakit pasca masa kehamilan atau kelahiran.', 0.40, 0.50, 0.50, 0.60, '2023-08-02 00:38:13', '2023-08-02 00:38:13'),
(39, 5, 'FP003', 'Memiliki riwayat infeksi pada otak dan pernapasan.', 0.40, 0.60, 0.60, 0.80, '2023-08-02 00:38:39', '2023-08-02 00:38:39'),
(40, 5, 'FP004', 'Memiliki riwayat terpapar atau pemakai aktif bahan-bahan kimia', 0.40, 0.70, 0.70, 0.80, '2023-08-02 00:39:36', '2023-08-02 00:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `kriteria`, `created_at`, `updated_at`) VALUES
(1, 'Interaksi Sosial', '2023-07-30 19:27:45', '2023-07-31 02:19:36'),
(2, 'Komunikasi', '2023-07-30 19:50:29', '2023-07-31 02:19:48'),
(3, 'Perilaku', '2023-07-31 00:05:15', '2023-07-31 02:20:04'),
(4, 'Persepsi', '2023-07-31 00:05:22', '2023-07-31 02:20:18'),
(5, 'Faktor Pendukung Ganguan Autisme', '2023-07-31 00:05:32', '2023-07-31 02:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_07_27_015032_create_penggunas_table', 1),
(3, '2023_07_27_015058_create_pasiens_table', 1),
(4, '2023_07_27_030521_create_sliders_table', 1),
(5, '2023_07_27_070839_create_kriterias_table', 1),
(6, '2023_07_27_072313_create_diagnoses_table', 1),
(7, '2023_07_27_074247_create_himpunanfuzzifikasis_table', 1),
(9, '2023_07_31_023758_create_aturans_table', 2),
(10, '2023_07_31_033931_create_diagnosissolusis_table', 3),
(11, '2023_08_01_013342_create_riwayats_table', 4),
(12, '2023_08_01_070111_create_pjs_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pasien` varchar(64) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email_telepon` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `status_akun` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `email_telepon`, `username`, `status_akun`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Derry Kurniawan', 'Pria', '2000-11-11', 'derrywan01@gmail.com', 'derrywan', 'Pasien', '$2y$10$rkeONah1g7dLM1b//RPwRe7C4ZmI83pMNyFXDixKY8XslahvRsMCS', NULL, '2023-07-30 21:01:55', '2023-07-30 21:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `penggunas`
--

CREATE TABLE `penggunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(64) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email_telepon` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `status_akun` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggunas`
--

INSERT INTO `penggunas` (`id`, `nama_pengguna`, `jenis_kelamin`, `tanggal_lahir`, `email_telepon`, `username`, `status_akun`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Dzaky', 'Pria', '2000-04-09', 'admindzaky@gmail.com', 'Admin', 'Admin', '$2y$10$P3nYm6McIi5wIicuWgs0OOKMHgJXkbosnzWu8VKKgC8LpwpJaQLmG', NULL, '2023-07-30 19:26:11', '2023-07-30 19:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pjs`
--

CREATE TABLE `pjs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(64) NOT NULL,
  `paraf` varchar(255) DEFAULT NULL,
  `jabatan` varchar(64) NOT NULL,
  `periode` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pjs`
--

INSERT INTO `pjs` (`id`, `nama`, `paraf`, `jabatan`, `periode`, `created_at`, `updated_at`) VALUES
(1, 'dr. Hj. Mayetti Akmal, SpA(K), IBCLC', '64d3244617c05.png', 'Pediatri Gawat Darurat', '2023-07-17', '2023-08-01 00:41:17', '2023-08-08 22:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `riwayats`
--

CREATE TABLE `riwayats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `no_aturan` varchar(11) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `h2` varchar(255) NOT NULL,
  `h3` varchar(255) NOT NULL,
  `h4` varchar(255) NOT NULL,
  `h5` varchar(255) NOT NULL,
  `hasil_diagnosis` varchar(255) NOT NULL,
  `akurasi_hasil_diagnosis` varchar(255) NOT NULL,
  `solusi` text NOT NULL,
  `diagnosa_lain` varchar(255) DEFAULT NULL,
  `akurasi_diagnosa_lain` varchar(255) DEFAULT NULL,
  `solusi_diagnosa_lain` text DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayats`
--

INSERT INTO `riwayats` (`id`, `pasien_id`, `no_aturan`, `h1`, `h2`, `h3`, `h4`, `h5`, `hasil_diagnosis`, `akurasi_hasil_diagnosis`, `solusi`, `diagnosa_lain`, `akurasi_diagnosa_lain`, `solusi_diagnosa_lain`, `tanggal`, `created_at`, `updated_at`) VALUES
(19, 1, 'R1', '1', '20', '26', '29', '39', 'PDD-NOS', '0.1375', 'Memenuhi kebutuhan anak sesuai kondisi perilaku anak. menghindari tindakan menghakimi anak dengan bersuara atau tindakan menghakimi dengan gerakan tubuh. memberikan rutinitas yang teratur dan menarik di rumah secara berkala, agar anak tidak cepat jenuh dan tidak terdorong memberi reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', 'PDD-NOS', '0.1375', 'Memenuhi kebutuhan anak sesuai kondisi perilaku anak. menghindari tindakan menghakimi anak dengan bersuara atau tindakan menghakimi dengan gerakan tubuh. memberikan rutinitas yang teratur dan menarik di rumah secara berkala, agar anak tidak cepat jenuh dan tidak terdorong memberi reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', '2023-08-02', '2023-08-02 02:29:40', '2023-08-02 02:29:40'),
(20, 1, 'R1', '1', '20', '26', '29', '39', 'PDD-NOS', '0.1375', 'Memenuhi kebutuhan anak sesuai kondisi perilaku anak. menghindari tindakan menghakimi anak dengan bersuara atau tindakan menghakimi dengan gerakan tubuh. memberikan rutinitas yang teratur dan menarik di rumah secara berkala, agar anak tidak cepat jenuh dan tidak terdorong memberi reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', 'PDD-NOS', '0.1375', 'Memenuhi kebutuhan anak sesuai kondisi perilaku anak. menghindari tindakan menghakimi anak dengan bersuara atau tindakan menghakimi dengan gerakan tubuh. memberikan rutinitas yang teratur dan menarik di rumah secara berkala, agar anak tidak cepat jenuh dan tidak terdorong memberi reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', '2023-08-02', '2023-08-02 06:40:09', '2023-08-02 06:40:09'),
(21, 1, 'R1', '1', '20', '26', '29', '39', 'PDD-NOS', '0.1375', 'Memenuhi kebutuhan anak sesuai kondisi perilaku anak. menghindari tindakan menghakimi anak dengan bersuara atau tindakan menghakimi dengan gerakan tubuh. memberikan rutinitas yang teratur dan menarik di rumah secara berkala, agar anak tidak cepat jenuh dan tidak terdorong memberi reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', 'PDD-NOS', '0.1375', 'Memenuhi kebutuhan anak sesuai kondisi perilaku anak. menghindari tindakan menghakimi anak dengan bersuara atau tindakan menghakimi dengan gerakan tubuh. memberikan rutinitas yang teratur dan menarik di rumah secara berkala, agar anak tidak cepat jenuh dan tidak terdorong memberi reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', '2023-08-02', '2023-08-02 06:46:24', '2023-08-02 06:46:24'),
(22, 1, 'R16', '5', '18', '24', '35', '38', 'Autistic Disorder', '0.0756', 'Membantu mengembangkan kemampuan anak secara perlahan-lahan dalam berinteraksi sosial, berkomunikasi, berperilaku menyesuaikan diri dengan situasi lingkungan sekitar. Serta selalu memperhatikan pola makan, minum, dan udara yang diterima oleh anak, agar saraf otak anak tidak terdorong memberikan reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', 'Autistic Disorder', '0.0756', 'Membantu mengembangkan kemampuan anak secara perlahan-lahan dalam berinteraksi sosial, berkomunikasi, berperilaku menyesuaikan diri dengan situasi lingkungan sekitar. Serta selalu memperhatikan pola makan, minum, dan udara yang diterima oleh anak, agar saraf otak anak tidak terdorong memberikan reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', '2023-08-09', '2023-08-08 22:33:43', '2023-08-08 22:33:43'),
(23, 1, 'R16', '5', '18', '24', '35', '38', 'Autistic Disorder', '0.0756', 'Membantu mengembangkan kemampuan anak secara perlahan-lahan dalam berinteraksi sosial, berkomunikasi, berperilaku menyesuaikan diri dengan situasi lingkungan sekitar. Serta selalu memperhatikan pola makan, minum, dan udara yang diterima oleh anak, agar saraf otak anak tidak terdorong memberikan reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', 'Autistic Disorder', '0.0756', 'Membantu mengembangkan kemampuan anak secara perlahan-lahan dalam berinteraksi sosial, berkomunikasi, berperilaku menyesuaikan diri dengan situasi lingkungan sekitar. Serta selalu memperhatikan pola makan, minum, dan udara yang diterima oleh anak, agar saraf otak anak tidak terdorong memberikan reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', '2023-08-09', '2023-08-08 22:34:54', '2023-08-08 22:34:54'),
(24, 1, 'R8', '7', '16', '24', '36', '40', 'Sindrom Rett', '0.1036', 'Meningkatkan kemampuan persepsi, seperti aktifitas fisik ringan, mengunyah, menelan, menggigit. Meningkatkan kemampuan komunikasi , berperilaku dan berinteraksi sosial yang benar secara perlahan, serta menghindari obesitas dengan menjaga pola asupan nutrisi yang seimbang.', 'Sindrom Rett', '0.1036', 'Meningkatkan kemampuan persepsi, seperti aktifitas fisik ringan, mengunyah, menelan, menggigit. Meningkatkan kemampuan komunikasi , berperilaku dan berinteraksi sosial yang benar secara perlahan, serta menghindari obesitas dengan menjaga pola asupan nutrisi yang seimbang.', '2023-08-10', '2023-08-09 22:29:25', '2023-08-09 22:29:25'),
(25, 1, 'R16', '5', '18', '24', '35', '38', 'Autistic Disorder', '0.0756', 'Membantu mengembangkan kemampuan anak secara perlahan-lahan dalam berinteraksi sosial, berkomunikasi, berperilaku menyesuaikan diri dengan situasi lingkungan sekitar. Serta selalu memperhatikan pola makan, minum, dan udara yang diterima oleh anak, agar saraf otak anak tidak terdorong memberikan reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', 'Autistic Disorder', '0.0756', 'Membantu mengembangkan kemampuan anak secara perlahan-lahan dalam berinteraksi sosial, berkomunikasi, berperilaku menyesuaikan diri dengan situasi lingkungan sekitar. Serta selalu memperhatikan pola makan, minum, dan udara yang diterima oleh anak, agar saraf otak anak tidak terdorong memberikan reaksi berlebihan yang mengakibatkan ketidaknyamanan pada lingkungan sekitar.', '2023-08-10', '2023-08-10 01:08:57', '2023-08-10 01:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider`, `created_at`, `updated_at`) VALUES
(5, '64d312f4b7139.jpg', '2023-08-08 21:15:48', '2023-08-08 21:15:48'),
(6, '64d31301013d3.jpg', '2023-08-08 21:16:01', '2023-08-08 21:16:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturans`
--
ALTER TABLE `aturans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosissolusis`
--
ALTER TABLE `diagnosissolusis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `himpunanfuzzifikasis`
--
ALTER TABLE `himpunanfuzzifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pjs`
--
ALTER TABLE `pjs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayats`
--
ALTER TABLE `riwayats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturans`
--
ALTER TABLE `aturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diagnosissolusis`
--
ALTER TABLE `diagnosissolusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `himpunanfuzzifikasis`
--
ALTER TABLE `himpunanfuzzifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pjs`
--
ALTER TABLE `pjs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riwayats`
--
ALTER TABLE `riwayats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
