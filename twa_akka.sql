-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 05:46 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twa_akka`
--

-- --------------------------------------------------------

--
-- Table structure for table `Twa_akka_admin_registrations`
--

CREATE TABLE `Twa_akka_admin_registrations` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Twa_akka_admin_registrations`
--

INSERT INTO `Twa_akka_admin_registrations` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'ad@twa_akka.com', '987654');

-- --------------------------------------------------------

--
-- Table structure for table `Twa_akka_category`
--

CREATE TABLE `Twa_akka_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Twa_akka_category`
--

INSERT INTO `Twa_akka_category` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Titaura', '240313115455.jpg'),
(2, 'Aachar', '240313114702.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Twa_akka_orders`
--

CREATE TABLE `Twa_akka_orders` (
  `orders_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `transaction_id` VARCHAR(255)NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Twa_akka_orders`
--

INSERT INTO `Twa_akka_orders` (`orders_id`, `users_id`,`delivery_date`, `payment_method`, `total_amount`,`transaction_id`) VALUES
(1, 2,'2020-08-09', 'Khalti', '1000','Pmo57mAytEWCXHz9wrzbeD');

-- --------------------------------------------------------

--


--
-- Table structure for table `Twa_akka_product`
--

CREATE TABLE `Twa_akka_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Twa_akka_product`
--

INSERT INTO `Twa_akka_product` (`product_id`, `product_name`, `product_category`, `product_price`, `product_description`, `product_image`) VALUES
(1, 'Aap ko Aachar', 9, '150', 'Aaap' , '2403131147500.jpg'),
(2, 'Mula ko Aachar', 9, '150', 'Mula', '2403131148210.jpg'),
(3, 'Lapsi ko titaura', 8, '150', 'lapsi', '2403131148530.jpg'),
(4, 'Sukkha Aap ko titaura', 8, '150', 'Sukkha aap ko', '2403131149380.jpg'),
(5, 'Tama Ka aachar', 9, '150', 'Tama',  '2403131242250.jpg'),
(6, 'Lapsi ko Aachar', 9, '150', 'lapsi', '2403131248090.jpg'),	
(7, 'Cauli ko Aachar', 9, '150', 'Cauli', '2403131248430.jpg'),
(8, 'Khurasi ko Aachar', 9, '150', 'Chilly', '2403131249270.jpg'),
(9, 'Aap ko Jhol Titaura', 8, '150', 'Aap ko jhol', '2403131254080.jpg'),
(10, 'Mixed Aachar', 9, '150', 'Mixed', '2403130102210.jpg'),
(11, 'Chicken ko Aachar', 9, '150', 'Chicken', '2403130103170.jpg');


-- --------------------------------------------------------
-- Table structure for table `Twa_akka_orders_detail`
--

CREATE TABLE `Twa_akka_orders_detail` (
  `orders_detail_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int (11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `Twa_akka_orders_detail`
--

INSERT INTO `Twa_akka_orders_detail` (`orders_detail_id`, `orders_id`, `product_id`, `product_name`, `quantity`) VALUES
(1, 1, 1, 'Aap ko achar', 1),
(2, 1, 3, 'lapsi ko titaura', 2);


-- --------------------------------------------------------

--
-- Table structure for table `Twa_akka_users_registrations`
--

CREATE TABLE `Twa_akka_users_registrations` (
  `users_id` int(11) NOT NULL,
  `users_username` varchar(100) NOT NULL,
  `users_email` varchar(150) NOT NULL,
  `users_password` varchar(100) NOT NULL,
  `users_mobile` varchar(50) NOT NULL,
  `users_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Twa_akka_users_registrations`
--

INSERT INTO `Twa_akka_users_registrations` (`users_id`, `users_username`, `users_email`, `users_password`, `users_mobile`, `users_address`) VALUES
(1, 'Prerana', 'prerana@gmail.com', '1234567', '2147483647', 'Ktm'),
(2, 'Priyanka', 'priyanka@gmail.com', '147258', '9876543210', 'Ktm');

--

-- Indexes for dumped tables
--

--
-- Indexes for table `Twa_akka_admin_registrations`
--
ALTER TABLE `Twa_akka_admin_registrations`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `Twa_akka_category`
--
ALTER TABLE `Twa_akka_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `Twa_akka_orders`
--
ALTER TABLE `Twa_akka_orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `Twa_akka_orders_detail`
--
ALTER TABLE `Twa_akka_orders_detail`
  ADD PRIMARY KEY (`orders_detail_id`);

--
-- Indexes for table `Twa_akka_product`
--
ALTER TABLE `Twa_akka_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `Twa_akka_users_registrations`
--
ALTER TABLE `Twa_akka_users_registrations`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Twa_akka_admin_registrations`
--
ALTER TABLE `Twa_akka_admin_registrations`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Twa_akka_category`
--
ALTER TABLE `Twa_akka_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Twa_akka_orders`
--
ALTER TABLE `Twa_akka_orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Twa_akka_orders_detail`
--
ALTER TABLE `Twa_akka_orders_detail`
  MODIFY `orders_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Twa_akka_product`
--
ALTER TABLE `Twa_akka_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Twa_akka_users_registrations`
--
ALTER TABLE `Twa_akka_users_registrations`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
