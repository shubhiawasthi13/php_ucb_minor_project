-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 02:52 PM
-- Server version: 11.5.2-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `sponsorid` varchar(10) NOT NULL,
  `mobileno` bigint(10) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `mtype` varchar(100) DEFAULT 'A.B.M',
  `mrole` varchar(10) NOT NULL,
  `mstatus` varchar(10) NOT NULL DEFAULT 'Active',
  `password` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `caddress` varchar(255) DEFAULT NULL,
  `panno` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `amobileno` bigint(10) DEFAULT NULL,
  `pic` varchar(255) DEFAULT '../Userpic/notavailable.png',
  `gender` varchar(10) DEFAULT NULL,
  `pcom` bigint(10) DEFAULT 0,
  `grade` varchar(100) NOT NULL,
  `cerstatus` int(2) NOT NULL,
  `proup` int(2) NOT NULL,
  `cdate` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `userid`, `sponsorid`, `mobileno`, `emailid`, `mtype`, `mrole`, `mstatus`, `password`, `fname`, `dob`, `address`, `caddress`, `panno`, `education`, `amobileno`, `pic`, `gender`, `pcom`, `grade`, `cerstatus`, `proup`, `cdate`, `branch`, `regdate`) VALUES
(43, 'SITE_ADMIN', 1022, '1001', 9336505051, 'test@gmail.com', 'CCC', 'Admin', 'Active', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../Userpic/notavailable.png', NULL, 0, 'A+', 1, 0, '', '', '2024-04-26 09:14:42'),
(0, 'aman', 1023, '1001', 1233445566, 'aman@gmail.com', 'A.B.M', 'User', 'Active', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../Userpic/notavailable.png', NULL, 0, '', 0, 0, '', '', '2024-12-11 19:13:56'),
(0, 'vinay', 1024, '1001', 9090899090, 'vinay@gmail.com', 'A.B.M', 'User', 'Active', 'caf1a3dfb505ffed0d024130f58c5cfa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../Userpic/notavailable.png', NULL, 0, '', 0, 0, '', '', '2024-12-11 19:17:58'),
(0, 'kratika', 1025, '1001', 4455445533, 'kratika@gmail.com', 'A.B.M', 'User', 'Active', '024d7f84fff11dd7e8d9c510137a2381', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../Userpic/notavailable.png', NULL, 0, '', 0, 0, '', '', '2024-12-11 19:20:44'),
(0, 'Riya', 1026, '1001', 1233213344, 'Riya@gmail.com', 'A.B.M', 'User', 'Active', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../Userpic/notavailable.png', NULL, 0, '', 0, 0, '', '', '2024-12-11 19:25:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
