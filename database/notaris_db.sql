-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2020 pada 05.51
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notaris_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `foto`, `password`, `tipe_id`, `daftar`) VALUES
(2, 'Angga', 'angga@gmail.com', 'anggi.jpg', '$2y$10$pdpC6oPY.IYGTHGh8wCbjey0zqOPzTET03sb3T3vT7MhXo5eVNyCa', 1, 1588820075);

-- --------------------------------------------------------

--
-- Struktur dari tabel `akta`
--

CREATE TABLE `akta` (
  `id_akta` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nama_notaris` varchar(128) NOT NULL,
  `email_notaris` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `jenis` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(123) NOT NULL,
  `catatan` varchar(128) NOT NULL,
  `akta` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akta`
--

INSERT INTO `akta` (`id_akta`, `email`, `nama`, `nama_notaris`, `email_notaris`, `file`, `jenis`, `tanggal`, `keterangan`, `catatan`, `akta`) VALUES
(61, 'fafa@gmail.com', 'Ghea', 'Joyo Kusumo S.H', 'joyo@gmail.com', 'FORM_PENGUMPULAN_PERSYARATAN_AJB.docx', 'Surat Kuasa', '2020-06-06', 'Menunggu Konfirmasi', 'Belum ada catatan', 'Belum ada Akta'),
(62, 'fafa@gmail.com', 'Ghea', 'Joyo Kusumo S.H', 'joyo@gmail.com', 'FORM_PENGUMPULAN_PERSYARATAN_SEWA.docx', 'Akta Sewa Menyewa', '2020-06-06', 'Menunggu Konfirmasi', 'Belum ada catatan', 'Belum ada Akta'),
(63, 'fafa@gmail.com', 'Ghea', 'Joyo Kusumo S.H', 'joyo@gmail.com', 'FORM_PENGUMPULAN_PERSYARATAN_SEWA1.docx', 'Akta Sewa Menyewa', '2020-06-06', 'Menunggu Konfirmasi', 'Belum ada catatan', 'Belum ada Akta'),
(64, 'fafa@gmail.com', 'Ghea', 'Kusnadi S.H', 'kusnadi@gmail.com', 'FORM_PENGUMPULAN_PERSYARATAN_SEWA2.docx', 'Akta Jual Beli', '2020-06-06', 'Menunggu Konfirmasi', 'Belum ada catatan', 'Belum ada Akta'),
(65, 'fafa@gmail.com', 'Ghea', 'Firmansyah S.H', 'firmansyah.notaris@gmail.com', 'FORM_PENGUMPULAN_PERSYARATAN_AJB1.docx', 'Akta Sewa Menyewa', '2020-06-06', 'Menunggu Konfirmasi', 'Belum ada catatan', 'Belum ada Akta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id`, `nama`, `telepon`, `foto`, `email`, `password`, `tipe_id`, `daftar`) VALUES
(1, 'Ghea', '085643443897', 'fafa.jpg', 'fafa@gmail.com', '$2y$10$o6AgGD3QSmA6w8eYfmBD4e7yAU0a7c0/DJMTLckuuD7d61mdLQ1Qi', 3, 1588756752),
(2, 'Cecep Purnama', '085698554872', 'avatar.jpg', 'cecep@gmail.com', '$2y$10$7HiQ0AY.t0vQk2TFvURDj.wrMfGBnenH2EbmDZvOZapnM4MKRWI4a', 3, 1589731522);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor`
--

CREATE TABLE `kantor` (
  `id_kantor` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `hari` varchar(128) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `konsul` varchar(128) NOT NULL,
  `buat_akta` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kantor`
--

INSERT INTO `kantor` (`id_kantor`, `email`, `hari`, `jam`, `alamat`, `konsul`, `buat_akta`) VALUES
(8, 'kusnadi@gmail.com', 'Senin - Jumat', '08.00 - 15.00', 'Sidoarjo ', 'Rp 45.000', 'Rp 400.000'),
(10, 'firmansyah.notaris@gmail.com', 'Senin - Rabu', '07.30 - 15.40', 'Surabaya', 'Rp 55.000', 'Rp 420.000'),
(12, 'dwi@gmail.com', 'Senin - Jumat', '09.00 - 17.20', 'Jl. Jawa, Jember', 'Rp 35.000', 'Rp 200.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notaris`
--

CREATE TABLE `notaris` (
  `id_notaris` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_sk` varchar(128) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `daftar` int(11) NOT NULL,
  `hari` varchar(128) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `buat_akta` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notaris`
--

INSERT INTO `notaris` (`id_notaris`, `nama`, `no_sk`, `telepon`, `foto`, `email`, `password`, `tipe_id`, `daftar`, `hari`, `jam`, `alamat`, `buat_akta`) VALUES
(1, 'Kusnadi S.H', 'CC/2007-PPAT', '081234543232', 'notaris1.jpg', 'kusnadi@gmail.com', '$2y$10$A30FNLi65DSsP3bUBTfU.eVPjFGXsM2744XogkgCEqo50HsW1Wcr.', 2, 1588756462, 'Senin - Jumat', '07.30 - 16.00', 'Jl. Raya Kenongo No. 9, Sidoarjo', 'Rp 300.000 - Rp 2.000.000'),
(2, 'Firmansyah S.H', 'CL/2009-PPAT', '081093883745', 'avatar.jpg', 'firmansyah.notaris@gmail.com', '$2y$10$Nc7SBmvG2hkSNENS1MbYi.ov8FdLyxzLSqZsBImguTXk15qPehoEm', 2, 1588994458, 'Senin - Sabtu', '09.00 - 17.30', 'Jl. Kaliwates No. 89, Jember', 'Rp 400.000 - Rp 1.250.000'),
(3, 'Dwi Tiara S.H', 'CC/2012-PPAT', '081728765533', 'avatar.jpg', 'dwi@gmail.com', '$2y$10$dRpk7hiK/vHv7h.1m4xBdeU.Lf6VgYXZaW4H4salLsFPW8c0HbDDW', 2, 1589086409, 'Senin - Jumat', '08.00 - 14.20', 'Jl Raya Waru, No 90 A. Sidoarjo', 'Rp 200.000 - Rp 1.500.000'),
(4, 'Joyo Kusumo S.H', 'CC 2001/PPAT', '081121457968', 'avatar.jpg', 'joyo@gmail.com', '$2y$10$94fdRYfjkFDvyOWJCMNciOBEFGjJMEwx/WuaViPFV2mbINAps391.', 2, 1591085939, 'Senin - Jumat', '07.00 - 14.00', 'Perum Indah Prasta Blok C-16, Sidoarjo', 'Rp 450.000 - RP 3.000.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_akta` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama_notaris` varchar(128) NOT NULL,
  `email_notaris` varchar(128) NOT NULL,
  `jenis` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `ambil` varchar(128) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `biaya` varchar(128) NOT NULL,
  `rekening` varchar(128) NOT NULL,
  `status_pembayaran` varchar(128) NOT NULL,
  `bukti` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanya`
--

CREATE TABLE `tanya` (
  `id_tanya` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_notaris` int(11) NOT NULL,
  `nama_notaris` varchar(128) NOT NULL,
  `email_notaris` varchar(128) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanya`
--

INSERT INTO `tanya` (`id_tanya`, `id`, `nama`, `email`, `id_notaris`, `nama_notaris`, `email_notaris`, `pertanyaan`, `jawaban`, `tanggal`, `keterangan`) VALUES
(1, 1, 'Ghea', 'fafa@gmail.com', 1, 'Kusnadi S.H', 'kusnadi@gmail.com', 'Apakah bisa selesai dalam 1 minggu ?', 'ok', '2020-06-03', 'Terjawab'),
(2, 1, 'Ghea', 'fafa@gmail.com', 1, 'Kusnadi S.H', 'kusnadi@gmail.com', 'ok', 'ok', '2020-06-03', 'Terjawab'),
(3, 1, 'Ghea', 'fafa@gmail.com', 1, 'Kusnadi S.H', 'kusnadi@gmail.com', 'ok?', '', '2020-06-04', 'Menunggu Jawaban'),
(4, 1, 'Ghea', 'fafa@gmail.com', 1, 'Kusnadi S.H', 'kusnadi@gmail.com', 'ok???', '', '2020-06-04', 'Menunggu Jawaban'),
(5, 1, 'Ghea', 'fafa@gmail.com', 1, 'Kusnadi S.H', 'kusnadi@gmail.com', 'ok ta', '', '2020-06-04', 'Menunggu Jawaban');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses_menu`
--

CREATE TABLE `user_akses_menu` (
  `id` int(11) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id`, `tipe_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 3, 3),
(6, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Notaris'),
(3, 'Client'),
(4, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `aktif`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil Notaris', 'notaris', 'fas fa-fw fa-user-tie', 1),
(3, 3, 'Profil Saya', 'client', 'fas fa-fw fa-user', 1),
(4, 2, 'Edit Profil', 'notaris/edit', 'fas fa-fw fa-user-edit', 1),
(5, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Profil Admin', 'admin/profile', 'fas fa-fw fa-user', 1),
(8, 3, 'Cari Notaris', 'client/info', 'fas fa-fw fa-search', 1),
(9, 2, 'Informasi Kantor', 'notaris/office', 'far fa-fw fa-building', 1),
(10, 2, 'Buat Akta', 'notaris/akta', 'far fa-fw fa-edit', 1),
(11, 2, 'Ubah Password', 'notaris/ubahpassword', 'fas fa-fw fa-key', 1),
(12, 1, 'Edit Profil Admin', 'admin/edit', 'fas fa-fw fa-user-edit', 1),
(13, 1, 'Ubah Password', 'admin/ubahpassword', 'fas fa-fw fa-user-lock', 1),
(14, 3, 'Edit Profil', 'client/edit', 'fas fa-fw fa-user-edit', 1),
(15, 3, 'Ubah Password', 'client/ubahpassword', 'fas fa-fw fa-key', 1),
(16, 3, 'Lihat Akta', 'client/lihat', 'far fa-fw fa-list-alt', 1),
(17, 2, 'Daftar Pengajuan Akta', 'notaris/pengajuan', 'fas fa-fw fa-book-open', 1),
(18, 3, 'Pembayaran', 'client/pembayaran', 'far fa-fw fa-money-bill-alt', 1),
(19, 2, 'Pembayaran', 'notaris/lihat_bayar', 'far fa-fw fa-money-bill-alt', 1),
(20, 3, 'Tanya Notaris', 'client/jawaban', 'fas fa-fw fa-comments', 1),
(21, 2, 'Pertanyaan Client', 'notaris/tanya', 'fas fa- fw fa-comments', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tipe`
--

CREATE TABLE `user_tipe` (
  `id` int(11) NOT NULL,
  `tipe` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akta`
--
ALTER TABLE `akta`
  ADD PRIMARY KEY (`id_akta`);

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kantor`
--
ALTER TABLE `kantor`
  ADD PRIMARY KEY (`id_kantor`);

--
-- Indeks untuk tabel `notaris`
--
ALTER TABLE `notaris`
  ADD PRIMARY KEY (`id_notaris`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tanya`
--
ALTER TABLE `tanya`
  ADD PRIMARY KEY (`id_tanya`);

--
-- Indeks untuk tabel `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_tipe`
--
ALTER TABLE `user_tipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `akta`
--
ALTER TABLE `akta`
  MODIFY `id_akta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kantor`
--
ALTER TABLE `kantor`
  MODIFY `id_kantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `notaris`
--
ALTER TABLE `notaris`
  MODIFY `id_notaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tanya`
--
ALTER TABLE `tanya`
  MODIFY `id_tanya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_tipe`
--
ALTER TABLE `user_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
