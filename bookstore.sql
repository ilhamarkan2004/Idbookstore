-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2023 pada 15.54
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `halaman` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `bahasa` varchar(255) NOT NULL,
  `tipe` enum('gratis','berbayar') NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `flipbook` varchar(255) NOT NULL DEFAULT '',
  `isbn` varchar(255) NOT NULL,
  `berat` double NOT NULL,
  `lebar` double NOT NULL,
  `panjang` double NOT NULL,
  `harga` double NOT NULL,
  `deskripsi` text NOT NULL,
  `fotobuku` varchar(255) NOT NULL,
  `epub` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bukus`
--

INSERT INTO `bukus` (`id`, `judul`, `halaman`, `stok`, `tanggal_terbit`, `kategori_id`, `bahasa`, `tipe`, `penerbit`, `flipbook`, `isbn`, `berat`, `lebar`, `panjang`, `harga`, `deskripsi`, `fotobuku`, `epub`, `created_at`, `updated_at`) VALUES
(1, 'Buku 1', 14, 9, '2018-08-14', 2, 'inggris', 'berbayar', 'CV. Penulis Cerdas Indonesia', 'gaada', 'dfgdfg345', 15, 15, 15, 10000, 'dsfsdfsdfsdf', 'gaada', '', '2023-10-10 12:38:04', '2023-10-10 12:48:39'),
(2, 'Buku 2', 14, 9, '2018-08-14', 1, 'inggris', 'berbayar', 'CV. Penulis Cerdas Indonesia', 'gaada', 'dfgdfg345', 15, 15, 15, 1500, 'dsfsdfsdfsdf', 'gaada', '', '2023-10-10 12:38:04', '2023-10-10 12:56:09'),
(3, 'Buku 3', 14, 9, '2018-08-14', 1, 'inggris', 'berbayar', 'CV. Penulis Cerdas Indonesia', 'gaada', 'dfgdfg345', 15, 15, 15, 1500, 'dsfsdfsdfsdf', 'gaada', '', '2023-10-10 12:38:04', '2023-10-10 12:59:06'),
(4, 'Buku 4', 14, 9, '2018-08-14', 2, 'inggris', 'berbayar', 'CV. Penulis Cerdas Indonesia', 'gaada', 'dfgdfg345', 15, 15, 15, 1500, 'dsfsdfsdfsdf', 'gaada', '', '2023-10-10 12:38:04', '2023-10-10 12:59:06'),
(5, 'Buku 5', 14, 9, '2018-08-14', 1, 'inggris', 'berbayar', 'CV. Penulis Cerdas Indonesia', 'gaada', 'dfgdfg345', 15, 15, 15, 1500, 'dsfsdfsdfsdf', 'gaada', '', '2023-10-10 12:38:04', '2023-10-10 14:14:46'),
(6, 'cekkk', 12, 12, '1111-01-01', 3, 'Indonesia', 'gratis', 'CV. Penulis Cerdas Indonesia', 'ert', '345ertert', 234, 234, 234, 345, 'yrtyrty', 'fotobuku/UPQ0zt3fdKvtTxaeLx8bnv2DfifSn15FZAPb26yf.png', '', '2023-10-12 03:28:32', '2023-10-18 04:29:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_keranjangs`
--

CREATE TABLE `detail_keranjangs` (
  `keranjang_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksis`
--

CREATE TABLE `detail_transaksis` (
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_transaksis`
--

INSERT INTO `detail_transaksis` (`transaksi_id`, `buku_id`, `jumlah`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10000, '2023-10-10 12:48:39', '2023-10-10 12:48:39'),
(2, 2, 1, 1500, '2023-10-10 12:56:09', '2023-10-10 12:56:09'),
(3, 3, 1, 1500, '2023-10-10 12:59:06', '2023-10-10 12:59:06'),
(3, 4, 1, 1500, '2023-10-10 12:59:06', '2023-10-10 12:59:06'),
(4, 5, 1, 1500, '2023-10-10 14:14:46', '2023-10-10 14:14:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'keren', '2023-10-10 12:38:04', '2023-10-10 12:38:04'),
(2, 'hura', '2023-10-10 12:38:04', '2023-10-10 12:38:04'),
(3, 'Sembako', '2023-10-10 12:38:04', '2023-10-10 12:38:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_keranjang` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` double NOT NULL DEFAULT 0,
  `status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontributors`
--

CREATE TABLE `kontributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `kategori` enum('penulis','editor','design_cover','layout') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_06_055303_initial_design', 1),
(6, '2023_09_06_143557_add_field_users', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_bukus`
--

CREATE TABLE `pembelian_bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian_bukus`
--

INSERT INTO `pembelian_bukus` (`id`, `user_id`, `buku_id`, `tanggal_pembelian`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2023-10-10 19:48:39', '2023-10-10 12:48:39', '2023-10-10 12:48:39'),
(2, 3, 2, '2023-10-10 19:56:09', '2023-10-10 12:56:09', '2023-10-10 12:56:09'),
(3, 3, 3, '2023-10-10 19:59:06', '2023-10-10 12:59:06', '2023-10-10 12:59:06'),
(4, 3, 4, '2023-10-10 19:59:06', '2023-10-10 12:59:06', '2023-10-10 12:59:06'),
(5, 3, 5, '2023-10-10 21:14:46', '2023-10-10 14:14:46', '2023-10-10 14:14:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_keranjang` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` double NOT NULL DEFAULT 0,
  `status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `no_keranjang`, `user_id`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(1, '1291012966', 3, 10000, 'Paid', '2023-10-10 12:48:39', '2023-10-10 12:48:39'),
(2, '384482253', 3, 1500, 'Paid', '2023-10-10 12:56:09', '2023-10-10 12:56:09'),
(3, '43732081', 3, 3000, 'Paid', '2023-10-10 12:59:06', '2023-10-10 12:59:06'),
(4, '1804919580', 3, 1500, 'Paid', '2023-10-10 14:14:46', '2023-10-10 14:14:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasans`
--

CREATE TABLE `ulasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '2023-10-10 12:38:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uZaks1DdbUSsbo8gGDLfZBSYxae6eBFmlpAIjqtHFY0punf5J0V3axYF51LF', '2023-10-10 12:38:04', '2023-10-10 12:38:04', 'admin'),
(2, 'Mohammad Ilham Arkan', 'ilhamarkan2004@gmail.com', '2023-10-10 12:38:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vxK3kPzpefS5bHHvH04mkSaAwt1oWBYDcV9eFkSjscKkOmKNgvbT721HZG7b', '2023-10-10 12:38:04', '2023-10-10 12:38:04', 'customer'),
(3, 'Akun UB', 'ilhamarkan2004@student.ub.ac.id', '2023-10-10 12:38:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zlTDTif52lBBYsshoJRxvua8g8Kox53vsKCN4gUMhBOuG1IWO9drVQERfP4j', '2023-10-10 12:38:04', '2023-10-10 12:38:04', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bukus_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `detail_keranjangs`
--
ALTER TABLE `detail_keranjangs`
  ADD PRIMARY KEY (`keranjang_id`,`buku_id`),
  ADD KEY `detail_keranjangs_buku_id_foreign` (`buku_id`);

--
-- Indeks untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD PRIMARY KEY (`transaksi_id`,`buku_id`),
  ADD KEY `detail_transaksis_buku_id_foreign` (`buku_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjangs_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `kontributors`
--
ALTER TABLE `kontributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kontributors_buku_id_foreign` (`buku_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembelian_bukus`
--
ALTER TABLE `pembelian_bukus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_bukus_user_id_foreign` (`user_id`),
  ADD KEY `pembelian_bukus_buku_id_foreign` (`buku_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksis_no_keranjang_unique` (`no_keranjang`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasans_buku_id_foreign` (`buku_id`),
  ADD KEY `ulasans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kontributors`
--
ALTER TABLE `kontributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembelian_bukus`
--
ALTER TABLE `pembelian_bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukus`
--
ALTER TABLE `bukus`
  ADD CONSTRAINT `bukus_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_keranjangs`
--
ALTER TABLE `detail_keranjangs`
  ADD CONSTRAINT `detail_keranjangs_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_keranjangs_keranjang_id_foreign` FOREIGN KEY (`keranjang_id`) REFERENCES `keranjangs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD CONSTRAINT `detail_transaksis_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksis_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kontributors`
--
ALTER TABLE `kontributors`
  ADD CONSTRAINT `kontributors_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian_bukus`
--
ALTER TABLE `pembelian_bukus`
  ADD CONSTRAINT `pembelian_bukus_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembelian_bukus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `ulasans_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
