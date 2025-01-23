-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2025 pada 04.52
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
-- Database: `ukk_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `No_trans` varchar(10) NOT NULL,
  `Kode_paket` varchar(10) NOT NULL,
  `Tgl_dtg` date NOT NULL,
  `Nama_pel` varchar(30) NOT NULL,
  `Jenis` enum('Kiloan','Satuan','Selimut','Bad Cover','Lain-lain') NOT NULL,
  `Nama_paket` varchar(50) NOT NULL,
  `Status_p` enum('Baru','Proses','Selesai') NOT NULL,
  `Harga` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL,
  `Pembayaran` enum('Lunas','Belum lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`No_trans`, `Kode_paket`, `Tgl_dtg`, `Nama_pel`, `Jenis`, `Nama_paket`, `Status_p`, `Harga`, `Jumlah`, `Subtotal`, `Pembayaran`) VALUES
('TR-001', 'PL-001', '2020-03-01', 'Bunga', 'Kiloan', 'Baju', 'Baru', 7500, 1, 7500, 'Belum lunas'),
('TR-002', 'PL-002', '2020-03-01', 'Bunga', 'Satuan', 'Selimut Tebal', 'Baru', 15000, 1, 15000, 'Belum lunas'),
('TR-003', 'PL-001', '2020-03-02', 'Sittaa', 'Kiloan', 'Baju', 'Baru', 7500, 1, 7500, 'Belum lunas'),
('TR-003', 'PL-002', '2020-03-02', 'Vira', 'Satuan', 'Selimut Tebal', 'Baru', 15000, 1, 15000, 'Belum lunas'),
('TR-004', 'PL-004', '2020-03-02', 'Sittaa', 'Kiloan', 'Kebaya', 'Baru', 15000, 1, 15000, 'Belum lunas'),
('TR-004', 'PL-005', '2020-03-02', 'Sittaa', 'Satuan', 'Bed Cover Sedang', 'Baru', 15000, 1, 15000, 'Belum lunas'),
('TR-005', 'PL-004', '2020-03-04', 'Bunga', 'Kiloan', 'Kebaya', 'Baru', 15000, 2, 30000, 'Belum lunas'),
('TR-005', 'PL-005', '2020-03-04', 'Bunga', 'Satuan', 'Bed Cover Sedang', 'Baru', 15000, 1, 15000, 'Belum lunas'),
('TR-006', 'PL-001', '2020-03-04', 'Bunga', 'Kiloan', 'Baju', 'Baru', 7500, 1, 7500, 'Belum lunas'),
('TR-007', 'PL-001', '2020-03-04', 'Vira', 'Kiloan', 'Baju', 'Baru', 7500, 1, 7500, 'Belum lunas'),
('TR-007', 'PL-002', '2020-03-04', 'Vira', 'Satuan', 'Selimut Tebal', 'Baru', 15000, 1, 15000, 'Belum lunas'),
('TR-008', 'PL-001', '2025-01-23', 'Vira', 'Kiloan', 'Baju', 'Baru', 7500, 3, 22500, 'Belum lunas'),
('TR-008', 'PL-003', '2020-03-04', 'Sittaa', 'Satuan', 'Bed Cover Sedang', 'Baru', 15000, 1, 15000, 'Belum lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `No_trans` varchar(10) NOT NULL,
  `Kode_paket` varchar(10) NOT NULL,
  `Tgl_dtg` date NOT NULL,
  `Nama_pel` varchar(30) NOT NULL,
  `Jenis` enum('Kiloan','Satuan','Selimut','Bad Cover','Lain-lain') NOT NULL,
  `Nama_paket` varchar(50) NOT NULL,
  `Status_p` enum('Baru','Proses','Selesai') NOT NULL,
  `Harga` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL,
  `Pembayaran` enum('Lunas','Belum lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `Kode_pel` varchar(10) NOT NULL,
  `Nama_pel` varchar(30) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `JK` enum('Laki-Laki','Perempuan') NOT NULL,
  `No_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`Kode_pel`, `Nama_pel`, `Alamat`, `JK`, `No_tlp`) VALUES
('KM-001', 'Sittaa', 'Margaasih', 'Perempuan', '089654432'),
('KM-002', 'Bunga', 'Margaasih', 'Perempuan', '087654329'),
('KM-003', 'Vira', 'Margaasih', 'Perempuan', '087654324');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `Kode_outlet` varchar(10) NOT NULL,
  `Nama_outlet` varchar(30) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `No_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `outlet`
--

INSERT INTO `outlet` (`Kode_outlet`, `Nama_outlet`, `Alamat`, `No_tlp`) VALUES
('KO-001', 'Outlet 1', 'Cimahi', '0897656634'),
('KO-002', 'Outlet 2', 'Lewigajah', '0876543276');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `Kode_paket` varchar(10) NOT NULL,
  `Kode_outlet` varchar(10) NOT NULL,
  `Jenis` enum('Kiloan','Satuan','Selimut','Bad Cover','Lain-Lain') NOT NULL,
  `Nama_paket` varchar(20) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`Kode_paket`, `Kode_outlet`, `Jenis`, `Nama_paket`, `Harga`) VALUES
('PL-001', 'KO-001', 'Kiloan', 'Baju', 7500),
('PL-002', 'KO-001', 'Satuan', 'Selimut Tebal', 15000),
('PL-003', 'KO-001', 'Satuan', 'Bed Cover Sedang', 15000),
('PL-004', 'KO-002', 'Kiloan', 'Kebaya', 15000),
('PL-005', 'KO-002', 'Satuan', 'Bed Cover Sedang', 15000),
('PL-006', 'KO-002', 'Satuan', 'Selimut', 13000),
('PL-007', 'KO-002(Out', 'Satuan', 'Selimut besar', 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `Kode_p` varchar(10) NOT NULL,
  `Kode_outlet` varchar(10) NOT NULL,
  `Nama_p` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `JK` enum('Laki-Laki','Perempuan') NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `No_tlp` varchar(13) NOT NULL,
  `Jabatan` varchar(15) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`Kode_p`, `Kode_outlet`, `Nama_p`, `Username`, `Password`, `JK`, `Alamat`, `No_tlp`, `Jabatan`, `Status`, `Foto`) VALUES
('KP-001', 'KO-001', 'Rahmalia Nuursyabaani', 'Rahmalia', '202cb962ac59075b964b07152d234b70', 'Perempuan', 'Margaasih', '0876543', 'Admin', 'Aktif', 0x70322e706e67),
('KP-002', 'KO-002', 'Febby', 'Febby', '202cb962ac59075b964b07152d234b70', 'Perempuan', 'Iwamas', '0876543', 'Kasir', 'Aktif', 0x70342e706e67),
('KP-003', 'KO-002', 'Zamzami', 'Zam', '202cb962ac59075b964b07152d234b70', 'Laki-Laki', 'Margaasih', '0876543', 'Pemilik', 'Aktif', 0x70372e706e67);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `No_trans` varchar(10) NOT NULL,
  `Kode_p` varchar(10) NOT NULL,
  `Kode_outlet` varchar(10) NOT NULL,
  `Nama_pel` varchar(30) NOT NULL,
  `Tgl_dtg` date NOT NULL,
  `Batas_waktu` varchar(10) NOT NULL,
  `Tgl_ambil` date NOT NULL,
  `Biaya_tambahan` int(11) NOT NULL,
  `Diskon` int(11) NOT NULL,
  `Pajak` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Status_p` enum('Baru','Proses','Selesai','Diambil') NOT NULL,
  `Pembayaran` enum('Lunas','Belum lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`No_trans`, `Kode_p`, `Kode_outlet`, `Nama_pel`, `Tgl_dtg`, `Batas_waktu`, `Tgl_ambil`, `Biaya_tambahan`, `Diskon`, `Pajak`, `Total`, `Status_p`, `Pembayaran`) VALUES
('TR-001', 'KP-001', 'KO-001', 'Bunga', '2020-03-01', '7 hari', '2020-03-08', 1000, 5, 10, 8500, 'Diambil', 'Lunas'),
('TR-002', 'KP-001', 'KO-001', 'Bunga', '2020-03-01', '7 hari', '2020-03-08', 1000, 5, 10, 16000, 'Diambil', 'Lunas'),
('TR-003', 'KP-001', 'KO-001', 'Vira', '2020-03-02', '7 hari', '2020-03-09', 2000, 10, 20, 24500, 'Baru', 'Belum lunas'),
('TR-004', 'KP-002', 'KO-002', 'Sittaa', '2020-03-02', '7 hari', '2020-03-09', 2000, 10, 20, 32000, 'Diambil', 'Lunas'),
('TR-005', 'KP-002', 'KO-002', 'Bunga', '2020-03-04', '7 hari', '2020-03-11', 2000, 10, 10, 47000, 'Diambil', 'Lunas'),
('TR-006', 'KP-001', 'KO-001', 'Bunga', '2020-03-04', '7 hari', '2020-03-11', 1000, 5, 10, 8500, 'Baru', 'Belum lunas'),
('TR-007', 'KP-001', 'KO-001', 'Vira', '2020-03-04', '7 hari', '2020-03-11', 2000, 5, 20, 24500, 'Baru', 'Belum lunas'),
('TR-008', 'KP-001', 'KO-001', 'Sittaa', '2025-01-23', '7 hari', '2020-03-11', 2000, 5, 12, 39500, 'Diambil', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Kode_p` varchar(10) NOT NULL,
  `Nama_p` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Kode_outlet` varchar(10) NOT NULL,
  `Jabatan` enum('Admin','Kasir','Pemilik') NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Kode_p`, `Nama_p`, `Username`, `Password`, `Kode_outlet`, `Jabatan`, `Status`) VALUES
('KP-001', 'Rahmalia Nuursyabaani', 'Rahmalia', '202cb962ac59075b964b07152d234b70', 'KO-001', 'Admin', 'Aktif'),
('KP-002', 'Febby', 'Febby', '202cb962ac59075b964b07152d234b70', 'KO-002', 'Kasir', 'Aktif'),
('KP-003', 'Zamzami', 'Zam', '202cb962ac59075b964b07152d234b70', 'KO-002', 'Pemilik', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`No_trans`,`Kode_paket`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`No_trans`,`Kode_paket`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Kode_pel`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`Kode_outlet`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`Kode_paket`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`Kode_p`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`No_trans`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Kode_p`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
