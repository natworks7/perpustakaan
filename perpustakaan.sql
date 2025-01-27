-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2024 pada 11.54
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('ADMIN1', 'adminsatu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(16) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `nama_rak` varchar(20) NOT NULL,
  `kategori` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`, `nama_rak`, `kategori`, `waktu`) VALUES
('1988.A1.27', 'Pembunuhan ABC', 'Agatha Christie', 'Gramedia Pustaka Utama', 1988, 'A1', 'Fiksi', '2023-12-05 15:48:13'),
('1992.A1.02', 'Sherlock Holmes', 'Arthur Conan Doyle', 'Gramedia pustaka utama', 1992, 'A1', 'Fiksi', '2023-11-21 04:07:53'),
('1997.A1.14', 'Pena dan Botol Tinta ', 'Hans Christian Andersen', 'Gramedia pustaka utama', 1997, 'A1', 'Fiksi', '2023-11-11 09:21:20'),
('1997.A2.01', 'Detektif conan 4', 'Gosho Aoyama\r\nTita Feronti', 'Jakarta: Elex Media Komputindo', 1997, 'A2', 'Fiksi', '2023-11-25 06:42:05'),
('2003.A2.02', 'Death Note', 'Tsugumi Ohba', 'M&C!', 2003, 'A2', 'Fiksi', '2023-11-25 12:48:20'),
('2005.A1.09', 'Ratu Salju dongeng dalam tujuh kisah', 'Hans Christian Andersen', 'Jakarta: Gramedia Pustaka Utama', 2005, 'A1', 'Fiksi', '2023-11-17 23:36:23'),
('2005.A1.10', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005, 'A1', 'Fiksi', '2023-11-12 07:36:57'),
('2007.A1.21', 'Murder In orient Express', 'Agatha Christie', 'Gramedia pustaka utama', 2007, 'A1', 'Fiksi', '2023-11-06 15:15:38'),
('2008.A1.08', 'The Hunger Games', 'Suzanne Collins', 'Scholastic', 2008, 'A1', 'Fiksi', '2023-11-28 01:46:21'),
('2008.A1.16', 'Surat Kecil Untuk Tuhan', 'Agnes Davonar', 'Inandra Published', 2008, 'A1', 'fiksi', '2023-11-20 22:07:45'),
('2012.A1.18', 'Gadis Kretek', 'Ratih Kumala', 'Gramedia pustaka utama', 2012, 'A1', 'Fiksi', '2023-11-19 09:19:42'),
('2015.A1.06', 'The Night Gardener', 'Jonathan Auxier', 'Solo: Tiga Serangkai', 2015, 'A1', 'Fiksi', '2023-12-03 04:15:18'),
('2016.A1.11', 'Hujan', 'Tere liye', 'Gramedia pustaka utama', 2018, 'A1', 'Fiksi', '2023-11-08 04:20:18'),
('2016.A1.25', 'Dear Nathan', 'Erisca Febriani', 'Best Media', 2016, 'A1', 'Fiksi', '2023-11-06 01:33:41'),
('2016.A2.06', 'Tentang Kamu', 'Tere Liye', 'REPUBLIKA', 2016, 'A2', 'Fiksi', '2024-06-28 11:52:40'),
('2017. A1.05', 'Galaksi', 'Poppi pertiwi', 'Coconuts Books', 2017, 'A1', 'Fiksi', '2023-11-04 18:47:30'),
('2017.A1.24', 'Pachinko', 'Min Jin Lee', 'Grand Central Publishing', 2017, 'A1', 'Fiksi', '2023-11-04 17:16:29'),
('2017.A1.26', 'Laut Bercerita', 'Leila S.chudori', 'PT Gramedia, Jakarta', 2017, 'A1', 'Fiksi', '2023-11-08 05:59:56'),
('2018.A1.01', 'Mariposa', 'Luluk HF', 'Coconut Books', 2018, 'A1', 'Fiksi', '2023-11-26 02:10:15'),
('2018.A1.12', 'The snow queen and other fairy tales Hans C. Andersen', 'Hans Christian Andersen', 'Jakarta: Gramedia pustaka utama', 2018, 'A1', 'Fiksi', '2023-11-06 03:54:18'),
('2018.A1.23', 'Senior', 'Eko Ivano Winata', 'Pastel books', 2018, 'A1', 'Fiksi', '2023-11-17 05:38:51'),
('2018.A1.28', 'Hello Salma', 'Erisca Febriani', 'Coconut Books', 2018, 'A1', 'Fiksi', '2023-12-03 20:12:21'),
('2018.A1.30', 'Anjing Kematian', 'Agatha Christie', 'Gramedia Pustaka Utama', 2018, 'A1', 'Fiksi', '2023-12-02 16:27:03'),
('2019.A1.19', 'My Nerd Girl', 'Aidah Harisah', 'Grasindo', 2019, 'A1', 'Fiksi', '2023-11-17 23:08:08'),
('2020.A1.04', 'Dream Launch Project', 'Renita Nozaria', 'Bukune', 2020, 'A1', 'Fiksi', '2023-11-20 03:22:36'),
('2020.A1.07', '12 Cerita Glen Anggara', 'Luluk HF', 'Coconut Books', 2020, 'A1', 'Fiksi', '2023-11-12 23:09:38'),
('2020.A1.14', 'Antares', 'Rweinda', 'Loveable', 2020, 'A1', 'Fiksi', '2023-11-03 09:40:21'),
('2020.A2.05', 'Predatory Marriage', 'Saha', 'Feelyeon Management, RidiBooks', 2020, 'A2', 'Fiksi', '2024-06-28 11:46:03'),
('2020.B1.01', 'Dasar-Dasar Teknik Informatika', 'Novega Pratama Adiputra', 'Deepublish', 2020, 'B1', 'Pengetahuan', '2023-12-02 14:39:44'),
('2021.A1.13', 'Hilmy Milan', 'Nadia Ristivani', 'PT Kawah Media Pustaka', 2021, 'A1', 'Fiksi', '2023-11-09 23:11:53'),
('2021.A1.20', 'Areksa', 'Ita Krn', 'Akad', 2021, 'A1', 'Fiksi', '2023-11-05 18:39:22'),
('2021.A2.04', 'I Thought It Was a Common Transmigration', 'Lemon Frog', 'Mystic', 2021, 'A2', 'Fiksi', '2024-06-28 11:43:46'),
('2022.A1.03', 'Geek Play Love', 'Ika Vihara', 'AG Publisher', 2022, 'A1', 'Fiksi', '2023-11-30 20:00:13'),
('2022.A1.17', 'Eccedentesiast', 'Ita Krn', 'Akad', 2022, 'A1', 'Fiksi', '2023-11-04 10:46:51'),
('2022.A1.22', 'Lotus In The Mud', 'Annelie', 'Akad', 2022, 'A1', 'Fiksi', '2023-11-27 06:50:42'),
('2022.A2.03', 'Hello, Cello', 'Nadia Ristivani', 'Bukune', 2022, 'A2', 'Fiksi', '2024-06-28 11:37:53'),
('2023.A1.29', 'Malioboro at Midnight', 'skysphire', 'Bukune', 2023, 'A1', 'Fiksi', '2023-12-02 16:27:47'),
('2023.B1.02', 'Matematika', 'Yohana', 'Coconut Books', 2023, 'B1', 'Pengetahuan', '2023-12-05 16:18:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_hadir`
--

CREATE TABLE `daftar_hadir` (
  `nama` text NOT NULL,
  `nomor_induk` varchar(16) NOT NULL,
  `jabatan` varchar(16) NOT NULL,
  `keterangan` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_hadir`
--

INSERT INTO `daftar_hadir` (`nama`, `nomor_induk`, `jabatan`, `keterangan`, `waktu`) VALUES
('Martha', 'B220221045', 'Mahasiswa', 'Meminjam buku', '2023-12-04 22:56:24'),
('Yohana', 'B220221075', 'Mahasiswa', 'Mengembalikan buku', '2023-12-04 23:17:47'),
('Natasya', 'B220221044', 'Mahasiswa', 'Mencari buku', '2023-12-04 23:18:01'),
('Martha', 'B220221045', 'Dosen', 'Mencari buku', '2023-12-05 09:18:56'),
('Natasya', 'B220221044', 'Mahasiswa', 'Membaca buku', '2023-12-05 10:27:22'),
('yohana', 'B220221075', 'Mahasiswa', 'Mencari buku', '2023-12-05 10:32:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kode_peminjaman` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` text NOT NULL,
  `nomor_induk` varchar(16) NOT NULL,
  `id_buku` varchar(16) NOT NULL,
  `jumlah_hari` int(16) NOT NULL,
  `waktu` datetime NOT NULL,
  `konfirmasi` enum('BELUM','SUDAH') DEFAULT 'BELUM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`kode_peminjaman`, `nama`, `jabatan`, `nomor_induk`, `id_buku`, `jumlah_hari`, `waktu`, `konfirmasi`) VALUES
('PM20231116162727001', 'Natasya', 'Mahasiswa', 'B220221044', '2005.A1.09', 7, '2023-11-16 16:27:27', 'BELUM'),
('PM20231123162709001', 'Yohana', 'Mahasiswa', 'B220221075', '2016.A1.11', 7, '2023-11-23 16:27:09', 'BELUM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kode_peminjaman` varchar(30) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `jabatan` text NOT NULL,
  `nomor_induk` varchar(16) NOT NULL,
  `id_buku` varchar(16) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `terlambat` int(16) NOT NULL,
  `denda` int(16) NOT NULL,
  `konfirmasi` enum('BELUM','SUDAH') NOT NULL DEFAULT 'BELUM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`kode_peminjaman`, `nama`, `jabatan`, `nomor_induk`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`, `terlambat`, `denda`, `konfirmasi`) VALUES
('PM20231105162610001', 'Martha', 'Mahasiswa', 'B220221045', '2018.A1.23', '2023-11-05 16:26:10', '2023-12-06 01:37:09', 24, 48000, 'SUDAH'),
('PM20231205164103001', 'Yohana', 'Mahasiswa', 'B220221075', '1997.A1.14', '2023-12-05 16:41:03', '2023-12-05 16:42:10', 0, 0, 'SUDAH'),
('PM20231206012653001', 'Jeongwoo', 'Mahasiswa', 'TR20040928', '1997.A1.14', '2023-12-06 01:26:53', '2023-12-06 01:37:56', 0, 0, 'SUDAH');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `id_buku` (`id_buku`),
  ADD UNIQUE KEY `id_buku_2` (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD UNIQUE KEY `kode_peminjaman` (`kode_peminjaman`),
  ADD UNIQUE KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD UNIQUE KEY `kode_peminjaman` (`kode_peminjaman`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
