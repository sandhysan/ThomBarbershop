-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2022 pada 10.26
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_thombarbershop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notelp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `email`, `foto`, `notelp`, `tgl_lahir`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Thomas', 'thomassujiwa@gmail.com', 'karyawan-images/G6mKddFVK3qW20NNJ89SpihZFWJ3YNgkZRr2qDbv.jpg', '0821-4696-9147', '2022-03-02', 'Tabanan', '2022-10-03 18:21:59', '2022-10-17 15:55:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lyn` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_lyn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_lyn` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `nama_lyn`, `image_lyn`, `harga_lyn`, `created_at`, `updated_at`) VALUES
(1, 'UNDERCUT', 'layanan-images/k6xcLAK2XzaT1ucKJJ2Kev9yg48L8s0TMrytAAix.jpg', '20000', '2022-10-03 18:21:59', '2022-11-07 09:19:05'),
(2, 'BUZZCUT', 'layanan-images/2AOcRmwBKlW0044wMqKzOyRTZWnvdW40T4CuWjEu.jpg', '24000', '2022-10-03 18:21:59', '2022-11-07 09:19:33'),
(3, 'TWO BLOCK', 'layanan-images/kD0IaBlVK1v76qz2yNHA2ZUhJaLqEpSSCIGyODX4.jpg', '30000', '2022-10-03 18:21:59', '2022-11-07 09:20:04'),
(4, 'SPIKE', 'layanan-images/NHWG4SNZ02DIGX6wh1P247hLYPZUutxsME1PdmpT.jpg', '23000', '2022-10-03 18:21:59', '2022-11-07 09:20:29'),
(5, 'CREWCUT', 'layanan-images/0wIgEpZTdDrXw7H7tQmPebeKprbnfOBn6f2dvpmG.jpg', '20000', '2022-10-03 18:21:59', '2022-11-07 09:20:56'),
(6, 'CURTAIN', 'layanan-images/IKIH9sJ3M8iPbRqOU2zZWASOZbbQO8XAiAK3ANuc.jpg', '28000', '2022-10-03 18:21:59', '2022-11-07 09:21:27'),
(7, 'FRENCH CROP', 'layanan-images/50CBYAs2BfTlIKbFIYJRykgPdeY8GlBulEaMzPXs.jpg', '30000', '2022-10-03 18:21:59', '2022-11-07 09:21:51'),
(8, 'MULLET', 'layanan-images/3fgd8TSy1eKuBCJ6GfM2nnckVTGCl4PZZE9wryYN.jpg', '28000', '2022-10-03 18:21:59', '2022-11-07 09:22:20'),
(9, 'QUIFF', 'layanan-images/wdzsPTGzxO9Vm6M0LffltN7w9b5MoLwyjjVGyEE2.jpg', '25000', '2022-10-03 18:21:59', '2022-11-07 09:22:54'),
(10, 'SIDE PART', 'layanan-images/TwgoAWGxZQ9eOgXJm4Vf6JtKZohtBkiB3tsIuWaJ.jpg', '20000', '2022-10-03 18:21:59', '2022-11-07 09:23:25'),
(11, 'AFRO', 'layanan-images/wmYijgknAaHut799zSik2eESMDWKaoOpAeathRhf.jpg', '32000', '2022-10-03 18:21:59', '2022-11-07 09:23:57'),
(12, 'COMMA HAIR', 'layanan-images/ioUm3GYuhFgxU31wgkegS1HADQYYnyW347u12W05.jpg', '30000', '2022-10-03 18:21:59', '2022-11-07 09:24:29');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_22_190201_create_karyawan_table', 1),
(6, '2022_07_29_152642_create_layanan_table', 1),
(7, '2022_08_03_081636_create_waktu_table', 1),
(8, '2022_08_04_171602_create_pemesanan_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_book` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namalyn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargalyn` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namakywn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal` date NOT NULL,
  `jam` time NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_pesan` date NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `username`, `password`, `notelp`, `tgl_lahir`, `alamat`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sandhi Putrawan', 'sanssajadong@gmail.com', NULL, 'sans', '$2y$10$3o9SSRDjVKWcKbnyePjuxeNpst.D7j38qXrUk6Guw80biWc2SM/m2', '0850000000', '2022-08-03', 'Bantas Tengah', 'User', NULL, '2022-10-03 18:21:59', '2022-10-03 18:21:59'),
(2, 'Admin', 'admin@gmail.com', NULL, 'admin', '$2y$10$bLMKPS1M9uotxRsjVEkdeupGeSf/XnvnhfF5f1Frf5T6K0ujD5Yqa', '0850000000', '2022-08-03', 'Bantas Tengah', 'Admin', NULL, '2022-10-03 18:21:59', '2022-10-03 18:21:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jam` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`id`, `jam`, `created_at`, `updated_at`) VALUES
(1, '10:00:00', '2022-10-03 18:21:59', '2022-10-03 18:21:59'),
(2, '11:00:00', '2022-10-03 18:21:59', '2022-10-03 18:21:59'),
(3, '14:00:00', '2022-10-03 18:21:59', '2022-10-03 18:21:59'),
(4, '15:00:00', '2022-10-03 18:21:59', '2022-10-03 18:21:59'),
(5, '16:00:00', '2022-10-03 18:21:59', '2022-10-03 18:21:59'),
(6, '17:00:00', '2022-10-03 18:21:59', '2022-10-03 18:21:59'),
(7, '19:00:00', '2022-10-03 18:21:59', '2022-10-03 18:21:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawan_email_unique` (`email`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
