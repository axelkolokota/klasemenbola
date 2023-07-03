-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2023 pada 03.26
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klasemen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bola`
--

CREATE TABLE `bola` (
  `id` int(11) NOT NULL,
  `nama_tim` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `jml_bermain` int(11) NOT NULL,
  `menang` int(11) NOT NULL,
  `seri` int(11) NOT NULL,
  `kalah` int(11) NOT NULL,
  `gol_menang` int(11) NOT NULL,
  `gol_kalah` int(11) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bola`
--

INSERT INTO `bola` (`id`, `nama_tim`, `kota`, `jml_bermain`, `menang`, `seri`, `kalah`, `gol_menang`, `gol_kalah`, `poin`) VALUES
(1, 'Arema FC', 'Malang', 6, 3, 0, 3, 7, 6, 9),
(2, 'Persipura', 'Jayapurra', 4, 2, 0, 2, 3, 5, 6),
(4, 'Persija', 'Jakarta', 7, 1, 2, 4, 2, 5, 5),
(5, 'Persib', 'Bandung', 6, 4, 1, 1, 4, 1, 13),
(6, 'PSM', 'Makassar', 5, 2, 1, 2, 2, 1, 7);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bola`
--
ALTER TABLE `bola`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bola`
--
ALTER TABLE `bola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
