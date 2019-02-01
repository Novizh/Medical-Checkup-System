-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2019 at 06:13 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalcheckup_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_tb`
--

CREATE TABLE `account_tb` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_tb`
--

INSERT INTO `account_tb` (`id`, `name`, `username`, `password`) VALUES
(6, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'Naufal Herdyputra', 'naufalhrd', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `checkup_result_tb`
--

CREATE TABLE `checkup_result_tb` (
  `id` int(11) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `disease_id` int(10) NOT NULL,
  `accuracy` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkup_result_tb`
--

INSERT INTO `checkup_result_tb` (`id`, `patient_id`, `disease_id`, `accuracy`) VALUES
(32, 39, 7, 1),
(33, 40, 8, 2),
(34, 41, 1, 1),
(35, 41, 4, 2),
(36, 42, 1, 2),
(37, 42, 7, 1),
(38, 43, 1, 1),
(39, 43, 2, 1),
(40, 44, 1, 1),
(41, 44, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkup_tb`
--

CREATE TABLE `checkup_tb` (
  `id` int(10) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `symptom1` int(10) NOT NULL,
  `symptom2` int(10) NOT NULL,
  `symptom3` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkup_tb`
--

INSERT INTO `checkup_tb` (`id`, `patient_id`, `symptom1`, `symptom2`, `symptom3`) VALUES
(15, 41, 8, 31, 30),
(16, 42, 43, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `disease_tb`
--

CREATE TABLE `disease_tb` (
  `disease_id` int(10) NOT NULL,
  `disease_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease_tb`
--

INSERT INTO `disease_tb` (`disease_id`, `disease_name`, `description`) VALUES
(1, 'Tuberkulosis Paru', 'Tuberkulosis (TB) adalah penyakit menular langsung yang disebabkan oleh kuman TB yaitu Mycobacterium tuberculosis. Sebagian besar kuman TB menyerang paru, namun dapat juga mengenai organ tubuh lainnya. Saat ini timbul kedaruratan baru dalam penanggulangan TB, yaitu TB Resisten Obat (Multi Drug Resistance/MDR).'),
(2, 'Malaria', 'Malaria merupakan suatu penyakit infeksi akut maupun kronik yang disebabkan oleh parasit Plasmodium yang menyerang eritrosit dan ditandai dengan ditemukannya bentuk aseksual dalam darah dengan gejala demam, mengigil, anemia, dan pembesaran limpa.'),
(3, 'Demam Berdarah Dengue', 'Demam Berdarah Dengue (DBD) adalah penyakit infeksi yang disebabkan oleh virus dengue. Nyamuk atau/ beberapa jenis nyamuk menularkan (atau menyebarkan) virus dengue. Demam dengue juga disebut sebagai \"breakbone fever\" atau \"bonebreak fever\" (demam sendi), karena demam tersebut dapat menyebabkan penderitanya mengalami nyeri hebat seakan-akan tulang mereka patah.'),
(4, 'Anemia Defisiensi Besi', 'Anemia adalah penyakit yang disebabkan oleh menurunnya jumlah massa eritrosit sehingga tidak dapat memenuhi fungsinya untuk membawa oksigen dalam jumlah cukup ke jaringan perifer. Anemia merupakan masalah medik yang sering dijumpai di klinik di seluruh dunia. Diperkirakan >30% penduduk dunia menderita anemia dan sebagian besar tinggal di daerah tropis.'),
(5, 'Gastritis', 'Gastritis adalah proses inflamasi pada lapisan mukosa dan submukosa lambung sebagai mekanisme proteksi mukosa apabila terdapat akumulasi bakteri atau bahan iritan lain. Proses inflamasi dapat bersifat akut, kronis, difus, atau lokal.'),
(6, 'Hepatitis B', 'Hepatitis B adalah virus yang menyerang hati, masuk melalui darah ataupun cairan tubuh dari seseorang yang terinfeksi. Virus ini tersebar luas di seluruh dunia dengan angka kejadian yang berbeda-beda. Tingkat prevalensi Hepatitis B di Indonesia sangat bervariasi, berkisar 2,5% di Banjarmasin sampai 25,61% di Kupang, sehingga termasuk dalam kelompok negara dengan endemisitas sedang sampai tinggi.'),
(7, 'Miopia Ringan', 'Miopia Ringan adalah kelainan refraksi dimana sinar sejajar yang masuk ke mata dalam keadaan istirahat (tanpa akomodasi) akan dibiaskan ke titik fokus depan retina.'),
(8, 'Hipertensi Esensial', 'Hipertensi esensial merupakan hipertensi yang tidak diketahui penyebabnya. Hipertensi menjadi masalah karena meningkatnya prevalensi, masih banyak pasien yang belum mendapat pengobatan, maupun yang telah mendapat tetapi target tekanan darah belum tercapai serta adanya penyakit penyerta dan komplikasi yang dapat meningkatkan morbiditas dan mortalitas.'),
(9, 'Migrain', 'Migrain adalah suatu istilah yang digunakan untuk nyeri kepala primer dengan kualitas vaskular (berdenyut), diawali unilateral yang diikuti oleh mual, fotofobia, fonofobia, gangguan tidur, dan depresi. Serangan seringkali berulang dan cenderung tidak akan bertambah parah setelah bertahun-tahun. Migrain bila tidak diterapi akan berlangsung antara 4-72 jam.'),
(10, 'Vertigo', 'Vertigo adalah persepsi yang salah dari gerakan seseorang atau lingkungan di sekitarnya. Vertigo merupakan suatu penyakit dengan berbagai penyebabnya antara lain: akibat kecelakaan, stress, gangguan pada telinga bagian dalam, obat-obatan, terlalu sedikit atau banyak aliran darah ke otak, dan lain-lain.');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tb`
--

CREATE TABLE `patient_tb` (
  `patient_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  `weight` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_tb`
--

INSERT INTO `patient_tb` (`patient_id`, `name`, `gender`, `age`, `height`, `weight`) VALUES
(39, 'Adi Bangkit', 'Pria', 20, 171, 68),
(40, 'Shafa Salsabila', 'Wanita', 20, 163, 44),
(41, 'Ilham Amirul', 'Pria', 20, 169, 68),
(42, 'Velia Handayani', 'Wanita', 20, 172, 40),
(43, 'Irsyad Abdul', 'Pria', 20, 170, 56),
(44, 'Pramesti Diah', 'Wanita', 21, 166, 46);

-- --------------------------------------------------------

--
-- Table structure for table `relation_tb`
--

CREATE TABLE `relation_tb` (
  `id` int(11) NOT NULL,
  `disease_id` int(10) NOT NULL,
  `symptom_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation_tb`
--

INSERT INTO `relation_tb` (`id`, `disease_id`, `symptom_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 2, 16),
(17, 2, 17),
(18, 3, 18),
(19, 3, 19),
(20, 3, 20),
(21, 3, 16),
(22, 3, 21),
(23, 3, 22),
(24, 3, 23),
(25, 3, 24),
(26, 3, 25),
(27, 3, 26),
(28, 3, 27),
(29, 3, 28),
(30, 4, 25),
(31, 4, 29),
(32, 4, 30),
(33, 4, 31),
(34, 4, 32),
(35, 4, 33),
(36, 4, 34),
(37, 4, 35),
(38, 4, 2),
(39, 5, 36),
(40, 5, 37),
(41, 5, 38),
(42, 5, 39),
(43, 6, 16),
(44, 6, 23),
(45, 6, 12),
(46, 6, 25),
(47, 6, 40),
(48, 6, 41),
(49, 6, 42),
(50, 7, 43),
(51, 7, 44),
(52, 7, 33),
(53, 7, 45),
(54, 8, 12),
(55, 8, 20),
(56, 8, 26),
(57, 8, 46),
(58, 8, 33),
(59, 8, 47),
(60, 8, 48),
(61, 8, 49),
(62, 9, 50),
(63, 9, 51),
(64, 9, 52),
(65, 10, 53),
(66, 10, 54),
(67, 10, 16);

-- --------------------------------------------------------

--
-- Table structure for table `symptom_tb`
--

CREATE TABLE `symptom_tb` (
  `symptom_id` int(10) NOT NULL,
  `symptom_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptom_tb`
--

INSERT INTO `symptom_tb` (`symptom_id`, `symptom_name`) VALUES
(1, 'Nyeri Dada'),
(2, 'Sesak Nafas'),
(3, 'Demam'),
(4, 'Hemoptisis'),
(5, 'Tidak nafsu makan'),
(6, 'Penurunan berat badan'),
(7, 'Keringat di malam hari'),
(8, 'Mudah lelah'),
(9, 'Demam hilang timbul'),
(10, 'Menggigil'),
(11, 'Berkeringat'),
(12, 'Sakit Kepala'),
(13, 'Nyeri Otot dan Sendi'),
(14, 'Nafsu Makan Menurun'),
(15, 'Sakit Perut'),
(16, 'Mual dan Muntah'),
(17, 'Diare'),
(18, 'Demam Tinggi'),
(19, 'Bintik Merah pada Kulit'),
(20, 'Nyeri Kepala'),
(21, 'Nyeri Perut'),
(22, 'Nyeri Telan'),
(23, 'Batuk'),
(24, 'Pilek'),
(25, 'Lemah'),
(26, 'Gelisah'),
(27, 'Kesadaran Menurun'),
(28, 'Kejang'),
(29, 'Lesu'),
(30, 'Letih'),
(31, 'Lelah'),
(32, 'Pengelihatan Kunang-Kunang'),
(33, 'Pusing'),
(34, 'Telinga Berdenging'),
(35, 'Konsentrasi Menurun'),
(36, 'Nyeri Perut Atas'),
(37, 'Mual'),
(38, 'Muntah'),
(39, 'Kembung'),
(40, 'Urin berwarna Gelap'),
(41, 'Badan berwarna Kuning'),
(42, 'Sakit Perut Kanan Atas'),
(43, 'Pengelihatan Kabur bila Jauh'),
(44, 'Mata Mudah Lelah'),
(45, 'Mengantuk'),
(46, 'Jantung Berdebar'),
(47, 'Leher Kaku'),
(48, 'Pengelihatan Kabur'),
(49, 'Sakit Dada'),
(50, 'Nyeri Satu Sisi Kepala'),
(51, 'Sakit Kepala Berdenyut'),
(52, 'Mual dengan atau Tanpa Muntah'),
(53, 'Kepala Terasa Berputar'),
(54, 'Keringat Dingin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_tb`
--
ALTER TABLE `account_tb`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `account_tb` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `checkup_result_tb`
--
ALTER TABLE `checkup_result_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`) USING BTREE,
  ADD KEY `disease_id` (`disease_id`) USING BTREE;

--
-- Indexes for table `checkup_tb`
--
ALTER TABLE `checkup_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`) USING BTREE,
  ADD KEY `FOREIGN_checkup_tb_to_symptom_tb 1` (`symptom1`) USING BTREE,
  ADD KEY `FOREIGN_checkup_tb_to_symptom_tb 2` (`symptom2`) USING BTREE,
  ADD KEY `FOREIGN_checkup_tb_to_symptom_tb 3` (`symptom3`) USING BTREE;

--
-- Indexes for table `disease_tb`
--
ALTER TABLE `disease_tb`
  ADD PRIMARY KEY (`disease_id`);
ALTER TABLE `disease_tb` ADD FULLTEXT KEY `nama_penyakit` (`disease_name`);

--
-- Indexes for table `patient_tb`
--
ALTER TABLE `patient_tb`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `relation_tb`
--
ALTER TABLE `relation_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `symptom_id` (`symptom_id`) USING BTREE,
  ADD KEY `disease_id` (`disease_id`) USING BTREE;

--
-- Indexes for table `symptom_tb`
--
ALTER TABLE `symptom_tb`
  ADD PRIMARY KEY (`symptom_id`);
ALTER TABLE `symptom_tb` ADD FULLTEXT KEY `nama_gejala` (`symptom_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_tb`
--
ALTER TABLE `account_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `checkup_result_tb`
--
ALTER TABLE `checkup_result_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `checkup_tb`
--
ALTER TABLE `checkup_tb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `disease_tb`
--
ALTER TABLE `disease_tb`
  MODIFY `disease_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient_tb`
--
ALTER TABLE `patient_tb`
  MODIFY `patient_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `relation_tb`
--
ALTER TABLE `relation_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `symptom_tb`
--
ALTER TABLE `symptom_tb`
  MODIFY `symptom_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkup_result_tb`
--
ALTER TABLE `checkup_result_tb`
  ADD CONSTRAINT `FK_penyakit_pasien_patient_tb` FOREIGN KEY (`patient_id`) REFERENCES `patient_tb` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_penyakit_pasien_penyakit` FOREIGN KEY (`disease_id`) REFERENCES `disease_tb` (`disease_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `checkup_tb`
--
ALTER TABLE `checkup_tb`
  ADD CONSTRAINT `FK_symptom_tb_gejala` FOREIGN KEY (`symptom1`) REFERENCES `symptom_tb` (`symptom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_symptom_tb_gejala_2` FOREIGN KEY (`symptom2`) REFERENCES `symptom_tb` (`symptom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_symptom_tb_gejala_3` FOREIGN KEY (`symptom3`) REFERENCES `symptom_tb` (`symptom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_symptom_tb_patient_tb` FOREIGN KEY (`patient_id`) REFERENCES `patient_tb` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `relation_tb`
--
ALTER TABLE `relation_tb`
  ADD CONSTRAINT `FK_relasi_tb_gejala` FOREIGN KEY (`symptom_id`) REFERENCES `symptom_tb` (`symptom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_relasi_tb_penyakit` FOREIGN KEY (`disease_id`) REFERENCES `disease_tb` (`disease_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
