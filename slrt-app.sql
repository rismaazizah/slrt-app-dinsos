-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 09:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slrt-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_krisar` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_krisar`, `nama`, `email`, `pesan`, `tanggal`) VALUES
(134, 'Risma Azizah', 'rismaazizah@gmail.com', 'kursi kurang banyak', '2024-08-01 13:54:01'),
(135, 'Sopia Aprillia', 'sopiaaprilia@gmail.com', 'ruangannya panas\r\n', '2024-08-14 13:25:53'),
(136, 'Muhammad Yusuf', 'usufmuhammad17@gmail.com', 'Proses usulan lama', '2024-08-18 13:26:40'),
(137, 'Wasilah', 'ilahwasilah@gmail.com', 'data yang diproses kurang cepat ', '2024-08-18 15:23:16'),
(138, 'rizky', 'sopiaagustina@gmail.com', 'k', '2024-08-27 15:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_histori_konsultasi`
--

CREATE TABLE `tb_histori_konsultasi` (
  `id_histori_konsultasi` int(11) NOT NULL,
  `konsultasi_id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `role` varchar(20) NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_histori_konsultasi`
--

INSERT INTO `tb_histori_konsultasi` (`id_histori_konsultasi`, `konsultasi_id`, `pesan`, `role`, `timestamp`) VALUES
(3, 2, 'akan segera diproses oleh petugas kami', 'admin', '2023-08-16 04:39:10'),
(4, 2, 'siap terimakasih atas tanggapannya', 'masyarakat', '2023-08-16 04:40:16'),
(5, 3, 'nanti petugas kami akan verifikasi ke alamat bapak', 'admin', '2023-08-19 13:05:23'),
(6, 4, 'akan segera diproses oleh petugas kami', 'admin', '2024-01-29 11:32:10'),
(7, 7, 'Tunggu proses verifikasi selesai ya', 'admin', '2024-02-18 13:35:00'),
(8, 7, 'Maaf sebelumnya untuk alur proses verifikasinya seperti apa ya?\r\n', 'masyarakat', '2024-02-18 13:39:22'),
(9, 10, 'Segera kami proses', 'admin', '2024-03-22 03:18:10'),
(10, 8, 'Usulan bapa masih dalam proses verifikasi berkas. Terima kasih -Admin', 'admin', '2024-08-18 10:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_histori_pengusulan_bantuan`
--

CREATE TABLE `tb_histori_pengusulan_bantuan` (
  `id_histori_pengusulan_bantuan` int(11) NOT NULL,
  `pengusulan_bantuan_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_histori_pengusulan_bantuan`
--

INSERT INTO `tb_histori_pengusulan_bantuan` (`id_histori_pengusulan_bantuan`, `pengusulan_bantuan_id`, `text`, `date`) VALUES
(1, 11, 'Afif Mengajukan Pembuatan Usulan', '2023-08-05 05:36:24'),
(2, 12, 'Afif Mengajukan Pembuatan Usulan', '2023-08-05 05:38:00'),
(3, 13, 'Afif Mengajukan Pembuatan Usulan', '2023-08-05 06:06:34'),
(4, 14, 'Afif Mengajukan Pembuatan Usulan', '2023-08-05 07:38:10'),
(5, 14, 'Status Tidak Valid. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2023-08-05 09:31:52'),
(6, 14, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2023-08-05 09:34:35'),
(7, 13, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2023-08-05 09:39:25'),
(8, 12, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap.', '2023-08-05 09:50:07'),
(9, 15, 'Afif Mengajukan Pembuatan Usulan', '2023-08-05 10:36:16'),
(10, 16, 'Afif Mengajukan Pembuatan Usulan', '2023-08-05 10:37:51'),
(11, 16, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap.', '2023-08-05 21:35:12'),
(12, 15, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2023-08-05 23:13:00'),
(13, 17, 'Afif Mengajukan Pembuatan Usulan', '2023-08-07 05:10:03'),
(14, 18, 'Muhammad Mengajukan Pembuatan Usulan', '2023-08-07 20:55:41'),
(15, 18, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2023-08-07 20:58:14'),
(16, 19, 'Afif Mengajukan Pembuatan Usulan', '2023-08-12 05:59:54'),
(17, 20, 'Afif Mengajukan Pembuatan Usulan', '2023-08-12 08:21:38'),
(18, 21, 'Afif Mengajukan Pembuatan Usulan', '2023-08-12 08:29:46'),
(19, 22, 'Afif Mengajukan Pembuatan Usulan', '2023-08-15 05:32:02'),
(20, 23, 'Alfi Mengajukan Pembuatan Usulan', '2023-08-15 06:17:53'),
(21, 24, 'Muhammad Rizal Akbar Mengajukan Pembuatan Usulan', '2023-08-16 04:23:06'),
(22, 24, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2023-08-16 04:26:56'),
(23, 25, 'Safroni Pardiyanto Mengajukan Pembuatan Usulan', '2023-08-19 12:29:03'),
(24, 26, 'Safroni Pardiyanto Mengajukan Pembuatan Usulan', '2023-08-19 12:32:22'),
(25, 27, 'Ella Mengajukan Pembuatan Usulan', '2023-08-19 12:39:46'),
(26, 28, 'Fadliah Mengajukan Pembuatan Usulan', '2023-08-19 12:49:30'),
(27, 27, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2023-08-19 12:53:21'),
(28, 28, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap.', '2023-08-19 13:12:57'),
(29, 29, 'Abdul Halim Mengajukan Pembuatan Usulan', '2023-08-20 01:25:07'),
(30, 29, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2023-08-20 01:28:44'),
(31, 30, 'Muhammad Rizal Akbar Mengajukan Pembuatan Usulan', '2023-08-20 03:17:41'),
(32, 30, 'M. Rizky Mengajukan Pembuatan Usulan', '2024-01-14 16:05:45'),
(33, 31, 'Amat Mengajukan Pembuatan Usulan', '2024-02-18 13:26:22'),
(34, 31, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap.', '2024-02-18 13:32:38'),
(35, 31, 'Amat Memperbarui Berkas', '2024-02-18 13:39:39'),
(36, 31, 'Amat Memperbarui Berkas', '2024-02-18 13:39:51'),
(37, 31, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2024-02-18 13:40:33'),
(38, 32, 'Anah Mengajukan Pembuatan Usulan', '2024-02-19 03:45:54'),
(39, 33, 'Caca Mengajukan Pembuatan Usulan', '2024-03-21 22:31:36'),
(40, 33, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2024-03-21 22:35:41'),
(41, 34, 'Zaty Mengajukan Pembuatan Usulan', '2024-03-22 03:14:31'),
(42, 34, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2024-03-22 03:16:18'),
(43, 35, 'M. Rizky Mengajukan Pembuatan Usulan', '2024-07-21 13:25:51'),
(44, 36, 'Susanti Mengajukan Pembuatan Usulan', '2024-08-11 12:29:43'),
(45, 37, 'Sopia Aprilia Mengajukan Pembuatan Usulan', '2024-08-13 12:52:08'),
(46, 37, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2024-08-13 12:53:42'),
(47, 38, 'Zaty Mengajukan Pembuatan Usulan', '2024-08-13 13:02:52'),
(48, 38, 'Admin Memverifikasi Permohonan Pengusulan Bantuan Dengan Status: Pending. Dengan Kelengkapan Berkas Belum Lengkap.', '2024-08-13 13:04:02'),
(49, 38, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2024-08-13 13:04:32'),
(50, 39, 'Ema Mengajukan Pembuatan Usulan', '2024-08-14 06:10:40'),
(51, 40, 'M. Rizky Mengajukan Pembuatan Usulan', '2024-08-14 14:38:05'),
(52, 40, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi. Jenis Rujukan: Kampus.', '2024-08-14 15:16:31'),
(53, 41, 'Susanti Mengajukan Pembuatan Usulan', '2024-08-14 15:27:38'),
(54, 41, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi. Jenis Rujukan: Rumah Sakit.', '2024-08-14 15:30:01'),
(55, 42, 'Zaty Mengajukan Pembuatan Usulan', '2024-08-14 15:33:05'),
(56, 42, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi. Jenis Rujukan: Badan Amil Zakat Nasional (BAZNAS).', '2024-08-14 15:33:36'),
(57, 43, 'M. Rizky Mengajukan Pembuatan Usulan', '2024-08-14 15:47:27'),
(58, 43, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi. Jenis Rujukan: Rumah Sakit', '2024-08-14 15:48:38'),
(59, 44, 'Ema Mengajukan Pembuatan Usulan', '2024-08-14 16:20:52'),
(60, 45, 'Caca Mengajukan Pembuatan Usulan', '2024-08-14 16:23:25'),
(61, 45, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi. Jenis Rujukan: Badan Amil Zakat Nasional (BAZNAS)', '2024-08-14 16:37:07'),
(62, 44, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi. Jenis Rujukan: Rumah Sakit', '2024-08-14 16:38:27'),
(63, 46, ' Mengajukan Pembuatan Usulan', '2024-08-14 16:42:40'),
(64, 47, 'Sopia Aprilia Mengajukan Pembuatan Usulan', '2024-08-14 16:45:56'),
(65, 48, 'Ema Mengajukan Pembuatan Usulan', '2024-08-15 06:34:47'),
(66, 47, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap. Jenis Rujukan: Badan Amil Zakat Nasional (BAZNAS)', '2024-08-15 06:39:12'),
(67, 47, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap. Jenis Rujukan: Badan Amil Zakat Nasional (BAZNAS)', '2024-08-15 06:39:26'),
(68, 47, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap. Jenis Rujukan: Badan Amil Zakat Nasional (BAZNAS)', '2024-08-15 06:39:44'),
(69, 47, 'Admin Memverifikasi Permohonan Pengusulan Bantuan Dengan Status: Pending. Dengan Kelengkapan Berkas Belum Lengkap. Jenis Rujukan: Badan Amil Zakat Nasional (BAZNAS)', '2024-08-15 06:42:07'),
(70, 47, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap. Jenis Rujukan: Badan Amil Zakat Nasional (BAZNAS)', '2024-08-15 06:43:46'),
(71, 47, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap. Jenis Rujukan: Badan Amil Zakat Nasional (BAZNAS)', '2024-08-15 06:46:37'),
(72, 47, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap. Jenis Rujukan: Badan Amil Zakat Nasional (BAZNAS)', '2024-08-15 06:46:47'),
(73, 47, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap. Jenis Rujukan: Badan Pengelolaan Keuangan Dan Aset Daerah (BPKAD)', '2024-08-15 06:46:58'),
(74, 47, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi. Jenis Rujukan: Badan Amil Zakat Nasional (BAZNAS)', '2024-08-15 06:49:47'),
(75, 48, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap. Jenis Rujukan: Badan Pengelolaan Keuangan Dan Aset Daerah (BPKAD)', '2024-08-15 06:50:28'),
(76, 49, ' Mengajukan Pembuatan Usulan', '2024-08-16 13:19:44'),
(77, 50, 'Usuf Mengajukan Pembuatan Usulan', '2024-08-16 13:24:52'),
(78, 51, 'Usuf Mengajukan Pembuatan Usulan', '2024-08-16 13:27:58'),
(79, 52, 'Usuf Mengajukan Pembuatan Usulan', '2024-08-16 13:30:06'),
(80, 53, 'Usuf Mengajukan Pembuatan Usulan', '2024-08-16 13:33:45'),
(81, 54, 'Usuf Mengajukan Pembuatan Usulan', '2024-08-16 13:35:53'),
(82, 55, 'Usuf Mengajukan Pembuatan Usulan', '2024-08-16 13:36:59'),
(83, 56, 'Usuf Mengajukan Pembuatan Usulan', '2024-08-16 13:38:21'),
(84, 57, 'Usuf Mengajukan Pembuatan Usulan', '2024-08-16 13:39:08'),
(85, 50, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi. Jenis Rujukan: Kampus', '2024-08-18 10:38:42'),
(86, 58, 'Wasilah Mengajukan Pembuatan Usulan', '2024-08-18 13:27:13'),
(87, 59, 'Wasilah Mengajukan Pembuatan Usulan', '2024-08-18 13:27:14'),
(88, 48, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2024-08-27 13:17:19'),
(89, 57, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2024-08-27 13:18:20'),
(90, 60, 'Naufal Mengajukan Pembuatan Usulan', '2024-08-28 06:47:27'),
(91, 60, 'Admin Telah Membatalkan Permohonan Pengusulan Bantuan. Dengan Kelengkapan Berkas Belum Lengkap.', '2024-08-28 06:49:52'),
(92, 60, 'Naufal Memperbarui Berkas', '2024-08-28 06:52:35'),
(93, 60, 'Admin Telah Menyelesaikan Proses Pengusulan Bantuan. Dengan Kelengkapan Berkas Telah Terpenuhi.', '2024-08-28 06:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsultasi`
--

CREATE TABLE `tb_konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `masyarakat_id` int(11) NOT NULL,
  `perihal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_konsultasi`
--

INSERT INTO `tb_konsultasi` (`id_konsultasi`, `masyarakat_id`, `perihal`) VALUES
(6, 15, 'apakah saya bisa dapat bantuan biaya pendampingan'),
(7, 19, 'Kapan usulan saya diproses ya?\r\n'),
(8, 18, 'Mohon izin untuk usulan saya kapan diproses?'),
(9, 21, 'Konsultasi terkait  berkas usulan Rekomendasi Permohonan Bantuan Sosial dan Ekonomi'),
(10, 22, 'Permisi kapan usulan saya diterima'),
(11, 26, 'Assalamualaikum, min numpang nanya untuk proses verifikasi itu teknisnya seperti apa ya?'),
(12, 25, 'Mohon ijin numpang nanya untuk usulan saya kapan diproses ya'),
(15, 38, 'konsultasi berkas usulan'),
(16, 18, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kunjungan`
--

CREATE TABLE `tb_kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `masyarakat_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kunjungan`
--

INSERT INTO `tb_kunjungan` (`id_kunjungan`, `masyarakat_id`, `pegawai_id`, `keperluan`, `tanggal`, `status`, `keterangan`) VALUES
(4, 13, 4, 'ingin konsultasi terkait usulan', '2023-08-17', 'Disetujui', 'temui jam 10 pagi'),
(5, 17, 5, 'Konsultasi terkait permohonan bantuan', '2023-08-22', 'Pending', ''),
(6, 16, 6, 'koordinasi terkait usulan anak saya', '2023-08-23', 'Disetujui', 'Temui saya di Kantor Kecamatan Martapura Timur'),
(7, 14, 3, 'Konsultasi terkait bantuan', '2023-08-22', 'Disetujui', 'Temui saya di MPP lantai 2'),
(8, 15, 3, 'konsultasi terkait permohonan bantuan biaya pendampingan', '2023-08-22', 'Dibatalkan', 'mohon maaf untuk tanggal 22 saya tidak bisa dikarenakan ada kegiatan di luar kantor'),
(9, 13, 3, 'Konsultasi terkait pengusulan bantuan', '2023-08-22', 'Pending', ''),
(10, 19, 7, 'Konsultasi kelengkapan berkas usulan', '2024-02-19', 'Disetujui', 'Temui saja diMPP jam 10 Pagi'),
(11, 18, 7, 'Konsultasi terkait usulan', '2024-01-18', 'Dibatalkan', 'Mohon maaf untuk tanggal 01 saya tidak bisa karena ada dinas luar'),
(12, 21, 4, 'Konsultasi terkait berkas usulan Rekomendasi Permohonan Bantuan Sosial dan Ekonomi\r\n', '2024-01-01', 'Pending', ''),
(13, 22, 7, 'Konsultasi terkait berkas usulan', '2024-03-22', 'Dibatalkan', 'Mohon maaf tgl 22 saya tidak ada dikantor karena ada dinas luar'),
(15, 18, 0, '', '0000-00-00', 'Pending', ''),
(16, 18, 6, 'sd', '2024-08-05', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_kk` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `status_hubungan` varchar(25) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_masyarakat`, `user_id`, `no_kk`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kode_pos`, `status_hubungan`, `no_hp`, `email`) VALUES
(14, 26, '6303140402080047', '6303140506750003', 'Abdul Halim', 'Martapura', '1975-06-05', 'Laki-Laki', 'Islam', 'Jl. Martapura Lama', '001', '001', 'Teluk Selong', 'Kecamatan Martapura Barat', '70651', 'Kepala Keluarga', '0896916849201', 'halim_abdul@gmail.com'),
(15, 27, '6303143108210003', '6303144807940001', 'Fadliah', 'Martapura', '1994-07-08', 'Perempuan', 'Islam', 'Jl. Martapura Lama', '003', '000', 'Teluk Selong', 'Kecamatan Martapura Barat', '70618', 'Istri', '0822468917456', 'fadliah0807@gmail.com'),
(16, 28, '6303150202230001', '6303156804020002', 'Ella', 'Martapura', '2002-04-28', 'Perempuan', 'Islam', 'Jl. Pematang Seberang', '005', '002', 'Melayu', 'Kecamatan Martapura Timur', '70617', 'Kepala Keluarga', '0821894698466', 'ella2804@gmail.com'),
(17, 29, '6303072303080009', '6303071501680002', 'Safroni Pardiyanto', 'Ambarawa', '1968-01-15', 'Laki-Laki', 'Islam', 'Pingaran Ulu', '009', '003', 'Pingaran Ulu', 'Kecamatan Astambul', '70671', 'Suami', '0852661235584', 'safroni@gmail.com'),
(18, 30, '6303052810112002', '6303892810990009', 'M. Rizky', 'Banjarbaru', '1996-11-07', 'Laki-Laki', 'Islam', 'Jl. Martapura Lama', '006', '003', 'Pakauman Ulu', 'Kecamatan Martapura Timur', '70416', 'Suami', '0878544983273', 'rizkymartapura12@gmail.com'),
(19, 32, '6309283717370001', '6309280111990002', 'Amat', 'Martapura', '1999-01-11', 'Laki-Laki', 'Islam', 'Jl. Martapura Lama No. 32', '006', '003', 'Pakauman', 'Kecamatan Martapura Timur', '70416', 'Suami', '0819766854233', 'amataja@gmail.com'),
(20, 33, '6303052810112001', '1234567890000001', 'Anah', 'Martapura', '2008-06-17', 'Perempuan', 'Islam', 'Jl. A. Yani Km.32', '006', '003', 'Pakauman Ulu', 'Kecamatan Martapura Timur', '70416', 'Famili Lain', '0819233938231', 'anahaja@gmail.com'),
(21, 34, '6253534242363662', '6303892810990002', 'Caca', 'Banjarbaru', '2003-07-09', 'Perempuan', 'Islam', 'Jl. Martapura', '001', '003', 'Pandak Daun', 'Kecamatan Karang Intan', '70416', 'Anak', '0819233938221', 'caca@gmail.com'),
(22, 35, '6303052810112003', '1234567890000001', 'zaty', 'Martapura', '2014-11-14', 'Perempuan', 'Islam', 'Jl. Martapura', '006', '003', 'Pakauman Ulu', 'Kecamatan Martapura Timur', '70416', 'Anak', '0819233938224', 'zaty@gmail.com'),
(23, 36, '6309283717370032', '6309283717434343', 'Ajeng', 'Bandung', '1995-06-06', 'Perempuan', 'Islam', 'Jl. Martapura Lama', '002', '002', 'Antasan', 'Kecamatan Martapura Timur', '70416', 'Anak', '0876543123456', 'ajeng@gmail.com'),
(24, 37, '6303132456787654', '6303242944324242', 'Susanti', 'Martapura', '1997-06-09', 'Perempuan', 'Islam', 'Jl. A. Yani', '006', '002', 'Kertak Hanyar', 'Kecamatan Kertak Hanyar', '70416', 'Istri', '0878978676755', 'santisusanti97@gmail.com'),
(25, 38, '6303987234813298', '6304242424241124', 'Sopia Aprilia', 'Banjarbaru', '1996-01-09', 'Perempuan', 'Islam', 'Jl. A. Yani Kec. Kertak Hanyar', '002', '002', 'Kertak Hanyar', 'Kecamatan Kertak Hanyar', '70613', 'Famili Lain', '0819543424231', 'sopiaaprilia@gmail.com'),
(26, 39, '1234567890736255', '0987665444314253', 'ema', 'karang intan', '2001-05-14', 'Perempuan', 'Islam', 'karang intan', '1', '1', 'Kertak Hanyar', 'Kecamatan Aluh-Aluh', '70613', 'Famili Lain', '1234567899999', 'ema123@gmail.com'),
(27, 44, '6253534242363666', '1323213111435677', 'Risma Azizah', 'Martapura', '2001-07-17', 'Perempuan', 'Islam', 'Jl. Martapura', '006', '002', 'Pandak Daun', 'Kecamatan Karang Intan', '70613', 'Famili Lain', '0819233938231', 'rismaazizah2002@gmail.com'),
(35, 52, '6253534242363662', '6309280111990002', 'Sopia', 'Banjarbaru', '2016-06-14', 'Perempuan', 'Islam', 'Karang Intan', '006', '002', 'Kertak Hanyar', 'Kecamatan Kertak Hanyar', '70416', 'Orang Tua', '0819233938221', 'rismaazizah2002@gmail.com'),
(36, 53, '6303052810112003', '1234567890000000', 'Muhammad Rahmaan', 'Martapura', '2024-08-15', '', 'Islam', 'Jl. Martapura', '001', '002', 'Pakauman', 'Kecamatan Martapura', '70619', 'Orang Tua', '0819233938221', 'rismaazizah2002@gmail.com'),
(37, 54, '6303052810112002', '6303892810990009', 'Muhammad Yusuf', 'Martapura', '2024-08-06', '', 'Islam', 'adasdasd', '001', '002', 'Pandak Daun', 'Kecamatan Simpang Empat', '70613', 'Mertua', '0878544983273', 'sopiaagustina637@gmail.com'),
(40, 63, '1234567718228288', '98782736351512i3', 'naufal', 'Martapura', '2005-07-28', 'Perempuan', 'Islam', 'Jl.Pekauman', '001', '002', 'Pakauman Ulu', 'Kecamatan Martapura Timur', '70613', 'Famili Lain', '1234567890122', 'djoval@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nik_nip` varchar(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tempat_tugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `user_id`, `nik_nip`, `nama_pegawai`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_hp`, `email`, `jabatan`, `tempat_tugas`) VALUES
(3, 12, '6303150910830001', 'Ricky Ariadi, S.Kom', 'Banjarmasin', '1989-11-11', 'Laki-laki', 'Islam', 'adasdasdasdsad', '081250785643', 'ricky@gmail.com', 'Petugas SLRT', 'Kecamatan Martapura'),
(4, 15, '6303151905210001', 'Intan Sari', 'Martapura', '1968-07-29', 'Perempuan', 'Islam', 'Jl. Murung Darussalam GG. Kacapuri', '081932274612', 'intan.sari@gmail.com', 'Petugas Supervisor', 'Kecamatan Aluh-Aluh'),
(5, 23, '6303071007950004', 'RIzky Wahyudi', 'Atayo', '1995-07-10', 'Laki-laki', 'Islam', 'Pingaran Ulu', '087859876124', 'wahyu.saputra@gmail.com', 'Petugas Fasilitator', 'Kecamatan Astambul'),
(6, 24, '6303152612190001', 'Muhammad Ramadhan', 'Martapura', '1989-05-13', 'Laki-laki', 'Islam', 'Jl. Pematang Seberang', '085263634952', 'm.ramadhan99@gmail.com', 'Petugas Supervisor', 'Kecamatan Martapura Timur'),
(7, 31, '6346464564123456', 'Risma Azizah', 'Banjarbaru', '2002-04-12', 'Perempuan', 'Islam', 'Jl. Martapura Lama', '081923393827', 'emarisma@gmail.com', 'Petugas SLRT', 'Kecamatan Martapura Timur'),
(8, 55, '6346464564123443', 'Ema Maulida', 'karang intan', '1996-07-03', 'Perempuan', 'Islam', 'Karang Intan', '087587652345', 'emamaulida96@gmail.com', 'Petugas SLRT', 'Kecamatan Karang Intan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengusulan_bantuan`
--

CREATE TABLE `tb_pengusulan_bantuan` (
  `id_pengusulan_bantuan` int(11) NOT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `masyarakat_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `nomor_pengusulan` varchar(50) NOT NULL,
  `kk_pengusul` varchar(50) NOT NULL,
  `nik_pengusul` varchar(50) NOT NULL,
  `nama_pengusul` varchar(100) NOT NULL,
  `tempat_lahir_pengusul` varchar(100) NOT NULL,
  `tanggal_lahir_pengusul` date DEFAULT NULL,
  `umur_pengusul` varchar(10) DEFAULT NULL,
  `jenis_kelamin_pengusul` varchar(20) NOT NULL,
  `agama_pengusul` varchar(25) NOT NULL,
  `desa_pengusul` varchar(100) NOT NULL,
  `kecamatan_pengusul` varchar(100) NOT NULL,
  `kode_pos_pengusul` varchar(10) NOT NULL,
  `status_hubungan_pengusul` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kelengkapan_berkas` tinyint(1) NOT NULL DEFAULT 0,
  `alamat_pengusul` text NOT NULL,
  `rt_pengusul` varchar(10) NOT NULL,
  `rw_pengusul` varchar(10) NOT NULL,
  `file_berkas` text NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `keterangan_verifikasi` text NOT NULL,
  `jenis_rujukan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengusulan_bantuan`
--

INSERT INTO `tb_pengusulan_bantuan` (`id_pengusulan_bantuan`, `pegawai_id`, `masyarakat_id`, `usulan_id`, `nomor_pengusulan`, `kk_pengusul`, `nik_pengusul`, `nama_pengusul`, `tempat_lahir_pengusul`, `tanggal_lahir_pengusul`, `umur_pengusul`, `jenis_kelamin_pengusul`, `agama_pengusul`, `desa_pengusul`, `kecamatan_pengusul`, `kode_pos_pengusul`, `status_hubungan_pengusul`, `status`, `kelengkapan_berkas`, `alamat_pengusul`, `rt_pengusul`, `rw_pengusul`, `file_berkas`, `tgl_pengajuan`, `keterangan_verifikasi`, `jenis_rujukan`) VALUES
(40, 0, 18, 9, '118914082024', '6303432412521521', '6343425362362362', 'Bambang Susanto', 'Martapura', '1984-02-08', '40', 'Laki-laki', 'Islam', 'Pesayangan', 'Kecamatan Martapura', '70164', 'Famili Lain', 'Diterima', 1, 'Jl Martapura', '006', '003', 'uploads/1891723646285.pdf', '2024-04-04', '', 'Kampus'),
(41, 0, 24, 4, '4124414082024', '1234567712345467', '1234354657681234', 'Syifa ', 'Karang Intan', '2007-11-21', '16', 'Perempuan', 'Islam', 'Karang Intan', 'Kecamatan Kertak Hanyar', '70167', 'Famili Lain', 'Diterima', 1, 'Jl. Karang Intan', '001', '001', 'uploads/2441723649258.pdf', '2024-08-14', '<p>Admin</p>', 'Rumah Sakit'),
(42, 0, 22, 5, '4222514082024', '6309809875099080', '6309890975646342', 'Mufidah', 'Martapura', '1980-05-13', '44', 'Perempuan', 'Islam', 'Antasan Senor', 'Kecamatan Martapura Timur', '70162', 'Anak', 'Diterima', 1, 'Jl. Martapura Lama', '006', '002', 'uploads/2251723649585.pdf', '2024-08-14', '<p>Admin</p>', 'Badan Amil Zakat Nasional (BAZNAS)'),
(43, 0, 18, 4, '4318414082024', '6309809875099080', '6309890975646677', 'Udin', 'Martapura', '2024-07-11', '0', 'Laki-laki', 'Islam', 'Pesayangan', 'Kecamatan Martapura', '70167', 'Famili Lain', 'Diterima', 1, 'Jl. Martapura', '006', '003', 'uploads/1841723650447.pdf', '2024-08-14', '<p>Admin</p>', 'Rumah Sakit'),
(44, 0, 26, 4, '4426414082024', '1234567890111213', '1234354657681234', 'nikmah', 'Mataraman', '2012-06-20', '12', 'Perempuan', 'Islam', 'Mataram', 'Kecamatan Mataraman', '70166', 'Famili Lain', 'Diterima', 1, 'Jl. Mataraman', '002', '003', 'uploads/2641723652452.pdf', '2024-08-14', '<p>Admin</p>', 'Rumah Sakit'),
(45, 0, 21, 5, '4521514082024', '6309809875099080', '6309890975646677', 'ucup', 'Banjarbaru', '2024-02-13', '0', 'Laki-laki', 'Islam', 'Pesayangan', 'Kecamatan Martapura', '70161', 'Orang Tua', 'Diterima', 1, 'Jl. Pesayangan', '002', '002', 'uploads/2151723652605.pdf', '2024-08-14', '<p>Admin</p>', 'Badan Amil Zakat Nasional (BAZNAS)'),
(47, 0, 25, 8, '4625814082024', '6309809875099081', '6309890975646677', 'munis', 'Mataraman', '2024-01-09', '0', 'Laki-laki', 'Islam', 'Mataram', 'Kecamatan Mataraman', '70164', 'Famili Lain', 'Diterima', 1, 'Mataraman', '001', '002', 'uploads/2581723653956.pdf', '2024-08-14', '', '4'),
(48, 7, 26, 8, '4826815082024', '6309809875099080', '6309890975646677', 'Azzahra', 'Martapura', '2021-10-06', '2', 'Perempuan', 'Islam', 'Pandak Daun', 'Kecamatan Karang Intan', '70162', 'Famili Lain', 'Diterima', 1, 'Martapura', '002', '003', 'uploads/2681723703687.pdf', '2024-08-15', '', '5'),
(49, NULL, 0, 8, '49816082024', '6309809875099080', '6309890975646345', 'Udin', 'Mataraman', '2024-07-28', '0', 'Laki-laki', 'Islam', 'Pesayangan', 'Kecamatan Sambung Makmur', '70161', 'Famili Lain', 'Pending', 0, 'adas', '01', '01', 'uploads/81723814384.pdf', '2024-08-16', '', ''),
(50, 0, 37, 9, '5037916082024', '6309809875099080', '6309890975646677', 'Azzahra', 'Mataraman', '2024-01-01', '0', 'Perempuan', 'Islam', 'Pesayangan', 'Kecamatan Paramasan', '70164', 'Menantu', 'Diterima', 1, 'Sungai Tabuk', '003', '002', 'uploads/3791723814692.pdf', '2024-08-16', '', '3'),
(57, 7, 37, 5, '5737516082024', '6309809875099090', '6309890975646342', 'nikmah', 'Martapura', '2024-01-02', '0', 'Perempuan', 'Islam', 'Kertak Hanyar', 'Kecamatan Sambung Makmur', '70164', 'Orang Tua', 'Diterima', 1, 'dfghjk', '001', '003', 'uploads/3751723815548.pdf', '2024-08-16', '<p>Risma Azizah</p>', ''),
(58, NULL, 38, 8, '5838818082024', '6309809875099023', '6309890975613213', 'anang', 'sungai pinang', '1989-06-13', '35', 'Laki-laki', 'Islam', 'Sungai Pinang', 'Kecamatan Sungai Pinang', '701620', 'Anak', 'Pending', 0, 'Sungai Pinang', '002', '003', 'uploads/3881723987633.pdf', '2024-08-18', '', ''),
(60, 7, 40, 4, '5940428082024', '8123363635152512', '9383737371616261', 'dona', 'Martapura', '2015-04-28', '9', 'Perempuan', 'Islam', 'Pesayangan', 'Pilih ...', '12345', 'Famili Lain', 'Diterima', 1, 'pekauman', '001', '002', 'uploads/4041724827647.pdf', '2024-08-28', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`, `tanggal_daftar`) VALUES
(1, 'admin martapura', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2024-04-12'),
(12, 'ricky', '827ccb0eea8a706c4c34a16891f84e7b', 'pegawai', '2024-04-13'),
(15, 'intan', '827ccb0eea8a706c4c34a16891f84e7b', 'pegawai', '2024-04-12'),
(22, 'rizal', '150fb021c56c33f82eef99253eb36ee1', 'masyarakat', '2024-05-10'),
(23, 'wwahyu', '827ccb0eea8a706c4c34a16891f84e7b', 'pegawai', '2024-04-25'),
(24, 'adan', '827ccb0eea8a706c4c34a16891f84e7b', 'pegawai', '2024-05-09'),
(25, 'hsznt', '827ccb0eea8a706c4c34a16891f84e7b', 'pegawai', '2024-04-25'),
(26, 'a.halim', '827ccb0eea8a706c4c34a16891f84e7b', 'masyarakat', '2024-05-24'),
(27, 'fadliah', '827ccb0eea8a706c4c34a16891f84e7b', 'masyarakat', '2024-05-24'),
(28, 'ella', '827ccb0eea8a706c4c34a16891f84e7b', 'masyarakat', '2024-05-25'),
(29, 'safroni', '827ccb0eea8a706c4c34a16891f84e7b', 'masyarakat', '2024-06-06'),
(30, 'rizky', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '2024-06-09'),
(31, 'rismaazizah', '25d55ad283aa400af464c76d713c07ad', 'pegawai', '2024-06-04'),
(32, 'amataja', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '2024-07-16'),
(33, 'anah', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '2024-06-15'),
(34, 'caca', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '2024-06-21'),
(35, 'zaty', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '2024-07-02'),
(36, 'ajeng', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '2024-08-04'),
(37, 'susanti', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '0000-00-00'),
(38, 'sopia', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '0000-00-00'),
(39, 'ema', 'e10adc3949ba59abbe56e057f20f883e', 'masyarakat', '0000-00-00'),
(41, 'kadis', '5e8667a439c68f5145dd2fcbecf02209', 'kadis', '0000-00-00'),
(43, 'rismaazizah12', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '0000-00-00'),
(46, 'rismaria', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '0000-00-00'),
(52, 'sopiaa', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '0000-00-00'),
(53, 'munib', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '0000-00-00'),
(54, 'usuf', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '0000-00-00'),
(55, 'emamaulida', '827ccb0eea8a706c4c34a16891f84e7b', 'pegawai', '0000-00-00'),
(56, 'risma', 'bfa979396545edee06b67e768970d275', 'pegawai', '0000-00-00'),
(57, 'ilah', '25d55ad283aa400af464c76d713c07ad', 'masyarakat', '0000-00-00'),
(63, 'opal', 'e10adc3949ba59abbe56e057f20f883e', 'masyarakat', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usulan`
--

CREATE TABLE `tb_usulan` (
  `id_usulan` int(11) NOT NULL,
  `jenis_usulan` varchar(100) NOT NULL,
  `kriteria` text NOT NULL,
  `persyaratan` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_usulan`
--

INSERT INTO `tb_usulan` (`id_usulan`, `jenis_usulan`, `kriteria`, `persyaratan`, `keterangan`) VALUES
(4, 'Layanan Rekomendasi Permohonan Bantuan Biaya/Berobat Aktivasi Jaminan Kesehatan APBD', '<ol>\r\n<li>Setiap orang miskin di Daerah yang memiliki Kartu Tanda Penduduk atau Surat Keterangan Domisili dari Pambakal atau Lurah yang bertempat tinggal menetap dan terus menerus di Kabupaten Banjar dan belum terdaftar sebagai peserta BPJS Kesehatan.</li>\r\n<li>Orang miskin sebagaimana dimaksud pada poin1, di buktikan dengan surat keterangan miskin oleh Pambakal atau Lurah yang diketahui oleh&nbsp;Kecamatan.</li>\r\n<li>Masyarakat Miskin yang memenuhi ketentuan sebagai Penerima Bantuan&nbsp;Kesehatan Masyarakat Miskin sebagaimana dimaksud pada poin 1 dan 2 akan didaftarkan dengan pembayaran iuran yang bersumber dari APBD, melalui mekanisme verifikasi data pada Dinas Sosial&nbsp;melalui SLRT dan BPJS Kesehatan.</li>\r\n<li>Masyarakat Miskin yang sebelumnya sudah mempunyai jaminan kesehatan dan memenuhi ketentuan sebagaimana dimaksud pada poin 1 dapat menjadi penerima Bantuan Kesehatan Masyarakat Miskin, namun bersifat&nbsp;sementara dan tidak menghilangkan kewajiban atas Jaminan Kesehatan&nbsp;terdahulu yang bermasalah karena keterlambatan pembayaran.</li>\r\n</ol>', '<ol>\r\n<li>Fotokopi Kartu Tanda Penduduk Pasien</li>\r\n<li>Fotokopi Kartu Tanda Penduduk Kepala Keluarga</li>\r\n<li>Fotokopi Kartu Tanda Penduduk Penanggung Jawab</li>\r\n<li>Fotokopi Kartu Keluarga</li>\r\n<li>Surat Rujukan atau Surat Kontrol Dari Puskesmas</li>\r\n<li>Surat Rawat Inap Dari Rumah Sakit</li>\r\n<li>Surat Keterangan Tidak Mampu yang ditanda tangani&nbsp;oleh Pambakal/Lurah dan diketahui Camat</li>\r\n<li>Foto Rumah (Depan, Belakang dan Samping)</li>\r\n<li>Materai 10.000 bagi Pasien yang tidak masuk dalam&nbsp;Data Terpadu Kesejahteraan Sosial (DTKS)</li>\r\n</ol>', '<p>Kelengkapan persyaratan di foto atau scan (hasil foto atau scan harus jelas) dan digabungkan menjadi satu file dengan format PDF.</p>'),
(5, 'Layanan Rekomendasi Permohonan Bantuan Sosial dan Ekonomi', '<ol>\r\n<li>Setiap orang miskin di Daerah yang memiliki Kartu Tanda Penduduk atau Surat Keterangan Domisili dari Pambakal atau Lurah yang bertempat tinggal menetap dan terus menerus di Kabupaten Banjar dan belum terdaftar sebagai peserta BPJS Kesehatan.</li>\r\n<li>Orang miskin sebagaimana dimaksud pada poin1, di buktikan dengan surat keterangan miskin oleh Pambakal atau Lurah yang diketahui oleh Kecamatan.</li>\r\n</ol>', '<ol>\r\n<li>Rencana Anggaran Belanja</li>\r\n<li>Fotokopi Kartu Tanda Penduduk Kepala Keluarga</li>\r\n<li>Fotokopi Kartu Keluarga</li>\r\n<li>Surat Keterangan Kepemilikan Tanah</li>\r\n<li>Surat Keterangan Tidak Mampu yang ditanda tangani&nbsp;oleh Pambakal/Lurah dan diketahui Camat</li>\r\n<li>Foto Rumah (Depan, Belakang dan Samping)</li>\r\n</ol>', '<p>Kelengkapan persyaratan di foto atau scan (hasil foto atau scan harus jelas) dan digabungkan menjadi satu file dengan format PDF.</p>'),
(8, 'Layanan Rekomendasi Permohonan Bantuan Biaya Pendampingan', '<ol>\r\n<li>Setiap orang miskin di Daerah yang memiliki Kartu Tanda Penduduk atau Surat Keterangan Domisili dari Pambakal atau Lurah yang bertempat tinggal menetap dan terus menerus di Kabupaten Banjar dan belum terdaftar sebagai peserta BPJS Kesehatan.</li>\r\n<li>Orang miskin sebagaimana dimaksud pada poin1, di buktikan dengan surat keterangan miskin oleh Pambakal atau Lurah yang diketahui oleh Kecamatan.</li>\r\n</ol>', '<p>1. Fotokopi Kartu Tanda Penduduk Pasien<br>2. Fotokopi Kartu Tanda Penduduk Kepala Keluarga<br>3. Fotokopi Kartu Tanda Penduduk Penanggung Jawab&nbsp;<br>4. Fotokopi Kartu Keluarga<br>5. Surat Rujukan atau Surat Kontrol Dari Puskesmas<br>6. Surat Rawat Inap Dari Rumah Sakit<br>7. Surat Keterangan Tidak Mampu yang ditanda tangani&nbsp;oleh Pambakal/Lurah dan diketahui Camat<br>8. Foto Rumah (Depan, Belakang dan Samping)<br>9. Materai 10.000 bagi Pasien yang tidak masuk dalam<br>Data Terpadu Kesejahteraan Sosial (DTKS)<br>10.Rincian Biaya</p>', '<p>Kelengkapan persyaratan di foto atau scan (hasil foto atau scan harus jelas) dan digabungkan menjadi satu file dengan format PDF.</p>'),
(9, 'Layanan Keterangan Terdaftar Data Terpadu Kesejahteraan Sosial Kementerian Sosial R.I (DTKS)', '<ol>\r\n<li>Setiap orang miskin di Daerah yang memiliki Kartu Tanda Penduduk atau Surat Keterangan Domisili dari Pambakal atau Lurah yang bertempat tinggal menetap dan terus menerus di Kabupaten Banjar dan belum terdaftar sebagai peserta BPJS Kesehatan.</li>\r\n<li>Orang miskin sebagaimana dimaksud pada poin1, di buktikan dengan surat keterangan miskin oleh Pambakal atau Lurah yang diketahui oleh Kecamatan.</li>\r\n</ol>', '<p>1. Terdata dalam Data Terpadu Kesejahteraan Sosial&nbsp;(DTKS)<br>2. Fotokopi Kartu Tanda Penduduk Kepala Keluarga<br>3. Fotokopi Kartu Keluarga<br>4. Surat Keterangan Tidak Mampu yang ditanda tangani&nbsp;oleh Pambakal/Lurah dan diketahui Camat<br>5. Foto Rumah (Depan, Belakang dan Samping)</p>', '<p>Kelengkapan persyaratan di foto atau scan (hasil foto atau scan harus jelas) dan digabungkan menjadi satu file dengan format PDF.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_krisar`);

--
-- Indexes for table `tb_histori_konsultasi`
--
ALTER TABLE `tb_histori_konsultasi`
  ADD PRIMARY KEY (`id_histori_konsultasi`);

--
-- Indexes for table `tb_histori_pengusulan_bantuan`
--
ALTER TABLE `tb_histori_pengusulan_bantuan`
  ADD PRIMARY KEY (`id_histori_pengusulan_bantuan`);

--
-- Indexes for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_pengusulan_bantuan`
--
ALTER TABLE `tb_pengusulan_bantuan`
  ADD PRIMARY KEY (`id_pengusulan_bantuan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_krisar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tb_histori_konsultasi`
--
ALTER TABLE `tb_histori_konsultasi`
  MODIFY `id_histori_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_histori_pengusulan_bantuan`
--
ALTER TABLE `tb_histori_pengusulan_bantuan`
  MODIFY `id_histori_pengusulan_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pengusulan_bantuan`
--
ALTER TABLE `tb_pengusulan_bantuan`
  MODIFY `id_pengusulan_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
