-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2019 pada 10.25
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipendar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_adm`
--

CREATE TABLE `tb_adm` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_adm`
--

INSERT INTO `tb_adm` (`id_admin`, `nama`, `nip`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `user`) VALUES
(1, 'Ahmad Fauzi Ridlwan', 'H1D016001', '1997-11-11', 'Laki-laki', 'Majalengka', 51);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dsn`
--

CREATE TABLE `tb_dsn` (
  `id_dosen` int(10) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `bidang_keahlian` varchar(30) NOT NULL,
  `gmail` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dsn`
--

INSERT INTO `tb_dsn` (`id_dosen`, `id_admin`, `nama`, `nip`, `bidang_keahlian`, `gmail`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `user`) VALUES
(12, 0, 'Prof. Dr. Triyani Hardiyati, SU.', 'D1D016001', 'Ekologi', 'Tri@gmail.com', '2019-07-11', 'Perempuan', 'BANDUNG', 95),
(13, 0, 'Prof. Edy Yuwono, PhD.', 'D1D016002', 'Zoologi', 'Edy@gmail.com', '2019-07-04', 'Laki - laki', 'BANDUNG', 96),
(14, 0, 'Prof. Agus Irianto, MSc., PhD.', 'D1D016003', 'Botani', 'Agus@gmail.com', '2019-07-17', 'Laki - laki', 'BANDUNG', 97),
(15, 0, 'Agatha Sih Piranti, Dr., M.Sc, Dra.', 'D1D016004', 'Molekuler', 'Agatha@gmail.com', '2019-07-23', 'Perempuan', 'BANDUNG', 98),
(16, 0, 'Agus Nuryanto, Dr., MSi. ', 'D1D016005', 'Ekologi', 'Agus@gmail.com', '2019-07-11', 'Laki - laki', 'BANDUNG', 99),
(17, 0, 'Alice Yuniati, PhD.', 'D1D016006', 'Zoologi', 'Alice@gmail.com', '2019-07-03', 'Perempuan', 'BANDUNG', 100),
(18, 0, 'Ardini Rin Maharning, PhD.', 'D1D016007', 'Botani', 'Ardini@gmail.com', '2019-07-24', 'Perempuan', 'BANDUNG', 101),
(19, 0, 'Bambang Heru Budianto, Dr. MS. ', 'D1D016008', 'Molekuler', 'Bambang@gmail.com', '2019-07-03', 'Laki - laki', 'BANDUNG', 102);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `shift` varchar(30) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen_ekologi` int(11) DEFAULT NULL,
  `id_dosen_zoologi` int(11) DEFAULT NULL,
  `id_dosen_botani` int(11) DEFAULT NULL,
  `id_dosen_molekuler` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `tanggal`, `shift`, `id_ruang`, `id_mahasiswa`, `id_dosen_ekologi`, `id_dosen_zoologi`, `id_dosen_botani`, `id_dosen_molekuler`) VALUES
(1, '2019-07-04', 'shift1', 1, 23, 12, 13, 15, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kms`
--

CREATE TABLE `tb_kms` (
  `id_komisi` int(10) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kms`
--

INSERT INTO `tb_kms` (`id_komisi`, `id_admin`, `nama`, `nip`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `user`) VALUES
(3, 0, 'Pak Fail Wildan', 'K1D016001', '2019-07-04', 'Laki-laki', 'SUMPIUH', 94);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id_mahasiswa` int(10) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `angkatan` int(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `dosen_pembimbing` int(10) DEFAULT NULL,
  `skripsi1` int(10) DEFAULT NULL,
  `skripsi2` int(10) DEFAULT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL,
  `file3` varchar(100) NOT NULL,
  `file4` varchar(100) NOT NULL,
  `file5` varchar(100) NOT NULL,
  `user` int(20) NOT NULL,
  `tahap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mhs`
--

INSERT INTO `tb_mhs` (`id_mahasiswa`, `id_admin`, `nama`, `nim`, `angkatan`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `dosen_pembimbing`, `skripsi1`, `skripsi2`, `file1`, `file2`, `file3`, `file4`, `file5`, `user`, `tahap`) VALUES
(23, 0, 'Wahyu Hidayat', 'H1D016001', 2016, '2019-07-03', 'Laki - laki', 'SALEM', 15, 16, 17, 'ecomerce jurnal.pdf', 'jurnal audit.pdf', 'KARTU UJIAN AKHIR SEMESTER billy.pdf', 'KARTU UJIAN AKHIR SEMESTER.pdf', 'KSM Ahmad.pdf', 88, 4),
(24, 0, 'Bryant Alim Amrullah', 'H1D016002', 2016, '2019-07-03', 'Laki - laki', 'BEKASI', 0, 0, 0, '', '', '', '', '', 89, 0),
(25, 0, 'Ahmad Fauzi Ridlwan', 'H1D016003', 2016, '2019-07-12', 'Laki - laki', 'MAJALENGKA', 0, 0, 0, '', '', '', '', '', 90, 0),
(26, 0, 'Arif Yuniarto', 'H1D016004', 2016, '2019-07-04', 'Laki - laki', 'PEMALANG', 0, 0, 0, '', '', '', '', '', 91, 0),
(27, 0, 'Pradana Nirwana', 'H1D016005', 2016, '2019-07-11', 'Laki - laki', 'TASIKMALAYA', 0, 0, 0, '', '', '', '', '', 92, 0),
(28, 0, 'Muslih Maruzi', 'H1D016006', 2016, '2019-07-04', 'Laki - laki', 'CIREBON', 0, 0, 0, '', '', '', '', '', 93, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id`, `nama`) VALUES
(1, 'Ruangan seminar 1'),
(2, 'Ruangan seminar 2'),
(3, 'Ruangan seminar 3'),
(4, 'Ruangan seminar 4'),
(5, 'Ruangan seminar 5'),
(6, 'Ruangan seminar 6'),
(7, 'Ruangan Seminar 7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id`, `username`, `password`, `level`) VALUES
(51, 'H1D016001', 'ahmadfauzi', '1'),
(88, 'H1D016001', 'H1D016001', '4'),
(89, 'H1D016002', 'H1D016002', '4'),
(90, 'H1D016003', 'H1D016003', '4'),
(91, 'H1D016004', 'H1D016004', '4'),
(92, 'H1D016005', 'H1D016005', '4'),
(93, 'H1D016006', 'H1D016006', '4'),
(94, 'K1D016001', 'K1D016001', '2'),
(95, 'D1D016001', 'D1D016001', '3'),
(96, 'D1D016002', 'D1D016002', '3'),
(97, 'D1D016003', 'D1D016003', '3'),
(98, 'D1D016004', 'D1D016004', '3'),
(99, 'D1D016005', 'D1D016005', '3'),
(100, 'D1D016006', 'D1D016006', '3'),
(101, 'D1D016007', 'D1D016007', '3'),
(102, 'D1D016008', 'D1D016008', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_adm`
--
ALTER TABLE `tb_adm`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `user` (`user`);

--
-- Indeks untuk tabel `tb_dsn`
--
ALTER TABLE `tb_dsn`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `user` (`user`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_dosen_botani` (`id_dosen_botani`),
  ADD KEY `id_dosen_ekologi` (`id_dosen_ekologi`),
  ADD KEY `id_dosen_molekuler` (`id_dosen_molekuler`),
  ADD KEY `id_dosen_zoologi` (`id_dosen_zoologi`);

--
-- Indeks untuk tabel `tb_kms`
--
ALTER TABLE `tb_kms`
  ADD PRIMARY KEY (`id_komisi`),
  ADD KEY `user` (`user`);

--
-- Indeks untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `user` (`user`),
  ADD KEY `dosen_pembimbing` (`dosen_pembimbing`),
  ADD KEY `skripsi1` (`skripsi1`),
  ADD KEY `skripsi2` (`skripsi2`);

--
-- Indeks untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_adm`
--
ALTER TABLE `tb_adm`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_dsn`
--
ALTER TABLE `tb_dsn`
  MODIFY `id_dosen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kms`
--
ALTER TABLE `tb_kms`
  MODIFY `id_komisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id_mahasiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_adm`
--
ALTER TABLE `tb_adm`
  ADD CONSTRAINT `tb_adm_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_level` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_dsn`
--
ALTER TABLE `tb_dsn`
  ADD CONSTRAINT `tb_dsn_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_level` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mhs` (`id_mahasiswa`),
  ADD CONSTRAINT `tb_jadwal_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `tb_ruangan` (`id`),
  ADD CONSTRAINT `tb_jadwal_ibfk_3` FOREIGN KEY (`id_dosen_botani`) REFERENCES `tb_dsn` (`id_dosen`),
  ADD CONSTRAINT `tb_jadwal_ibfk_4` FOREIGN KEY (`id_dosen_ekologi`) REFERENCES `tb_dsn` (`id_dosen`),
  ADD CONSTRAINT `tb_jadwal_ibfk_5` FOREIGN KEY (`id_dosen_molekuler`) REFERENCES `tb_dsn` (`id_dosen`),
  ADD CONSTRAINT `tb_jadwal_ibfk_6` FOREIGN KEY (`id_dosen_zoologi`) REFERENCES `tb_dsn` (`id_dosen`);

--
-- Ketidakleluasaan untuk tabel `tb_kms`
--
ALTER TABLE `tb_kms`
  ADD CONSTRAINT `tb_kms_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_level` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD CONSTRAINT `tb_mhs_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
