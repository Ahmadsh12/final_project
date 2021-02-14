-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 04:42 AM
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
-- Database: `ecs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_vendors`
--

CREATE TABLE `accepted_vendors` (
  `av_id` int(11) NOT NULL,
  `av_name` text NOT NULL,
  `av_email` text NOT NULL,
  `av_pass` text NOT NULL,
  `av_mobile` int(11) NOT NULL,
  `av_comname` text NOT NULL,
  `av_image` text NOT NULL,
  `av_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accepted_vendors`
--

INSERT INTO `accepted_vendors` (`av_id`, `av_name`, `av_email`, `av_pass`, `av_mobile`, `av_comname`, `av_image`, `av_desc`) VALUES
(37, 'Ahmad sholy', 'ahmad@gmail.com', 'A321', 795762203, 'Apple', 'download.png', 'Apple Inc is an American multinational technology company headquartered in Cupertino California that designs develops and sells consumer electronics computer software and online services'),
(38, 'Yazeed', 'yazeed@gmail.com', 'A123', 795762138, 'Amazon', 'download (1).png', 'Amazon is an American multinational technology company based in Seattle  Washington  which focuses on e commerce cloud computing digital streaming and artificial intelligence'),
(41, 'Muhanad', 'Muhanad@gmail.com', 'A123', 795762138, 'zara', 'z.jpg', 'Zara SA stylized as ZARA is a Spanish apparel retailer based in Arteixo in Galicia Spain The company specializes in fast fashion and products include clothing accessories shoes swimwear beauty and perfumes It is the largest company in the Inditex group the world s largest apparel retailer');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `full_name`) VALUES
(21, 'ahmad@gmail.co', 'abcd123', 'Ahmad sholy');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_image`) VALUES
(25, 'Smart home', 'Welcome to the Smart Home store  where home automation meets great prices', '5.jpg'),
(27, 'Electronics', 'Computer & games', '8.png'),
(28, 'Clothes ', 'Shop clothing shoes watches accessories and more', '9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(3) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_password` varchar(50) NOT NULL,
  `cust_mobile` int(10) NOT NULL,
  `cust_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_password`, `cust_mobile`, `cust_address`) VALUES
(11, 'ahmad', 'slam@gmail.com', 'A987', 795864328, '39,Rafiq al-Tamimi');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(9) NOT NULL,
  `order_date` date NOT NULL,
  `cust_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `cust_id`) VALUES
(40, '2021-02-10', 11);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(3) NOT NULL,
  `order_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `product_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `product_qty`) VALUES
(36, 40, 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(3) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_price` double NOT NULL,
  `pro_image` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `av_id` int(11) NOT NULL,
  `pro_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_desc`, `pro_price`, `pro_image`, `cat_id`, `av_id`, `pro_qty`) VALUES
(98, 'iPhone 12 ', 'the best', 829, 'iphone-12-family-select-2020.jpg', 27, 37, 121),
(99, 'Echo Dot ( 4th Gen )', 'This bundle contains Echo Dot (4th Gen) and Sengled Bluetooth bulb Automate your home set up with Sengled and Alexa  use your voice to control your lights', 60, '61tniQTsePL._AC_SX679_.jpg', 25, 38, 300),
(109, 'Jacket', 'the new designs their always trend conscious designers are delivering a sophisticated men s attire in many occasions bordering on the formal informal note Colour tones go from the very present white to sand colours with the touch of red and navy of course combined with the inevitable striped tshirt', 300, '99.jpg', 28, 41, 14),
(111, 'Jacket', 'This zara leather jacket is heavy quality', 399, 'product-jpeg-500x500.png', 28, 41, 12),
(113, 'Jacket', 'Zara design Men s Jacket Winter new thickening leisure young men s Korean version of handsome leather Free Belt', 199, 'zara-design-men-jacket-500x500.png', 28, 41, 10),
(115, 'Smart Plug', 'Smart Plug Gosund Smart WiFi Outlet Works with Alexa and Google Home', 25, '617bTlmaCsL._AC_SL1500_ (1).png', 25, 38, 122),
(116, 'Smart Alexa Light Bulb', 'Smart Alexa Light Bulb 75W Equivalent E26 8W Upgraded Gosund Led WiFi Bulb A19 Dimmable Works with Amazon Echo Google Home', 30, '61YYS0GKUOL._AC_SL1500_.png', 25, 38, 113);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `ven_id` int(11) NOT NULL,
  `ven_name` text NOT NULL,
  `ven_email` text NOT NULL,
  `ven_password` text NOT NULL,
  `ven_mobile` int(11) NOT NULL,
  `ven_comname` text NOT NULL,
  `ven_image` text NOT NULL,
  `ven_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_vendors`
--
ALTER TABLE `accepted_vendors`
  ADD PRIMARY KEY (`av_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`) USING BTREE;

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `av_id` (`av_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`ven_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_vendors`
--
ALTER TABLE `accepted_vendors`
  MODIFY `av_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `ven_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`av_id`) REFERENCES `accepted_vendors` (`av_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
