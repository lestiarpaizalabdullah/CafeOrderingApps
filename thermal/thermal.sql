-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2023 pada 11.53
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
-- Database: `thermal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nm_kategori`) VALUES
(1, 'food'),
(2, 'snack'),
(3, 'drink');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id_keranjang`, `kode`, `id_produk`, `harga`, `qty`, `jumlah`) VALUES
(1, '20230606112155', 6, 20000, 0, 0),
(2, '20230606112155', 6, 20000, 2, 40000),
(3, '20230606112155', 5, 15000, 3, 45000),
(4, '20230606112155', 6, 20000, 1, 20000),
(5, '20230606112155', 6, 20000, 1, 20000),
(6, '20230606112155', 6, 20000, 1, 20000),
(7, '20230606130108', 1, 12000, 3, 36000),
(8, '20230606130108', 5, 15000, 1, 15000),
(9, '20230606130108', 4, 5000, 4, 20000),
(10, '20230606132536', 6, 20000, 3, 60000),
(11, '20230606132611', 6, 20000, 2, 40000),
(12, '20230606134513', 6, 20000, 3, 60000),
(13, '20230606134513', 5, 15000, 1, 15000),
(14, '20230606134915', 4, 5000, 1, 5000),
(15, '20230606134915', 6, 20000, 1, 20000),
(16, '20230613095425', 4, 5000, 3, 15000),
(17, '20230613100619', 5, 15000, 3, 45000),
(18, '20230613100728', 3, 15000, 3, 45000),
(19, '20230617193726', 1, 12000, 1, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nm_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` bigint(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_kategori`, `nm_produk`, `deskripsi`, `harga`, `gambar`) VALUES
(1, 1, 'Nasi Goreng', 'Nasi Goreng terbuat dari campuran bumbu dan rempah alami seperti cabai, garam, bawang putih, bawang merah, dll', 12000, 'nasgor.jpg'),
(2, 1, 'Mie Goreng', 'Mie Goreng terbuat dari kombinasi bumbu dapur seperti kecap, sambal, sayuran, telur dll', 10000, 'mie.jpg'),
(3, 2, 'Burger', 'Burger makanan cepat saji dengan kombinasi berbagai makanan seperti roti, daging, sayuran, keju, tomat, mayonaise, dll', 15000, 'burger.jpg'),
(4, 2, 'Cookies', 'Cookies adalah kue yang dibuat dengan bahan utama coklat dan choco chips. Memberikan rasa manis dan renyah.', 5000, 'cookes.jpg'),
(5, 3, 'Coffee Beer', 'Coffe Beer adalah minuman dengan bahan utama kopi yang kombinasikan dengan soda sehingga memberikan rasa kopi yang kuat.', 15000, 'coffee beer.jpg'),
(6, 3, 'Cappucino', 'Cappucino adalah minuman dengan bahan utama kopi yang dikombinasikan dengan susu full cream sehingga memberikan perpaduan rasa kopi dan susu yang kental', 20000, 'cappucino.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `metode` int(11) NOT NULL,
  `ket` text DEFAULT NULL,
  `total_qty` int(11) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `kode`, `telp`, `metode`, `ket`, `total_qty`, `total_harga`, `tgl`) VALUES
(1, '20230613100619', '123456', 1, '', 3, 45000, '2023-06-13'),
(2, '20230613100640', '123456', 1, '', 0, 0, '2023-06-13'),
(3, '20230613100728', '123456', 1, '', 3, 45000, '2023-06-13'),
(4, '20230617193726', '12345', 1, '', 1, 12000, '2023-06-17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
