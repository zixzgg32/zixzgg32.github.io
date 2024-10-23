-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2024 pada 16.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `email`, `username`, `password`) VALUES
(6, 'designmarket@designmarket.ac.id', 'AdminDesign', '$2y$10$j5sPQ1QjkO3ClVF0i2MGDub7h/HxHpoDhExhp3mxTX7EWBZiOeX76'),
(7, 'zhorif.f.32@gmail.com', 'zzz', '$2y$10$slNHSFMjIgsXhBUKj252PeDJcVrFRBWSNUeCJaw9qz9UXpbtHucA.'),
(8, 'zhorif.id@gmail.com', 'xxx', '$2y$10$QnVVSqngWth1QCbcLBlw0.5AxfoxRolOMrpDmSZllXXcQdZpK8W/m'),
(9, 'find4experience@gmail.com', 'jorip', '$2y$10$SMPwvFjdGjWl6hw5vsg82.iDsmZfjxJXL/dYScBR8ZnLV6LhcLRk2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `balasankomen`
--

CREATE TABLE `balasankomen` (
  `id` int(11) NOT NULL,
  `idService` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `waktuKomen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `demoDesign` varchar(255) NOT NULL,
  `designType` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id`, `username`, `demoDesign`, `designType`, `price`) VALUES
(18, 'Guest', '2024-10-16 15.12.54.jpg', 'Logo Designer', 100),
(19, 'zzz', '2024-10-22 13.43.03.png', 'Logo Designer', 10),
(20, 'xxx', '2024-10-22 14.25.46.jpg', 'Logo Designer', 7),
(21, 'xxx', '2024-10-22 14.58.13.png', 'Game Art', 100),
(22, 'xxx', '2024-10-22 14.59.21.png', 'Game Art', 160),
(24, 'jorip', '2024-10-23 11.39.26.png', 'Web Designer', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `idService` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `komen` text NOT NULL,
  `waktuKomen` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `idService`, `user`, `komen`, `waktuKomen`) VALUES
(1, 22, 'zzz', 'n', '2024-10-23 21:38:11'),
(2, 22, 'zzz', 'n', '2024-10-23 21:38:14'),
(3, 26, 'zzz', 'v', '2024-10-23 21:38:26'),
(4, 25, 'zzz', 'av', '2024-10-23 21:41:28'),
(5, 19, 'zzz', 'a', '2024-10-23 21:43:06'),
(6, 21, 'zzz', 'post', '2024-10-23 21:47:09'),
(7, 21, 'zzz', 'post', '2024-10-23 21:48:40'),
(8, 26, 'zzz', 'z', '2024-10-23 21:48:46'),
(9, 26, 'zzz', 'z', '2024-10-23 21:49:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `balasankomen`
--
ALTER TABLE `balasankomen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `balasankomen`
--
ALTER TABLE `balasankomen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
