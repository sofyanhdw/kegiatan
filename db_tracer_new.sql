-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 01:10 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tracer_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alumni`
--

CREATE TABLE `tbl_alumni` (
  `id_alumni` int(11) NOT NULL,
  `npm` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jurusan` enum('Teknik Informatika','Sistem Informatika','Manajemen Informatika') NOT NULL,
  `angkatan` int(11) NOT NULL,
  `tahun_lulus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alumni`
--

INSERT INTO `tbl_alumni` (`id_alumni`, `npm`, `nama`, `jurusan`, `angkatan`, `tahun_lulus`) VALUES
(1, '201010225002', 'AGUNG SAPUTRA', 'Teknik Informatika', 2010, 2016),
(3, '201033232', 'Sofyan Hadiwinata', 'Manajemen Informatika', 2010, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `nama_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE `tbl_job` (
  `id_job` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`id_job`, `job_title`, `info`, `datetime`) VALUES
(3, 'IT Support - kumparan', '<p>Job Description</p>\r\n\r\n<ul>\r\n	<li>Installing and configuring computer hardware, software, systems, networks, printers and scanners</li>\r\n	<li>Monitoring and maintaining computer systems and networks</li>\r\n	<li>Responding in a timely manner to service issues and requests</li>\r\n	<li>Providing technical support across the company (this may be in person or over the phone)</li>\r\n	<li>Setting up accounts for new users</li>\r\n	<li>Repairing and replacing equipment as necessary</li>\r\n</ul>\r\n\r\n<p>Qualifications<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Enterprise support experience with Mac or Linux system support &amp; troubleshooting</li>\r\n	<li>Advanced support application experience including support for Microsoft Office</li>\r\n	<li>Experience in supporting Windows 10</li>\r\n	<li>Networking &amp; Telecom skills</li>\r\n	<li>Data Cabling / Computer Facilities</li>\r\n</ul>\r\n', '2018-07-16 19:30:56'),
(4, 'IT Staff - PT Jababeka Tbk', '<ul>\r\n	<li>Installing and configuring computer hardware operating systems and applications</li>\r\n	<li>Monitoring and maintaining computer systems and networks;</li>\r\n	<li>Talking staff or clients through a series of actions, either face-to-face or over the telephone, to help set up systems or resolve issues;</li>\r\n	<li>Troubleshooting system and network problems and diagnosing and solving hardware or software faults;</li>\r\n	<li>Providing support, including procedural documentation and relevant reports;;</li>\r\n	<li>Supporting the roll-out of new applications;</li>\r\n	<li>Setting up new users&#39; accounts and profiles</li>\r\n	<li>Testing and evaluating new technology</li>\r\n	<li>Conducting electrical safety checks on computer equipment.</li>\r\n</ul>\r\n\r\n<p><strong>REQUIREMENTS</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Minimal D3,</strong>&nbsp;Computer Science/Information Technology or equivalent.</li>\r\n	<li>At least 2 year(s) of working experience in the related field is required for this position.</li>\r\n	<li>Able to join&nbsp;<strong>as soon as possible</strong></li>\r\n	<li>Placed in Cikarang</li>\r\n</ul>\r\n\r\n<p><strong>Send your CV with latest photo to recruitment @ jababeka.com</strong></p>\r\n\r\n<p>Job Types: Full-time, Contract</p>\r\n\r\n<p>Experience:</p>\r\n\r\n<ul>\r\n	<li>Information Technology: 2 years</li>\r\n</ul>\r\n\r\n<p>Education:</p>\r\n\r\n<ul>\r\n	<li>Bachelor&#39;s</li>\r\n</ul>\r\n\r\n<p>Location:</p>\r\n\r\n<ul>\r\n	<li>Bekasi</li>\r\n</ul>\r\n', '2018-07-16 19:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `video` varchar(50) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `judul`, `deskripsi`, `video`, `datetime`) VALUES
(2, 'Pembasmian Hama', '<p>Test aja dulu</p>\r\n', '', '2018-07-22 20:13:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `fk_codegambar_to_idkegiatan` (`id_kegiatan`);

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD CONSTRAINT `fk_codegambar_to_idkegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `tbl_kegiatan` (`id_kegiatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
