-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2020 pada 11.45
-- Versi server: 10.1.21-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ormawa_ftik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda-kegiatan`
--

CREATE TABLE `agenda-kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` date NOT NULL,
  `suratP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berita_acara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lpj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agenda-kegiatan`
--

INSERT INTO `agenda-kegiatan` (`id`, `user_id`, `kegiatan`, `unit`, `tempat`, `waktu`, `suratP`, `proposal`, `ket`, `berita_acara`, `lpj`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(24, 17, 'Workshop', 'HIMATIF', 'hotel resinda', '2020-03-14', '2.png', '3.png', 'accdaaasdasdsakkkkkuuyiy', '2.png', '3.png', 'pengajuan LPJ', 'Pengajuan LPJ', '2020-11-13 05:18:47', '2020-11-14 07:02:40'),
(25, 17, 'Ubp Techon Day seminar', 'HIMATIF', 'hotel resinda', '2020-11-21', 'laporan_siswa.pdf', 'laporan_datamasuk_2.pdf', 'pengajuan proposal', NULL, NULL, NULL, 'Pengajuan Dekan', '2020-11-13 05:22:45', '2020-11-13 16:38:08'),
(27, 21, 'inagurasi', 'FTIK', 'cibodas', '2020-11-14', '236354799_2.pdf', 'Laporan_2.pdf', 'pengajuan proposal', NULL, NULL, NULL, 'Pengajuan Dekan', '2020-11-13 15:38:02', '2020-11-13 16:38:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calender`
--

CREATE TABLE `calender` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id`, `nama_file`, `unit`, `file_dokumen`, `created_at`, `updated_at`) VALUES
(5, 'WORKSHOP', 'HIMATIF', '2.png', NULL, '2020-11-14 11:08:30'),
(6, 'SEMINAR', 'HIMATIF', '3.png', NULL, NULL),
(7, 'SEMINAR', 'HIMATIF', 'honda-sales marketing.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(20) NOT NULL,
  `agenda_id` int(11) NOT NULL,
  `unit` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kegiatan` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumentasi`
--

INSERT INTO `dokumentasi` (`id`, `user_id`, `agenda_id`, `unit`, `nama_kegiatan`, `file_gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(18, 17, 24, 'HIMATIF', 'Workshop', '2.png', 'dokumentasi kegiatan workshop UTD', NULL, '2020-11-15 01:21:36'),
(19, 17, 24, 'HIMATIF', 'Workshop', '3.png', 'dokumentasi kegiatan workshop', NULL, NULL),
(20, 17, 24, 'HIMATIF', 'Workshop', 'cropped-ubp11.jpg', 'dokumentasi kegiatan workshop', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(20) NOT NULL,
  `unit` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `user_id`, `unit`, `nama_event`, `file_event`, `created_at`, `updated_at`) VALUES
(3, 17, 'HIMATIF', 'seminar', '2.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2020_02_04_172945_create_dokumen_table', 5),
(7, '2020_03_05_165839_create_event_table', 7),
(8, '2020_03_06_191158_create_agenda-kegiatan_table', 8),
(10, '2020_06_04_194042_create_dokumentasi_table', 10),
(11, '2020_06_07_223245_create_users_table', 11),
(12, '2020_10_29_190730_create_sk_table', 12),
(13, '2020_11_01_080557_create_calender_table', 13),
(14, '2020_11_11_014437_create_profil_table', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(20) NOT NULL,
  `unit` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoP` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `user_id`, `unit`, `nama`, `jabatan`, `nim`, `no_hp`, `fotoP`, `status`, `created_at`, `updated_at`) VALUES
(2, 21, 'FTIK', 'maulana', 'kominfo', '1866', '96888', '2.png', 'active', '2020-11-15 01:27:41', '2020-11-15 01:27:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sk`
--

CREATE TABLE `sk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sk`
--

INSERT INTO `sk` (`id`, `user_id`, `kegiatan`, `unit`, `file_sk`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(4, 17, 'seminar', 'HIMATIF', 'curiculum vitae Didin Maulana.pdf', 'diterima ambil di TU', 'Selesai', '2020-11-14 12:14:51', '2020-11-14 12:30:07'),
(5, 17, 'Workshop', 'HIMATIF', 'CV didin maulana 2.pdf', NULL, 'Pengajuan SK', '2020-11-14 12:15:08', '2020-11-14 12:15:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ormawa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ormawa`, `nama_lengkap`, `role_login`, `nim`, `password`, `created_at`, `updated_at`) VALUES
(9, 'FTIK', 'Developer', 'Master', '1841', '$2y$10$uofuKXjG4GEiBEggGcq9be/hzeGWzMXtkD5HKVzm7PLlncAXAHY9K', '2020-10-27 13:31:49', '2020-10-27 13:31:49'),
(16, 'FTIK', 'Fakultas Teknik Dan Ilmu Komputer', 'TU', '1842', '$2y$10$7m.3ZDhUKK9R949DmixkdeghPV/.znXnYMiKUqifJlEUoDd2SqlC6', '2020-10-27 14:29:44', '2020-10-27 14:29:44'),
(17, 'HIMATIF', 'Himpunan Mahasiswa Teknik Informatika', 'Ormawa', '1843', '$2y$10$Fm4tHiVlLDkRQeXnjAYEG.PgsZECg787umZCgH9uTZ0KT6Ik/yiBG', '2020-10-27 14:31:18', '2020-10-27 14:31:18'),
(18, 'HIMATIF', 'Himpunan Mahasiswa Teknik Informatika', 'DPM', '1844', '$2y$10$hp5NNNFboQ6I0e.DaQPPIOfUGjTr495lao4VNjdNq57sn1Riw/MJq', '2020-10-27 14:31:33', '2020-10-27 14:31:33'),
(19, 'HIMATIF', 'Himpunan Mahasiswa Teknik Informatika', 'KaProdi', '1845', '$2y$10$ylc1PH1cqSCYsedzHGiKDe/PbwAeNZdRxE5U.yGNbrg3bGsLYvSs.', '2020-10-27 14:31:52', '2020-10-27 14:31:52'),
(20, 'FTIK', 'Fakultas Teknik Dan Ilmu Komputer', 'Dekanat', '1846', '$2y$10$a9cWiWlrKSJpECju1O0VHenQoktjK92qzoKvzIh8MiVqJ1gCCbRpK', '2020-10-27 14:32:42', '2020-10-27 14:32:42'),
(21, 'FTIK', 'Fakultas Teknik Dan Ilmu Komputer', 'Ormawa', '1847', '$2y$10$XPiqQfs4EYtTNAl6TSyYVuQlteQbokcXOrtsT2.xjLmS6l66TmUk2', '2020-10-27 14:33:07', '2020-10-27 14:33:07'),
(22, 'HMTI', 'Himpunan Mahasiswa Teknik Industri', 'KaProdi', '1811', '$2y$10$1tPyDqVr2MHV9spIPQbbruQwWYaH1lw.xYpY0jaxCLr0wY0xGRoHC', '2020-11-10 17:15:58', '2020-11-10 17:15:58'),
(23, 'HMTI', 'Himpunan Mahasiswa Teknik Industri', 'Ormawa', '1812', '$2y$10$cRoPTdqZH1YcudR1p6Sk1OYYD6ijVlzsuD10dzivO115ikNEryIra', '2020-11-12 05:32:19', '2020-11-12 05:32:19'),
(24, 'HMTI', 'Himpunan Mahasiswa Teknik Industri', 'DPM', '1813', '$2y$10$wWN41uZJzcgu4szJo7mCPu6AhVBK/thRjkzjtGyuBJ7wSYTXYnaye', '2020-11-12 05:36:48', '2020-11-12 05:36:48'),
(25, 'FTIK', 'Dpm FTIK', 'DPM', '1814', '$2y$10$Fn1TdxjAsSyrxi57DzMmauF7/vk8HWVK.D3qQekE3yJYTiX66/g2a', '2020-11-13 15:45:31', '2020-11-13 15:45:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda-kegiatan`
--
ALTER TABLE `agenda-kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sk`
--
ALTER TABLE `sk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda-kegiatan`
--
ALTER TABLE `agenda-kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `calender`
--
ALTER TABLE `calender`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sk`
--
ALTER TABLE `sk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
