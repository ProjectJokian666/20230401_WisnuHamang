-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2022 pada 14.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `potlot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2019_08_19_000000_create_failed_jobs_table', 2);

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
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `id_karya` int(11) DEFAULT NULL,
  `potongan` float DEFAULT NULL,
  `harga_akhir` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id`, `id_karya`, `potongan`, `harga_akhir`, `created_at`) VALUES
(1, 6, 5, 0.95, '2022-07-27 11:41:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_karya` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_cart`
--

INSERT INTO `tb_cart` (`id`, `id_user`, `id_karya`, `created_at`) VALUES
(21, 9, 15, '2022-08-03 09:31:43'),
(22, 9, 19, '2022-08-03 09:40:39'),
(26, 13, 18, '2022-08-03 17:39:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_custom`
--

CREATE TABLE `tb_custom` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `custom` text DEFAULT NULL,
  `biaya` float DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `hasil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_custom`
--

INSERT INTO `tb_custom` (`id`, `users_id`, `custom`, `biaya`, `gambar`, `created_at`, `hasil`) VALUES
(2, 9, NULL, NULL, '1659187781.jpg', '2022-07-30 13:29:41.261483', NULL),
(3, 9, NULL, NULL, '1659519817.jpg', '2022-08-03 09:43:37.418177', NULL),
(4, 9, NULL, NULL, '1659543721.jpg', '2022-08-03 16:22:01.809049', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id` int(11) NOT NULL,
  `gambar` text DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `id_pelukis` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gambar`
--

INSERT INTO `tb_gambar` (`id`, `gambar`, `nama`, `keterangan`, `harga`, `kategori`, `id_pelukis`, `created_at`, `status`) VALUES
(13, '1659518688.jpg', 'Jendral Sudirman', NULL, 1, NULL, NULL, '2022-08-03 09:24:48', 'dibeli'),
(14, '1659518714.jpg', 'Doa Ibu', NULL, 1, NULL, NULL, '2022-08-03 09:25:14', 'dibeli'),
(15, '1659518740.jpg', 'Kucing Hutan', NULL, 1, NULL, NULL, '2022-08-03 09:25:40', 'dibeli'),
(16, '1659518934.jpg', 'Leopard', NULL, 1, NULL, NULL, '2022-08-03 09:28:54', NULL),
(17, '1659518966.jpg', 'Karapan Sapi', NULL, 1, NULL, NULL, '2022-08-03 09:29:26', 'dibeli'),
(18, '1659519465.jpg', 'Kucing Anggora', NULL, 1, NULL, NULL, '2022-08-03 09:37:45', NULL),
(19, '1659519494.jpg', 'Gerombolan Singa', NULL, 1, NULL, NULL, '2022-08-03 09:38:14', NULL),
(20, '1659519550.jpg', 'Perjuangan Ibu', NULL, 1, NULL, NULL, '2022-08-03 09:39:10', 'dibeli'),
(21, '1659550820.jpg', 'okokoko', 'sjoasjo', 1, NULL, NULL, '2022-08-03 18:20:20', 'dibeli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `tb_gambar_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `flag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id`, `tb_gambar_id`, `users_id`, `status`, `created_at`, `flag`) VALUES
(12, 13, 9, 'Lunas', '2022-08-03 09:33:00', 'verif'),
(13, 14, 9, 'Lunas', '2022-08-03 09:34:42', 'verif'),
(14, 17, 9, 'Lunas', '2022-08-03 14:38:45', 'verif'),
(15, 20, 9, 'Lunas', '2022-08-03 16:58:55', 'verif'),
(16, 15, 11, 'Lunas', '2022-08-03 17:08:25', 'verif'),
(17, 21, 9, 'Lunas', '2022-08-03 18:24:58', 'verif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_payment`
--

CREATE TABLE `tb_payment` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `transaction_status` varchar(255) DEFAULT NULL,
  `transaction_time` timestamp(6) NULL DEFAULT NULL,
  `tb_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_payment`
--

INSERT INTO `tb_payment` (`id`, `payment_type`, `status_message`, `transaction_status`, `transaction_time`, `tb_order_id`) VALUES
(7, 'gopay', 'Success, transaction is found', 'settlement', '2022-07-27 14:44:49.000000', 8),
(8, 'gopay', 'Success, transaction is found', 'settlement', '2022-07-31 16:16:44.000000', 9),
(9, 'gopay', 'Success, transaction is found', 'settlement', '2022-07-31 16:23:18.000000', 10),
(10, 'gopay', 'Success, transaction is found', 'settlement', '2022-08-03 03:12:10.000000', 11),
(11, 'gopay', 'Success, transaction is found', 'settlement', '2022-08-03 09:32:01.000000', 12),
(12, 'gopay', 'Success, transaction is found', 'settlement', '2022-08-03 09:34:18.000000', 13),
(13, 'gopay', 'Success, transaction is found', 'settlement', '2022-08-03 14:38:04.000000', 14),
(14, 'gopay', 'Success, transaction is found', 'settlement', '2022-08-03 16:58:28.000000', 15),
(15, 'gopay', 'Success, transaction is found', 'settlement', '2022-08-03 17:08:11.000000', 16),
(16, 'gopay', 'Success, transaction is found', 'settlement', '2022-08-03 18:24:07.000000', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemasar`
--

CREATE TABLE `tb_pemasar` (
  `id` int(11) NOT NULL,
  `id_gambar` int(11) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemasar`
--

INSERT INTO `tb_pemasar` (`id`, `id_gambar`, `id_anggota`, `created_at`) VALUES
(2, 3, 11, '2022-06-03 17:29:56'),
(3, 8, 11, '2022-07-27 15:27:52'),
(4, 10, 11, '2022-07-27 23:29:38'),
(5, 11, 11, '2022-07-28 00:38:30'),
(6, 12, 11, '2022-07-31 16:21:05'),
(7, 13, 11, '2022-08-03 09:24:48'),
(8, 14, 11, '2022-08-03 09:25:14'),
(9, 15, 11, '2022-08-03 09:25:40'),
(10, 16, 11, '2022-08-03 09:28:54'),
(11, 17, 11, '2022-08-03 09:29:26'),
(12, 18, 11, '2022-08-03 09:37:45'),
(13, 19, 11, '2022-08-03 09:38:14'),
(14, 20, 11, '2022-08-03 09:39:10'),
(15, 21, 48, '2022-08-03 18:20:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `alamat`, `no_hp`) VALUES
(9, 'Customer', 'customer@gmail.com', NULL, '$2y$10$i7UOVZqs04.SQvKxID9OK.Y1YhoBief6nXJfnW6bOYjl9n3ZxRFGi', NULL, NULL, NULL, 'customer', NULL, NULL),
(11, 'pemasar1', 'pemasar@gmail.com', NULL, '$2y$10$X0BuDq1YmhprLflh52UrQeg0Ax2PHrgSK.du7PechhLTnJX9JwCDG', NULL, NULL, NULL, 'anggota', NULL, '089907212'),
(12, 'pelukis', 'pelukis@gmail.com', NULL, '$2y$10$cmjrbjnLvM1s1vqIp0GFKeVdMjBKoEzkrr9KSfsT.b0OeqNARaYiC', NULL, NULL, NULL, 'pelukis', NULL, NULL),
(13, 'pemilik', 'pemilik@gmail.com', NULL, '$2y$10$vNRq5XhTjW9rf0wtXUKax.0gDVFhqFFiOOPvkYEuu3BVB2YO8JhtW', NULL, '2022-07-24 11:06:15', '2022-07-24 11:06:15', 'pemilik', NULL, NULL),
(24, 'admin1', 'admin@gmail.com', NULL, '$2y$10$vv.GtvJ1KUVkgT1SsvwBSO7kQKp3jH1QdR0RaN422YHPL05TIhSWy', NULL, '2022-07-27 19:33:08', NULL, 'admin', NULL, '08990825812'),
(26, 'pemasar2', 'pemasar2@gmail.com', NULL, '$2y$10$JGdgHmnqvO78XAuaWwdSLem60eYxDDqEZ1yxPimc8fSfLwJqHBtJm', NULL, '2022-08-03 02:12:48', '2022-08-03 02:12:48', 'anggota', NULL, NULL),
(48, 'market', 'marketingoke@gmail.com', NULL, '$2y$10$6aTywvDbhqkEHPCV7Fiam.Zt/ZZXEkwHtcu.aKgEEFdY1dR3l7ewu', NULL, '2022-08-03 18:16:27', NULL, 'anggota', NULL, '00000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_custom`
--
ALTER TABLE `tb_custom`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pemasar`
--
ALTER TABLE `tb_pemasar`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_custom`
--
ALTER TABLE `tb_custom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_pemasar`
--
ALTER TABLE `tb_pemasar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
