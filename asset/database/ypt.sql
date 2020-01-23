-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2020 pada 08.24
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ypt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kampus`
--

CREATE TABLE `kampus` (
  `id_kampus` int(10) NOT NULL,
  `nama_kampus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pmb`
--

CREATE TABLE `pmb` (
  `id_pmb` int(10) NOT NULL,
  `tahun_target_pmb` int(4) NOT NULL,
  `tahun_realisasi_pmb` int(4) NOT NULL,
  `id_kampus` int(10) NOT NULL,
  `id_target` int(10) NOT NULL,
  `id_realisasi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi`
--

CREATE TABLE `realisasi` (
  `id_realisasi` int(10) NOT NULL,
  `tahun_realisasi` int(4) NOT NULL,
  `september_realisasi` int(10) NOT NULL DEFAULT 0,
  `oktober_realisasi` int(10) NOT NULL DEFAULT 0,
  `november_realisasi` int(10) NOT NULL DEFAULT 0,
  `desember_realisasi` int(10) NOT NULL DEFAULT 0,
  `januari_realisasi` int(10) NOT NULL DEFAULT 0,
  `februari_realisasi` int(10) NOT NULL DEFAULT 0,
  `maret_realisasi` int(10) NOT NULL DEFAULT 0,
  `april_realisasi` int(10) NOT NULL DEFAULT 0,
  `mei_realisasi` int(10) NOT NULL DEFAULT 0,
  `juni_realisasi` int(10) NOT NULL DEFAULT 0,
  `juli_realisasi` int(10) NOT NULL DEFAULT 0,
  `agustus_realisasi` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `target`
--

CREATE TABLE `target` (
  `id_target` int(10) NOT NULL,
  `tahun` int(4) NOT NULL,
  `september_target` int(10) NOT NULL DEFAULT 0,
  `oktober_target` int(10) NOT NULL DEFAULT 0,
  `november_target` int(10) NOT NULL DEFAULT 0,
  `desember_target` int(10) NOT NULL DEFAULT 0,
  `januari_target` int(10) NOT NULL DEFAULT 0,
  `februari_target` int(10) NOT NULL DEFAULT 0,
  `maret_target` int(10) NOT NULL DEFAULT 0,
  `april_target` int(10) NOT NULL DEFAULT 0,
  `mei_target` int(10) NOT NULL DEFAULT 0,
  `juni_target` int(10) NOT NULL DEFAULT 0,
  `juli_target` int(10) NOT NULL DEFAULT 0,
  `agustus_target` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kampus`
--
ALTER TABLE `kampus`
  ADD PRIMARY KEY (`id_kampus`);

--
-- Indeks untuk tabel `pmb`
--
ALTER TABLE `pmb`
  ADD PRIMARY KEY (`id_pmb`),
  ADD KEY `id_kampus` (`id_kampus`,`id_target`,`id_realisasi`),
  ADD KEY `id_realisasi` (`id_realisasi`),
  ADD KEY `id_target` (`id_target`);

--
-- Indeks untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indeks untuk tabel `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id_target`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kampus`
--
ALTER TABLE `kampus`
  MODIFY `id_kampus` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pmb`
--
ALTER TABLE `pmb`
  MODIFY `id_pmb` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `id_realisasi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `target`
--
ALTER TABLE `target`
  MODIFY `id_target` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pmb`
--
ALTER TABLE `pmb`
  ADD CONSTRAINT `pmb_ibfk_1` FOREIGN KEY (`id_realisasi`) REFERENCES `realisasi` (`id_realisasi`),
  ADD CONSTRAINT `pmb_ibfk_2` FOREIGN KEY (`id_target`) REFERENCES `target` (`id_target`),
  ADD CONSTRAINT `pmb_ibfk_3` FOREIGN KEY (`id_kampus`) REFERENCES `kampus` (`id_kampus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
