-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2024 pada 14.03
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_foto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `UserName`, `Password`, `updationDate`, `Image`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2023-06-19 08:23:21', '19062023102321o.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contactus`
--

CREATE TABLE `contactus` (
  `id_cu` int(11) NOT NULL,
  `nama_visit` varchar(100) DEFAULT NULL,
  `email_visit` varchar(120) DEFAULT NULL,
  `telp_visit` char(16) DEFAULT NULL,
  `pesan` longtext DEFAULT NULL,
  `tgl_posting` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contactus`
--

INSERT INTO `contactus` (`id_cu`, `nama_visit`, `email_visit`, `telp_visit`, `pesan`, `tgl_posting`, `status`, `id`) VALUES
(1, 'ME', 'gome@gmail.com', '2147483647', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-06-18 10:03:07', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contactusinfo`
--

CREATE TABLE `contactusinfo` (
  `id_info` int(11) NOT NULL,
  `alamat_kami` tinytext DEFAULT NULL,
  `email_kami` varchar(255) DEFAULT NULL,
  `telp_kami` char(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contactusinfo`
--

INSERT INTO `contactusinfo` (`id_info`, `alamat_kami`, `email_kami`, `telp_kami`, `id`) VALUES
(1, 'Padang', 'pictstory@gmail.com', '08788788106', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `id_galery` int(11) NOT NULL,
  `nama_galery` varchar(100) NOT NULL,
  `foto_galery` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(120) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_user`, `nama_user`, `email`, `password`, `telp`, `alamat`) VALUES
(4, 'budi', 'budi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '082165443677', 'padang'),
(5, 'rita', 'rita@gmail.com', '25d55ad283aa400af464c76d713c07ad', '082165443677', 'Padang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `ket_paket` text NOT NULL,
  `foto_paket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`, `ket_paket`, `foto_paket`) VALUES
(4, 'GOLD', 11000000, 'Benefit Paket Gold:\r\n•	Wedding service dari akad – resepsi\r\n•	Free prewedding & post preweddding\r\n•	Video prewedding 1 menit di instagram\r\n•	Video prewedding akad – resepsi 3-5 menit\r\n•	Soft file (file mentah) + flashdisk kayu print foto\r\n•	Cetak 4R 180 lembar + album\r\n•	1 lembar 20R + frame\r\n•	2 lembar 16R plus\r\n•	2 lembar 10R plus\r\n•	Soft copy all files\r\n•	Free panjang ukuran 20R plus frame\r\n•	Free pemakaian 1 pasang wedding shoes (bebas pilih model & warna)\r\n•	Free pemakaian bucket bunga wedding/prewedding\r\n', '24122023200931D.png'),
(5, 'PREWEDDING PACKAGE', 2500000, '•	1 hari pemotretan\r\n•	3 fotografer\r\n•	2 lembar cetak 20R plus + frame\r\n•	50 file edit\r\n•	Soft copy all file original (google drive)\r\n•	Unlimited foto', '24122023210351).png'),
(6, 'NEW BORN BABY PACKAGE 1', 1500000, '•	2 kostum free pemakaian\r\n•	All properti disediakan\r\n•	15 file edit\r\n•	1 lembar cetak 16R plus + frame\r\n•	Soft copy all file', '24122023212657).png'),
(7, 'NEW BORN BABY PACKAGE 2', 1200000, '•	1 kostum free pemakaian\r\n•	All properti disediakan\r\n•	7 file edit\r\n•	1 lembar cetak 10R plus + frame\r\n•	Soft copy all file', '24122023212806).png'),
(8, 'NEW BORN BABY PACKAGE 3', 700000, '•	1 sofa bayi disediakan\r\n•	10 file edit\r\n•	1 lembar cetak 10R plus + frame\r\n•	Soft copy all file\r\n', '24122023213015).png'),
(9, 'NEW BORN BABY PACKAGE 4', 500000, '•	Sesi foto 1 jam\r\n•	15 file edit\r\n•	Soft copy all file', '24122023213136).png'),
(10, 'PACKAGE 1 FROM PICT STORY', 9000000, '•	Wedding service akad dan resepsi full (full service)\r\n•	Cetak 4R 240 lembar + album (edit)\r\n•	1 lembar 20R plus + frame\r\n•	2 lembar 16R plus + frame\r\n•	2 lembar 10R plus + frame\r\n•	Soft copy all file+ flashdisk\r\n•	Free prewedding indoor + outdoor\r\n•	Free pajangan 20R plus 2 lembar + frame \r\n•	4 Profesional photographers', '24122023214823).png'),
(11, 'PACKAGE 2 FROM PICT STORY', 7500000, '•	Wedding service akad dan resepsi full (full service)\r\n•	Cetak 4R 180 lembar + album (edit)\r\n•	2 lembar 16R plus + frame\r\n•	1 lembar 20R plus + frame\r\n•	2 lembar 10R plus\r\n•	Soft copy all file+ flashdisk\r\n•	Free pajangan 20R plus 1 lembar  \r\n•	3 Profesional photographers\r\n', '24122023215040).png'),
(12, 'PACKAGE 3 FROM PICT STORY', 6500000, '•	Wedding service akad dan resepsi full (full service)\r\n•	Cetak 4R 180 lembar + album (edit)\r\n•	1 lembar 20R plus + frame\r\n•	2 lembar 16R plus\r\n•	2 lembar 20R plus + frame\r\n•	Soft copy all file+ flashdisk\r\n•	3 Profesional photographers', '24122023215248).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `keperluan` varchar(150) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uang_keluar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `keperluan`, `tanggal`, `uang_keluar`) VALUES
(2, 'Beli Kamera', '2024-01-10', 10000000),
(3, 'beli drone', '2024-01-10', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '											<p align=\"justify\"><span style=\"color: rgb(153, 0, 0); font-size: small; font-weight: 700;\">This is Therms and Conditions</span></p><p align=\"justify\"><br></p>											'),
(5, 'Rekening', 'rekening', '																																												123456789 Bank BRI a/n RIZKI WIBOWO'),
(2, 'Privacy Policy', 'privacy', '											<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">This is Privacy Policy</span>'),
(3, 'Tentang Kami', 'aboutus', '																																												<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Kami menyediakan berbagai macam paket jasa fotografi untuk anda</span>'),
(11, 'FAQs', 'faqs', '																						<div style=\"text-align: justify;\"><span style=\"font-size: 1em; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Q : Bagaimana cara booking paket jasa fotografi disini?</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">A : Pertama anda harus mendaftar terlebih dahulu sebagai member melalui menu yang telah disediakan.</span></div>																						');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trx` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `tgl_trx` date NOT NULL,
  `stt_trx` varchar(50) NOT NULL,
  `tgl_take` date NOT NULL,
  `jam_take` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bukti_bayar` text NOT NULL,
  `ubah_tgl` int(1) NOT NULL,
  `pemasukkan` int(25) NOT NULL,
  `total_pemasukkan` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_trx`, `email`, `id_paket`, `tgl_trx`, `stt_trx`, `tgl_take`, `jam_take`, `catatan`, `tgl_bayar`, `bukti_bayar`, `ubah_tgl`, `pemasukkan`, `total_pemasukkan`) VALUES
('10012024124945', 'rita@gmail.com', 4, '2024-01-10', 'Sudah Dibayar', '2024-01-11', '08:00', 'Done', '2024-01-10', '10012024184953asal 2.png', 0, 11000000, 0),
('10012024125010', 'rita@gmail.com', 7, '2024-01-10', 'Selesai', '2024-01-10', '07:00', 'Done', '2024-01-10', '10012024185054asal 2.png', 0, 1200000, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id_cu`);

--
-- Indeks untuk tabel `contactusinfo`
--
ALTER TABLE `contactusinfo`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trx`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id_cu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `contactusinfo`
--
ALTER TABLE `contactusinfo`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `id_galery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
