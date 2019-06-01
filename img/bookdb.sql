-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 01:24 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookID` varchar(6) CHARACTER SET latin1 NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `CategoryID` varchar(6) CHARACTER SET latin1 NOT NULL,
  `Numofpage` int(11) NOT NULL,
  `Maxdate` int(11) NOT NULL,
  `Num` int(11) NOT NULL,
  `Summary` varchar(255) NOT NULL,
  `Picture` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookID`, `Name`, `Publisher`, `Author`, `CategoryID`, `Numofpage`, `Maxdate`, `Num`, `Summary`, `Picture`) VALUES
('CSD001', 'Cơ sở dữ liệu', 'NXB Giáo dục', 'Ðỗ Trung Tấn', 'CSD', 200, 3, 3, 'Thiết kế CSDL', NULL),
('CSD002', 'SQL Server 7.0', 'NXB Ðồng Nai', 'Elicom', 'CSD', 200, 3, 2, 'Thiết CSDL và sử dụng SQL Server', NULL),
('CSD003', 'Oracle 8i', 'NXB Giáo dục', 'Trần Tiến Dung', 'CSD', 500, 5, 3, 'Từng bước sử dụng Oracle', NULL),
('HTT001', 'Windows2000 Professional', 'NXB Giáo dục', 'Anh Thư', 'HTT', 500, 3, 2, 'Sử dụng Windows 2000', NULL),
('HTT002', 'Windows 2000 Advance Server', 'NXB Giáo dục', 'Anh Thư', 'HTT', 500, 5, 2, 'Sử dụng Windows 2000 Server', NULL),
('LTT001', 'Lập trình visual Basic 6', 'NXB Giáo dục', 'Nguyễn Tiến', 'LTT', 600, 3, 3, 'Kỹ thuật lập trình Víual Basic', NULL),
('LTT002', 'Ngôn ngữ lập trình c++', 'NXB Thống kê', 'Tăng Ðình Quí', 'LTT', 500, 5, 3, 'Hướng dẫn lập trình hướng đối tượng và C++', NULL),
('LTT003', 'Lập trình Windows bằng Visual c++', 'NXB Giáo dục', 'Ðặng Văn Ðức', 'LTT', 300, 4, 3, 'Hướng dẫn từng bước lập trình trên Windows', NULL),
('VPP001', 'Excel Toàn tập', 'NXB Trẻ', 'Ðoàn Công Hùng', 'VPP', 1000, 5, 4, 'Trình bày mọi vấn đề về Excel', NULL),
('VPP002', 'Word 2000 Toàn tập', 'NXB Trẻ', 'Ðoàn Công Hùng', 'VPP', 1000, 4, 3, 'Trình bày mọi vấn đề về Word', NULL),
('VPP003', 'Làm kế toán bằng Excel', 'NXB Thống kê', 'Vu Duy Sanh', 'VPP', 200, 5, 2, 'Trình bày phuong pháp làm kế toán', NULL),
('WEB001', 'Javascript', 'NXB Trẻ', 'Lê Minh Trí', 'WEB', 200, 5, 2, 'Từng bước thiết kế Web động', NULL),
('WEB002', 'HTML', 'NXB Giáo Dục', 'Nguyễn Thị Minh Khoa', 'WEB', 100, 3, 2, 'Từng bước làm quen với WEB', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` varchar(6) CHARACTER SET latin1 NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL,
  `Moreinfo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Moreinfo`) VALUES
('CSD', 'Cơ sở dữ liệu', 'Access, Oracle'),
('ECO', 'Ecommerce', 'Sách về thương mại điện tử'),
('GTT', 'Giải thuật', 'Các bài toán mẫu, các giải thuật, cấu trúc dữ liệu'),
('HTT', 'Hệ thống', 'Windows, Linux, Unix'),
('LTT', 'Ngôn ngữ lập trình', 'Visual Basic, C, C++, Java'),
('PTK', 'Phân tích và thiết kế', 'Phân tích và thiết kế giải thuật, hệ thống thông tin v.v..'),
('VPP', 'Văn phòng', 'Word, Excel'),
('WEB', 'Web', 'Javascript, Vbscript,HTML, Flash');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `CardID` varchar(8) CHARACTER SET latin1 NOT NULL,
  `BookID` varchar(6) CHARACTER SET latin1 NOT NULL,
  `DateBorrow` datetime NOT NULL,
  `Datereturn` datetime NOT NULL,
  `ReturnOK` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`CardID`, `BookID`, `DateBorrow`, `Datereturn`, `ReturnOK`) VALUES
('STIT0001', 'CSD001', '2014-07-30 00:00:00', '0000-00-00 00:00:00', 0),
('STIT0001', 'LTT001', '2014-06-30 00:00:00', '2014-07-25 00:00:00', 1),
('STIT0002', 'CSD002', '2014-08-15 00:00:00', '0000-00-00 00:00:00', 0),
('STIT0002', 'LTT003', '2014-08-10 00:00:00', '2014-08-30 00:00:00', 1),
('STIT0003', 'WEB001', '2014-07-10 00:00:00', '2014-07-20 00:00:00', 1),
('STIT0004', 'HTT001', '2014-08-10 00:00:00', '0000-00-00 00:00:00', 0),
('STIT0004', 'HTT002', '2014-08-20 00:00:00', '2014-08-25 00:00:00', 1),
('STIT0006', 'WEB001', '2014-08-30 00:00:00', '0000-00-00 00:00:00', 0),
('STIT0006', 'CSD002', '2014-08-10 00:00:00', '2014-08-15 00:00:00', 1),
('STIT0006', 'WEB002', '2014-07-15 00:00:00', '2014-07-30 00:00:00', 1),
('STIT0007', 'VPP001', '2014-08-30 00:00:00', '0000-00-00 00:00:00', 0),
('STIT0007', 'VPP003', '2014-08-20 00:00:00', '2014-08-25 00:00:00', 1),
('STIT0008', 'VPP001', '2014-08-30 00:00:00', '0000-00-00 00:00:00', 0),
('STIT0009', 'CSD001', '2014-08-20 00:00:00', '2014-08-23 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `CardId` varchar(8) CHARACTER SET latin1 NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Tel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`CardId`, `Name`, `Address`, `Tel`) VALUES
('STIT0001', 'Vy Văn Việt', '92-Quang Trung- Đà Nãng', '0511810583'),
('STIT0002', 'Nguyễn Khánh', '92-Quang Trung- Đà Nãng', '0511810583'),
('STIT0003', 'Nguyễn Minh Quốc', '92-Quang Trung- Đà Nãng', '0511810583'),
('STIT0004', 'Hồ Phước Thoi', '92-Quang Trung- Đà Nãng', '0511810583'),
('STIT0005', 'Nguyễn Văn Định', '92-Quang Trung- Đà Nãng', '0511810583'),
('STIT0006', 'Nguyễn Văn Hải', '92-Quang Trung- Đà Nãng', '0511810583'),
('STIT0007', 'Nguyễn Thị Thuý Hà', '92-Quang Trung- Đà Nãng', '0511810583'),
('STIT0008', 'Đỗ Thị Thiên Ngân', '92-Quang Trung- Đà Nãng', '0511810583'),
('STIT0009', 'Nguyễn Văn A', '30- Phan Chu Trinh- Đà Nẵng', '0913576890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`CardId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;