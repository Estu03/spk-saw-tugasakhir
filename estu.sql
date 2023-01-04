-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2023 pada 02.26
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(99) NOT NULL,
  `password` char(32) NOT NULL,
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `tentang`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Sistem pemilihan karyawan terbaik pada kantor Badan Pertanahan Nasional Kota Pekalongan. Sistem ini digunakan untuk mengelola data karyawan baik PNS maupun non PNS yang ada pada Badan Pertanahan Nasional Kota Pekalongan, yang bertujuan memberikan rekomendasi dalam pengambilan keputusan untuk menentukan karyawan yang diseleksi secara objektif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `kodekaryawan` int(11) NOT NULL,
  `nip` char(18) NOT NULL,
  `nama` varchar(63) NOT NULL,
  `golongan` char(9) NOT NULL,
  `jabatan` varchar(27) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`kodekaryawan`, `nip`, `nama`, `golongan`, `jabatan`, `status`) VALUES
(1, '197711232003122005', 'ANA RUBIYANI, S.E., S.H., M.H', 'III/d', 'Kepala Subbagian Tata Usaha', '1'),
(2, '196509281989031001', 'GHUFRON. A.Ptnh', 'III/d', 'kepala Seksi Penataan dan P', '1'),
(3, '197002151989031003', 'HARIADI, A.Ptnh', 'III/d', 'Kepala Seksi Pengadaan Tana', '1'),
(4, '19808242000031002', 'HERU SETIAWAN, S.ST., M.H.', 'III/d', 'Kepala Seksi Pengendalian d', '1'),
(5, '197010301998032005', 'Dr. VEVIN SYOVIAWATI ARDIWIJAYA, S.T., M.Sc.', 'IV/b', 'Kepala Kantor Pertanahan', '1'),
(6, '198508052009121003', 'SLAMET TEGUH, S.SI., M.Eng', 'III/c', 'Kepala Seksi Survei dan Pem', '1'),
(7, '196703191991031003', 'PRASETYO OETOMO, SH', 'III/d', 'Surveyor Pemetaan Muda', '1'),
(8, '197707271998032002', 'ANA YULI ASTUTIK, SH', 'III/c', 'Analis Pengelolaan Keuangan', '1'),
(9, '197101141991031002', 'DANU WIDODO, S.SiT', 'III/d', 'Penata Pertanahan Pertama', '1'),
(10, '197306091997032004', 'ENY PURWANTI, A.Md', 'III/c', 'Penata Pertanahan Pertama', '1'),
(11, '197609251998031001', 'FITRI ADHI NUGROHO, S.ST., M.H', 'III/d', 'Penata Kadastral Pertama', '1'),
(12, '196911061989032001', 'MAGHFIROH, S.AP', 'III/d', 'Penata Pertanahan Pertama', '1'),
(13, '197208231994031001', 'NUR AGUSTINA WIBOWO, S.H', 'III/c', 'Penata Pertanahan Pertama', '1'),
(14, '196811231989031003', 'RAHMAT MULYADI', 'III/b', 'Penata Kadastral Pertama', '1'),
(15, '197004021994031003', 'SETIAMAN, S.SiT., M.H', 'IV/a', 'Penata Pertanahan Pertama', '1'),
(16, '197111071994032003', 'SRI ROMDHONAH, S.SiT', 'III/d', 'Penata Pertanahan Pertama', '1'),
(17, '19751219=820070110', 'SUDARMAN, S.H', 'III/b', 'Penata Pertanahan Pertama', '1'),
(18, '197008071991031004', 'SUYANTO, A.Ptnh', 'III/d', 'Penata Pertanahan Pertama', '1'),
(19, '196902181994032004', 'MUDIHARNI', 'III/b', 'Bendahara', '1'),
(20, '199109272015032004', 'MAULIDA RAHMAWATI, A.Md', 'II/d', 'Pengelola Barang Milik Nega', '1'),
(21, '198010272007011001', 'MOECHAMAD YUSNINDAR, S.H', 'III/b', 'Pengelola Keuangan', '1'),
(22, '199506242015031001', 'PUTU EKA YUDITHA SYAHPUTRA', 'II/b', 'Petugas Ukur', '1'),
(23, '197912112008111002', 'TRI ANDRI WICAKSONO', 'II/c', 'Petugas Ukur', '1'),
(24, '197112042007011002', 'ANDI SUKARNO', 'II/d', 'Pengadministrasi Pertanahan', '1'),
(25, '197306051996031001', 'GATOT BINTORO', 'III/b', 'Pengadministrasi Umum', '1'),
(26, '196811102007011006', 'TARMA', 'I/d', 'Pengemudi', '1'),
(27, '199211102022041001', 'AMAL FATHULLAH', 'III/a', 'Analis Survey, Pengukuran d', '1'),
(28, '199402162022042002', 'FERI MEGAWATI', 'III/a', 'Analis Hukum Pertanahan', '1'),
(29, '', 'ACHIRAH SURAINI', '', 'Asisten Verifikator Berkas', '1'),
(30, '', 'AULIA NOVIASRY HENDARIANTI', '', 'Asisten Verifikator Berkas', '1'),
(31, '', 'BIYAS NARIDHA NUGRAHA', '', 'Asisten Verifikator Berkas', '1'),
(32, '', 'DETRI NOVITASARI', '', 'Asisten Verifikator Berkas', '1'),
(33, '', 'MIRZA NURUL FIRDAUS', '', 'Asisten Verifikator Berkas', '1'),
(34, '', 'BELLA PUSPITA DEWI', '', 'Pengelola Aplikasi', '1'),
(35, '', 'AKBAR ILHAMI', '', 'Pengelola Aplikasi', '1'),
(36, '', 'DWI ROSO HARGO YANTI', '', 'Pengelola Aplikasi', '1'),
(37, '', 'DITA ARIANI', '', 'Pengelola Aplikasi', '1'),
(38, '', 'ANDITA SHARFINA', '', 'Customer Service', '1'),
(39, '', 'KASYANTO', '', 'Petugas Teknisi', '1'),
(40, '', 'ATIK FATINA', '', 'Operator Komputer', '1'),
(41, '', 'GINA DESTRI FILIA AGUSTINA', '', 'Operator Komputer', '1'),
(42, '', 'BAGAS CAKRA PERDANA', '', 'Operator Komputer', '1'),
(43, '', 'EDY KHUSNI', '', 'Operator Komputer', '1'),
(44, '', 'FARIZAL SETIAWAN', '', 'Operator Komputer', '1'),
(45, '', 'RILO NUR GUNAWAN', '', 'Operator Komputer', '1'),
(46, '', 'TAUFIK ISMAIL PUTRA MIRANA SUBROTO', '', 'Operator Komputer', '1'),
(47, '', 'TEDI SEPTIAWAN NUGROHO', '', 'Operator Komputer', '1'),
(48, '', 'SARYONO', '', 'Operator Komputer', '1'),
(49, '', 'TRI YULI ASTUTI', '', 'Operator Komputer', '1'),
(50, '', 'FEGYDZULIKHA HEGA ASPRILLA', '', 'Asisten Pengadministrasi Um', '1'),
(51, '', 'GADIS TRIA PERMANASARI', '', 'Asisten Pengadministrasi Um', '1'),
(52, '', 'LUJENG ARYANTO', '', 'Asisten Pengadministrasi Um', '1'),
(53, '', 'TRI UTOMO ADHIYASA', '', 'Asisten Pengadministrasi Um', '1'),
(54, '', 'TSARA DIAN AZIZA', '', 'Asisten Pengadministrasi Um', '1'),
(55, '', 'NUR LAILY FAJRIYAH', '', 'Asisten Pengadministrasi Um', '1'),
(56, '', 'SAEFUL BAHRI', '', 'Pengemudi', '1'),
(57, '', 'SYAIFUL IQBAL', '', 'Pengemudi', '1'),
(58, '', 'TAUFIK ISMAIL', '', 'Pramu Bhakti', '1'),
(59, '', 'SODIKIN', '', 'Satpam', '1'),
(60, '', 'AHMAD GUNTUR', '', 'Satpam', '1'),
(61, '', 'GALIH NALENDRA ALFRIANO', '', 'Satpam', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kodekriteria` int(11) NOT NULL,
  `kriteria` varchar(27) NOT NULL,
  `kategori` enum('Cost','Benefit') NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kodekriteria`, `kriteria`, `kategori`, `bobot`) VALUES
(1, 'Orientasi Pelayanan', 'Benefit', 10),
(2, 'Integritas', 'Benefit', 40),
(3, 'Komitmen', 'Benefit', 15),
(4, 'Disiplin', 'Benefit', 25),
(5, 'Kerjasama', 'Benefit', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `na`
--

CREATE TABLE `na` (
  `kodena` int(11) NOT NULL,
  `na` double NOT NULL,
  `periode` varchar(18) NOT NULL,
  `kodekaryawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `na`
--

INSERT INTO `na` (`kodena`, `na`, `periode`, `kodekaryawan`) VALUES
(1, 0.82141575529733, 'November 2022', 1),
(2, 0.955, 'November 2022', 2),
(3, 0.72520566489639, 'Desember 2022', 1),
(4, 0.84864104967198, 'Desember 2022', 2),
(5, 0.81878058939915, 'Desember 2022', 3),
(6, 0.8457252941789, 'Desember 2022', 4),
(7, 0.70857023846715, 'Desember 2022', 5),
(8, 0.78291679683432, 'Desember 2022', 6),
(9, 0.71026762470061, 'Desember 2022', 7),
(10, 0.84452254503801, 'Desember 2022', 8),
(11, 0.85745600333229, 'Desember 2022', 9),
(12, 0.80236384463189, 'Desember 2022', 10),
(13, 0.88566073102156, 'Desember 2022', 11),
(14, 0.61921795272311, 'Desember 2022', 12),
(15, 0.85127043632198, 'Desember 2022', 13),
(16, 0.82341976465688, 'Desember 2022', 14),
(17, 0.79901072581485, 'Desember 2022', 15),
(18, 0.76240758096428, 'Desember 2022', 16),
(19, 0.79893783192752, 'Desember 2022', 17),
(20, 0.70759658440071, 'Desember 2022', 18),
(21, 0.8072217015516, 'Desember 2022', 19),
(22, 0.6096011663022, 'Desember 2022', 20),
(23, 0.86853587420598, 'Desember 2022', 21),
(24, 0.88392169113819, 'Desember 2022', 22),
(25, 0.78980006248047, 'Desember 2022', 23),
(26, 0.77712173279184, 'Desember 2022', 24),
(27, 0.6728418202645, 'Desember 2022', 25),
(28, 0.80469644902635, 'Desember 2022', 26),
(29, 0.78890971571384, 'Desember 2022', 27),
(30, 0.76869728209934, 'Desember 2022', 28),
(31, 0.78367176923878, 'Desember 2022', 29),
(32, 0.76941580756014, 'Desember 2022', 30),
(33, 0.79103925856503, 'Desember 2022', 31),
(34, 0.8802301364157, 'Desember 2022', 32),
(35, 0.83581693220868, 'Desember 2022', 33),
(36, 0.79903675934604, 'Desember 2022', 34),
(37, 0.71789024263251, 'Desember 2022', 35),
(38, 0.9050088514006, 'Desember 2022', 36),
(39, 0.81824429865667, 'Desember 2022', 37),
(40, 0.72807976673956, 'Desember 2022', 38),
(41, 0.63839425179631, 'Desember 2022', 39),
(42, 0.6716651046548, 'Desember 2022', 40),
(43, 0.80700822659586, 'Desember 2022', 41),
(44, 0.7494324690201, 'Desember 2022', 42),
(45, 0.82609601166302, 'Desember 2022', 43),
(46, 0.82207643444757, 'Desember 2022', 44),
(47, 0.8732427366448, 'Desember 2022', 45),
(48, 0.75470165573258, 'Desember 2022', 46),
(49, 0.80455066125169, 'Desember 2022', 47),
(50, 0.76134020618557, 'Desember 2022', 48),
(51, 0.80164011246485, 'Desember 2022', 49),
(52, 0.81850984067479, 'Desember 2022', 50),
(53, 0.90584192439863, 'Desember 2022', 51),
(54, 0.7415599291888, 'Desember 2022', 52),
(55, 0.81064771425596, 'Desember 2022', 53),
(56, 0.7554930750807, 'Desember 2022', 54),
(57, 0.7747787149849, 'Desember 2022', 55),
(58, 0.84652192023326, 'Desember 2022', 56),
(59, 0.82563782151411, 'Desember 2022', 57),
(60, 0.84691242320108, 'Desember 2022', 58),
(61, 0.64207018640008, 'Desember 2022', 59),
(62, 0.70651879620952, 'Desember 2022', 60),
(63, 0.6950328022493, 'Desember 2022', 61);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kodenilai` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `periode` varchar(18) NOT NULL,
  `kodekriteria` int(11) NOT NULL,
  `kodekaryawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kodenilai`, `nilai`, `periode`, `kodekriteria`, `kodekaryawan`) VALUES
(11, 75, 'November 2022', 1, 1),
(12, 87, 'November 2022', 2, 1),
(13, 80, 'November 2022', 3, 1),
(14, 24, 'November 2022', 4, 1),
(15, 55, 'November 2022', 5, 1),
(16, 77, 'November 2022', 1, 2),
(17, 87, 'November 2022', 2, 2),
(18, 56, 'November 2022', 3, 2),
(19, 57, 'November 2022', 4, 2),
(20, 80, 'November 2022', 5, 2),
(21, 93, 'Desember 2022', 1, 1),
(22, 71, 'Desember 2022', 2, 1),
(23, 84, 'Desember 2022', 3, 1),
(24, 61, 'Desember 2022', 4, 1),
(25, 54, 'Desember 2022', 5, 1),
(26, 82, 'Desember 2022', 1, 2),
(27, 81, 'Desember 2022', 2, 2),
(28, 80, 'Desember 2022', 3, 2),
(29, 98, 'Desember 2022', 4, 2),
(30, 60, 'Desember 2022', 5, 2),
(31, 72, 'Desember 2022', 1, 3),
(32, 87, 'Desember 2022', 2, 3),
(33, 62, 'Desember 2022', 3, 3),
(34, 77, 'Desember 2022', 4, 3),
(35, 96, 'Desember 2022', 5, 3),
(36, 81, 'Desember 2022', 1, 4),
(37, 90, 'Desember 2022', 2, 4),
(38, 92, 'Desember 2022', 3, 4),
(39, 74, 'Desember 2022', 4, 4),
(40, 63, 'Desember 2022', 5, 4),
(41, 83, 'Desember 2022', 1, 5),
(42, 69, 'Desember 2022', 2, 5),
(43, 58, 'Desember 2022', 3, 5),
(44, 70, 'Desember 2022', 4, 5),
(45, 73, 'Desember 2022', 5, 5),
(46, 55, 'Desember 2022', 1, 6),
(47, 96, 'Desember 2022', 2, 6),
(48, 54, 'Desember 2022', 3, 6),
(49, 67, 'Desember 2022', 4, 6),
(50, 78, 'Desember 2022', 5, 6),
(51, 94, 'Desember 2022', 1, 7),
(52, 64, 'Desember 2022', 2, 7),
(53, 61, 'Desember 2022', 3, 7),
(54, 75, 'Desember 2022', 4, 7),
(55, 67, 'Desember 2022', 5, 7),
(56, 67, 'Desember 2022', 1, 8),
(57, 96, 'Desember 2022', 2, 8),
(58, 86, 'Desember 2022', 3, 8),
(59, 67, 'Desember 2022', 4, 8),
(60, 78, 'Desember 2022', 5, 8),
(61, 68, 'Desember 2022', 1, 9),
(62, 97, 'Desember 2022', 2, 9),
(63, 77, 'Desember 2022', 3, 9),
(64, 84, 'Desember 2022', 4, 9),
(65, 57, 'Desember 2022', 5, 9),
(66, 97, 'Desember 2022', 1, 10),
(67, 90, 'Desember 2022', 2, 10),
(68, 62, 'Desember 2022', 3, 10),
(69, 60, 'Desember 2022', 4, 10),
(70, 85, 'Desember 2022', 5, 10),
(71, 92, 'Desember 2022', 1, 11),
(72, 93, 'Desember 2022', 2, 11),
(73, 69, 'Desember 2022', 3, 11),
(74, 95, 'Desember 2022', 4, 11),
(75, 62, 'Desember 2022', 5, 11),
(76, 82, 'Desember 2022', 1, 12),
(77, 57, 'Desember 2022', 2, 12),
(78, 59, 'Desember 2022', 3, 12),
(79, 60, 'Desember 2022', 4, 12),
(80, 58, 'Desember 2022', 5, 12),
(81, 99, 'Desember 2022', 1, 13),
(82, 83, 'Desember 2022', 2, 13),
(83, 78, 'Desember 2022', 3, 13),
(84, 79, 'Desember 2022', 4, 13),
(85, 88, 'Desember 2022', 5, 13),
(86, 57, 'Desember 2022', 1, 14),
(87, 90, 'Desember 2022', 2, 14),
(88, 57, 'Desember 2022', 3, 14),
(89, 89, 'Desember 2022', 4, 14),
(90, 81, 'Desember 2022', 5, 14),
(91, 60, 'Desember 2022', 1, 15),
(92, 96, 'Desember 2022', 2, 15),
(93, 68, 'Desember 2022', 3, 15),
(94, 58, 'Desember 2022', 4, 15),
(95, 90, 'Desember 2022', 5, 15),
(96, 73, 'Desember 2022', 1, 16),
(97, 72, 'Desember 2022', 2, 16),
(98, 92, 'Desember 2022', 3, 16),
(99, 62, 'Desember 2022', 4, 16),
(100, 92, 'Desember 2022', 5, 16),
(101, 80, 'Desember 2022', 1, 17),
(102, 66, 'Desember 2022', 2, 17),
(103, 81, 'Desember 2022', 3, 17),
(104, 91, 'Desember 2022', 4, 17),
(105, 90, 'Desember 2022', 5, 17),
(106, 63, 'Desember 2022', 1, 18),
(107, 71, 'Desember 2022', 2, 18),
(108, 70, 'Desember 2022', 3, 18),
(109, 65, 'Desember 2022', 4, 18),
(110, 78, 'Desember 2022', 5, 18),
(111, 66, 'Desember 2022', 1, 19),
(112, 81, 'Desember 2022', 2, 19),
(113, 96, 'Desember 2022', 3, 19),
(114, 77, 'Desember 2022', 4, 19),
(115, 63, 'Desember 2022', 5, 19),
(116, 57, 'Desember 2022', 1, 20),
(117, 56, 'Desember 2022', 2, 20),
(118, 61, 'Desember 2022', 3, 20),
(119, 61, 'Desember 2022', 4, 20),
(120, 72, 'Desember 2022', 5, 20),
(121, 83, 'Desember 2022', 1, 21),
(122, 91, 'Desember 2022', 2, 21),
(123, 92, 'Desember 2022', 3, 21),
(124, 77, 'Desember 2022', 4, 21),
(125, 72, 'Desember 2022', 5, 21),
(126, 72, 'Desember 2022', 1, 22),
(127, 96, 'Desember 2022', 2, 22),
(128, 70, 'Desember 2022', 3, 22),
(129, 88, 'Desember 2022', 4, 22),
(130, 84, 'Desember 2022', 5, 22),
(131, 59, 'Desember 2022', 1, 23),
(132, 90, 'Desember 2022', 2, 23),
(133, 64, 'Desember 2022', 3, 23),
(134, 67, 'Desember 2022', 4, 23),
(135, 90, 'Desember 2022', 5, 23),
(136, 61, 'Desember 2022', 1, 24),
(137, 78, 'Desember 2022', 2, 24),
(138, 62, 'Desember 2022', 3, 24),
(139, 96, 'Desember 2022', 4, 24),
(140, 55, 'Desember 2022', 5, 24),
(141, 63, 'Desember 2022', 1, 25),
(142, 57, 'Desember 2022', 2, 25),
(143, 78, 'Desember 2022', 3, 25),
(144, 66, 'Desember 2022', 4, 25),
(145, 86, 'Desember 2022', 5, 25),
(146, 75, 'Desember 2022', 1, 26),
(147, 73, 'Desember 2022', 2, 26),
(148, 85, 'Desember 2022', 3, 26),
(149, 87, 'Desember 2022', 4, 26),
(150, 76, 'Desember 2022', 5, 26),
(151, 94, 'Desember 2022', 1, 27),
(152, 76, 'Desember 2022', 2, 27),
(153, 89, 'Desember 2022', 3, 27),
(154, 69, 'Desember 2022', 4, 27),
(155, 68, 'Desember 2022', 5, 27),
(156, 84, 'Desember 2022', 1, 28),
(157, 58, 'Desember 2022', 2, 28),
(158, 72, 'Desember 2022', 3, 28),
(159, 96, 'Desember 2022', 4, 28),
(160, 90, 'Desember 2022', 5, 28),
(161, 67, 'Desember 2022', 1, 29),
(162, 76, 'Desember 2022', 2, 29),
(163, 83, 'Desember 2022', 3, 29),
(164, 79, 'Desember 2022', 4, 29),
(165, 74, 'Desember 2022', 5, 29),
(166, 72, 'Desember 2022', 1, 30),
(167, 67, 'Desember 2022', 2, 30),
(168, 71, 'Desember 2022', 3, 30),
(169, 95, 'Desember 2022', 4, 30),
(170, 70, 'Desember 2022', 5, 30),
(171, 96, 'Desember 2022', 1, 31),
(172, 61, 'Desember 2022', 2, 31),
(173, 84, 'Desember 2022', 3, 31),
(174, 97, 'Desember 2022', 4, 31),
(175, 67, 'Desember 2022', 5, 31),
(176, 83, 'Desember 2022', 1, 32),
(177, 84, 'Desember 2022', 2, 32),
(178, 97, 'Desember 2022', 3, 32),
(179, 82, 'Desember 2022', 4, 32),
(180, 92, 'Desember 2022', 5, 32),
(181, 78, 'Desember 2022', 1, 33),
(182, 96, 'Desember 2022', 2, 33),
(183, 66, 'Desember 2022', 3, 33),
(184, 79, 'Desember 2022', 4, 33),
(185, 59, 'Desember 2022', 5, 33),
(186, 90, 'Desember 2022', 1, 34),
(187, 77, 'Desember 2022', 2, 34),
(188, 71, 'Desember 2022', 3, 34),
(189, 86, 'Desember 2022', 4, 34),
(190, 63, 'Desember 2022', 5, 34),
(191, 72, 'Desember 2022', 1, 35),
(192, 79, 'Desember 2022', 2, 35),
(193, 71, 'Desember 2022', 3, 35),
(194, 59, 'Desember 2022', 4, 35),
(195, 60, 'Desember 2022', 5, 35),
(196, 74, 'Desember 2022', 1, 36),
(197, 93, 'Desember 2022', 2, 36),
(198, 74, 'Desember 2022', 3, 36),
(199, 94, 'Desember 2022', 4, 36),
(200, 94, 'Desember 2022', 5, 36),
(201, 87, 'Desember 2022', 1, 37),
(202, 86, 'Desember 2022', 2, 37),
(203, 96, 'Desember 2022', 3, 37),
(204, 62, 'Desember 2022', 4, 37),
(205, 70, 'Desember 2022', 5, 37),
(206, 72, 'Desember 2022', 1, 38),
(207, 74, 'Desember 2022', 2, 38),
(208, 71, 'Desember 2022', 3, 38),
(209, 66, 'Desember 2022', 4, 38),
(210, 73, 'Desember 2022', 5, 38),
(211, 75, 'Desember 2022', 1, 39),
(212, 55, 'Desember 2022', 2, 39),
(213, 80, 'Desember 2022', 3, 39),
(214, 62, 'Desember 2022', 4, 39),
(215, 55, 'Desember 2022', 5, 39),
(216, 84, 'Desember 2022', 1, 40),
(217, 61, 'Desember 2022', 2, 40),
(218, 62, 'Desember 2022', 3, 40),
(219, 58, 'Desember 2022', 4, 40),
(220, 92, 'Desember 2022', 5, 40),
(221, 82, 'Desember 2022', 1, 41),
(222, 87, 'Desember 2022', 2, 41),
(223, 57, 'Desember 2022', 3, 41),
(224, 87, 'Desember 2022', 4, 41),
(225, 57, 'Desember 2022', 5, 41),
(226, 59, 'Desember 2022', 1, 42),
(227, 87, 'Desember 2022', 2, 42),
(228, 57, 'Desember 2022', 3, 42),
(229, 65, 'Desember 2022', 4, 42),
(230, 78, 'Desember 2022', 5, 42),
(231, 78, 'Desember 2022', 1, 43),
(232, 87, 'Desember 2022', 2, 43),
(233, 86, 'Desember 2022', 3, 43),
(234, 78, 'Desember 2022', 4, 43),
(235, 58, 'Desember 2022', 5, 43),
(236, 90, 'Desember 2022', 1, 44),
(237, 94, 'Desember 2022', 2, 44),
(238, 68, 'Desember 2022', 3, 44),
(239, 64, 'Desember 2022', 4, 44),
(240, 76, 'Desember 2022', 5, 44),
(241, 92, 'Desember 2022', 1, 45),
(242, 89, 'Desember 2022', 2, 45),
(243, 54, 'Desember 2022', 3, 45),
(244, 99, 'Desember 2022', 4, 45),
(245, 79, 'Desember 2022', 5, 45),
(246, 77, 'Desember 2022', 1, 46),
(247, 67, 'Desember 2022', 2, 46),
(248, 85, 'Desember 2022', 3, 46),
(249, 77, 'Desember 2022', 4, 46),
(250, 74, 'Desember 2022', 5, 46),
(251, 76, 'Desember 2022', 1, 47),
(252, 86, 'Desember 2022', 2, 47),
(253, 78, 'Desember 2022', 3, 47),
(254, 70, 'Desember 2022', 4, 47),
(255, 75, 'Desember 2022', 5, 47),
(256, 77, 'Desember 2022', 1, 48),
(257, 89, 'Desember 2022', 2, 48),
(258, 61, 'Desember 2022', 3, 48),
(259, 58, 'Desember 2022', 4, 48),
(260, 75, 'Desember 2022', 5, 48),
(261, 69, 'Desember 2022', 1, 49),
(262, 90, 'Desember 2022', 2, 49),
(263, 55, 'Desember 2022', 3, 49),
(264, 74, 'Desember 2022', 4, 49),
(265, 88, 'Desember 2022', 5, 49),
(266, 97, 'Desember 2022', 1, 50),
(267, 83, 'Desember 2022', 2, 50),
(268, 64, 'Desember 2022', 3, 50),
(269, 71, 'Desember 2022', 4, 50),
(270, 99, 'Desember 2022', 5, 50),
(271, 99, 'Desember 2022', 1, 51),
(272, 95, 'Desember 2022', 2, 51),
(273, 63, 'Desember 2022', 3, 51),
(274, 93, 'Desember 2022', 4, 51),
(275, 81, 'Desember 2022', 5, 51),
(276, 94, 'Desember 2022', 1, 52),
(277, 77, 'Desember 2022', 2, 52),
(278, 58, 'Desember 2022', 3, 52),
(279, 66, 'Desember 2022', 4, 52),
(280, 72, 'Desember 2022', 5, 52),
(281, 67, 'Desember 2022', 1, 53),
(282, 66, 'Desember 2022', 2, 53),
(283, 84, 'Desember 2022', 3, 53),
(284, 99, 'Desember 2022', 4, 53),
(285, 90, 'Desember 2022', 5, 53),
(286, 73, 'Desember 2022', 1, 54),
(287, 64, 'Desember 2022', 2, 54),
(288, 86, 'Desember 2022', 3, 54),
(289, 74, 'Desember 2022', 4, 54),
(290, 97, 'Desember 2022', 5, 54),
(291, 86, 'Desember 2022', 1, 55),
(292, 81, 'Desember 2022', 2, 55),
(293, 76, 'Desember 2022', 3, 55),
(294, 70, 'Desember 2022', 4, 55),
(295, 59, 'Desember 2022', 5, 55),
(296, 87, 'Desember 2022', 1, 56),
(297, 90, 'Desember 2022', 2, 56),
(298, 69, 'Desember 2022', 3, 56),
(299, 88, 'Desember 2022', 4, 56),
(300, 58, 'Desember 2022', 5, 56),
(301, 87, 'Desember 2022', 1, 57),
(302, 66, 'Desember 2022', 2, 57),
(303, 95, 'Desember 2022', 3, 57),
(304, 93, 'Desember 2022', 4, 57),
(305, 83, 'Desember 2022', 5, 57),
(306, 92, 'Desember 2022', 1, 58),
(307, 94, 'Desember 2022', 2, 58),
(308, 87, 'Desember 2022', 3, 58),
(309, 57, 'Desember 2022', 4, 58),
(310, 87, 'Desember 2022', 5, 58),
(311, 55, 'Desember 2022', 1, 59),
(312, 54, 'Desember 2022', 2, 59),
(313, 71, 'Desember 2022', 3, 59),
(314, 77, 'Desember 2022', 4, 59),
(315, 59, 'Desember 2022', 5, 59),
(316, 73, 'Desember 2022', 1, 60),
(317, 80, 'Desember 2022', 2, 60),
(318, 60, 'Desember 2022', 3, 60),
(319, 54, 'Desember 2022', 4, 60),
(320, 73, 'Desember 2022', 5, 60),
(321, 56, 'Desember 2022', 1, 61),
(322, 71, 'Desember 2022', 2, 61),
(323, 72, 'Desember 2022', 3, 61),
(324, 68, 'Desember 2022', 4, 61),
(325, 62, 'Desember 2022', 5, 61);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skema`
--

CREATE TABLE `skema` (
  `kodeskema` int(11) NOT NULL,
  `periode` varchar(18) NOT NULL,
  `kodekriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skema`
--

INSERT INTO `skema` (`kodeskema`, `periode`, `kodekriteria`) VALUES
(4, 'Januari 2022', 2),
(5, 'Januari 2022', 5),
(6, 'Februari 2022', 4),
(7, 'Februari 2022', 5),
(8, 'Februari 2022', 3),
(9, 'Maret 2022', 4),
(10, 'Maret 2022', 2),
(11, 'Maret 2022', 5),
(17, 'Oktober 2022', 2),
(18, 'Oktober 2022', 5),
(19, 'Oktober 2022', 1),
(20, 'November 2022', 4),
(21, 'November 2022', 2),
(22, 'November 2022', 5),
(23, 'November 2022', 3),
(24, 'November 2022', 1),
(28, 'Desember 2022', 4),
(29, 'Desember 2022', 2),
(30, 'Desember 2022', 5),
(31, 'Desember 2022', 3),
(32, 'Desember 2022', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kodekaryawan`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kodekriteria`);

--
-- Indeks untuk tabel `na`
--
ALTER TABLE `na`
  ADD PRIMARY KEY (`kodena`),
  ADD KEY `kodekaryawan` (`kodekaryawan`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kodenilai`),
  ADD KEY `kodekriteria` (`kodekriteria`,`kodekaryawan`),
  ADD KEY `kodekaryawan` (`kodekaryawan`);

--
-- Indeks untuk tabel `skema`
--
ALTER TABLE `skema`
  ADD PRIMARY KEY (`kodeskema`),
  ADD KEY `kodekriteria` (`kodekriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `kodekaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kodekriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `na`
--
ALTER TABLE `na`
  MODIFY `kodena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kodenilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT untuk tabel `skema`
--
ALTER TABLE `skema`
  MODIFY `kodeskema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `na`
--
ALTER TABLE `na`
  ADD CONSTRAINT `na_ibfk_1` FOREIGN KEY (`kodekaryawan`) REFERENCES `karyawan` (`kodekaryawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kodekaryawan`) REFERENCES `karyawan` (`kodekaryawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kodekriteria`) REFERENCES `kriteria` (`kodekriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skema`
--
ALTER TABLE `skema`
  ADD CONSTRAINT `skema_ibfk_1` FOREIGN KEY (`kodekriteria`) REFERENCES `kriteria` (`kodekriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
