-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 06:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoping_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_order`
--

CREATE TABLE `list_order` (
  `id` int(11) NOT NULL,
  `list` text NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_order`
--

INSERT INTO `list_order` (`id`, `list`, `price`, `date`) VALUES
(1, '[{\"id\":2,\"name\":\"shire\",\"detail\":\"fnbjdfjbfdjnbl\",\"price\":500},{\"id\":2,\"name\":\"shire\",\"detail\":\"fnbjdfjbfdjnbl\",\"price\":500},{\"id\":2,\"name\":\"shire\",\"detail\":\"fnbjdfjbfdjnbl\",\"price\":500}]', 1500, '2022-09-19 00:00:00'),
(2, '[{\"id\":2,\"name\":\"shire\",\"detail\":\"fnbjdfjbfdjnbl\",\"price\":500}]', 500, '2022-09-19 00:00:00'),
(3, '[{\"id\":5,\"name\":\"shoe\",\"detail\":\"nike\",\"price\":60000},{\"id\":3,\"name\":\"shoe\",\"detail\":\"fnbjdfnbn\",\"price\":60},{\"id\":2,\"name\":\"shire\",\"detail\":\"fnbjdfjbfdjnbl\",\"price\":500}]', 60560, '2022-09-19 00:00:00'),
(4, '[{\"id\":2,\"name\":\"shire\",\"detail\":\"fnbjdfjbfdjnbl\",\"price\":500},{\"id\":3,\"name\":\"shoe\",\"detail\":\"fnbjdfnbn\",\"price\":60},{\"id\":4,\"name\":\"shire\",\"detail\":\"adidas\",\"price\":50000}]', 50560, '2022-09-19 00:00:00'),
(5, '[{\"id\":2,\"name\":\"shire\",\"detail\":\"fnbjdfjbfdjnbl\",\"count\":2,\"price\":500,\"priceall\":1000},{\"id\":3,\"name\":\"shoe\",\"detail\":\"fnbjdfnbn\",\"count\":2,\"price\":60,\"priceall\":120},{\"id\":4,\"name\":\"shire\",\"detail\":\"adidas\",\"count\":2,\"price\":50000,\"priceall\":100000},{\"id\":5,\"name\":\"shoe\",\"detail\":\"nike\",\"count\":1,\"price\":60000,\"priceall\":60000}]', 161120, '2022-09-19 23:25:37'),
(6, '[{\"id\":2,\"name\":\"shire\",\"detail\":\"fnbjdfjbfdjnbl\",\"count\":3,\"price\":500,\"priceall\":1500},{\"id\":3,\"name\":\"shoe\",\"detail\":\"fnbjdfnbn\",\"count\":1,\"price\":60,\"priceall\":60},{\"id\":5,\"name\":\"shoe\",\"detail\":\"nike\",\"count\":2,\"price\":60000,\"priceall\":120000}]', 121560, '2022-09-19 23:36:23'),
(7, '[{\"id\":2,\"name\":\"shire\",\"detail\":\"fnbjdfjbfdjnbl\",\"count\":1,\"price\":500,\"priceall\":500},{\"id\":3,\"name\":\"shoe\",\"detail\":\"fnbjdfnbn\",\"count\":1,\"price\":60,\"priceall\":60},{\"id\":4,\"name\":\"shire\",\"detail\":\"adidas\",\"count\":1,\"price\":50000,\"priceall\":50000},{\"id\":5,\"name\":\"shoe\",\"detail\":\"nike\",\"count\":1,\"price\":60000,\"priceall\":60000}]', 110560, '2022-09-19 23:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `detail` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `detail`, `price`) VALUES
(2, 'shire', 'fnbjdfjbfdjnbl', 500),
(3, 'shoe', 'fnbjdfnbn', 60),
(4, 'shire', 'adidas', 50000),
(5, 'shoe', 'nike', 60000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_order`
--
ALTER TABLE `list_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_order`
--
ALTER TABLE `list_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
