-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2023 at 04:30 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siap`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int NOT NULL,
  `categories` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categories`, `categories`) VALUES
(1, 'Bencana'),
(2, 'Curanmor'),
(4, 'Mampet saluran'),
(5, 'Kerusuhan');

-- --------------------------------------------------------

--
-- Table structure for table `reporting`
--

CREATE TABLE `reporting` (
  `id_aduan` int NOT NULL,
  `user_id` int NOT NULL,
  `judul` varchar(25) NOT NULL,
  `body` varchar(250) NOT NULL,
  `status` enum('diterima','diproses','selesai') NOT NULL,
  `categories_id` int NOT NULL,
  `kode_unik` int NOT NULL,
  `date_created` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reporting`
--

INSERT INTO `reporting` (`id_aduan`, `user_id`, `judul`, `body`, `status`, `categories_id`, `kode_unik`, `date_created`) VALUES
(1, 3, 'Ini judul curanmor', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis, exercitationem, adipisci necessitatibus facere labore perferendis aliquid praesentium reprehenderit cupiditate voluptate, dolores explicabo sint. Modi repellendus eveniet animi sunt', 'diterima', 2, 603066, '10:10 13-07-2022'),
(3, 4, 'Curanmor disini asadasdas', 'iure facilis repellendus id, hic debitis accusamus dolore architecto incidunt provident totam nemo nostrum earum quas fuga alias suscipit! Modi ullam consequuntur harum voluptates quo excepturi velit.', 'diterima', 2, 777673, '10:19 13-07-2022'),
(4, 2, 'ini judul mampet salurann', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis, exercitationem, adipisci necessitatibus facere labore perferendis aliquid praesentium reprehenderit cupiditate voluptate, dolores explicabo sint.', 'diterima', 4, 738549, '19:36 24-07-2022'),
(5, 2, 'ini judul yang lebih dari', 'asdjkasldjkhasdasdasd', 'diterima', 4, 510561, '19:38 24-07-2022'),
(6, 2, 'ini judul yang lebih dari', 'ini judul yang lebih dari hasjhdakjshdkjahskdjhaskjdhaksjhdkajshdkjahsdkjahskdjhasud askdjhaksjhdkajshdas aksjdhkajshdkajshd kjahksjhdkjasdasd haksjhdkajshdaoihew haksjhkajsoihdwoo jkhaskjhaskjhdkajsdo kjhkjhaosdhoiwh jhbaksjhdkasuiwujikhsadas jkasda', 'diproses', 1, 900819, '19:39 24-07-2022'),
(7, 3, 'Ini judul bencana', 'ini isi aduan dari kategori bencana', 'diproses', 4, 102618, '10:40 25-07-2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `name` varchar(22) NOT NULL,
  `email` varchar(35) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `jenis_kelamin`, `nik`, `no_hp`, `address`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Syeich Khalil Annbiya', 'syeichkhalil@gmail.com', 'Laki-laki', '3215013006010005', '08999161805', 'Perum Gading Mas', '$2y$10$o0oiT1g0NmaGJPrZKaDe4etmJtzxU1DzIud9meVs5iHviFX/epOgq', 1, 1, 1657681490),
(2, 'M. Firas Akbar', 'firasakbar4@gmail.com', 'Laki-laki', '3215102365623654', '089965632165', 'Perumanas Telukjambe', '$2y$10$hqPdRq1APvtpXoV59zT82uGzQrS2yWee1I7ISKGWN5frvtQ3pS3UC', 2, 1, 1657681618),
(3, 'Nawa Hayu M.R', 'nawa.hayu@gmail.com', 'Perempuan', '3251501320216335', '086565323616', 'Jatisari', '$2y$10$AWem/fWLksKqtVXuvCBqQ.H2/USphXXAvMAafV5K3O/BdOaSJxnAW', 2, 1, 1657681712);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `reporting`
--
ALTER TABLE `reporting`
  ADD PRIMARY KEY (`id_aduan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reporting`
--
ALTER TABLE `reporting`
  MODIFY `id_aduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
