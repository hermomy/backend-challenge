-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 06:52 PM
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
-- Database: `hermo_backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `stock_items_id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `starting_inventory` int(11) NOT NULL,
  `location_tagging` varchar(50) NOT NULL,
  `inventory_received` int(11) NOT NULL,
  `inventory_shipped` int(11) DEFAULT NULL,
  `inventory_on_hand` int(11) DEFAULT NULL,
  `status_product` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `stock_items_id`, `items_id`, `category`, `starting_inventory`, `location_tagging`, `inventory_received`, `inventory_shipped`, `inventory_on_hand`, `status_product`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'MAKEUP FOUNDATION', 0, 'Blok3', 142, 2, 140, 'Register Product', '2019-04-28 19:55:21', '2019-04-24 08:11:20'),
(2, 2, 6, 'COLLAGEN', 0, 'Blok2', 40, 5, 35, 'Register Product', '2019-04-28 18:17:18', '2019-04-24 08:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `stock_items_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status_inventory` varchar(50) DEFAULT NULL,
  `quantity_received` int(11) DEFAULT NULL,
  `cost` varchar(50) NOT NULL,
  `purchaseorder_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `stock_items_id`, `quantity`, `status_inventory`, `quantity_received`, `cost`, `purchaseorder_id`, `created_at`, `updated_at`) VALUES
(5, 1, 142, 'Register Inventory', 142, '11218', 1, '2019-04-24 16:11:20', '2019-04-23 22:44:13'),
(6, 2, 40, 'Register Inventory', 40, '7200', 1, '2019-04-24 16:12:41', '2019-04-23 22:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_04_21_124701_create_purchase_orders', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` varchar(50) DEFAULT NULL,
  `vouchar_code` varchar(25) NOT NULL,
  `delivery_to` text NOT NULL,
  `discaunt` varchar(100) NOT NULL,
  `grand_total` varchar(50) NOT NULL,
  `status_payment` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `products_id`, `users_id`, `order_number`, `unit_price`, `quantity`, `total_price`, `vouchar_code`, `delivery_to`, `discaunt`, `grand_total`, `status_payment`, `created_at`, `updated_at`) VALUES
(4, 2, 2, 'ORD-000001', '120.00', 5, '600', '20FORME', 'NO 10 , JALAN SETIA 5/4, TAMAN SETIA INDAH , 81100 JOHOR BAHRU', '120', '480', 'PAID', '2019-04-28 10:17:18', '2019-04-28 10:17:18'),
(5, 3, 2, 'ORD-000002', '60.00', 2, '120', '20FORME', 'NO 10 , JALAN SETIA 5/4, TAMAN SETIA INDAH , 81100 JOHOR BAHRU', '24', '96', 'PAID', '2019-04-28 11:55:21', '2019-04-28 11:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `name_on_website` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `cost_description` text NOT NULL,
  `picture_one` varchar(255) NOT NULL,
  `picture_two` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `available_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `inventory_id`, `name_on_website`, `price`, `cost`, `cost_description`, `picture_one`, `picture_two`, `status`, `quantity`, `available_quantity`, `created_at`, `updated_at`) VALUES
(2, 2, 'AURA', '120.00', '20.00', 'Cost 20.00 is for advertising', 'aura_one.jpg', 'aura_two.jpg', 'ON_SALE', 40, NULL, '2019-04-25 08:28:13', '2019-04-25 08:28:13'),
(3, 1, 'OKAYA', '60.00', '10.00', 'Advertising this \"OKAYA\"', 'okaya_one.jpg', 'okaya_two.jpg', 'ON_SALE', 142, NULL, '2019-04-25 08:31:01', '2019-04-25 08:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `start_period` date NOT NULL,
  `end_period` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `name`, `code`, `type`, `start_period`, `end_period`, `created_at`, `updated_at`) VALUES
(1, '20% Discount voucher', '20FORME', 'Vouchar', '2019-04-28', '2019-05-28', '2019-04-28 14:08:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE `purchaseorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requestor_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `po_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) DEFAULT NULL,
  `po_Date` datetime DEFAULT NULL,
  `order_Date` datetime DEFAULT NULL,
  `receive_Date` datetime DEFAULT NULL,
  `status_fufilment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credict_terms` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchaseorders`
--

INSERT INTO `purchaseorders` (`id`, `requestor_id`, `vendor_id`, `po_number`, `po_description`, `comments`, `cost`, `po_Date`, `order_Date`, `receive_Date`, `status_fufilment`, `status`, `credict_terms`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'PO201904231', 'test airie', 'test airie2', 18418.00, '2019-04-23 00:00:00', '2019-04-23 00:00:00', '2019-04-30 00:00:00', 'paid', 'new', 1, '2019-04-22 21:29:59', '2019-04-22 21:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `requestor`
--

CREATE TABLE `requestor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestor`
--

INSERT INTO `requestor` (`id`, `name`) VALUES
(1, 'Hermo JB');

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

CREATE TABLE `stock_items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `skus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_items`
--

INSERT INTO `stock_items` (`id`, `name`, `description`, `category`, `price`, `skus`) VALUES
(1, 'OKAYA', 'OKAYA PERFECT LIQUID FOUNDATION MEDIUM (100% ORIGINAL HQ) - HOT SALE!!', 'MAKEUP FOUNDATION', '79.00', 'OK001'),
(2, 'AuraWhite Sparkle Diamond Ex Powder 1000g', '? 100% Dicipta KHAS Untuk Wanita Yang Inginkan Kulit Cerah & Gebu.\r\n\r\n?  Khas Pencerahan & Penggebuan Kulit.\r\n\r\n?  Sesuai Untuk Anda Berumur awal 20 tahun hingga berumur 50 tahun.\r\n\r\n?  Berfungsi untuk melambatkan proses penuaan & kurangkan kedutan & garis halus pada muka\r\n\r\n?  Disahkan Halal & Dikilangkan DI Kilang Yang Mempunyai Status GMP. Tiada bahan terlarang & selamat digunakan.', 'COLLAGEN', '180.00', 'AURA001'),
(5, 'DEEJA KOSMETIK 5IN1 (100% ORIGINAL)', 'DEJJA cosmetic is a good skin care', 'SKINCARE', '60.00', 'DE001');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`) VALUES
(1, 'Cash'),
(2, 'Credicts');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `password`, `department`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kumar', '', '1234', 'Fulfilment', NULL, NULL, NULL),
(2, 'amy', 'NO 10 , JALAN SETIA 5/4, TAMAN SETIA INDAH , 81100 JOHOR BAHRU', '1234', 'customers', NULL, NULL, NULL),
(3, 'angela', '', '1234', 'Procurement', NULL, NULL, NULL),
(4, 'junaidah', '', '1234', 'Analyst', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`) VALUES
(1, 'BookTalk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestor`
--
ALTER TABLE `requestor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_items`
--
ALTER TABLE `stock_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requestor`
--
ALTER TABLE `requestor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_items`
--
ALTER TABLE `stock_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
