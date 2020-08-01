-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 02:39 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `url_shrink`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `user_from` varchar(100) NOT NULL DEFAULT 'visitor',
  `user_id` varchar(100) NOT NULL,
  `main_url` text NOT NULL,
  `token_keys` text NOT NULL,
  `url_expire` datetime NOT NULL DEFAULT current_timestamp(),
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `user_from`, `user_id`, `main_url`, `token_keys`, `url_expire`, `creation_date`) VALUES
(61, 'visitor', '7cbt5ag2vjm9m29fu638fn984c', 'https://www.youtube.com/watch?v=1pbAV6AU99I', '2eb4a8', '2020-07-07 19:26:31', '2020-07-07 00:19:11'),
(62, 'visitor', '7cbt5ag2vjm9m29fu638fn984c', 'file:///C:/Users/Rasel-Developer/Downloads/_htaccess%20For%20All%20%E2%80%94%20SitePoint.pdf', '2b15cf', '2020-07-07 19:26:31', '2020-07-07 00:34:07'),
(63, 'visitor', 'vth536qai4ee5e85t27nrhvbir', 'https://www.google.com/search?q=sublime+light+theme&ie=utf-8', 'b0aac2', '2020-07-07 19:26:31', '2020-07-07 17:27:10'),
(64, 'visitor', 'ck3kcefgmi44r040e6521j1gic', 'dadds', 'ad0fdb', '2020-08-01 18:30:00', '2020-08-01 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `url_clicked`
--

CREATE TABLE `url_clicked` (
  `id` int(11) NOT NULL,
  `url_id` varchar(100) NOT NULL,
  `user_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url_clicked`
--

INSERT INTO `url_clicked` (`id`, `url_id`, `user_session`) VALUES
(2, '2eb4a8', 'o65j9gf8d562muklibv5jj1mal'),
(3, '2eb4a8', 'g2d0c5mlihee7ia3304o4johsq'),
(4, '2eb4a8', 'g2d0c5mlihee7ia3304o4johsq'),
(5, '2eb4a8', 'g2d0c5mlihee7ia3304o4johsq'),
(6, '2eb4a8', '80u6pp2b6kjqjli8mtbgs1qiai'),
(7, 'b0aac2', '2p7udsmp4k7aml9phaqco96nh4'),
(8, 'b0aac2', '6s9pba3hg9r9nfg004gf229os3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `pass_str` varchar(255) NOT NULL,
  `balance` double(10,2) NOT NULL DEFAULT 0.00,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `activation` int(1) NOT NULL COMMENT '0=active,1=deactive,2=disabled',
  `u_hash` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `url_clicked`
--
ALTER TABLE `url_clicked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `url_clicked`
--
ALTER TABLE `url_clicked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
