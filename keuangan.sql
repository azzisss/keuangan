-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221207.ce5ce76a8d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2023 pada 05.42
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_akses` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id`, `nama_akses`, `deskripsi_akses`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', '2023-07-07 19:56:00', '2023-07-07 19:56:00'),
(2, 'Owner', 'Owner', '2023-07-07 19:56:00', '2023-07-07 19:56:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aruskas`
--

CREATE TABLE `aruskas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `detail_pemasukan` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_pengeluaran` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aruskas`
--

INSERT INTO `aruskas` (`id`, `id_user`, `pemasukan`, `pengeluaran`, `detail_pemasukan`, `detail_pengeluaran`, `jumlah_total`, `created_at`, `updated_at`) VALUES
(4, 1, 50000, 10000, NULL, 'membeli gula pasir', 40000, '2023-07-08 06:53:08', '2023-07-08 22:20:35'),
(5, 3, 20000, 2000, NULL, NULL, 18000, '2023-07-08 07:04:18', '2023-07-08 07:59:35'),
(6, 1, 12000, 0, 'dari parkir', NULL, 12000, '2023-07-09 02:36:22', '2023-07-09 02:36:22'),
(7, 1, 10000, 0, NULL, NULL, 10000, '2023-07-19 23:35:23', '2023-07-19 23:35:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukubesar`
--

CREATE TABLE `bukubesar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_pendapatan` int(11) NOT NULL,
  `total_pengeluaran` int(11) NOT NULL,
  `jumlah_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `labarugis`
--

CREATE TABLE `labarugis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendapatan_kas` int(11) NOT NULL,
  `pendapatan_penjualan` int(11) NOT NULL,
  `pendapatan_lain` int(11) NOT NULL,
  `gaji_pegawai` int(11) NOT NULL,
  `laba_rugi` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `labarugis`
--

INSERT INTO `labarugis` (`id`, `pendapatan_kas`, `pendapatan_penjualan`, `pendapatan_lain`, `gaji_pegawai`, `laba_rugi`, `time`, `created_at`, `updated_at`) VALUES
(1, 0, 321321, 2321, 21321, 302321, '2023-08-24 01:20:06', '2023-08-24 01:20:06', '2023-08-24 01:20:06'),
(2, 80000, 5000000, 200000, 100000, 5180000, '2023-07-24 01:44:19', '2023-08-24 01:44:19', '2023-08-24 01:44:19'),
(3, 0, 1000000, 100000, 1200000, -100000, '2023-06-24 03:37:13', '2023-08-24 03:37:13', '2023-08-24 03:37:13');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_07_04_105111_create_users_table', 1),
(3, '2023_07_04_105123_create_akses_table', 1),
(4, '2023_07_08_025203_create_aruskas_table', 1),
(6, '2023_08_22_113256_create_labarugi_table', 2),
(7, '2023_07_09_070429_create_bukubesar_table', 3),
(17, '2023_08_22_113256_create_labarugis_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_akses` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_akses`, `username`, `name`, `password`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'Aji', '$2y$10$wetAwh6fGozsZXebWUfzMeif1MLm7qEhd9vC2GN73TvjZFvy9L.FK', NULL, '2023-07-07 19:56:00', '2023-07-07 19:56:00'),
(2, 2, 'Owner', 'Bayu', '$2y$10$PrpV1E2.g/4Gu1Gg1xo.OOppdOrXzNwtoZ451h6npGA0XX3Ic2D4e', NULL, '2023-07-07 19:56:00', '2023-07-07 19:56:00'),
(3, 1, 'banu123', 'Banu123', '$2y$10$xCIDfLw8rnojiFGl4CQGxucZ8JE7aE9JUX7ieIZ8aUU7aEsBhP/k.', NULL, '2023-07-08 06:52:27', '2023-07-08 06:52:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aruskas`
--
ALTER TABLE `aruskas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bukubesar`
--
ALTER TABLE `bukubesar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `labarugis`
--
ALTER TABLE `labarugis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `aruskas`
--
ALTER TABLE `aruskas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bukubesar`
--
ALTER TABLE `bukubesar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `labarugis`
--
ALTER TABLE `labarugis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
