-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 05:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) UNSIGNED NOT NULL,
  `sekolah_id` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(74, '2022-12-31-112555', 'App\\Database\\Migrations\\User', 'default', 'App', 1675138373, 1),
(75, '2022-12-31-112619', 'App\\Database\\Migrations\\Sekolah', 'default', 'App', 1675138373, 1),
(76, '2022-12-31-113804', 'App\\Database\\Migrations\\Galeri', 'default', 'App', 1675138374, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kepsek` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `user_id`, `nama`, `slug`, `kecamatan`, `alamat`, `kepsek`, `email`, `nohp`, `status`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 2, 'SMK 2 Banjarmasin', 'smk-2-banjarmasin', 'Banjarmasin', 'Psr. Panjaitan No. 964, Surabaya 71474, Sulteng', 'ganda73', 'ifarida@example.net', '(+62) 344 7851 0050', 'Swasta', '108.44', '-7.01', '1986-07-12 05:28:25', '2023-01-30 22:13:18'),
(2, 3, 'SMK 19 Malang', 'smk-19-malang', 'Malang', 'Ds. Bak Air No. 27, Depok 90225, Pabar', 'riyanti.yono', 'irma.salahudin@example.com', '(+62) 243 2723 0087', 'Swasta', '108.3', '-7.06', '1993-02-23 17:29:58', '2023-01-30 22:13:18'),
(3, 4, 'SMK 20 Banjar', 'smk-20-banjar', 'Banjar', 'Ds. Baan No. 924, Tangerang 83865, Jambi', 'ami01', 'vnugroho@example.com', '0505 0075 7254', 'Swasta', '108.43', '-6.48', '1976-12-26 10:47:42', '2023-01-30 22:13:18'),
(4, 5, 'SMK 3 Banda Aceh', 'smk-3-banda-aceh', 'Banda Aceh', 'Jln. Sutoyo No. 456, Padangpanjang 56497, Jatim', 'xmaryati', 'csinaga@example.com', '(+62) 402 7894 1587', 'Negeri', '108.47', '-6.62', '1994-01-15 18:45:07', '2023-01-30 22:13:18'),
(5, 6, 'SMK 9 Cirebon', 'smk-9-cirebon', 'Cirebon', 'Gg. Bayan No. 523, Pekanbaru 72514, Lampung', 'ssafitri', 'owijayanti@example.net', '(+62) 881 8393 010', 'Negeri', '108.42', '-6.6', '2007-12-27 15:42:07', '2023-01-30 22:13:18'),
(7, 8, 'SMK 6 Pangkal Pinang', 'smk-6-pangkal-pinang', 'Pangkal Pinang', 'Jln. Achmad Yani No. 51, Banjarbaru 97717, DIY', 'ani.rajasa', 'bella.lazuardi@example.org', '(+62) 381 4962 9275', 'Swasta', '108.4', '-6.99', '2008-09-04 00:39:59', '2023-01-30 22:13:18'),
(8, 9, 'SMK 2 Salatiga', 'smk-2-salatiga', 'Salatiga', 'Dk. Bagis Utama No. 693, Bitung 45678, Kaltara', 'shutapea', 'padmi75@example.net', '0665 4129 3686', 'Negeri', '108.4', '-6.75', '2012-07-23 20:36:26', '2023-01-30 22:13:18'),
(9, 10, 'SMK 13 Palopo', 'smk-13-palopo', 'Palopo', 'Ki. Hang No. 115, Denpasar 48503, Gorontalo', 'novi86', 'marpaung.kania@example.org', '0478 7620 028', 'Swasta', '108.44', '-6.67', '2022-11-24 15:08:02', '2023-01-30 22:13:18'),
(10, 11, 'SMK 6 Denpasar', 'smk-6-denpasar', 'Denpasar', 'Dk. Baya Kali Bungur No. 221, Pangkal Pinang 64869, NTT', 'uyainah.utama', 'okto71@example.com', '0307 8847 926', 'Negeri', '108.42', '-6.88', '1994-03-25 17:36:49', '2023-01-30 22:13:18'),
(11, 12, 'SMK 18 Payakumbuh', 'smk-18-payakumbuh', 'Payakumbuh', 'Ki. Batako No. 595, Tarakan 88824, Kalbar', 'hpradana', 'vagustina@example.org', '0698 1192 804', 'Swasta', '108.28', '-6.67', '1992-08-29 19:35:26', '2023-01-30 22:13:18'),
(12, 13, 'SMK 16 Dumai', 'smk-16-dumai', 'Dumai', 'Dk. Pattimura No. 541, Gunungsitoli 57248, Bali', 'hrahayu', 'vera.kusmawati@example.org', '(+62) 271 0394 5707', 'Negeri', '108.37', '-6.94', '1972-11-30 03:57:33', '2023-01-30 22:13:18'),
(13, 14, 'SMA 15 Sabang', 'sma-15-sabang', 'Sabang', 'Ki. Dipenogoro No. 441, Lhokseumawe 77950, Sumbar', 'citra.rahimah', 'cici32@example.net', '0351 4167 5500', 'Swasta', '108.32', '-6.5', '1999-12-13 08:11:52', '2023-01-30 22:13:18'),
(14, 15, 'SMA 13 Bima', 'sma-13-bima', 'Bima', 'Jr. Arifin No. 359, Kupang 45645, Sulbar', 'irma24', 'xyulianti@example.net', '0961 8868 173', 'Negeri', '108.45', '-7.08', '2005-06-11 19:33:08', '2023-01-30 22:13:18'),
(15, 16, 'SMA 7 Padangpanjang', 'sma-7-padangpanjang', 'Padangpanjang', 'Jr. Teuku Umar No. 94, Batu 37385, Jateng', 'kurnia.wahyuni', 'whidayat@example.com', '(+62) 860 1162 0134', 'Negeri', '108.26', '-6.99', '1986-12-04 19:15:17', '2023-01-30 22:13:18'),
(16, 17, 'SMK 20 Ambon', 'smk-20-ambon', 'Ambon', 'Dk. Peta No. 121, Mataram 37846, Sumsel', 'halim.anastasia', 'elisa.lazuardi@example.net', '0509 5474 669', 'Negeri', '108.28', '-6.73', '1984-04-17 14:01:37', '2023-01-30 22:13:18'),
(17, 18, 'SMA 20 Payakumbuh', 'sma-20-payakumbuh', 'Payakumbuh', 'Ds. Laswi No. 287, Pariaman 46159, Gorontalo', 'halim.yunita', 'bakiono79@example.org', '(+62) 28 1896 371', 'Negeri', '108.23', '-6.83', '1998-09-18 02:20:11', '2023-01-30 22:13:18'),
(18, 19, 'SMA 12 Palopo', 'sma-12-palopo', 'Palopo', 'Ds. Cut Nyak Dien No. 384, Padang 40628, Sumut', 'xyulianti', 'pardi.uyainah@example.com', '0387 2122 1457', 'Swasta', '108.26', '-6.77', '1971-09-15 10:36:58', '2023-01-30 22:13:19'),
(19, 20, 'SMK 8 Tegal', 'smk-8-tegal', 'Tegal', 'Ds. Kalimantan No. 164, Banjarmasin 45978, Riau', 'rahmat.yulianti', 'napitupulu.aslijan@example.com', '(+62) 269 0975 5361', 'Swasta', '108.42', '-6.54', '1982-11-09 12:55:10', '2023-01-30 22:13:19'),
(20, 21, 'SMA 18 Bima', 'sma-18-bima', 'Bima', 'Ds. Basoka No. 2, Bandar Lampung 56610, NTB', 'carub66', 'kasiyah62@example.com', '0758 4856 597', 'Negeri', '108.42', '-6.64', '1978-04-01 14:08:33', '2023-01-30 22:13:19'),
(21, 22, 'SMK 14 Administrasi Jakarta Utara', 'smk-14-administrasi-jakarta-utara', 'Administrasi Jakarta Utara', 'Jr. Jamika No. 742, Administrasi Jakarta Utara 52904, Gorontalo', 'hardana94', 'chandra.aryani@example.net', '(+62) 557 2523 695', 'Negeri', '108.42', '-6.94', '1994-10-07 22:39:03', '2023-01-30 22:13:19'),
(22, 23, 'SMA 12 Tangerang', 'sma-12-tangerang', 'Tangerang', 'Kpg. Achmad No. 739, Tangerang 97061, Lampung', 'winarno.yani', 'dina23@example.com', '(+62) 27 2803 951', 'Negeri', '108.45', '-6.47', '1997-08-20 07:39:29', '2023-01-30 22:13:19'),
(23, 24, 'SMA 19 Kendari', 'sma-19-kendari', 'Kendari', 'Ki. Baranang Siang Indah No. 725, Tebing Tinggi 89531, DIY', 'lailasari.umay', 'titi79@example.net', '(+62) 21 9215 3750', 'Negeri', '108.23', '-6.82', '2017-10-11 17:37:00', '2023-01-30 22:13:19'),
(24, 25, 'SMA 7 Yogyakarta', 'sma-7-yogyakarta', 'Yogyakarta', 'Ds. Teuku Umar No. 724, Subulussalam 73956, Sulut', 'uharyanto', 'cpurnawati@example.net', '(+62) 903 3077 5873', 'Swasta', '108.27', '-7.08', '2017-04-28 13:51:30', '2023-01-30 22:13:19'),
(25, 26, 'SMK 18 Solok', 'smk-18-solok', 'Solok', 'Jln. Bambon No. 298, Malang 57788, Lampung', 'widiastuti.wirda', 'ina.dabukke@example.com', '(+62) 228 2279 799', 'Negeri', '108.29', '-6.51', '1970-04-26 08:57:53', '2023-01-30 22:13:19'),
(26, 27, 'SMA 19 Samarinda', 'sma-19-samarinda', 'Samarinda', 'Psr. Bah Jaya No. 438, Malang 49842, Jambi', 'heru74', 'zaenab50@example.com', '0255 6136 9406', 'Swasta', '108.33', '-6.97', '1981-12-16 00:40:30', '2023-01-30 22:13:19'),
(27, 28, 'SMA 11 Padangpanjang', 'sma-11-padangpanjang', 'Padangpanjang', 'Kpg. Sampangan No. 481, Padang 63110, Kaltim', 'hastuti.gatra', 'palastri.raisa@example.com', '020 6713 870', 'Negeri', '108.27', '-6.56', '1999-02-10 00:21:27', '2023-01-30 22:13:19'),
(28, 29, 'SMA 14 Cimahi', 'sma-14-cimahi', 'Cimahi', 'Jln. Rumah Sakit No. 928, Binjai 44730, Sulsel', 'mhakim', 'raisa.haryanti@example.org', '0454 1191 4746', 'Swasta', '108.3', '-7.08', '2011-03-09 07:44:52', '2023-01-30 22:13:19'),
(29, 30, 'SMK 17 Batu', 'smk-17-batu', 'Batu', 'Dk. K.H. Maskur No. 177, Denpasar 75970, Kaltara', 'kusmawati.hendri', 'garang.anggraini@example.com', '(+62) 229 7101 850', 'Swasta', '108.35', '-6.92', '2020-07-13 11:16:43', '2023-01-30 22:13:19'),
(30, 31, 'SMK 13 Pariaman', 'smk-13-pariaman', 'Pariaman', 'Psr. Bakau No. 623, Pematangsiantar 41567, Riau', 'mulyani.darsirah', 'xsalahudin@example.net', '0597 8207 9752', 'Negeri', '108.46', '-6.77', '1974-11-29 15:39:58', '2023-01-30 22:13:19'),
(31, 32, 'SMA 8 Singkawang', 'sma-8-singkawang', 'Singkawang', 'Jln. Gambang No. 746, Parepare 52651, Malut', 'zhutasoit', 'prayoga.murti@example.net', '0596 2244 8944', 'Swasta', '108.43', '-6.54', '2004-04-07 11:53:22', '2023-01-30 22:13:19'),
(32, 33, 'SMK 8 Administrasi Jakarta Utara', 'smk-8-administrasi-jakarta-utara', 'Administrasi Jakarta Utara', 'Dk. Yohanes No. 503, Batu 79718, Jambi', 'zelda83', 'kusmawati.rizki@example.net', '(+62) 649 0445 7199', 'Swasta', '108.26', '-6.65', '1976-08-15 01:06:23', '2023-01-30 22:13:19'),
(33, 34, 'SMK 3 Sukabumi', 'smk-3-sukabumi', 'Sukabumi', 'Psr. Adisumarmo No. 582, Kupang 41820, Kalteng', 'airawan', 'ihasanah@example.net', '0566 5457 0970', 'Negeri', '108.29', '-6.63', '2003-11-19 15:04:14', '2023-01-30 22:13:19'),
(34, 35, 'SMA 8 Payakumbuh', 'sma-8-payakumbuh', 'Payakumbuh', 'Kpg. Gedebage Selatan No. 928, Palu 59176, Jateng', 'pia22', 'jessica35@example.org', '021 0595 380', 'Swasta', '108.36', '-7.03', '1978-06-13 13:14:11', '2023-01-30 22:13:19'),
(35, 36, 'SMA 11 Kendari', 'sma-11-kendari', 'Kendari', 'Psr. Gremet No. 688, Palangka Raya 29643, DIY', 'rahmi.hastuti', 'xsusanti@example.org', '(+62) 500 4359 037', 'Negeri', '108.4', '-6.67', '1982-10-12 12:29:26', '2023-01-30 22:13:19'),
(36, 37, 'SMA 18 Banjarmasin', 'sma-18-banjarmasin', 'Banjarmasin', 'Ki. Zamrud No. 656, Yogyakarta 56638, Jambi', 'rahimah.elma', 'nasyidah.shakila@example.com', '(+62) 741 7111 184', 'Negeri', '108.36', '-6.73', '1974-11-26 06:43:42', '2023-01-30 22:13:19'),
(37, 38, 'SMA 13 Pariaman', 'sma-13-pariaman', 'Pariaman', 'Jln. Ters. Buah Batu No. 80, Singkawang 23459, DKI', 'usada.ani', 'winarno.balamantri@example.net', '(+62) 573 8269 959', 'Negeri', '108.23', '-6.81', '1977-12-28 13:20:29', '2023-01-30 22:13:19'),
(38, 39, 'SMA 2 Ternate', 'sma-2-ternate', 'Ternate', 'Dk. Daan No. 448, Administrasi Jakarta Timur 82448, Sulut', 'natsir.rachel', 'ozy.pudjiastuti@example.com', '023 2563 5289', 'Negeri', '108.29', '-6.88', '1982-11-19 04:40:20', '2023-01-30 22:13:19'),
(39, 40, 'SMK 4 Mataram', 'smk-4-mataram', 'Mataram', 'Dk. M.T. Haryono No. 967, Tanjung Pinang 88371, Sulteng', 'ahalimah', 'utama.edward@example.net', '0349 3091 0771', 'Swasta', '108.31', '-6.77', '2011-12-16 15:36:36', '2023-01-30 22:13:19'),
(40, 41, 'SMA 4 Tasikmalaya', 'sma-4-tasikmalaya', 'Tasikmalaya', 'Kpg. Ir. H. Juanda No. 638, Ambon 93547, Kaltara', 'rmulyani', 'drajat95@example.com', '(+62) 306 7101 974', 'Negeri', '108.32', '-6.81', '1978-06-24 21:27:31', '2023-01-30 22:13:19'),
(41, 42, 'SMA 7 Batu', 'sma-7-batu', 'Batu', 'Dk. Gatot Subroto No. 406, Makassar 81111, Sulteng', 'uyainah.luwar', 'eva02@example.com', '0379 7641 8636', 'Swasta', '108.24', '-6.73', '2021-09-03 02:05:59', '2023-01-30 22:13:19'),
(42, 43, 'SMK 12 Sorong', 'smk-12-sorong', 'Sorong', 'Kpg. Teuku Umar No. 438, Bau-Bau 73652, Jambi', 'paulin.kusmawati', 'usyi.prabowo@example.net', '0877 640 163', 'Swasta', '108.44', '-6.65', '1979-11-10 13:38:05', '2023-01-30 22:13:19'),
(43, 44, 'SMK 18 Manado', 'smk-18-manado', 'Manado', 'Dk. Daan No. 378, Semarang 29692, Sulut', 'yoktaviani', 'padmasari.ajimin@example.org', '(+62) 706 6988 991', 'Swasta', '108.44', '-7.01', '2003-11-12 04:38:49', '2023-01-30 22:13:19'),
(44, 45, 'SMA 14 Lhokseumawe', 'sma-14-lhokseumawe', 'Lhokseumawe', 'Gg. Basmol Raya No. 371, Cilegon 42345, Kaltim', 'cnapitupulu', 'jessica73@example.org', '(+62) 382 2525 2223', 'Negeri', '108.45', '-6.97', '1993-02-08 13:55:46', '2023-01-30 22:13:19'),
(45, 46, 'SMA 1 Yogyakarta', 'sma-1-yogyakarta', 'Yogyakarta', 'Dk. Orang No. 797, Depok 99010, Riau', 'nwinarno', 'pyulianti@example.com', '0520 1823 819', 'Negeri', '108.45', '-6.89', '1987-06-01 07:22:01', '2023-01-30 22:13:19'),
(46, 47, 'SMK 8 Administrasi Jakarta Pusat', 'smk-8-administrasi-jakarta-pusat', 'Administrasi Jakarta Pusat', 'Ki. Babadan No. 981, Pontianak 12271, Jabar', 'pudjiastuti.ami', 'gamanto.nuraini@example.com', '(+62) 802 7031 6820', 'Swasta', '108.31', '-6.68', '2022-02-08 05:33:05', '2023-01-30 22:13:19'),
(47, 48, 'SMA 8 Solok', 'sma-8-solok', 'Solok', 'Jr. Casablanca No. 571, Padangsidempuan 78090, Sulsel', 'prabawa90', 'maulana.ellis@example.com', '(+62) 927 2790 668', 'Swasta', '108.31', '-7.03', '2015-09-24 09:40:21', '2023-01-30 22:13:19'),
(48, 49, 'SMK 5 Sabang', 'smk-5-sabang', 'Sabang', 'Ki. Nangka No. 628, Madiun 38742, Riau', 'gilang.mustofa', 'rahimah.manah@example.com', '022 5298 9868', 'Negeri', '108.28', '-6.67', '1991-01-06 01:53:45', '2023-01-30 22:13:19'),
(49, 50, 'SMK 9 Langsa', 'smk-9-langsa', 'Langsa', 'Ki. Samanhudi No. 606, Administrasi Jakarta Barat 33747, Aceh', 'rpangestu', 'uuwais@example.net', '(+62) 21 4436 2379', 'Negeri', '108.34', '-7.06', '1974-03-19 15:11:28', '2023-01-30 22:13:19'),
(50, 51, 'SMK 20 Singkawang', 'smk-20-singkawang', 'Singkawang', 'Ki. Baiduri No. 82, Administrasi Jakarta Barat 33968, Gorontalo', 'wulandari.maya', 'halimah.ulya@example.net', '(+62) 24 1968 2638', 'Swasta', '108.42', '-7.03', '1990-01-21 09:52:35', '2023-01-30 22:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$cxE/lFQOxFyYn9I5/sdi4.xyy14/uMeHMBdgPzPsHXzzEkf/P1hJu', 'admin', '1977-09-13 19:46:06', '2023-01-30 22:13:01'),
(2, 'marbun.karimah', '$2y$10$63KlbWhWuDZvdnBk1Bms/OBOyNi2cEqD6B8ISyWf./BWsqwQe69pa', 'sekolah', '1992-04-17 10:17:55', '2023-01-30 22:13:02'),
(3, 'nova.yolanda', '$2y$10$XIFD.jGeZb3LbbJ.AaZ1XuvPLRiQsWzl9ieAjX93MFTUPoEAPpcSS', 'sekolah', '1985-12-21 15:45:05', '2023-01-30 22:13:02'),
(4, 'prabawa88', '$2y$10$v1x0JXjXo8IX111zXNSYF.g5qYeutdoqS8gBosg.gxoEoiiKUAhJG', 'sekolah', '1979-04-06 01:48:24', '2023-01-30 22:13:02'),
(5, 'luis79', '$2y$10$IQS1oYigKN6hJwnCM96LTuBxFWr3arKqs7M8ZKHAX27Df5a9AGiv6', 'sekolah', '1985-11-24 07:55:45', '2023-01-30 22:13:02'),
(6, 'laksana.hassanah', '$2y$10$pETl8uSZoeV5/m7z8diStOQeql2vDfizQ4a1FoK1fFhMYDhP08bmm', 'sekolah', '2016-06-01 07:31:04', '2023-01-30 22:13:03'),
(8, 'uyulianti', '$2y$10$UOJrv3NDhZCxPKFQ0zxmeOLg.LWjlaU9YMpKRP/O8ziBRnvlzs4Zy', 'sekolah', '2006-03-19 15:07:29', '2023-01-30 22:13:03'),
(9, 'qpratiwi', '$2y$10$zr892HCCdbvx6z1kBwJ0E.DfKFpiTphqD1Iit02Kyv/YK6HcRghJm', 'sekolah', '1973-11-15 06:45:57', '2023-01-30 22:13:03'),
(10, 'garang62', '$2y$10$6Rwl33MKDUx7ZJ2lSqNFs.mdzOTy9y1epzlvWSdeaRh2RbCWUAUmC', 'sekolah', '1987-07-21 15:19:49', '2023-01-30 22:13:04'),
(11, 'gpadmasari', '$2y$10$zKT2IbyUI3c8PM9vuZfxBunuqZTt3E/xPwxCp176vmNDM5Be/L/Nm', 'sekolah', '2012-08-04 23:43:43', '2023-01-30 22:13:04'),
(12, 'raden.wulandari', '$2y$10$d4S0hBoq/sUOjVUZLSIsNO789H45AggUfGekHvvQXCo1H6m2Qj/BC', 'sekolah', '1972-12-05 20:32:41', '2023-01-30 22:13:04'),
(13, 'jhalimah', '$2y$10$yPwUiXgCg85vuJ5dDqnmPO0quCHuNv0utSJfdaRMojrhh40BQk3qO', 'sekolah', '2011-04-05 17:57:03', '2023-01-30 22:13:05'),
(14, 'zalindra69', '$2y$10$Au4g7rjhk0s2srOfQgnRTuZiiHEgJZOjcHiE7jsK.NVIBNXmPa5Cy', 'sekolah', '2006-05-14 00:18:44', '2023-01-30 22:13:05'),
(15, 'rmaheswara', '$2y$10$C.X9jc.lwnVm5ciEOcasTeoniZaxDc.dhL0jYXD6t1xiRJ1ByAdIO', 'sekolah', '1982-04-18 19:54:37', '2023-01-30 22:13:05'),
(16, 'hnamaga', '$2y$10$ALsufL96sHX8R9xK7aFIW.UxDfSSEBXY3x5pjNN9tl5j3jqv/03Ua', 'sekolah', '1988-10-21 04:18:59', '2023-01-30 22:13:05'),
(17, 'jinawi85', '$2y$10$acFXlmMemvWUHRlxCf5X9e2.fSejZGWtHQ5VaOwkxNVJzDhz19gg6', 'sekolah', '2019-01-22 06:30:57', '2023-01-30 22:13:06'),
(18, 'legawa13', '$2y$10$YBp9PUyheFAf/IU820Ff9eXXC1ke.WYqzz6H5uj06ilqTVGE2SDum', 'sekolah', '1993-10-04 19:32:03', '2023-01-30 22:13:06'),
(19, 'wasita.mulyanto', '$2y$10$X5EYvY9imfD.Zqvyu3bIYePip/jfP9rC4wNlbfGQQPE7LnoWM0HLO', 'sekolah', '2010-09-01 05:24:21', '2023-01-30 22:13:06'),
(20, 'shania67', '$2y$10$mBfP6hj97uys646TwyGTJenLCfi6WfhWFDsC.MAvmKyLrkNKenGuG', 'sekolah', '1974-10-28 22:31:10', '2023-01-30 22:13:06'),
(21, 'cakrawangsa.maryadi', '$2y$10$i3p6kE6wo6jPGwRGwWKXMucDy65CrB4uWJH/Tsp1UQY8iEWSYPMVq', 'sekolah', '1987-09-05 00:03:59', '2023-01-30 22:13:07'),
(22, 'omar03', '$2y$10$NICjUrnav9QP7P5BlwPBcuX83.pJfaU.YI7F8nBfUBiFnwor6dKo.', 'sekolah', '1988-04-15 19:40:26', '2023-01-30 22:13:07'),
(23, 'ardianto.dirja', '$2y$10$Yq3KSs03xE6xtW7KogM...z0np39LFOw4Lupj69Hj422hrDyUSZ4S', 'sekolah', '2007-11-17 12:22:17', '2023-01-30 22:13:07'),
(24, 'ellis.hartati', '$2y$10$2rS0AZ5OcsaeJKYshJaXHOIOGNiIFEEr7D.zikDyts5ESPtLDLR6.', 'sekolah', '2018-07-12 12:55:36', '2023-01-30 22:13:07'),
(25, 'rika36', '$2y$10$.73oKVGeEBuyFjqr8O4otO//5TOBQdZYPvXABBQ/w3WjXLJo01V8O', 'sekolah', '2018-02-27 04:29:34', '2023-01-30 22:13:08'),
(26, 'astuti.bakiono', '$2y$10$MEdf8kM3qfYDCKKtHjaLoOfagg/bUCSpcvX7sQaoACnO3MPshKODu', 'sekolah', '2004-06-13 12:41:54', '2023-01-30 22:13:08'),
(27, 'dian95', '$2y$10$cP8h.Bk3IU9ys0JJyMaf5eFsvI31FJSSbtt6eUO3nPnvKKE2K2H4W', 'sekolah', '1983-10-04 12:21:59', '2023-01-30 22:13:08'),
(28, 'dagel45', '$2y$10$xTpn6ILGP/GSlcRp5teDJecrplCUoFKACdCjT7ym8UjZR.KIwJT6y', 'sekolah', '2018-11-29 08:21:58', '2023-01-30 22:13:09'),
(29, 'hana79', '$2y$10$DZBnA3uT3nkWQoFC1N7Z9.YyY1j0v/5C9cr8bLAvyd/CWnfu/GhjS', 'sekolah', '2004-05-12 09:33:27', '2023-01-30 22:13:09'),
(30, 'wjanuar', '$2y$10$kx8XEGKoABdY72QMw7IT2urllpid3GV0Y5EGkjT6uG0onUAgdZtGu', 'sekolah', '2008-09-02 23:04:28', '2023-01-30 22:13:09'),
(31, 'ajimat32', '$2y$10$l/0xdekRKkPgFhxySlEDkunbupzUS5Z2bnwIjeUUS5NcxJmMdGcs2', 'sekolah', '2000-03-17 22:18:32', '2023-01-30 22:13:09'),
(32, 'osuryatmi', '$2y$10$43i0wm8xt6t/WGj.i7CQfOCKdD0f4kIJgyBUM5OHzYbRfARlALY.a', 'sekolah', '1973-06-10 14:36:38', '2023-01-30 22:13:10'),
(33, 'kenari22', '$2y$10$bElvSTLV78jxSF5n.AGs8eoFmI1GIt107w66CIGOqfUqRcpA6RT/i', 'sekolah', '1999-08-01 13:08:27', '2023-01-30 22:13:10'),
(34, 'nnovitasari', '$2y$10$9jpBH9cK4hv.5KenFAsdfuhl7TVp7YQxqwTurIhSK.yn76jHfvN5u', 'sekolah', '1992-01-02 22:05:34', '2023-01-30 22:13:10'),
(35, 'puput38', '$2y$10$7dbF75NAWwq4lljKxAkl0eKImVPph.GGoXdTggBOynbBlHlWTFm0S', 'sekolah', '1982-04-19 09:56:21', '2023-01-30 22:13:10'),
(36, 'mandasari.teddy', '$2y$10$ZZU7PhOXluTZyYgWfSWg0u/NY4lRY.WFFb6gBGcuJ4ndjCQyAaKcO', 'sekolah', '2006-01-06 03:37:08', '2023-01-30 22:13:11'),
(37, 'laksmiwati.kayla', '$2y$10$Sr4axcjx47lThR47snU2GuZGNfgRk1LlQL/T6uzOLfRvJhu.nTzte', 'sekolah', '1997-04-09 04:46:59', '2023-01-30 22:13:11'),
(38, 'laila13', '$2y$10$0IGvz6PF263nRjEe4ZNWQeEXwQsQpsGgJaVL5om3A.ZKghdpUsHqu', 'sekolah', '1997-09-14 11:12:18', '2023-01-30 22:13:11'),
(39, 'zulaikha25', '$2y$10$s0OiMbuL7mFpnfL/o9s.SemmoPW1djm/F88p4qH0ZFHl6/dCPK79G', 'sekolah', '2019-02-27 23:48:56', '2023-01-30 22:13:11'),
(40, 'ramadan.laila', '$2y$10$KxLYmys5VWU.3ssgQI8hF.rirQKk29w8IjsiEtuX3G/c4pDnCqvFS', 'sekolah', '1990-11-19 21:20:05', '2023-01-30 22:13:12'),
(41, 'andriani.kamaria', '$2y$10$mpnP8p2HL.WiVFzdhhusZecY.wb/JpkxqStUXdmShklIyojv8dGyy', 'sekolah', '1995-06-02 03:13:03', '2023-01-30 22:13:12'),
(42, 'tania.purnawati', '$2y$10$7YnGAMrC8Y0PXfcWXlqezerkK2/kiMY.XqHMiq73umwDFreDUi0.a', 'sekolah', '1995-09-25 22:05:51', '2023-01-30 22:13:12'),
(43, 'bprabowo', '$2y$10$xn.vG4GlRlZdyJmieXTEhevZR.6Yiyk6YushYRtNIc68qOe8yDABW', 'sekolah', '1998-08-13 07:49:39', '2023-01-30 22:13:12'),
(44, 'legawa28', '$2y$10$Lp8l5ZH9c4/dVu929BQMD.S4EKND6h1nNjwMzSnpI2vwVgm9Sr9lS', 'sekolah', '1989-07-20 01:05:16', '2023-01-30 22:13:12'),
(45, 'intan.nugroho', '$2y$10$x/pMdBFZ6uVKNMVnJNsnvOpMcLV91MjKs4SCDEJOxNt1XDvOFdRO.', 'sekolah', '1979-07-12 15:23:50', '2023-01-30 22:13:12'),
(46, 'phassanah', '$2y$10$wVW19I.eRxcWmUXyDbO91uVdObGlNF8SueV8lTpsaExGyMGv2qW.K', 'sekolah', '1970-04-15 06:04:50', '2023-01-30 22:13:12'),
(47, 'dhasanah', '$2y$10$7/rqkbXDqANyeUnTElDTseY3ZHmZBBuWXcRPyemaqi4HcT5Evy4yi', 'sekolah', '1977-03-29 09:14:54', '2023-01-30 22:13:12'),
(48, 'hartaka.lestari', '$2y$10$JrBlenGua25LeiGXEBF22e6RIWCvlP1rtnQIelGqMCt/vN3rjyKLm', 'sekolah', '1975-06-13 13:28:56', '2023-01-30 22:13:12'),
(49, 'ira.pradipta', '$2y$10$eaPxGm7tOVrMy67kcAiBZ.Sp93/ivdybJSZtUMgpTxaHNNBU2sUNq', 'sekolah', '2001-05-14 04:13:24', '2023-01-30 22:13:13'),
(50, 'wisnu15', '$2y$10$1rUwXMv5bZ5U8I4Pg9D3UOK.LFyfwxRhUoBHIpekS/2phIpb01Ayq', 'sekolah', '2019-09-20 22:31:42', '2023-01-30 22:13:13'),
(51, 'maulana.gatot', '$2y$10$v6dnvj2mGfLMnX1V2xsI/etp118Z8fdHHR3b.YWJDhqF20JLIzZji', 'sekolah', '2006-12-12 05:36:03', '2023-01-30 22:13:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeri_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sekolah_user_id_foreign` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
