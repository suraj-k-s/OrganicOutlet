-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 12:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_organicfarming`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Sahala VS', 'sahalavs@gmail.com', 'sahala@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_status` int(11) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_contact` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL,
  `customer_photo` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_address`, `customer_contact`, `place_id`, `customer_photo`, `customer_password`) VALUES
(1, 'Arjun suresh  ', 'arjun@gmail.com', 'Marambilkudy(h) Aruppara p.o Muniparah', '7788994455', 1, 'Screenshot (1).png', '123456'),
(2, 'Meenakshy Sajan', 'meenakshy@gmail.com', 'Kollikattil(h) Kothamagalam p.o Kothamagalam', '9961615079', 1, 'Screenshot (1).png', '7894'),
(3, 'Sanjay Prakash', 'Sanjaypraka@gmail.com', 'Thazhatheyveetil(h) Rajakkad p.o idukki', '6699887744', 4, 'Screenshot (1).png', 'sanjaypraka@!23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(2, 'ERNAKULAM'),
(4, 'IDUKKI'),
(5, 'THRISSUR'),
(6, 'KASARAGOD'),
(7, 'KANNUR'),
(8, 'WAYANAD'),
(9, 'KOZHIKODE'),
(10, 'MALAPPURAM'),
(11, 'PALAKKAD'),
(12, 'KOTTAYAM'),
(13, 'ALAPPUZHA'),
(14, 'PATHANAMTHITTAH'),
(15, 'KOLLAM'),
(16, 'THIRUVANANTHAPURAM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'Kothamagalam', 2),
(2, 'Muvattupuzha', 2),
(3, 'Perumbavoor', 2),
(4, 'Rajakkad', 4),
(5, 'Thodupuzha', 4),
(6, 'Munnar', 4),
(7, 'Kodakarah', 5),
(8, 'Chalakudy', 5),
(9, 'Koratty', 5),
(10, 'Sulthan bathery', 8),
(11, 'Mananthavady', 8),
(12, 'Kalpetta', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_producttype`
--

CREATE TABLE `tbl_producttype` (
  `producttype_id` int(11) NOT NULL,
  `producttype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_producttype`
--

INSERT INTO `tbl_producttype` (`producttype_id`, `producttype_name`) VALUES
(1, 'VEGETABLES'),
(2, 'FRUITS'),
(3, 'SPICES'),
(4, 'DAIRIES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `supplier_contact` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `supplier_photo` varchar(100) NOT NULL,
  `supplier_proof` varchar(100) NOT NULL,
  `supplier_password` varchar(100) NOT NULL,
  `supplier_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_name`, `supplier_email`, `supplier_address`, `supplier_contact`, `place_id`, `supplier_photo`, `supplier_proof`, `supplier_password`, `supplier_status`) VALUES
(1, 'Athul CV', 'athulcv@gamil.com', 'Chathanattu(h) Methala p.o Methala', '9967854123', 4, 'Screenshot (1).png', 'Screenshot (1).png', '654321', 0),
(2, 'Muhsina Maidheen', 'muhsinah@gmail.com', 'Puthusheriyil(h) Thodupuzha p.o thodupuzha', '8832654174', 5, 'Screenshot (1).png', 'Screenshot (1).png', 'muhsi123', 0),
(3, 'Arun Pradeep', 'arunprade@gmail.com', 'pulikannill(h) sulthanbathery p.o wayanad', '8891457812', 10, 'Screenshot (1).png', 'Screenshot (1).png', 'arun123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliercart`
--

CREATE TABLE `tbl_suppliercart` (
  `fcart_id` int(11) NOT NULL,
  `fcart_quantity` int(11) NOT NULL DEFAULT 1,
  `fcart_status` int(11) NOT NULL,
  `fpbooking_id` int(11) NOT NULL,
  `fproduct_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_suppliercart`
--

INSERT INTO `tbl_suppliercart` (`fcart_id`, `fcart_quantity`, `fcart_status`, `fpbooking_id`, `fproduct_id`) VALUES
(10, 1, 4, 4, 2),
(11, 1, 1, 4, 4),
(12, 1, 4, 5, 6),
(13, 1, 1, 5, 2),
(14, 1, 4, 6, 14),
(15, 1, 4, 6, 22),
(16, 1, 4, 6, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplierproduct`
--

CREATE TABLE `tbl_supplierproduct` (
  `fproduct_id` int(11) NOT NULL,
  `fproduct_name` varchar(100) NOT NULL,
  `fproduct_details` varchar(100) NOT NULL,
  `fproduct_rate` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `fproduct_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplierproduct`
--

INSERT INTO `tbl_supplierproduct` (`fproduct_id`, `fproduct_name`, `fproduct_details`, `fproduct_rate`, `supplier_id`, `producttype_id`, `fproduct_photo`) VALUES
(12, 'Orange', '100kg', 150, 1, 2, 'Nagpur_orange_article.jpg'),
(13, 'Green Apple', '100kg', 200, 1, 2, 'istockphoto-478157668-612x612.jpg'),
(14, 'Apple', '100kg', 250, 1, 2, 'bg-apples-04.jpg'),
(15, 'Mussambi', '100kg', 200, 1, 2, 'beautiful-sweet-mosamby-fruit-260nw-2368648705.webp'),
(16, 'Grape', '100kg', 150, 1, 2, 'ae76d1_17248875b8bf442c9a34462a2e7da2ea~mv2.webp'),
(17, 'Mango', '100kg', 200, 1, 2, 'images.jpg'),
(18, 'WaterMelon', '100kg', 50, 1, 2, 'watermelons-isolated-1482758.webp'),
(19, 'Mangostin', '100kg', 300, 1, 2, 'images (2).jpg'),
(20, 'Guva', '100kg', 150, 1, 2, 'images (1).jpg'),
(21, 'Carrott', '100kg', 80, 1, 1, 'organic-carrot-500x500.webp'),
(22, 'Tommato', '100kg', 50, 1, 1, 'farm-fresh-organic-red-tomato-891.webp'),
(23, 'Beetroot', '100kg', 60, 1, 1, 'Beetroot Harvest 3.jpg'),
(24, 'Ladiesfinger', '100kg', 70, 1, 1, 'lady-finger.webp'),
(25, 'Long cowpea', '100kg', 100, 1, 1, 'PHOTO-2022-10-18-17-28-49.webp'),
(26, 'Brinjal', '100kg', 50, 1, 1, 'images (3).jpg'),
(27, 'Beans', '100kg', 100, 1, 1, 'ring-beans-500x500.jpg'),
(28, 'Cauliflower', '100kg', 80, 1, 1, '1639629630101_SKU-0257_0.jpg'),
(29, 'Cabbage', '100kg', 100, 1, 1, 'fresh-organic-cabbage-500x500.webp'),
(30, 'Milk', '100ltr', 28, 1, 4, 'download.jpg'),
(31, 'Ghee', '100gm', 500, 1, 4, 'organic-cow-ghee-500x500.webp'),
(32, 'Egg', '100', 6, 1, 4, 'organic-chicken-egg.jpg'),
(33, 'Curd', '100', 40, 1, 4, 'doi.png'),
(34, 'Red Chilly', '100gm', 80, 1, 3, '51RLW47CbaL.jpg'),
(35, 'Cumin Small', '100gm', 80, 1, 3, 'cumin-seeds-machine-cleaned-jeera-jeerakam--500x500.webp'),
(36, 'Fennel Seed', '100gm', 90, 1, 3, 'fennel-seed-500x500.webp'),
(37, 'Star Anise', '100', 100, 1, 3, 'download (2).jpg'),
(38, 'Black Pepper', '100', 90, 1, 3, 'download (1).jpg'),
(39, 'Cloves', '100', 90, 1, 3, '41oLNBBVjSL._AC_UF1000,1000_QL80_.jpg'),
(40, 'Cinnamon', '100', 90, 1, 3, 'cinnamon-500x500.webp'),
(41, 'Cardamom', '100', 85, 1, 3, '48054533.webp'),
(42, 'Coriander Seed', '100', 70, 1, 3, 'Screenshot2021-02-01at3.26.43PM.webp'),
(43, 'Bay Leaf', '100', 100, 1, 3, 'bay-leaves-photo.jpg'),
(44, 'Avacado', '100kg', 300, 1, 2, 'images (4).jpg'),
(45, 'Bitter Gourd', '100kg', 60, 1, 1, 'images (5).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplierproductbooking`
--

CREATE TABLE `tbl_supplierproductbooking` (
  `fpbooking_id` int(11) NOT NULL,
  `fpbooking_date` date NOT NULL,
  `fpbooking_amount` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `fpbooking_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplierproductbooking`
--

INSERT INTO `tbl_supplierproductbooking` (`fpbooking_id`, `fpbooking_date`, `fpbooking_amount`, `customer_id`, `fpbooking_status`, `payment_status`) VALUES
(4, '2023-10-25', 328, 1, 1, 0),
(5, '2023-10-25', 180, 4, 2, 0),
(6, '2023-10-25', 328, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplierstock`
--

CREATE TABLE `tbl_supplierstock` (
  `fstock_id` int(11) NOT NULL,
  `fstock_count` int(11) NOT NULL,
  `fproduct_id` int(11) NOT NULL,
  `fstock_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplierstock`
--

INSERT INTO `tbl_supplierstock` (`fstock_id`, `fstock_count`, `fproduct_id`, `fstock_date`) VALUES
(1, 4, 2, '2023-10-20'),
(2, 4, 2, '2023-10-20'),
(3, 4, 4, '2023-10-20'),
(4, 10, 6, '2023-10-25'),
(5, 10, 7, '2023-10-25'),
(6, 10, 8, '2023-10-25'),
(7, 10, 9, '2023-10-25'),
(8, 10, 10, '2023-10-25'),
(9, 50, 11, '2023-10-25'),
(10, 100, 12, '2023-10-25'),
(11, 100, 13, '2023-10-25'),
(12, 100, 14, '2023-10-25'),
(13, 100, 15, '2023-10-25'),
(14, 100, 16, '2023-10-25'),
(15, 100, 17, '2023-10-25'),
(16, 100, 18, '2023-10-25'),
(17, 100, 19, '2023-10-25'),
(18, 100, 21, '2023-10-25'),
(19, 100, 22, '2023-10-25'),
(20, 100, 23, '2023-10-25'),
(21, 100, 24, '2023-10-25'),
(22, 100, 25, '2023-10-25'),
(23, 100, 26, '2023-10-25'),
(24, 100, 27, '2023-10-25'),
(25, 100, 20, '2023-10-25'),
(26, 100, 28, '2023-10-25'),
(27, 100, 29, '2023-10-25'),
(28, 100, 30, '2023-10-25'),
(29, 1000, 31, '2023-10-25'),
(30, 1000, 32, '2023-10-25'),
(31, 1000, 33, '2023-10-25'),
(32, 100, 34, '2023-10-25'),
(33, 100, 36, '2023-10-25'),
(34, 100, 37, '2023-10-25'),
(35, 100, 38, '2023-10-25'),
(36, 100, 39, '2023-10-25'),
(37, 100, 40, '2023-10-25'),
(38, 100, 41, '2023-10-25'),
(39, 100, 42, '2023-10-25'),
(40, 100, 43, '2023-10-25'),
(41, 100, 44, '2023-10-25'),
(42, 100, 45, '2023-10-25'),
(43, 100, 35, '2023-10-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_producttype`
--
ALTER TABLE `tbl_producttype`
  ADD PRIMARY KEY (`producttype_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_suppliercart`
--
ALTER TABLE `tbl_suppliercart`
  ADD PRIMARY KEY (`fcart_id`);

--
-- Indexes for table `tbl_supplierproduct`
--
ALTER TABLE `tbl_supplierproduct`
  ADD PRIMARY KEY (`fproduct_id`);

--
-- Indexes for table `tbl_supplierproductbooking`
--
ALTER TABLE `tbl_supplierproductbooking`
  ADD PRIMARY KEY (`fpbooking_id`);

--
-- Indexes for table `tbl_supplierstock`
--
ALTER TABLE `tbl_supplierstock`
  ADD PRIMARY KEY (`fstock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_producttype`
--
ALTER TABLE `tbl_producttype`
  MODIFY `producttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_suppliercart`
--
ALTER TABLE `tbl_suppliercart`
  MODIFY `fcart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_supplierproduct`
--
ALTER TABLE `tbl_supplierproduct`
  MODIFY `fproduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_supplierproductbooking`
--
ALTER TABLE `tbl_supplierproductbooking`
  MODIFY `fpbooking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_supplierstock`
--
ALTER TABLE `tbl_supplierstock`
  MODIFY `fstock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
