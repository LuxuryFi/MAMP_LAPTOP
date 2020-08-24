-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Apr 29, 2020 at 04:34 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`, `description`) VALUES
(1, 'Light Novel', 'Japanese Novel - it has some illustrations'),
(2, 'Manga', 'Japanese comic'),
(3, 'Figure', 'Figure about manga/anime/lightnovel characters');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemPrice` varchar(50) NOT NULL,
  `itemImage` varchar(255) NOT NULL,
  `itemDescription` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `itemName`, `itemPrice`, `itemImage`, `itemDescription`) VALUES
(1, 'Date A Live 01', '65000', 'https://salt.tikicdn.com/cache/w1200/ts/product/f4/04/70/400bc1b6b7e28c3767a3577f0be0a09a.jpg', ''),
(2, 'Date A Live 02', '65000', 'https://salt.tikicdn.com/cache/w1200/ts/product/fd/ad/27/d49e266431df7c143b7fa5e3d1e8df3f.jpg', ''),
(3, 'Date A Live 03', '65000', 'https://salt.tikicdn.com/cache/w1200/ts/product/62/41/6c/cc527b47e8e4c681c50824dc016211f4.jpg', ''),
(4, 'Date A Live 04', '65000', 'https://salt.tikicdn.com/cache/w1200/ts/product/da/6a/0b/944dde951e19be64fa53c1675b49077e.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `productid`, `qty`) VALUES
(4, 2, 1),
(4, 3, 1),
(4, 9, 1),
(4, 49, 1),
(10, 3, 1),
(11, 2, 1),
(11, 3, 1),
(11, 4, 1),
(11, 5, 2),
(12, 3, 1),
(12, 4, 1),
(14, 1, 1),
(14, 2, 4),
(14, 3, 5),
(15, 1, 1),
(15, 2, 1),
(15, 7, 1),
(16, 2, 1),
(16, 64, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `orderdate` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `username`, `orderdate`, `status`) VALUES
(1, 'admin', '2020-04-23 23:27:00', 'No'),
(2, 'admin', '2020-04-23 23:27:59', 'No'),
(3, 'admin', '2020-04-23 23:28:14', 'No'),
(4, 'admin', '2020-04-23 23:28:18', 'Yes'),
(5, 'na', '2020-04-23 23:29:54', 'No'),
(6, 'na', '2020-04-23 23:31:48', 'No'),
(7, 'admin2', '2020-04-23 23:45:47', 'No'),
(8, 'admin2', '2020-04-23 23:48:38', 'No'),
(9, 'na', '2020-04-23 23:50:46', 'No'),
(10, 'na', '2020-04-23 23:51:31', 'Yes'),
(11, 'na', '2020-04-23 23:53:52', 'Yes'),
(12, 'na', '2020-04-24 00:37:32', 'Yes'),
(14, 'na', '2020-04-25 10:53:22', 'Waiting for check'),
(15, 'admin', '2020-04-25 13:11:54', 'Yes'),
(16, 'admin', '2020-04-25 13:44:28', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `productimage` text,
  `supplierid` int(11) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `productimage`, `supplierid`, `categoryid`, `price`, `discount`) VALUES
(1, 'Date A Live 1', 'figure/datealive1.jpg', 1, 1, 92000, NULL),
(2, 'Date A Live 2', 'figure/datealive2.jpg', 1, 1, 92000, NULL),
(3, 'Date A Live 3', 'figure/datealive3.jpg', 1, 1, 92000, NULL),
(4, 'Date A Live 4', 'figure/datealive4.jpg', 1, 1, 92000, NULL),
(5, 'Date A Live 5', 'figure/datealive5.jpg', 1, 1, 92000, NULL),
(7, 'Date A Live 7', 'figure/datealive7.jpg', 1, 1, 92000, NULL),
(8, 'Date A Live 8', 'figure/datealive8.jpg', 1, 1, 92000, NULL),
(9, 'Date A Live 9', 'figure/datealive9.jpg', 1, 1, 92000, NULL),
(10, 'Date A Live 10', 'figure/datealive10.jpg', 1, 1, 232323, NULL),
(11, 'One-punch Man 1', 'figure/op1.gif', 3, 2, 22000, NULL),
(12, 'One-punch Man 2', 'figure/op2.gif', 3, 2, 22000, NULL),
(13, 'One-punch Man 3', 'figure/op3.gif', 3, 2, 22000, NULL),
(14, 'One-punch Man 4', 'figure/op4.gif', 3, 2, 22000, NULL),
(15, 'One-punch Man 5', 'figure/op5.gif', 3, 2, 22000, NULL),
(16, 'One-punch Man 6', 'figure/op6.gif', 3, 2, 22000, NULL),
(17, 'One-punch Man 7', 'figure/op7.gif', 3, 2, 22000, NULL),
(18, 'One-punch Man 8', 'figure/op8.gif', 3, 2, 22000, NULL),
(19, 'One-punch Man 9', 'figure/op9.gif', 3, 2, 22000, NULL),
(20, 'One-punch Man 10', 'figure/op10.gif', 3, 2, 22000, NULL),
(49, 'Hentai 4', 'figure/Hentai 4.jpg', 1, 1, 123123, NULL),
(60, 'Date A Live 12', 'figure/DAL_v12_Cover.jpg', 1, 1, 92000, NULL),
(61, 'Date A Live 13', 'figure/DAL_v13_Cover.jpg', 1, 1, 92000, NULL),
(62, 'Date A Live 14', 'figure/DAL_v14_Cover.png', 1, 1, 92000, NULL),
(63, 'Date A Live 15', 'figure/DAL_v15_Cover.jpg', 1, 1, 92000, NULL),
(64, 'Date A Live 16', 'figure/DAL_v16_Cover.jpg', 1, 1, 92000, NULL),
(65, 'Date A Live 17', 'figure/DAL_v17_Cover.jpg', 1, 1, 92000, NULL),
(66, 'Date A Live 18', 'figure/DAL_v18_Cover.jpg', 1, 1, 92000, NULL),
(67, 'Date A Live 19', 'figure/DAL_v19_Cover.jpg', 1, 1, 92000, NULL),
(68, 'Date A Live 20', 'figure/DAL_v20_Cover.jpg', 1, 1, 92000, NULL),
(69, 'Date A Live 21', 'figure/DAL_v21_Cover.jpg', 1, 1, 92000, NULL),
(70, 'Date A Live 22', 'figure/DAL_v22_Cover.jpg', 1, 1, 92000, NULL),
(71, 'Emilia Figure 1', 'figure/figure1.jpg', 1, 3, 92000, NULL),
(72, 'Rem Figure 1', 'figure/figure2.jpg', 1, 3, 92000, NULL),
(73, 'Kurumi Figure 1', 'figure/figure3.jpg', 1, 3, 92000, NULL),
(74, 'Emilia Figure 1', 'figure/figure1.jpg', 1, 3, 252000, NULL),
(75, 'Rem Figure 1', 'figure/figure2.jpg', 1, 3, 892000, NULL),
(76, 'Kurumi Figure 1', 'figure/figure3.jpg', 1, 3, 692000, NULL),
(77, 'Kurumi Figure 2', 'figure/figure4.jpg', 1, 3, 1090000, NULL),
(78, 'Kurumi Figure 3', 'figure/figure5.jpg', 2, 3, 2720000, NULL),
(79, 'Kurumi Figure 4', 'figure/figure6.jpg', 4, 3, 1610000, NULL),
(80, 'Tohka Figure 1', 'figure/figure7.jpg', 5, 3, 2950000, NULL),
(81, 'Tohka Figure 2', 'figure/figure8.jpg', 3, 3, 3940000, NULL),
(82, 'Tohka Figure 3', 'figure/figure9.jpg', 2, 3, 7930000, NULL),
(83, 'Mamako Figure 1', 'figure/figure10.jpg', 1, 3, 1920000, NULL),
(84, 'Yoshino Figure 1', 'figure/figure11.jpg', 4, 3, 2920000, NULL),
(85, 'Rahptalia Figure 1', 'figure/figure12.jpg', 5, 3, 5920000, NULL),
(86, 'Onee 1', 'figure/figure13.jpg', 2, 3, 7920000, NULL),
(87, 'Choco Figure 1', 'figure/figure14.jpg', 6, 3, 3920000, NULL),
(88, 'Mamako Figure 1', 'figure/figure15.jpg', 1, 3, 2920000, NULL),
(89, 'Origami Figure 1', 'figure/figure16.jpg', 1, 3, 3920000, NULL),
(90, 'Hentai 3', 'figure/Hentai 3.jpg', 1, 2, 250000, NULL),
(91, 'Test5', 'figure/Test5.png', 4, 2, 12312300, NULL),
(92, 'Oresuki 8', 'figure/Oresuki 8.jpg', 2, 1, 93000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productrating`
--

CREATE TABLE `productrating` (
  `productid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` datetime DEFAULT NULL,
  `rating` float DEFAULT '0',
  `feedback` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productrating`
--

INSERT INTO `productrating` (`productid`, `username`, `date`, `rating`, `feedback`) VALUES
(1, 'admin', '2020-04-24 02:30:55', 5, 'Shidou lúc này đang bước đi dưới những tán cây anh đào, nơi cậu đã từng bước đi cùng Tohka và Tenka. Lẽ ra Origami học cùng trường sẽ đi với cậu, nhưng cô ấy đột nhiên lại bảo có việc gấp phải đi.\n\nVà Shidou nhìn thấy một bóng người phía trước.\n\n\"────\"\n\nKhi nhìn thấy dáng vẻ đó, Shidou đột nhiên mở to mắt.\nNổi bật trước cảnh sắc màu hồng nhạt, là một mái tóc dài màu màn đêm.\nĐôi mắt ánh lên màu sắc huyền ảo tựa như pha lê.\nGương mặt với đường nét mỹ lệ, nhưng biểu cảm lại rất dịu dàng.\n\n\"────Cậu, là......\"\n\nShidou nửa vô thức thốt ra những lời đó.\n\nTại sao chứ. Nếu gặp cô ấy, nhất định cậu phải hỏi như vậy────Đâu đó trong đầu, cậu cảm giác đã hiểu ra điều đó.\n\n\"..... Tên, sao.\"\n\nLập tức người thiếu nữ, với biểu cảm như thể đã biết rõ những lời đó dành cho mình, mỉm cười tươi tắn, và đáp lại.\n\n\"──Tên của tớ là Yatogami Tohka.\nMột cái tên quý giá, mà tớ đã nhận từ một người quý giá.──Rất tuyệt đúng không?\"'),
(1, 'admin11', '2020-04-24 21:51:33', 3, 'Hay lắm'),
(1, 'admin2', '2020-04-24 02:34:31', 2, 'i musnt spoil me, just this question: from where exactly is this? From new Season 4? From light novel? A game? :o I have to know it, just this! xD Ah, and she looks so beautiful and confident, I like this pic very much'),
(1, 'admin3', '2020-04-24 02:36:35', 1, 'Where pic be found on cause facebook causes its pics to lose some resolution'),
(1, 'na', '2020-04-24 02:32:16', 4, 'its sad, because the novel series is over, because the anime series follows the novel series, meaning the Date A Live Anime Series is over, but now, the anime series is not over, because there is still a season 4, and the anime series will follow the novel, nine years long Date A Live Novel Series, with 22 volumes, the original run, from March 19, 2011 to March 19, 2020'),
(1, 'oanh', '2020-04-24 02:33:24', 3, 'because of chinas new online restriction, i cant access my billi billi account so i lost all my progress, ill be waiting for the english version comming later this year, im still pretty pissed , fuck the CCP'),
(2, 'admin', '2020-04-24 01:31:04', 2, '131231'),
(2, 'admin11', '2020-04-25 00:24:26', 1, 'Hay hay'),
(2, 'admin22', '2020-04-25 00:26:25', 5, 'Date a live'),
(2, 'admin33', '2020-04-25 00:25:31', 1, 'Yoshino so fk cute'),
(2, 'na', '2020-04-24 20:13:51', 3, 'Hay lắm'),
(3, 'admin', '2020-04-25 00:27:15', 5, 'Kuruminnnnnn'),
(4, 'admin', '2020-04-25 03:54:33', 5, '123123'),
(7, 'admin', '2020-04-25 03:54:50', 4, 'test'),
(49, 'admin', '2020-04-25 04:06:15', 5, 'Hi'),
(64, 'admin', '2020-04-25 13:46:03', 5, '1312312');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `rolename`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierid` int(11) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierid`, `companyname`, `address`, `region`, `phone`) VALUES
(1, 'Kadokawa', 'Tokyo', 'Japan', '33321212222'),
(2, 'OVERLAP', 'Tokyo', 'Japan', '1123456789'),
(3, 'Kim Đồng WingsBook', 'Hà Nội', 'Việt Nam', '1412826789'),
(4, 'AMAK', 'Hồ Chí Minh', 'Việt Nam', '1344567999'),
(5, 'Sky Novel', 'Hà Nội', 'Việt Nam', '0966141598'),
(6, 'Shueisha', 'Hà Đông', 'Việt Nam', '0966143142'),
(29, 'AMAK4', 'HA NOI', 'Việt Nam', '0966141598'),
(30, 'FPT6', 'HA NOI', 'Việt Nam', '0912341598'),
(31, 'LastTest', 'HA NOI', 'Việt Nam', '0911141598'),
(32, 'AMAK333', 'HA NOI', 'Việt Nam', '2131231231231');

-- --------------------------------------------------------

--
-- Table structure for table `temporarycart`
--

CREATE TABLE `temporarycart` (
  `username` varchar(50) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `timebuy` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temporarycart`
--

INSERT INTO `temporarycart` (`username`, `productid`, `timebuy`, `qty`, `price`) VALUES
('na', 7, '2020-04-28 11:15:35', 1, 92000),
('na', 68, '2020-04-28 11:15:40', 1, 92000),
('admin', 7, '2020-04-29 12:13:57', 1, 92000),
('admin', 68, '2020-04-29 12:14:13', 1, 92000),
('admin', 70, '2020-04-29 12:14:19', 1, 92000);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`username`, `password`, `fullname`, `phone`, `email`, `role`, `image`) VALUES
('admin', 'admin', 'Nguyễn Quốc Anh', '2312312331', 'anhnqgch18888@fpt.edu.vn', 1, 'figure/Meomeo_.jpg'),
('admin11', 'Quocanh123@', 'Nguyễn Quốc Anh', '0966151698', 'gaconbibenh11@gmail.com', 2, 'figure/admin11.jfif'),
('admin2', '123456', 'Nguyễn Quốc Anh', '22222', '1234256@gmail.com', 2, 'figure/admin2.jpg'),
('admin22', 'Quocanh123@', 'Nguyễn Quốc Anh', '09662441598', 'gaconbibenh12@gmail.com', 2, 'figure/admin22.jfif'),
('admin3', 'Quocanh123@', 'Nguyễn Quốc Anh', '0962141598', 'gaconbibenh5@gmail.com', 2, 'figure/admin3.jpg'),
('admin33', 'Quocanh123@', 'Nam Vũ', '0955141598', 'gaconbibenh12@gmail.com', 2, 'figure/admin33.jfif'),
('admin4', 'Quocanh123@@', 'Nguyễn Quốc Em', '0966143198', 'gaconbibenh11@gmail.com', 2, 'figure/admin4.jpg'),
('FPT3', 'Quocanh123@', 'Kiana', '0944141598', 'gaconbibenh5@gmail.com', 2, 'figure/FPT3.jpg'),
('na', 'Quocanh123@', 'Lê Tuấn Anh', '2312312322', 'tuna@gmail.com', 2, 'figure/na.jpg'),
('oanh', 'anhquoc', 'Test', '096161232', 'oanh@gmail.com', 2, 'figure/oanh.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderid`,`productid`),
  ADD KEY `fk_order_product` (`productid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `fk_orders_user` (`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `fk_product_category` (`categoryid`),
  ADD KEY `fk_product_supplier` (`supplierid`);

--
-- Indexes for table `productrating`
--
ALTER TABLE `productrating`
  ADD PRIMARY KEY (`productid`,`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierid`);

--
-- Indexes for table `temporarycart`
--
ALTER TABLE `temporarycart`
  ADD KEY `price_idx` (`price`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`username`),
  ADD KEY `role_idx` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `fk_order_orders` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_product` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`username`) REFERENCES `userlogin` (`username`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`categoryid`) REFERENCES `category` (`categoryid`),
  ADD CONSTRAINT `fk_product_supplier` FOREIGN KEY (`supplierid`) REFERENCES `supplier` (`supplierid`);

--
-- Constraints for table `productrating`
--
ALTER TABLE `productrating`
  ADD CONSTRAINT `productrating_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`),
  ADD CONSTRAINT `productrating_ibfk_2` FOREIGN KEY (`username`) REFERENCES `userlogin` (`username`);

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `roles` (`roleid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
