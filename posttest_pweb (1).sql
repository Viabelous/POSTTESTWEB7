-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2022 pada 13.54
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posttest_pweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` blob NOT NULL,
  `jenis` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `email`, `nama`, `password`, `jenis`) VALUES
('test', 'test', 'test', 0x243279243130244d6e65315064433755457436647a735a5a447464416541385971394f734d48334d3441385537317831542e7043522f4741565a6436, 'user'),
('Viabel', 'Ryuekenzhin@gmail.com', 'Yafi Arya', 0x24327924313024413566494d37596574506b776d4f734e5769654276754d397661794d42583558307262544e5170715a6d596c384735376e56764843, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_reservasi`
--

CREATE TABLE `daftar_reservasi` (
  `ID` int(4) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Datang` date NOT NULL,
  `Pulang` date NOT NULL,
  `Superior_Single` tinyint(1) DEFAULT NULL,
  `Superior_Single_Value` int(10) DEFAULT NULL,
  `Superior_Double` tinyint(1) DEFAULT NULL,
  `Superior_Double_Value` int(10) DEFAULT NULL,
  `Deluxe_Single` tinyint(1) DEFAULT NULL,
  `Deluxe_Single_Value` int(10) DEFAULT NULL,
  `Deluxe_Double` tinyint(1) DEFAULT NULL,
  `Deluxe_Double_Value` int(10) DEFAULT NULL,
  `Junior_Suite` tinyint(1) DEFAULT NULL,
  `Junior_Suite_Value` int(10) DEFAULT NULL,
  `Aula` tinyint(1) DEFAULT NULL,
  `Ruang_Rapat` tinyint(1) DEFAULT NULL,
  `Tanggal` varchar(20) NOT NULL,
  `Waktu` varchar(20) NOT NULL,
  `nama_foto` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_reservasi`
--

INSERT INTO `daftar_reservasi` (`ID`, `Nama`, `Datang`, `Pulang`, `Superior_Single`, `Superior_Single_Value`, `Superior_Double`, `Superior_Double_Value`, `Deluxe_Single`, `Deluxe_Single_Value`, `Deluxe_Double`, `Deluxe_Double_Value`, `Junior_Suite`, `Junior_Suite_Value`, `Aula`, `Ruang_Rapat`, `Tanggal`, `Waktu`, `nama_foto`) VALUES
(45, 'Junedi', '2022-10-29', '2022-11-01', 1, 2, 1, 1, 0, 0, 0, 0, 1, 3, 1, 1, '2022-10-29', '06:37:32am', 'Junaedi.jpg'),
(46, 'Lisa Manufer', '2022-10-30', '2022-10-31', 1, 1, 1, 4, 0, 0, 0, 0, 1, 2, 0, 1, '2022-10-29', '12:42:27pm', 'Muna.jpg'),
(47, 'Dudu', '2022-10-30', '2022-11-03', 1, 1, 1, 2, 1, 3, 1, 4, 1, 5, 1, 1, '2022-10-29', '12:42:27pm', 'twes.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `daftar_reservasi`
--
ALTER TABLE `daftar_reservasi`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_reservasi`
--
ALTER TABLE `daftar_reservasi`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
