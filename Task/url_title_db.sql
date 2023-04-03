-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 03:21 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `url_title`
--

CREATE TABLE `url_title` (
  `srno` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url_title`
--

INSERT INTO `url_title` (`srno`, `url`, `title`, `tstamp`) VALUES
(1, 'https://www.google.com/', 'Google', '2023-04-03 18:50:12'),
(2, 'https://www.youtube.com/', 'YouTube', '2023-04-03 18:50:25'),
(3, 'https://www.google.com/search?q=whatsapp&rlz=1C1CHWL_enIN1028IN1028&oq=whatsapp&aqs=chrome..69i57j0i67i131i433i650j0i131i433i512l5j0i512j0i131i433i512.2975j0j15&sourceid=chrome&ie=UTF-8', 'whatsapp - Google Search', '2023-04-03 18:50:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url_title`
--
ALTER TABLE `url_title`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url_title`
--
ALTER TABLE `url_title`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
