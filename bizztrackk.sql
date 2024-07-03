-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2024 pada 21.47
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
-- Database: `bizztrackk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akunkaryawan`
--

CREATE TABLE `akunkaryawan` (
  `idkaryawan` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idtoko` int(11) DEFAULT NULL,
  `namalengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akunkaryawan`
--

INSERT INTO `akunkaryawan` (`idkaryawan`, `username`, `password`, `idtoko`, `namalengkap`) VALUES
(1, 'karyawan1', 'password1', 1, 'Budi Santoso'),
(2, 'karyawan2', 'password2', 2, 'Ani Wijaya'),
(3, 'karyawan3', 'password3', 3, 'Citra Dewi'),
(4, 'karyawan4', 'password4', 4, 'Dedi Gunawan'),
(5, 'karyawan5', 'password5', 5, 'Eka Saputra'),
(6, '', '', 6, ''),
(7, '', '', 7, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akunpemilik`
--

CREATE TABLE `akunpemilik` (
  `idakunpemilik` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idtoko` int(11) DEFAULT NULL,
  `namalengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akunpemilik`
--

INSERT INTO `akunpemilik` (`idakunpemilik`, `username`, `password`, `idtoko`, `namalengkap`) VALUES
(1, 'pemilik1', 'password1', 1, 'Andi Rahman'),
(2, 'pemilik2', 'password2', 2, 'Bella Sari'),
(3, 'pemilik3', 'password3', 3, 'Charlie Tan'),
(4, 'pemilik4', 'password4', 4, 'Diana Permata'),
(5, 'pemilik5', 'password5', 5, 'Erik Pratama'),
(6, 'sdadasas', '$2y$10$lzvjZ7D00qGkKaGc7N4q/OpRuO7oOZdzwuA1olmGkxW9192E7SJ9C', NULL, 'dadsas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `pendapatan` decimal(15,2) NOT NULL,
  `pengeluaran` decimal(15,2) NOT NULL,
  `idtoko` int(11) DEFAULT NULL,
  `lababersih` decimal(10,2) GENERATED ALWAYS AS (`pendapatan` - `pengeluaran`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `pendapatan`, `pengeluaran`, `idtoko`) VALUES
(1, 1000000.00, 500000.00, 1),
(2, 2000000.00, 1000000.00, 2),
(3, 1500000.00, 700000.00, 3),
(4, 3000000.00, 1500000.00, 4),
(5, 2500000.00, 1200000.00, 5),
(6, 1000000.00, 300000.00, 1),
(7, 1000000.00, 300000.00, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id_laporan` int(11) NOT NULL,
  `id_keuangan` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id_laporan`, `id_keuangan`, `tanggal`) VALUES
(1, 1, '2024-07-01'),
(2, 2, '2024-07-02'),
(3, 3, '2024-07-03'),
(4, 4, '2024-07-04'),
(5, 5, '2024-07-05'),
(6, 6, '2024-07-03'),
(7, 7, '2024-07-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `idtoko` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `nama_menu`, `idtoko`) VALUES
(1, 'Nasi Goreng', 1),
(2, 'Mie Goreng', 2),
(3, 'Ayam Bakar', 3),
(4, 'Sate Ayam', 4),
(5, 'Bakso', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menupopuler`
--

CREATE TABLE `menupopuler` (
  `id_populer` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menupopuler`
--

INSERT INTO `menupopuler` (`id_populer`, `bulan`, `jumlah_pesanan`, `menu_id`) VALUES
(1, 'Juli', 50, 1),
(2, 'Juli', 40, 2),
(3, 'Juli', 60, 3),
(4, 'Juli', 30, 4),
(5, 'Juli', 70, 5),
(6, 'januari', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `namastok`
--

CREATE TABLE `namastok` (
  `idstok` int(11) NOT NULL,
  `namastok` varchar(255) NOT NULL,
  `idtoko` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `namastok`
--

INSERT INTO `namastok` (`idstok`, `namastok`, `idtoko`) VALUES
(1, 'Beras', 1),
(2, 'Minyak Goreng', 2),
(3, 'Daging Ayam', 3),
(4, 'Tusuk Sate', 4),
(5, 'Tepung Terigu', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `namatoko`
--

CREATE TABLE `namatoko` (
  `idtoko` int(11) NOT NULL,
  `namatoko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `namatoko`
--

INSERT INTO `namatoko` (`idtoko`, `namatoko`) VALUES
(1, 'Toko Sinar Jaya'),
(2, 'Toko Sejahtera'),
(3, 'Toko Makmur'),
(4, 'Toko Berkah'),
(5, 'Toko Sentosa'),
(6, ''),
(7, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemantauan_stok`
--

CREATE TABLE `pemantauan_stok` (
  `id_pemantauan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `idstok` int(11) DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemantauan_stok`
--

INSERT INTO `pemantauan_stok` (`id_pemantauan`, `tanggal`, `idstok`, `stok`) VALUES
(1, '2024-07-01', 1, 100),
(2, '2024-07-01', 2, 200),
(3, '2024-07-01', 3, 150),
(4, '2024-07-01', 4, 300),
(5, '2024-07-01', 5, 250),
(6, '2024-07-03', 1, 1111);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akunkaryawan`
--
ALTER TABLE `akunkaryawan`
  ADD PRIMARY KEY (`idkaryawan`),
  ADD KEY `fk_karyawan_toko` (`idtoko`);

--
-- Indeks untuk tabel `akunpemilik`
--
ALTER TABLE `akunpemilik`
  ADD PRIMARY KEY (`idakunpemilik`),
  ADD KEY `fk_pemilik_toko` (`idtoko`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`),
  ADD KEY `idtoko` (`idtoko`);

--
-- Indeks untuk tabel `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_keuangan` (`id_keuangan`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `idtoko` (`idtoko`);

--
-- Indeks untuk tabel `menupopuler`
--
ALTER TABLE `menupopuler`
  ADD PRIMARY KEY (`id_populer`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `namastok`
--
ALTER TABLE `namastok`
  ADD PRIMARY KEY (`idstok`),
  ADD KEY `idtoko` (`idtoko`);

--
-- Indeks untuk tabel `namatoko`
--
ALTER TABLE `namatoko`
  ADD PRIMARY KEY (`idtoko`);

--
-- Indeks untuk tabel `pemantauan_stok`
--
ALTER TABLE `pemantauan_stok`
  ADD PRIMARY KEY (`id_pemantauan`),
  ADD KEY `idstok` (`idstok`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akunkaryawan`
--
ALTER TABLE `akunkaryawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `akunpemilik`
--
ALTER TABLE `akunpemilik`
  MODIFY `idakunpemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menupopuler`
--
ALTER TABLE `menupopuler`
  MODIFY `id_populer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `namastok`
--
ALTER TABLE `namastok`
  MODIFY `idstok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `namatoko`
--
ALTER TABLE `namatoko`
  MODIFY `idtoko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemantauan_stok`
--
ALTER TABLE `pemantauan_stok`
  MODIFY `id_pemantauan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akunkaryawan`
--
ALTER TABLE `akunkaryawan`
  ADD CONSTRAINT `fk_karyawan_toko` FOREIGN KEY (`idtoko`) REFERENCES `namatoko` (`idtoko`);

--
-- Ketidakleluasaan untuk tabel `akunpemilik`
--
ALTER TABLE `akunpemilik`
  ADD CONSTRAINT `fk_pemilik_toko` FOREIGN KEY (`idtoko`) REFERENCES `namatoko` (`idtoko`);

--
-- Ketidakleluasaan untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`idtoko`) REFERENCES `namatoko` (`idtoko`);

--
-- Ketidakleluasaan untuk tabel `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD CONSTRAINT `laporan_keuangan_ibfk_1` FOREIGN KEY (`id_keuangan`) REFERENCES `keuangan` (`id_keuangan`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`idtoko`) REFERENCES `namatoko` (`idtoko`);

--
-- Ketidakleluasaan untuk tabel `menupopuler`
--
ALTER TABLE `menupopuler`
  ADD CONSTRAINT `menupopuler_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Ketidakleluasaan untuk tabel `namastok`
--
ALTER TABLE `namastok`
  ADD CONSTRAINT `namastok_ibfk_1` FOREIGN KEY (`idtoko`) REFERENCES `namatoko` (`idtoko`);

--
-- Ketidakleluasaan untuk tabel `pemantauan_stok`
--
ALTER TABLE `pemantauan_stok`
  ADD CONSTRAINT `pemantauan_stok_ibfk_1` FOREIGN KEY (`idstok`) REFERENCES `namastok` (`idstok`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
