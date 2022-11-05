-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Okt 2022 pada 19.00
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
(45, 'Junedi', '2022-10-29', '2022-11-01', 1, 2, 1, 1, 0, 0, 0, 0, 1, 3, 1, 1, '2022-10-29', '06:37:32am', 'aaa.jpg'),
(46, 'Lisa Manufer', '2022-10-30', '2022-10-31', 1, 1, 1, 4, 0, 0, 0, 0, 1, 2, 0, 1, '2022-10-29', '12:42:27pm', 'Muna.jpg'),
(47, 'Dudu', '2022-10-30', '2022-11-03', 1, 1, 1, 2, 1, 3, 1, 4, 1, 5, 1, 1, '2022-10-29', '12:42:27pm', 'blank.jpg');

--
-- Indexes for dumped tables
--

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
