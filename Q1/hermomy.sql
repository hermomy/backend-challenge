-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 02:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hermomy`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysts`
--

CREATE TABLE `analysts` (
  `A_Id` int(5) NOT NULL,
  `A_Name` int(20) NOT NULL,
  `A_Address` int(20) NOT NULL,
  `O_Id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_Id` int(5) NOT NULL,
  `C_Name` varchar(20) NOT NULL,
  `C_City` varchar(20) NOT NULL,
  `C_Email` varchar(20) NOT NULL,
  `C_Address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_Id`, `C_Name`, `C_City`, `C_Email`, `C_Address`) VALUES
(1, 'hjhj', 'hjhj', 'jjhhj', 'jhhjjh'),
(2, 'fsf', 'kjkj', 'kjkjkj', 'kjkjkj'),
(3, 'kljkl', 'kklkl', 'kljkjlkl', 'klkljklj'),
(4, 'kjkj', 'kjkjkjl', 'kjlkjlkjlklj', 'klyuffyu'),
(5, 'hjhj', 'fcggfhj', 'hkkkj', 'ffcgg');

-- --------------------------------------------------------

--
-- Table structure for table `fulfillment_team`
--

CREATE TABLE `fulfillment_team` (
  `F_Id` int(5) NOT NULL,
  `F_Name` varchar(20) NOT NULL,
  `F_Address` varchar(20) NOT NULL,
  `F_Idendity` varchar(20) NOT NULL,
  `I_Id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fulfillment_team`
--

INSERT INTO `fulfillment_team` (`F_Id`, `F_Name`, `F_Address`, `F_Idendity`, `I_Id`) VALUES
(1, 'kjkjlkjl', 'jkjlklj', 'kjjkllk', 1),
(3, 'kjjkkj', 'jkjhj', 'kjkjkj', 3),
(5, 'klklkl', 'klkjlkjl', 'kjlkljjl', 5);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `P_Category` varchar(20) NOT NULL,
  `P_total` int(20) NOT NULL,
  `P_Left` int(20) NOT NULL,
  `I_id` int(11) NOT NULL,
  `P_Id` int(11) NOT NULL,
  `P_Barcode` varchar(20) NOT NULL,
  `P_location` varchar(255) NOT NULL,
  `P_sku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`P_Category`, `P_total`, `P_Left`, `I_id`, `P_Id`, `P_Barcode`, `P_location`, `P_sku`) VALUES
('small', 100, 100, 1, 1, 'product_one', 'johor', 'sku001'),
('medium', 100, 100, 3, 3, 'product_one', 'melaka', 'sku002'),
('large', 100, 100, 5, 5, 'product_three', 'selangor', 'sku003');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_Id` int(11) NOT NULL,
  `O_Id` int(11) NOT NULL,
  `P_Method` varchar(20) NOT NULL,
  `Ammount` int(20) NOT NULL,
  `Card_Name` varchar(20) NOT NULL,
  `Card_No` int(20) NOT NULL,
  `Expiration` varchar(20) NOT NULL,
  `CCV_Code` int(5) NOT NULL,
  `P_Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_Id`, `O_Id`, `P_Method`, `Ammount`, `Card_Name`, `Card_No`, `Expiration`, `CCV_Code`, `P_Status`) VALUES
(2, 8, 'cash', 50, 'ipin', 54546654, '65456', 654654, 'Paid'),
(3, 9, 'dfs', 45, 'lkjl', 654654, '65665', 6565, 'Paid'),
(4, 10, 'hjkkj', 89, 'jhhj', 3554, 'mnjmj', 26, 'Paid'),
(5, 11, 'jkkj', 89, 'jbjn', 206, 'bkjjh', 5, 'UnPaid'),
(6, 12, 'kjkj', 564, 'hjjhj', 553, 'kjjkjk', 5, 'UnPaid'),
(7, 13, 'kjhhj', 65654, 'kjhj', 55, 'bkjkjg', 6, 'UnPaid');

-- --------------------------------------------------------

--
-- Table structure for table `procurement_team`
--

CREATE TABLE `procurement_team` (
  `Pr_Id` int(5) NOT NULL,
  `Pr_Name` varchar(20) NOT NULL,
  `Pr_Address` varchar(20) NOT NULL,
  `P_Id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procurement_team`
--

INSERT INTO `procurement_team` (`Pr_Id`, `Pr_Name`, `Pr_Address`, `P_Id`) VALUES
(1, 'kjkjkjl', 'kjlkjlkjl', 1),
(2, 'kjkjlkjl', 'kljkjlkjlkjl', 2),
(3, 'jklkjl', 'klkljkjl', 3),
(4, 'klkjlkjl', 'kjjkkh', 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_Barcode` varchar(20) NOT NULL,
  `Image` varchar(20) NOT NULL,
  `Cost` int(5) NOT NULL,
  `Price` int(5) NOT NULL,
  `P_Onsale` varchar(10) NOT NULL,
  `P_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_Barcode`, `Image`, `Cost`, `Price`, `P_Onsale`, `P_id`) VALUES
('5454', '4545', 20, 30, 'yes', 1),
('4554', 'jhjhkhj', 30, 40, 'yes', 2),
('554', 'ghgh', 40, 50, 'yes', 3),
('4887', 'jhj', 54, 60, 'yes', 4),
('8756', 'ghhg', 45, 70, 'yes', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `O_Id` int(11) NOT NULL,
  `Order_Date` date NOT NULL,
  `C_Id` int(11) NOT NULL,
  `P_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`O_Id`, `Order_Date`, `C_Id`, `P_Id`) VALUES
(8, '2018-09-02', 1, 1),
(9, '2018-09-02', 1, 2),
(10, '2018-09-10', 2, 1),
(11, '2018-09-11', 2, 3),
(12, '2018-09-12', 2, 4),
(13, '2018-10-05', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_code`
--

CREATE TABLE `voucher_code` (
  `v_id` int(11) NOT NULL,
  `Payment_Id` int(11) NOT NULL,
  `Code_Name` varchar(20) NOT NULL,
  `Discount_Percentage` varchar(20) NOT NULL,
  `Expiry_Date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_code`
--

INSERT INTO `voucher_code` (`v_id`, `Payment_Id`, `Code_Name`, `Discount_Percentage`, `Expiry_Date`) VALUES
(1, 2, '20FORME', '20', '2018-10-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analysts`
--
ALTER TABLE `analysts`
  ADD PRIMARY KEY (`A_Id`),
  ADD KEY `O_Id` (`O_Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_Id`);

--
-- Indexes for table `fulfillment_team`
--
ALTER TABLE `fulfillment_team`
  ADD PRIMARY KEY (`F_Id`),
  ADD KEY `I_Id` (`I_Id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`I_id`),
  ADD KEY `P_Id` (`P_Id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_Id`),
  ADD KEY `O_Id` (`O_Id`);

--
-- Indexes for table `procurement_team`
--
ALTER TABLE `procurement_team`
  ADD PRIMARY KEY (`Pr_Id`),
  ADD KEY `P_Id` (`P_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`O_Id`),
  ADD UNIQUE KEY `O_Id` (`O_Id`),
  ADD KEY `P_Id` (`P_Id`),
  ADD KEY `C_Id` (`C_Id`);

--
-- Indexes for table `voucher_code`
--
ALTER TABLE `voucher_code`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `Payment_Id` (`Payment_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analysts`
--
ALTER TABLE `analysts`
  MODIFY `A_Id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fulfillment_team`
--
ALTER TABLE `fulfillment_team`
  MODIFY `F_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `I_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `procurement_team`
--
ALTER TABLE `procurement_team`
  MODIFY `Pr_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `P_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `O_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `voucher_code`
--
ALTER TABLE `voucher_code`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analysts`
--
ALTER TABLE `analysts`
  ADD CONSTRAINT `analysts_ibfk_1` FOREIGN KEY (`O_Id`) REFERENCES `sales_order` (`O_Id`);

--
-- Constraints for table `fulfillment_team`
--
ALTER TABLE `fulfillment_team`
  ADD CONSTRAINT `fulfillment_team_ibfk_1` FOREIGN KEY (`I_Id`) REFERENCES `inventory` (`I_id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`P_Id`) REFERENCES `product` (`P_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`O_Id`) REFERENCES `sales_order` (`O_Id`);

--
-- Constraints for table `procurement_team`
--
ALTER TABLE `procurement_team`
  ADD CONSTRAINT `procurement_team_ibfk_1` FOREIGN KEY (`P_Id`) REFERENCES `product` (`P_id`);

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_ibfk_1` FOREIGN KEY (`P_Id`) REFERENCES `product` (`P_id`),
  ADD CONSTRAINT `sales_order_ibfk_2` FOREIGN KEY (`C_Id`) REFERENCES `customer` (`C_Id`);

--
-- Constraints for table `voucher_code`
--
ALTER TABLE `voucher_code`
  ADD CONSTRAINT `voucher_code_ibfk_1` FOREIGN KEY (`Payment_Id`) REFERENCES `payment` (`Payment_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
