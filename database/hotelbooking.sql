-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Okt 2024 pada 10.44
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
-- Database: `hotelbooking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nomorhp` int(11) NOT NULL,
  `role` varchar(15) NOT NULL,
  `negara` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`, `username`, `alamat`, `nomorhp`, `role`, `negara`) VALUES
(2, 'ikhsan@gmail.com', 'ikhsan', 'ikhsan', '', 827351728, 'ikhsan', 'ikhsan'),
(5, 'holder@holder.com', 'holder', 'holder', 'holder', 82312, 'user', 'holder'),
(8, 'holder@gmail.com', 'ikhsan', 'ikhsan', 'ikhsan', 123, 'user', 'ikhsan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idreservasi` int(11) NOT NULL,
  `tanggalpembayaran` varchar(35) NOT NULL,
  `totalpembayaran` varchar(255) NOT NULL,
  `metodepembayaran` varchar(35) NOT NULL,
  `statuspembayaran` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `photoroom`
--

CREATE TABLE `photoroom` (
  `idfoto` int(11) NOT NULL,
  `fotoruang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `idreservasi` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idroom` int(11) NOT NULL,
  `tanggalcheckin` varchar(35) NOT NULL,
  `tanggalchekout` varchar(35) DEFAULT NULL,
  `totalharga` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `tanggalReservasi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`idreservasi`, `iduser`, `idroom`, `tanggalcheckin`, `tanggalchekout`, `totalharga`, `status`, `tanggalReservasi`) VALUES
(1, 2, 2, '2024-10-02', '2024-10-17', '2000000', 'belum bayar', ''),
(2, 2, 2, '2024-10-02', '2024-10-09', '', 'belum bayar', ''),
(3, 2, 1, '2024-10-03', '', '', 'belum bayar', ''),
(4, 2, 1, '2024-10-04', '', '', 'belum bayar', '10/17/2024 16:03'),
(5, 2, 1, '2024-10-04', '2024-10-24', '', 'belum bayar', '10/17/2024 16:04'),
(6, 2, 1, '2024-10-04', '2024-10-25', '2314125123', 'belum bayar', '10/17/2024 16:04'),
(7, 2, 1, '2024-10-10', '2024-10-26', '2343234235', 'belum bayar', '10/17/2024 16:05'),
(8, 2, 2, '2024-10-04', '2024-10-24', '2053234', 'belum bayar', '10/18/2024 09:59:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `idroom` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `roomtype` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `fasilitas` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `idfoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`idroom`, `roomnumber`, `roomtype`, `harga`, `fasilitas`, `status`, `deskripsi`, `idfoto`) VALUES
(1, 203, 'double bed', '200000', 'banyak', 'belum', 'banyak fasilitas', 5),
(2, 204, 'single bed', '400000', 'banyak sekali', 'belum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et lectus nunc. Etiam maximus pharetra odio non facilisis. Quisque mauris sem, consectetur nec ex at, maximus mattis quam. Donec ultricies lacus velit, eu efficitur quam pretium et. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec eu elit vehicula, facilisis mi ut, cursus ante. Curabitur sed ullamcorper erat, at tincidunt nibh. Nulla rutrum quam eu massa sollicitudin, et ullamcorper nulla mollis. Morbi a lobortis tellus, ac interdum lectus. Nullam ac tempor neque.\r\n\r\nSed nunc libero, aliqu', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`);

--
-- Indeks untuk tabel `photoroom`
--
ALTER TABLE `photoroom`
  ADD PRIMARY KEY (`idfoto`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`idreservasi`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`idroom`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `idreservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `room`
--
ALTER TABLE `room`
  MODIFY `idroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
