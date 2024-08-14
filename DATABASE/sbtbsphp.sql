-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 06:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbtbsphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `routee` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_cont` varchar(255) NOT NULL,
  `bus` varchar(255) NOT NULL,
  `route_no` varchar(255) NOT NULL,
  `seat_no` varchar(255) NOT NULL,
  `cost_no` varchar(255) NOT NULL,
  `dep_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`routee`, `cust_name`, `cust_cont`, `bus`, `route_no`, `seat_no`, `cost_no`, `dep_no`) VALUES
(0, 'Stano B', '0759856009', 'KAW122W', 'NAIROBI,MOMBASA', '19', '40', '2024-03-28'),
(0, 'Stano B', '0759856009', 'KAS123M', 'C,D', '14, 15', '110', '2024-03-30'),
(0, 'Felix Ongeri', '0713452675', 'KAS888S', 'KISUMU,NAIROBI', '8, 7, 6', '6000', '2024-03-31'),
(0, 'Felix Ongeri', '0713452675', 'KAS888S', 'KISUMU,NAIROBI', '10', '2000', '2024-03-31'),
(0, 'Felix Ongeri', '0713452675', 'KAS888S', 'KISUMU,NAIROBI', '10', '2000', '2024-03-31'),
(0, 'Stano B', '0759856009', 'KAS123M', 'C,D', '14, 15', '110', '2024-03-30'),
(0, 'Stano B', '0759856009', 'KAS123M', 'C,D', '14, 15', '110', '2024-03-30'),
(0, 'Stano B', '0759856009', 'KAS123M', 'C,D', '14, 15', '110', '2024-03-30'),
(0, 'Stano B', '0759856009', 'KAS123M', 'C,D', '14, 15', '110', '2024-03-30'),
(0, 'Stano B', '0759856009', 'KAS234H', 'A,B', '18', '56', '2024-03-29'),
(0, 'Stano B', '0759856009', 'Kav134M', 'NAIROBI,MOMBASA', '9', '40', '2024-03-28'),
(0, 'Stano B', '0759856009', 'KAS123M', 'C,D', '14, 15', '110', '2024-03-30'),
(0, 'Max Maxi', '0712345654', 'KAS123M', 'C,D', '9, 10', '110', '2024-03-30'),
(0, 'Felix Ongeri', '0713452675', 'KAS888S', 'KISUMU,NAIROBI', '16, 15, 17', '6000', '2024-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(100) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `customer_route` varchar(200) NOT NULL,
  `booked_amount` int(100) NOT NULL,
  `booked_seat` varchar(100) NOT NULL,
  `booking_created` datetime NOT NULL DEFAULT current_timestamp(),
  `paid` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_id`, `customer_id`, `route_id`, `customer_route`, `booked_amount`, `booked_seat`, `booking_created`, `paid`) VALUES
(223, 'BK65f9c301', 'CUST-7286953', 'RT-6575766', 'C,D', 110, '9, 10', '2024-03-19 09:53:21', 0),
(240, 'BK65fc15e2', 'CUST-9721349', 'RT-4760962', 'NAIROBI,MOMBASA', 40, '28', '2024-03-21 04:11:30', 0),
(351, 'BK660032db', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '19', '2024-03-24 07:04:11', 0),
(434, 'BK6602cfc6', 'CUST-4748360', 'RT-4154375', 'KISUMU,NAIROBI', 6000, '16, 15, 17', '2024-03-26 06:38:14', 0),
(435, 'BK6602e37b', 'CUST-4748360', 'RT-9854174', 'KISUMU,NAIROBI', 2000, '18', '2024-03-26 08:02:19', 0),
(436, 'BK6602e501', 'CUST-4748360', 'RT-4154375', 'KISUMU,NAIROBI', 2000, '20', '2024-03-26 08:08:49', 0),
(438, 'BK6602ed17', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '20', '2024-03-26 08:43:19', 0),
(439, 'BK6602ef41', 'CUST-9721349', 'RT-9854174', 'KISUMU,NAIROBI', 4000, '19, 20', '2024-03-26 08:52:33', 0),
(440, 'BK6602ef5f', 'CUST-9721349', 'RT-4154375', 'KISUMU,NAIROBI', 4000, '9, 10', '2024-03-26 08:53:03', 0),
(441, 'BK66033f6a', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 80, '8, 7', '2024-03-26 14:34:34', 0),
(442, 'BK66038f52', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:15:30', 0),
(443, 'BK6603917f', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:24:47', 0),
(444, 'BK66039242', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:28:02', 0),
(445, 'BK660392d9', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:30:33', 0),
(446, 'BK66039307', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:31:19', 0),
(447, 'BK66039454', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:36:52', 0),
(448, 'BK6603947e', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:37:34', 0),
(449, 'BK66039515', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:40:05', 0),
(450, 'BK66039523', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:40:19', 0),
(451, 'BK6603954c', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:41:00', 0),
(452, 'BK660395b7', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:42:47', 0),
(453, 'BK66039609', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:44:09', 0),
(454, 'BK66039686', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:46:14', 0),
(455, 'BK66039753', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:49:39', 0),
(456, 'BK660397db', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:51:55', 0),
(457, 'BK660398c9', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:55:53', 0),
(458, 'BK660398f0', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:56:32', 0),
(459, 'BK66039934', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:57:40', 0),
(460, 'BK66039943', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:57:55', 0),
(461, 'BK6603994f', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 20:58:07', 0),
(462, 'BK660399e3', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:00:35', 0),
(463, 'BK660399ec', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:00:44', 0),
(464, 'BK66039a2d', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:01:49', 0),
(465, 'BK66039a9c', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:03:40', 0),
(466, 'BK66039baa', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:08:10', 0),
(467, 'BK66039bfc', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:09:32', 0),
(468, 'BK66039cc0', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:12:48', 0),
(469, 'BK66039d5a', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:15:22', 0),
(470, 'BK66039e5a', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:19:38', 0),
(471, 'BK66039e75', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:20:05', 0),
(472, 'BK66039f7a', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:24:26', 0),
(473, 'BK66039f8c', 'CUST-9721349', 'RT-8959969', 'NAIROBI,MOMBASA', 40, '10', '2024-03-26 21:24:44', 0),
(474, 'BK6603d1dd', 'CUST-9721349', 'RT-4760962', 'NAIROBI,MOMBASA', 40, '19', '2024-03-27 00:59:25', 0),
(475, 'BK6603d381', 'CUST-9721349', 'RT-4760962', 'NAIROBI,MOMBASA', 40, '19', '2024-03-27 01:06:25', 0),
(476, 'BK6603d39a', 'CUST-9721349', 'RT-4760962', 'NAIROBI,MOMBASA', 40, '19', '2024-03-27 01:06:50', 0),
(477, 'BK6603d3dd', 'CUST-9721349', 'RT-4760962', 'NAIROBI,MOMBASA', 40, '19', '2024-03-27 01:07:57', 0),
(478, 'BK6603da43', 'CUST-5202961', 'RT-4760962', 'NAIROBI,MOMBASA', 160, '1, 2, 3, 4', '2024-03-27 01:35:15', 0),
(479, 'BK6603da92', 'CUST-5202961', 'RT-4760962', 'NAIROBI,MOMBASA', 80, '15, 14', '2024-03-27 01:36:34', 0),
(480, 'BK6603dad8', 'CUST-5202961', 'RT-4760962', 'NAIROBI,MOMBASA', 80, '15, 14', '2024-03-27 01:37:44', 0),
(481, 'BK6603dafc', 'CUST-5202961', 'RT-4760962', 'NAIROBI,MOMBASA', 80, '15, 14', '2024-03-27 01:38:20', 0),
(482, 'BK6603db5b', 'CUST-5202961', 'RT-6575766', 'C,D', 110, '7, 6', '2024-03-27 01:39:55', 0),
(483, 'BK6603f173', 'CUST-9721349', 'RT-4760962', 'NAIROBI,MOMBASA', 80, '7, 8', '2024-03-27 03:14:11', 0),
(484, 'BK6603f195', 'CUST-9721349', 'RT-4760962', 'NAIROBI,MOMBASA', 80, '7, 8', '2024-03-27 03:14:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(100) NOT NULL,
  `bus_no` varchar(255) NOT NULL,
  `engine_no` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `bus_assigned` tinyint(1) NOT NULL DEFAULT 0,
  `bus_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_no`, `engine_no`, `model`, `bus_assigned`, `bus_created`) VALUES
(56, 'KAS122Y', 'VC10338', 'nissan: single-decker-bus', 0, '2024-03-22 12:30:51'),
(57, 'KAX168M', 'VC19338', 'Toyota:Low-Floor Bus', 0, '2024-03-22 12:33:29'),
(58, 'KAV564J', 'XC19338', 'Subaru: Minibus', 1, '2024-03-22 12:35:23'),
(59, 'KAS123E', 'VC10339', 'Toyota:Low-Floor Bus', 0, '2024-03-26 02:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(100) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `customer_mail` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `customer_name`, `customer_phone`, `customer_mail`, `password`, `customer_created`) VALUES
(49, 'CUST-9721349', 'Stano B', '0759856009', 'stano@gmail.com', '098', '2024-03-07 03:50:54'),
(50, 'CUST-3032950', 'Wilson Gitau', '0716116152', 'willy@gmail.com', '097', '2024-03-08 08:38:35'),
(51, 'CUST-9314451', 'Isaac Kyalo', '0786543456', 'isaac@gmail.com', '055', '2024-03-13 07:27:47'),
(52, 'CUST-4666452', 'Milly Wambo', '0724356765', 'work@gmail', '123456', '2024-03-14 01:44:32'),
(53, 'CUST-7286953', 'Max Maxi', '0712345654', 'max@gmail.com', '096', '2024-03-19 09:11:53'),
(54, 'CUST-5390454', 'Ivy Njeri', '0714657657', 'stan@gmail.com', '0988', '2024-03-22 16:59:24'),
(55, 'CUST-3972755', 'df ass', '0718796796', 'nan@gmail.com', '09', '2024-03-23 02:31:54'),
(56, 'CUST-5748956', 'fdd sss', '0718796756', 'ha@gmail.com', '555', '2024-03-23 02:36:10'),
(60, 'CUST-4748360', 'Felix Ongeri', '0713452675', 'fel@gmail.com', 'Alchemy101%%', '2024-03-26 03:36:50'),
(61, 'CUST-5202961', 'Susan Faith', '0712296370', 'susan@gmail.com', 'Alchemy101##', '2024-03-27 01:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(100) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `bus_no` varchar(155) NOT NULL,
  `route_cities` varchar(255) NOT NULL,
  `route_dep_date` date NOT NULL,
  `route_dep_time` time NOT NULL,
  `route_step_cost` int(100) NOT NULL,
  `route_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `route_id`, `bus_no`, `route_cities`, `route_dep_date`, `route_dep_time`, `route_step_cost`, `route_created`) VALUES
(62, 'RT-4760962', 'Kav134M', 'NAIROBI,MOMBASA', '2024-03-28', '14:30:00', 40, '2024-03-08 05:42:50'),
(65, 'RT-7390465', 'KAS234H', 'A,B', '2024-03-29', '03:40:00', 56, '2024-03-11 11:40:56'),
(66, 'RT-6575766', 'KAS123M', 'C,D', '2024-03-30', '09:20:00', 55, '2024-03-16 09:16:11'),
(69, 'RT-8959969', 'KAW122W', 'NAIROBI,MOMBASA', '2024-03-28', '10:18:00', 40, '2024-03-22 10:13:53'),
(70, 'RT-6227070', 'KAW122W', 'NAIROBI,MOMBASA', '2024-04-04', '05:25:00', 46, '2024-03-23 05:19:04'),
(71, 'RT-4072471', 'KAW122W', 'NAIROBI,MOMBASA', '2024-04-05', '05:23:00', 46, '2024-03-23 05:19:31'),
(72, 'RT-457872', 'KAW122W', 'NAIROBI,MOMBASA', '2024-04-06', '05:25:00', 40, '2024-03-23 05:19:51'),
(73, 'RT-1212773', 'KAV453', 'C,D', '2024-04-05', '12:36:00', 820, '2024-03-23 12:33:08'),
(74, 'RT-9854174', 'KAS999S', 'KISUMU,NAIROBI', '2024-03-31', '08:30:00', 2000, '2024-03-26 03:33:00'),
(75, 'RT-4154375', 'KAS888S', 'KISUMU,NAIROBI', '2024-03-31', '09:40:00', 2000, '2024-03-26 03:40:51'),
(76, 'RT-3247676', 'KAV234V', 'KISUMU,NAIROBI', '2024-04-01', '02:01:00', 600, '2024-03-26 09:01:39'),
(77, 'RT-7678377', 'KAS888S', 'KISUMU,NAIROBI', '2024-04-01', '09:00:00', 2000, '2024-03-26 09:03:13'),
(78, 'RT-2013178', 'KAD123D', 'NAKURU,NAIROBI', '2024-03-27', '14:30:00', 500, '2024-03-26 14:22:17'),
(79, 'RT-8782679', 'KAS233H', 'NAIROBI,MOMBASA', '2024-03-29', '14:00:00', 500, '2024-03-27 00:42:42'),
(80, 'RT-2812580', 'KAW122W', 'NAIROBI,MOMBASA', '2024-03-30', '14:50:00', 500, '2024-03-27 00:44:41'),
(81, 'RT-672381', 'KAV564J', 'MOMBASA,NAIROBI', '2024-04-02', '13:45:00', 1500, '2024-03-27 01:46:01'),
(82, 'RT-5049882', 'KAS888S', 'NAIROBI,MOMBASA', '2024-03-29', '06:10:00', 800, '2024-03-27 03:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `bus_no` varchar(155) NOT NULL,
  `seat_booked` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`bus_no`, `seat_booked`) VALUES
('ABC0010', NULL),
('BCC9999', NULL),
('KAS122W', NULL),
('KAS123E', NULL),
('KAV564J', NULL),
('KAX168M', NULL),
('MMM9969', '2,15,6,18,12'),
('MVL1000', '3,5,22'),
('NBS4455', NULL),
('RDH4255', '15'),
('SSX6633', NULL),
('TTH8888', NULL),
('XYZ7890', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `MerchantRequestID` varchar(255) NOT NULL,
  `CheckoutRequestID` varchar(255) NOT NULL,
  `ResultCode` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `MpesaReceiptNumber` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`MerchantRequestID`, `CheckoutRequestID`, `ResultCode`, `Amount`, `MpesaReceiptNumber`, `PhoneNumber`) VALUES
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('29115-34620561-1', 'ws_CO_191220191020363925', '0', '1', 'NLJ7RT61SV', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_name`, `user_password`, `user_created`) VALUES
(1, 'Ivy Goko', 'ivy', '$2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6', '2021-06-02 13:55:21'),
(2, 'Test Admin', 'testadmin', '$2y$10$A2eGOu1K1TSBqMwjrEJZg.lgy.FmCUPl/l5ugcYOXv4qKWkFEwcqS', '2021-10-17 21:10:07'),
(6, 'Joan Njeri', 'joa', '$2y$10$pMuoZN1JR4O4OSWbwBgqwuHpRnZPF7BRpS5SpezVZ5EFyte5KQK0G', '2024-03-11 12:36:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`bus_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
