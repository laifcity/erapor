-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2022 pada 00.05
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erapor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_rombel`
--

CREATE TABLE `anggota_rombel` (
  `id_anggota_rombel` int(11) NOT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `id_rombel` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `c_academik` varchar(255) DEFAULT NULL,
  `id_pkl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_rombel`
--

INSERT INTO `anggota_rombel` (`id_anggota_rombel`, `id_tahun`, `id_rombel`, `id_siswa`, `c_academik`, `id_pkl`) VALUES
(1, 1, 3, 5, 'bbbbbbbbbbbbbbbvgfffdg', 1),
(2, 1, 3, 10, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', NULL),
(3, NULL, 3, 11, 'bbbbbbbbbbbbbbbvgfffdg', NULL),
(4, NULL, 1, 12, NULL, NULL),
(5, NULL, 3, 15, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', NULL),
(6, NULL, 1, 20, NULL, NULL),
(7, NULL, 1, 25, NULL, NULL),
(8, NULL, 1, 30, NULL, NULL),
(9, NULL, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_user`
--

CREATE TABLE `group_user` (
  `level` int(1) NOT NULL,
  `nama_group` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `group_user`
--

INSERT INTO `group_user` (`level`, `nama_group`) VALUES
(1, 'Administrator'),
(2, 'Wali Kelas'),
(3, 'Guru'),
(4, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keahlian`
--

CREATE TABLE `keahlian` (
  `id_keahlian` int(11) NOT NULL,
  `k_keahlian` varchar(4) NOT NULL,
  `bid_keahlian` varchar(50) NOT NULL,
  `prog_keahlian` varchar(50) NOT NULL,
  `komp_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `k_keahlian`, `bid_keahlian`, `prog_keahlian`, `komp_keahlian`) VALUES
(1, '108', 'Bisnis dan Managemen', 'Bisnis dan Pemasaran', 'Bisnis Daring dan Pemasaran'),
(2, '110', 'Bisnis dan Managemen', 'Managemen Perkantoran', 'Otomatisasi dan Tata Kelola Perkantoran'),
(3, '041', 'Teknologi dan Rekayasa', 'Teknik Otomotif', 'Teknik dan Bisnis Sepeda Motor'),
(4, '066', 'Teknologi Informasi dan Komunikasi', 'Teknik Komputer dan Informatika', 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `kode_kelas` varchar(25) DEFAULT NULL,
  `id_keahlian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kode_kelas`, `id_keahlian`) VALUES
(1, 'X', 'X-BDP', 1),
(2, 'X', 'X-OTKP', 2),
(3, 'X', 'X-TBSM', 3),
(4, 'X', 'X-TKJ', 4),
(6, 'XI', 'XI-OTKP', 2),
(7, 'XI', 'XI-TBSM', 3),
(8, 'XI', 'XI-TKJ', 4),
(9, 'XI', 'XI-BDP', 1),
(10, 'XII', 'XII-BDP', 1),
(11, 'XII', 'XII-OTKP', 2),
(12, 'XII', 'XII-TBSM', 3),
(13, 'XII', 'XII-TKJ', 4),
(18, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `leger`
--

CREATE TABLE `leger` (
  `id_leger` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_academik` int(11) NOT NULL,
  `id_c_academik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `k_mapel` varchar(11) NOT NULL,
  `mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `k_mapel`, `mapel`) VALUES
(1, 'A1', 'Pendidikan Agama dan Budi Pekerti'),
(2, 'A2', 'Pendidikan Pancasila dan Kewarganegaraan'),
(3, 'A3', 'Bahasa Indonesia'),
(4, 'A4', 'Matematika'),
(5, 'A5', 'Sejarah Indonesia'),
(6, 'A6', 'Bahasa Inggris dan Bahasa Asing Lainnya*)'),
(7, 'B1', 'Seni Budaya'),
(8, 'B2', 'Pendidikan Jasmani Olahraga dan Kesehatan'),
(9, 'B3', 'Bahasa Jawa'),
(10, 'C1', 'Simulasi dan Komunikasi Digital');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapelkelas`
--

CREATE TABLE `mapelkelas` (
  `id_mapelkelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_ptk` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapelkelas`
--

INSERT INTO `mapelkelas` (`id_mapelkelas`, `id_mapel`, `id_ptk`, `id_kelas`) VALUES
(1, 1, 20, 1),
(2, 2, 15, 1),
(3, 9, 6, 2),
(4, 9, 6, 1),
(5, 10, 32, 13),
(6, 9, 6, 13),
(7, 8, 13, 13),
(8, 9, 6, 3),
(9, 10, 11, 3),
(10, 2, 17, 3),
(11, 1, 13, 3),
(12, 9, 6, 4),
(13, 2, 17, 4),
(14, 1, 13, 4),
(15, 1, 13, 6),
(16, 1, 17, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `n_absen`
--

CREATE TABLE `n_absen` (
  `id_absen` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `ket_absen` varchar(100) NOT NULL,
  `lama_absen` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `n_c_academik`
--

CREATE TABLE `n_c_academik` (
  `id_c_academik` int(11) NOT NULL,
  `id_anggota_rombel` int(11) DEFAULT NULL,
  `id_rombel` int(11) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `c_academik` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `n_c_academik`
--

INSERT INTO `n_c_academik` (`id_c_academik`, `id_anggota_rombel`, `id_rombel`, `id_tahun`, `id_siswa`, `c_academik`) VALUES
(1, NULL, NULL, NULL, NULL, ''),
(2, NULL, NULL, NULL, NULL, ''),
(3, NULL, NULL, NULL, NULL, ''),
(4, NULL, NULL, NULL, NULL, ''),
(5, NULL, NULL, NULL, NULL, ''),
(6, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `n_eskul`
--

CREATE TABLE `n_eskul` (
  `id_eskul` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_eskul` varchar(255) NOT NULL,
  `ket_eskul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `n_pkl`
--

CREATE TABLE `n_pkl` (
  `id_pkl` int(11) NOT NULL,
  `nama_dudi` varchar(255) NOT NULL,
  `temp_dudi` varchar(255) NOT NULL,
  `lama_pkl` varchar(100) NOT NULL,
  `ket_pkl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `n_pkl`
--

INSERT INTO `n_pkl` (`id_pkl`, `nama_dudi`, `temp_dudi`, `lama_pkl`, `ket_pkl`) VALUES
(1, 'AWE Computer', 'Mantingan', '3 (Bualan)', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ptk`
--

CREATE TABLE `ptk` (
  `id_ptk` int(11) NOT NULL,
  `niy` varchar(10) DEFAULT NULL,
  `nuptk` varchar(16) DEFAULT NULL,
  `nama_ptk` varchar(100) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `t_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto_ptk` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ptk`
--

INSERT INTO `ptk` (`id_ptk`, `niy`, `nuptk`, `nama_ptk`, `jk`, `t_lahir`, `tgl_lahir`, `alamat`, `email`, `foto_ptk`, `password`) VALUES
(3, '20050004', '9845760662200002', 'Robet Isnandar', 'L', 'Jepara', '1982-05-13', 'Buaran RT. 4/3 Mayong Jepara', 'laifcity@gmail.com', 'DPP_11.JPG', '123'),
(5, '20050005', '1441755656200003', 'Arif Jauhari', 'L', 'Jepara', '1977-07-07', 'Singorojo', 'smkterpaduhadziqiyyah@gmail.com', '20050005.jpg', '123'),
(6, '20200010', '1234567812345678', 'Bekti Adi Kurniawan', 'L', 'Jepara', '1988-08-20', 'Buaran', 'johnklenyer@gmail.com', 'PAS FOTO.jpg', '123456'),
(7, '20200011', '0237770671130013', 'Durrotun Nafisah', 'P', 'Jepara', '1999-12-12', 'Kalipucang Wetan', 'nafis.dr91@gmail.com', 'avatar.png', '123456'),
(8, '20200012', '', 'Iin Susanti', 'P', 'Jepara', '2028-02-02', 'Nalumsari', 'iintavan931@gmail.com', 'avatar.png', '123456'),
(9, '20200013', '', 'Iis Pantiana Tungga Dewi', 'P', 'Jepara', '0000-00-00', 'Nalumsari', 'iis.pantiana@yahoo.com', 'avatar.png', '123456'),
(10, '20200014', '', 'Khofiya Nida', 'P', 'Jepara', '0000-00-00', 'Nalumsari', 'every.early23@gmail.com', 'avatar.png', '123456'),
(11, '20200015', '', 'Khoirin Nafida', 'P', 'Jepara', '0000-00-00', 'Nalumsari', 'rinafida@gmail.com', 'avatar.png', '123456'),
(12, '20200016', '-', 'Miftahul Faizah', 'P', 'Jepara', '1985-12-12', 'Pelang', 'miftafaizah15@gmail.com', 'download.jfif', '123456'),
(13, '20200017', '', 'Mintarsih', 'P', 'Jepara', '0000-00-00', 'Nalumsari', 'wawanajwa77@yahoo.co.id', 'avatar.png', '123456'),
(14, '20200018', '', 'Misbahul Munir', 'L', 'Jepara', '0000-00-00', 'Gemiring Lor', 'munir.penggung@gmail.com', 'avatar.png', '123456'),
(15, '20200019', '', 'Nailis Sa\'adah', 'P', 'Jepara', '0000-00-00', 'Gemiring Kidul', 'naylisaaaaa@gmail.com', 'avatar.png', '123456'),
(16, '20200020', '', 'Niko Dwi Saputra', 'L', 'Jepara', '0000-00-00', 'Ngetuk', 'niko.dsaputra92@gmail.com', 'avatar.png', '123456'),
(17, '20200021', '0237770671130013', 'Rifqi Hidayat', 'L', 'Jepara', '1992-12-12', 'Kalipucang Wetan', 'rifqikers@gmail.com', 'avatar.png', '123456'),
(18, '20200023', '', 'Rodiansyah', 'P', 'Jepara', '0000-00-00', 'Gemiring Kidul', 'zubairhilmi85@gmail.com', 'avatar.png', '123456'),
(19, '20200024', '', 'Uslikha Aprisha Utami', 'P', 'Kudus', '0000-00-00', 'Buaran', 'aprisha87@gmail.com', 'avatar.png', '123456'),
(20, '20200025', '', 'Zaimuddin', 'L', 'Jepara', '0000-00-00', 'Gemiring Kidul', 'zaim.din69@gmail.com', 'avatar.png', '123456'),
(21, '20200026', '', 'Zulfan Ade Setiawan', 'L', 'Kudus', '0000-00-00', 'Padurenan', 'jopan18@gmail.com', 'avatar.png', '123456'),
(22, '20200027', '', 'Lailatul Choiriyah', 'P', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(23, '20200028', '', 'Syafii', 'L', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(24, '20200029', '', 'Naimatul Mufidah', 'P', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(25, '20200030', '', 'Nala Khutmiatul Abidah', 'P', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(26, '20200031', '', 'Muthli\'atus Saadah', 'P', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(27, '20200032', '', 'Effira Iftihatul Hidayah', 'P', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(28, '20200033', '', 'Bukhori', 'L', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(29, '20200034', '', 'Angki Setiawan', 'L', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(30, '20200035', '', 'Khoirul Falah', 'L', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(31, '20200036', '', 'Abdul Ghofur', 'L', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(32, '20200037', '', 'Agus Wantoro', 'L', '', '0000-00-00', '', '', 'avatar.png', '123456'),
(33, '20200038', '', 'Abdullah Harno', 'L', '', '0000-00-00', '', '', 'avatar.png', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `tahun_angkatan` int(4) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_ptk` int(11) DEFAULT NULL,
  `id_keahlian` int(11) DEFAULT NULL,
  `pass_word` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `tahun_angkatan`, `id_kelas`, `id_ptk`, `id_keahlian`, `pass_word`) VALUES
(1, 2021, 4, 19, 4, '12345678'),
(2, 2021, 13, 31, 4, '123456'),
(3, 2021, 2, 3, 2, '123456'),
(4, 2021, 12, 32, 4, '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `nis` int(10) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `t_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `st_keluarga` varchar(50) DEFAULT NULL,
  `anak_ke` int(5) DEFAULT NULL,
  `alm_siswa` varchar(100) DEFAULT NULL,
  `tlp_siswa` int(15) DEFAULT NULL,
  `skl_asal` varchar(100) DEFAULT NULL,
  `x` int(11) DEFAULT NULL,
  `id_keahlian` int(11) DEFAULT NULL,
  `dt_tgl` date DEFAULT NULL,
  `nm_ayah` varchar(100) DEFAULT NULL,
  `nm_ibu` varchar(100) DEFAULT NULL,
  `alm_ortu` varchar(100) DEFAULT NULL,
  `tlp_ortu` int(15) DEFAULT NULL,
  `pek_ayah` varchar(100) DEFAULT NULL,
  `pek_ibu` varchar(100) DEFAULT NULL,
  `nm_wali` varchar(100) DEFAULT NULL,
  `alm_wali` varchar(100) DEFAULT NULL,
  `tlp_wali` int(15) DEFAULT NULL,
  `pek_wali` varchar(100) DEFAULT NULL,
  `foto_siswa` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `nis`, `nisn`, `t_lahir`, `tgl_lahir`, `jk`, `agama`, `st_keluarga`, `anak_ke`, `alm_siswa`, `tlp_siswa`, `skl_asal`, `x`, `id_keahlian`, `dt_tgl`, `nm_ayah`, `nm_ibu`, `alm_ortu`, `tlp_ortu`, `pek_ayah`, `pek_ibu`, `nm_wali`, `alm_wali`, `tlp_wali`, `pek_wali`, `foto_siswa`, `password`) VALUES
(1, 'Siti Indafit', 0, '0051464078', 'Jepara', '2005-08-06', '2', 'Islam', 'Anak Kandung', 1, '', 0, '', 1, 4, '2020-07-15', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', '12345'),
(3, 'Ahmad Syaidul Arofi', 0, '0046755815', '', '0000-00-00', '1', '', '', 0, '', 0, '', 1, 3, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', '123456'),
(5, 'Adenth Andyta Oktaviana', 0, '0058795803', '', '0000-00-00', '2', '', '', 0, '', 0, '', 2, 1, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(7, 'Erika Fitriyani', 0, '0066804910', '', '2006-05-06', '2', 'Islam', '', 0, '', 0, '', 4, 3, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(8, 'Irsha Elviana', 0, '3053112783', '', '2005-03-05', '2', 'Islam', '', 0, '', 0, '', 2, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(9, 'Laelatul Khusnul Khotimah', 0, '0059510900', '', '2005-07-14', '2', 'Islam', '', 0, '', 0, '', 2, 2, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(10, 'Muhammad Bima Saputra', 0, '0052279371', '', '2005-03-20', '1', 'Islam', '', 0, '', 0, '', 3, 3, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(11, 'Muhammad Sirojuddin', 0, '0048321592', '', '2004-03-07', '1', 'Islam', '', 0, '', 0, '', 13, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(12, 'Roihana Firdaus', 0, '3052517907', '', '2005-12-23', '2', 'Islam', '', 0, '', 0, '', 13, 3, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(13, 'Siti Ainul Mufallikhah', 0, '0052686219', '', '2005-08-01', '2', 'Islam', '', 0, '', 0, '', 13, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(14, 'Bunga Citra Lestari', 0, '0055097295', '', '2005-11-21', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(15, 'Cindy Amelia Putri', 0, '0067885504', '', '2006-07-11', '2', 'Islam', '', 0, '', 0, '', 18, 3, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(16, 'Dewy Nafa Iysululya', 0, '3069532051', '', '2006-07-05', '2', 'Islam', '', 0, '', 0, '', 18, 4, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(17, 'Dini Mustika Sari', 0, '0050652045', '', '2005-02-25', '2', 'Islam', '', 0, '', 0, '', 18, 4, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(18, 'Dwi Ratna Ariyatin', 0, '0067863484', '', '2006-03-20', '2', 'Islam', '', 0, '', 0, '', 18, 3, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(19, 'Eka Mila Handayani', 0, '0050477479', '', '2005-02-05', '2', 'Islam', '', 0, '', 0, '', 18, 4, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(20, 'Ela Agustiana', 0, '0058080294', '', '2005-08-16', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(21, 'Eriana Dwi Rahayu', 0, '0050652073', '', '2005-09-02', '1', 'Islam', '', 0, '', 0, '', 12, 3, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(22, 'Juni Asti Anti', 0, '0056514972', '', '2005-06-10', '2', 'Islam', '', 0, '', 0, '', 11, 3, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(23, 'Lena Yuliana', 0, '3054208540', '', '2005-04-01', '2', 'Islam', '', 0, '', 0, '', 11, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(24, 'Lina Listiyana', 0, '0053788591', '', '2005-01-22', '2', 'Islam', '', 0, '', 0, '', 1, 2, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(25, 'Nabila Putri Ramadani', 0, '0054594400', '', '2005-10-20', '2', 'Islam', '', 0, '', 0, '', 1, 4, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(26, 'Nikmatul Hasanah', 0, '0052150245', '', '2005-08-31', '2', 'Islam', '', 0, '', 0, '', 1, 4, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(27, 'Nisa Amelia Sari', 0, '0057646077', '', '2006-05-15', '2', 'Islam', '', 0, '', 0, '', 1, 2, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(28, 'Nur Lailatus Saidah', 0, '0058740656', '', '2005-08-17', '2', 'Islam', '', 0, '', 0, '', 1, 2, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(29, 'Ria Puspita Rini', 0, '0059171163', '', '2005-10-07', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(30, 'Rika Amelia', 0, '0053434396', '', '2005-02-16', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(31, 'Riris Maharani', 0, '0062649926', '', '2006-02-22', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(32, 'Sahnata Tristia Anggraini', 0, '0052150243', '', '2005-08-17', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(33, 'Siti Khotimah', 0, '0063142648', '', '2006-04-18', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(34, 'Siti Nela Fauziyah', 0, '0055722253', '', '2006-02-01', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(35, 'Slamet Rahayu', 0, '0060217288', '', '2006-01-22', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(36, 'Susi Sulistiani', 0, '0050652086', '', '2005-12-25', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(37, 'Una Emilatul Khutmah', 0, '0055964007', '', '2005-10-20', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(38, 'Vika Dwi Fatkhiyah', 0, '0060212664', '', '2006-04-11', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(39, 'Yenni Fitriana Astutik', 0, '0043793241', '', '2004-11-12', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(40, 'Zuliyati', 0, '0052857128', '', '2005-12-23', '2', 'Islam', '', 0, '', 0, '', 18, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(41, 'Ahmad Budi Setiawan', 0, '0049131976', '', '2004-01-21', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(42, 'Ahmad Nashrullah Al Mukamil', 0, '0053411669', '', '2005-03-19', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(43, 'Ahmad Zabidin', 0, '0061069878', '', '2006-01-23', '1', 'Islam', '', 0, '', 0, '', 0, 4, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(44, 'Alex Faisol', 0, '0050652055', '', '2005-05-18', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(45, 'Andi Saputra', 0, '0047243493', '', '2004-12-06', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(46, 'Andika Bagus Kurniawan', 0, '0043358866', '', '2004-09-16', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(47, 'Charis Hanafi', 0, '0030511356', '', '2005-08-24', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(48, 'Dani Alfaridzi', 0, '0044102532', '', '2004-11-26', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(49, 'Mahendra Putrabudi Pratama', 0, '0058685661', '', '2005-11-25', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(50, 'Moh. Noval Arkananta', 0, '0054524077', '', '2005-05-04', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(51, 'Mohammad Andika Prastiyo', 0, '0042750385', '', '2004-03-22', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(52, 'Muhammad Achsin Nanto', 0, '3051455927', '', '2005-05-15', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(53, 'Muhammad Alareza', 0, '3051393687', '', '2005-07-30', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(54, 'Muhammad Fathul Majid', 0, '3050399708', '', '2005-07-22', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(55, 'Muhammad Fikri Ardianus', 0, '3045817842', '', '2004-12-18', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(56, 'Muhammad Sholiful Hadi', 0, '0048896444', '', '2004-11-08', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(57, 'Muhammad Yogi Maulana', 0, '0056651785', '', '2005-07-03', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(58, 'Muhammad Yustamik Latif', 0, '0056566658', '', '2005-06-06', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(59, 'Aditya Bagus Setyawan', 0, '0068384271', '', '2006-06-29', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(60, 'Ahmad Abdan Syakuro', 0, '0045939551', '', '2004-01-10', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(61, 'Ahmad Na\'Im Akbar Channa', 0, '0051557130', '', '2005-06-08', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(62, 'Ahmad Riyadhul Mujib', 0, '0042879220', '', '2004-09-23', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(63, 'Anang Saputra', 0, '0043552717', '', '2004-07-24', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(64, 'Arul Muntoharjo', 0, '3054704754', '', '2005-06-20', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(65, 'Bondan Abdul Manaf', 0, '0062537591', '', '2006-07-17', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(66, 'Kahfin Maulana', 0, '0052609624', '', '2005-10-08', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(67, 'Lucky Tri Nugroho', 0, '0043817908', '', '2004-07-23', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(68, 'Maulana Suhada', 0, '0052150224', '', '2005-01-15', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(69, 'Muhammad Ilham Pratama', 0, '0053357197', '', '2005-07-01', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(70, 'Muhammad Radid Saputro', 0, '0053357659', '', '2005-07-28', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(71, 'Muhammad Santoso Andi Arifiyanto', 0, '0037457040', '', '2003-11-10', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(72, 'Nur Rahman Dani', 0, '0059407088', '', '2005-10-20', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(73, 'Putra Listonity', 0, '0052092423', '', '2005-07-05', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(74, 'Rahmandhani Bayu Wicaksono', 0, '0053297093', '', '2005-10-25', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(75, 'Syehab Alibaba', 0, '0053725064', '', '2005-10-30', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(76, 'Thomas Dafin', 0, '0069677591', '', '2006-04-21', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(77, 'Totok Yuliyanto', 0, '0055176023', '', '2005-06-11', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(78, 'Wisnu Saputra', 0, '0058531064', '', '2005-10-29', '1', 'Islam', '', 0, '', 0, '', 20, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(79, 'Arys Santoso', 0, '0066941269', '', '2006-03-28', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(80, 'Bayu Septian Yudianata', 0, '0042879219', '', '2004-09-13', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(81, 'Dina Ramadani', 0, '0043817698', '', '2004-10-23', '2', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(82, 'Ferdy Pierre Sugiantoro', 0, '0053313285', '', '2005-01-21', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(83, 'Hilda Zumrotun Nafisah', 0, '0044757735', '', '2004-12-05', '2', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(84, 'Imam Rifa\'I', 0, '0059493143', '', '2005-05-26', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(85, 'Kodrat Kaisyarah Nabila Ahmad', 0, '0039232243', '', '2005-10-09', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(86, 'Linda Ayu Permatasari', 0, '0055551712', '', '2005-05-14', '2', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(87, 'M. Arif Rohmandoni', 0, '0053522432', '', '2005-10-27', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(88, 'Maulana Mubarok', 0, '0053752423', '', '2005-04-13', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(89, 'Muhamad Lulbed', 0, '0044737785', '', '2004-09-16', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(90, 'Muhammad Adimas Wibowo', 0, '0068465471', '', '2006-07-19', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(91, 'Muhammad Andika Fakistian', 0, '0056593496', '', '2006-07-17', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(92, 'Muhammad Ardi Pratama', 0, '0054874921', '', '2005-12-05', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(93, 'Muhammad Irsyad Nabil', 0, '3054647118', '', '2005-04-27', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(94, 'Muhammad Mangsur', 0, '0052279375', '', '2005-05-14', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(95, 'Muhammad Wahyu Rivaldi', 0, '0052279391', '', '2005-12-14', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(96, 'Rahmad Solikhin', 0, '3055711644', '', '2005-01-12', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(97, 'Rizal Sofian', 0, '0052092286', '', '2005-06-15', '1', 'Islam', '', 0, '', 0, '', 23, 0, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(98, 'Ryan Wahyu Susila', 0, '0054294023', '', '2005-10-01', '1', 'Islam', '', 0, '', 0, '', NULL, 2, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(99, 'Sigit Andriano', 0, '0051489021', '', '2006-01-15', '1', 'Islam', '', 0, '', 0, '', NULL, 2, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(100, 'Yoga Anantia Imansyah', 0, '0068147405', '', '2006-07-25', '1', 'Islam', '', 0, '', 0, '', NULL, 4, '0000-00-00', '', '', '', 0, '', '', '', '', 0, '', 'avatar.png', NULL),
(113, 'sabil', 1000, '', 'Kudus', '1990-12-12', 'L', NULL, NULL, NULL, 'Buaran', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'foto.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun` varchar(30) DEFAULT NULL,
  `smt` varchar(11) DEFAULT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tahun`, `smt`, `status`) VALUES
(1, '2021/2022', 'Ganjil', 0),
(2, '2021/2022', 'Genap', 1),
(6, '2022/2023', 'Ganjil', 0),
(7, '2022/2023', 'Genap', 0),
(9, '2023/2024', 'Ganjil', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_ptk` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_ptk`, `username`, `password`, `level`, `foto`) VALUES
(1, 3, 'admin', 'admin', 1, '20050004.png'),
(13, 23, 'admin22', '123456', 1, NULL),
(14, 26, 'admin1', '123456', 1, NULL),
(15, 5, 'admin', '15QKBMBUMK', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(4) NOT NULL,
  `foto_users` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `id_siswa`, `username`, `password`, `level`, `foto_users`, `created_at`, `updated_at`) VALUES
(1, 105, 'siswa1', 'siswa1', 4, 'avatar.png', NULL, NULL),
(2, 3, 'siswa2', 'siswa2', 4, 'avatar.png', NULL, NULL),
(3, 5, 'siswa3', 'siswa3', 4, 'avatar.png', '2021-09-09 17:46:28', '2021-09-09 17:46:28'),
(5, 3, 'siswa', 'siswa', 4, NULL, NULL, NULL),
(6, 105, '12345678', '12345678', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali`
--

CREATE TABLE `wali` (
  `id_wali` int(11) NOT NULL,
  `id_walikelas` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wali`
--

INSERT INTO `wali` (`id_wali`, `id_walikelas`, `username`, `password`, `level`) VALUES
(2, 1, 'walikelas', 'tes', 2),
(3, 5, 'guru', 'tes', 2),
(6, 6, 'gurusmkhk123', 'tes', 2),
(8, 2, 'walismkhk123', 'tes', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `walikelas`
--

CREATE TABLE `walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `id_ptk` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `walikelas`
--

INSERT INTO `walikelas` (`id_walikelas`, `id_tahun`, `id_ptk`, `id_kelas`) VALUES
(1, 1, 7, 1),
(2, 1, 10, 10),
(3, 1, 16, 3),
(4, 1, 24, 13);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_rombel`
--
ALTER TABLE `anggota_rombel`
  ADD PRIMARY KEY (`id_anggota_rombel`);

--
-- Indeks untuk tabel `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`level`) USING BTREE;

--
-- Indeks untuk tabel `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id_keahlian`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `leger`
--
ALTER TABLE `leger`
  ADD PRIMARY KEY (`id_leger`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `mapelkelas`
--
ALTER TABLE `mapelkelas`
  ADD PRIMARY KEY (`id_mapelkelas`);

--
-- Indeks untuk tabel `n_absen`
--
ALTER TABLE `n_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `n_c_academik`
--
ALTER TABLE `n_c_academik`
  ADD PRIMARY KEY (`id_c_academik`);

--
-- Indeks untuk tabel `n_eskul`
--
ALTER TABLE `n_eskul`
  ADD PRIMARY KEY (`id_eskul`);

--
-- Indeks untuk tabel `n_pkl`
--
ALTER TABLE `n_pkl`
  ADD PRIMARY KEY (`id_pkl`);

--
-- Indeks untuk tabel `ptk`
--
ALTER TABLE `ptk`
  ADD PRIMARY KEY (`id_ptk`),
  ADD UNIQUE KEY `niy` (`niy`);

--
-- Indeks untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE;

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id_wali`);

--
-- Indeks untuk tabel `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`id_walikelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_rombel`
--
ALTER TABLE `anggota_rombel`
  MODIFY `id_anggota_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `leger`
--
ALTER TABLE `leger`
  MODIFY `id_leger` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `mapelkelas`
--
ALTER TABLE `mapelkelas`
  MODIFY `id_mapelkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `n_absen`
--
ALTER TABLE `n_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `n_c_academik`
--
ALTER TABLE `n_c_academik`
  MODIFY `id_c_academik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `n_eskul`
--
ALTER TABLE `n_eskul`
  MODIFY `id_eskul` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `n_pkl`
--
ALTER TABLE `n_pkl`
  MODIFY `id_pkl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ptk`
--
ALTER TABLE `ptk`
  MODIFY `id_ptk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `wali`
--
ALTER TABLE `wali`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `walikelas`
--
ALTER TABLE `walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
