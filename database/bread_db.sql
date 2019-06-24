-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2019 at 02:51 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bread_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `email_password` varchar(250) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_password`, `username`, `password`) VALUES
(2, 'Make Peace Admin', 'ejwpascual@gmail.com', 'DUIsx2nd', 'makepeace', '2aefc34200a294a3cc7db81b43a81873');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(9) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `account_name` varchar(250) NOT NULL,
  `account_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `bank`, `account_name`, `account_title`) VALUES
(1, 'BDO', 'Make Peace Bakery', '12391290321');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(60) NOT NULL,
  `createdby_id` int(11) DEFAULT NULL,
  `created_datetime` date DEFAULT NULL,
  `color_class` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `createdby_id`, `created_datetime`, `color_class`) VALUES
(1, 'Bread', NULL, NULL, 'badge-info'),
(2, 'Cakes', NULL, NULL, 'badge-success'),
(3, 'Cookies & Biscuits', NULL, NULL, 'badge-warning');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `body` text,
  `picture` text,
  `link_title` varchar(250) DEFAULT NULL,
  `link` text,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `title`, `body`, `picture`, `link_title`, `link`, `active`) VALUES
(1, 'The Make Peace Bakery', 'Our mission is to build lasting partnerships amongst communities in building their cooperative community bakery.', 'banner-1.png', 'View our mission', '', 1),
(2, 'Our Products', 'All Filipino Baking at its Finest!', 'banner-2.png', 'View our products', NULL, 1),
(3, 'Our Team', 'Founded by Yok and Anj Calungcaguin, both bakers and caterers by profession, saw an opportunity to help the out of school, at risk and underprivileged youth in the country, and together with their friends, family and interns they believed that it’s possible.', 'banner-3.png', 'View our team', NULL, 1),
(4, 'Extra Slot 1', 'Activate this to show in homepage slider!', 'default_bg.jpg', NULL, NULL, 0),
(5, 'Extra Slot 2', 'Activate this to show in homepage slider!', 'default_bg.jpg', NULL, NULL, 0),
(6, 'Extra Slot 3', 'Activate this to show in homepage slider!', 'default_bg.jpg', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(9) NOT NULL,
  `type` int(1) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `type`, `path`) VALUES
(1, 1, 'logo.jpg'),
(2, 2, 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` decimal(10,0) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `price` decimal(9,2) NOT NULL,
  `item` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `quantity`, `order_id`, `price`, `item`) VALUES
(1, 9, '2', 1, '120.00', 'Strawberry Cakers'),
(2, 11, '2', 1, '123.00', 'Back'),
(3, 9, '1', 2, '120.00', 'Strawberry Cakers'),
(4, 13, '3', 2, '1500.00', 'sample'),
(5, 9, '3', 3, '120.00', 'Strawberry Cake'),
(6, 10, '3', 3, '100.00', 'Pan de sal');

-- --------------------------------------------------------

--
-- Table structure for table `order_header`
--

CREATE TABLE `order_header` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `address` text NOT NULL,
  `order_status` int(1) NOT NULL DEFAULT '0',
  `created_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_header`
--

INSERT INTO `order_header` (`id`, `customer_name`, `contact_number`, `email_address`, `address`, `order_status`, `created_datetime`, `delivery_date`) VALUES
(1, 'Ej Pascual', '09567929023', 'ejwpascual@gmail.com', 'B5 L5 Mediterranean Heights Rodriguez Rizal', 1, '2019-06-22 14:54:33', '2019-06-28'),
(2, 'EJ Pascual', '09567929023', 'ejwpascual@gmail.com', 'B5 L5 Mediterranean Heights Rodriguez, Rizal', 2, '2019-06-22 16:58:56', NULL),
(3, 'ej pascual', '09567929023', 'ejwpascual@gmail.com', 'b5 lot 5', 1, '2019-06-22 22:33:59', '2019-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` tinytext NOT NULL,
  `pic` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(1) NOT NULL,
  `is_featured` int(1) NOT NULL DEFAULT '0',
  `createdby_id` int(11) DEFAULT NULL,
  `created_datetime` date DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `pic`, `price`, `category_id`, `is_featured`, `createdby_id`, `created_datetime`, `active`) VALUES
(1, 'Chocolate Cake', 'Cake made with rich chocolate cookie', '8.jpeg', '100.00', 2, 0, NULL, NULL, 1),
(9, 'Strawberry Cake', 'Cake made with rich strawberry fillings. So yummy!', 'Strawberry-Cake-1-720x720.jpg', '120.00', 1, 1, NULL, NULL, 1),
(10, 'Pan de sal', 'Tagalog ng verb', 'download.jpg', '100.00', 1, 1, NULL, NULL, 1),
(11, 'Back', 'qwe', 'sidebar_bg.jpg', '123.00', 1, 1, NULL, NULL, 1),
(12, 'Pandesal', 'Pandesal sa Umaga TAENANG INSERT YAN implement nyo nalang git felms para macentralized sana kaya nga eh hahah install muna ko atom. sige ready na ako omowi! SIGE SIGE BAMBIII SALAMATS!!!!', 'pande.jpg', '3.00', 3, 0, NULL, NULL, 1),
(13, 'sample', 'sample lang muna', 'sadw.jpg', '1500.00', 2, 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `revenue` decimal(10,2) DEFAULT NULL,
  `cost_product_sold` decimal(10,2) DEFAULT NULL,
  `gross_profit` decimal(10,2) DEFAULT NULL,
  `expenses` decimal(10,2) DEFAULT NULL,
  `net_income` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` text,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_header`
--
ALTER TABLE `order_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_header`
--
ALTER TABLE `order_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
