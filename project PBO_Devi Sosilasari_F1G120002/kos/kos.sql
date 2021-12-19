-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2021 pada 12.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `id_pemilik`, `username`, `pass`, `role`) VALUES
(1, 0, 'danone', 'd123', 'adminisrator'),
(2, 1, 'denjiro', 'denjiro123', 'pemilik_kos'),
(3, 2, 'cavendish', 'cavendish123', 'pemilik_kos'),
(4, 3, 'danone', 'danone123', 'pemilik_kos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar_kos`
--

CREATE TABLE `kamar_kos` (
  `id` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `tipe_kamar` varchar(50) NOT NULL,
  `fasilitas` varchar(50) NOT NULL,
  `sistem_pembayaran` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `masa_kontrak` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `terpakai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar_kos`
--

INSERT INTO `kamar_kos` (`id`, `id_pemilik`, `tipe_kamar`, `fasilitas`, `sistem_pembayaran`, `harga`, `masa_kontrak`, `jumlah`, `terpakai`) VALUES
(2, 1, 'Type A', 'ac + televisi', 'cash', 3000000, '6 Bulan', 5, 3),
(3, 1, 'Type B', 'kipas angin + rak sepatu', 'cash', 2700000, '6 Bulan', 7, 1),
(4, 2, 'Type C', 'kompor gas + mesin cuci', 'cash', 2900000, '6 Bulan', 4, 0),
(6, 2, 'Type D', 'kamar mandi dalam + kompor gas', 'cash', 2200000, '6 Bulan', 6, 1),
(7, 2, 'Type E', 'mesin cuci + kasur baru', 'cash', 2100000, '6 Bulan', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_kos`
--

CREATE TABLE `pemilik_kos` (
  `id` int(11) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `foto_kos` varchar(50) NOT NULL,
  `alamat_kos` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `peraturan_kos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemilik_kos`
--

INSERT INTO `pemilik_kos` (`id`, `nama_pemilik`, `foto_kos`, `alamat_kos`, `no_hp`, `peraturan_kos`) VALUES
(1, 'denjiro', 'kos1.jpg', 'Ibukota Bunga', '081234567899', '1. menghemat air dengan menutup keran setelah menggunakan air<br>\r\n2. menghemat listrik dengan cara mematikan lampu dan peralatan elektronik yang tidak digunkan, terutama saat akan meninggalkan kost<br>\r\n3. menjaga fasilitas kost dengan baik, apabila ada fasilitas atau bagian dari kamar kost yang rusak harap segera menghubungi pengelola kost<br>\r\n4. mengunci kamar pabila meninggalkan kost'),
(2, 'cavendish', 'kos2.jpg', 'Onigashima', '081209876543', '1. selama masa sewa, penyewa kost berhak menempati kamar dan memanfaatkan fasilitas yang ada di dalam kost<br>\r\n2. menghemat listrik dengan cara mematikan lampu dan peralatan elektronik yang tidak digunkan, terutama saat akan meninggalkan kost<br>\r\n3. menjaga fasilitas kost dengan baik, apabila ada fasilitas atau bagian dari kamar kost yang rusak harap segera menghubungi pengelola kost<br>\r\n4. menjaga ketenangan di kamar kost'),
(3, 'danone', 'kos3.jpg', 'Desa Kapota', '081234567890', '1. Jangan Menyerah Sebelum Mencoba!<br>\r\n2. Kita harus lebih kuat dari hari kemarin!<br>\r\n3. Jangan Paksakan kebueruntunganmu<br>\r\n4. Jangan Lupa Sholat!!! Okeh...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa_kos`
--

CREATE TABLE `penyewa_kos` (
  `id_penyewa` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `masa_kontrak` varchar(50) NOT NULL,
  `nama_penyewa` varchar(50) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `kesanggupan_membayar` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyewa_kos`
--

INSERT INTO `penyewa_kos` (`id_penyewa`, `id_kamar`, `masa_kontrak`, `nama_penyewa`, `no_ktp`, `no_hp`, `kesanggupan_membayar`, `status`) VALUES
(5, 2, '6 bulan', 'Denjiro', '6543211234567890', '088761234537', 'Sanggup', 'belum bayar'),
(6, 3, '6 Bulan', 'Otsuka', '1234567890098768', '081234567899', 'Sanggup', 'sudah bayar'),
(7, 3, '6 Bulan', 'Leo', '7625473826364736', '082298723163', 'Sanggup', 'belum bayar'),
(8, 6, '6 Bulan', 'Vivi', '8263546283645263', '082441431410', 'Sanggup', 'belum bayar'),
(9, 2, '6 Bulan', 'Shirahoshi', '9183627481736473', '082147833244', 'Sanggup', 'belum bayar'),
(10, 2, '6 Bulan', 'Vegapunk', '3647284664748263', '082257748009', 'Sanggup', 'sudah bayar'),
(12, 6, '6 Bulan', 'Diwan Andika', '6543211234567888', '087654321200', 'Sanggup', 'belum bayar'),
(13, 7, '6 Bulan', 'Guntur', '9832535264787625', '082364738765', 'Sanggup', 'sudah bayar'),
(23, 2, '6 Bulan', 'hgtyxfhsyxyg', 'trere', 'rdt5ree', 'tRDTRDRT', 'sudah bayar'),
(24, 2, '6 Bulan', 'HAmka', '9873487623742365', '08888838236', 'Sanggup', 'sudah bayar'),
(25, 6, '6 Bulan', 'Kinemon', '8742685754732762', '37623654454', 'Mungkin', 'sudah bayar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar_kos`
--
ALTER TABLE `kamar_kos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indeks untuk tabel `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyewa_kos`
--
ALTER TABLE `penyewa_kos`
  ADD PRIMARY KEY (`id_penyewa`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kamar_kos`
--
ALTER TABLE `kamar_kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penyewa_kos`
--
ALTER TABLE `penyewa_kos`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kamar_kos`
--
ALTER TABLE `kamar_kos`
  ADD CONSTRAINT `kamar_kos_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik_kos` (`id`);

--
-- Ketidakleluasaan untuk tabel `penyewa_kos`
--
ALTER TABLE `penyewa_kos`
  ADD CONSTRAINT `penyewa_kos_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar_kos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
