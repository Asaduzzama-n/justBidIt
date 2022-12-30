-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 03:35 PM
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
-- Database: `auctionbits`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidder`
--

CREATE TABLE `bidder` (
  `Username` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ContactNo` int(20) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Identity` varchar(20) NOT NULL DEFAULT 'bidder'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`Username`, `Email`, `Password`, `ContactNo`, `Designation`, `Image`, `Identity`) VALUES
('Liu Dash', 'liu@liu.com', '9d4d6204ee943564637f06093236b181', 0, '', '840691107', 'bidder'),
('Nargis', 'nargis@nargis.com', '70b7efbc69f58f682a0014b53d70f929', 0, '', '45723441', 'bidder');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` varchar(2000) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `DateTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`Id`, `Title`, `Content`, `Image`, `Author`, `DateTime`) VALUES
(5, '1st', 'It was going to rain. The weather forecast didn\'t say that, but the steel plate in his hip did. He had learned over the years to trust his hip over the weatherman. It was going to rain, so he better get outside and prepare.', '972739029854054395quotes.jpg', 'bodi@gmail.com', '2022-05-10'),
(6, 'Thoughts', 'He scolded himself for being so tentative. He knew he shouldn\'t be so cautious, but there was a sixth sense telling him that things weren\'t exactly as they appeared. It was that weird chill that rolls up your neck and makes the hair stand on end. He knew that being so tentative could end up costing him the job, but he learned that listening to his sixth sense usually kept him from getting into a lot of trouble.', '2073665433default.jpg', 'bodi@gmail.com', '2022-05-10'),
(7, 'Weather Demand', 'It was their first date and she had been looking forward to it the entire week. She had her eyes on him for months, and it had taken a convoluted scheme with several friends to make it happen, but he\'d finally taken the hint and asked her out. After all the time and effort she\'d invested into it, she never thought that it would be anything but wonderful. It goes without saying that things didn\'t work out quite as she expected.', '10766716724.png', 'bodi@gmail.com', '2022-05-11'),
(8, 'post', 'hello', '1202635951854054395quotes.jpg', 'ishti@gmail.com', '2022-05-11'),
(9, 'A', 'a', '1156339328Caaaaaure.PNG', 'asad1234@gmail.com', '2022-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ProductId` int(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `Buyer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ProductId`, `ProductName`, `Price`, `Buyer`) VALUES
(54, 'Table', 700, 'bodi'),
(61, 'pen', 90, 'bodi'),
(69, 'Bat', 555, 'bodi'),
(8, 'Antique chair', 320, 'bodi'),
(3239, 'Ancient Horse', 700, 'jisan'),
(3238, 'Pokemon', 50, 'jisan'),
(3238, 'Pokemon', 50, 'jisan'),
(3243, 'Kodu', 22, ''),
(3243, 'Kodu', 22, 'Asaduzaaman'),
(3245, 'apple', 12222, 'asad');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment` varchar(200) NOT NULL,
  `sender` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment`, `sender`, `date`, `postId`) VALUES
('Good one!', 'arif', '2022-05-22 20:53:33', 5),
('asad12345@gmail.com', 'Asaduzaaman', '2022-12-30 04:03:31', 6);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(20) NOT NULL,
  `Price` int(20) NOT NULL,
  `highestBidBy` varchar(200) NOT NULL,
  `Name` varchar(600) NOT NULL,
  `seller_email` varchar(300) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `rating` double NOT NULL,
  `rated_by` int(11) NOT NULL,
  `startDt` timestamp NULL DEFAULT NULL,
  `finishDt` timestamp NULL DEFAULT NULL,
  `a_status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active,0=finished',
  `winner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Price`, `highestBidBy`, `Name`, `seller_email`, `Category`, `Description`, `Image`, `rating`, `rated_by`, `startDt`, `finishDt`, `a_status`, `winner`) VALUES
(3265, 2, 'Liu Dash', 'UIU', 'asad@asad.com', 'others', 'UIU\r\npsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea', '1116635958UIU-Banner-New-scaled.jpg', 0, 0, '2022-12-29 19:30:00', '2023-01-02 02:30:00', 1, ''),
(3267, 1200, '', 'Bazuca', 'asad@asad.com', 'sports', 'unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut', '16311457101191306-24904013-2560-1440.jpg', 0, 0, '2023-01-01 02:00:00', '2023-01-04 02:00:00', 1, ''),
(3268, 5500000, 'Liu Dash', 'Nemeziz', 'safinaz@safinaz.com', 'sports', '15 years ago, a young man from the Argentinian city of Rosario took to the pitch for his professional debut, and the rest, as they say, is history. To celebrate that iconic moment that kicked off a legacy adidas have released the special edition ‘Messi 15', '15681850871-messi-limited-edition-crystal-boots-adidas-min.jpg', 0, 0, '2022-12-29 03:02:00', '2023-01-01 03:02:00', 1, ''),
(3269, 1322, 'Nargis', 'Uchiha Itachi Naruto PVC Toy Action Figure 8\" Doll', 'safinaz@safinaz.com', 'art', 'SeekFunning Naruto Figure Uchiha Itachi Naruto PVC Toy Action Figure 8\" Doll, Great Gifts for Boys and Girls', '1750973247Capture.PNG', 0, 0, '2022-12-29 03:11:00', '2022-12-30 15:11:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `p_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`, `p_id`) VALUES
(29, 'Liu', 5, 'Bashbagan', 1672408582, 3265),
(30, 'Liu Dash', 5, 'IDOL!!!', 1672408986, 3268),
(31, 'Liu ', 5, '!!!!!!!', 1672409489, 3269),
(32, 'Nargis', 5, 'Nice Product!', 1672410789, 3269);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `Username` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ContactNo` int(20) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Identity` varchar(20) NOT NULL DEFAULT 'seller'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`Username`, `Email`, `Password`, `ContactNo`, `Designation`, `Image`, `Identity`) VALUES
('Asad', 'asad@asad.com', '140b543013d988f4767277b6f45ba542', 0, '', '1552441066', 'seller'),
('Safinaz', 'safinaz@safinaz.com', '7d67bf52afff7e9e0ec562656e36dcac', 0, '', '59217538', 'seller');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `PostCode` int(255) NOT NULL,
  `StreetAddress` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `ShippingMethod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`Id`, `Email`, `FirstName`, `LastName`, `Country`, `State`, `PostCode`, `StreetAddress`, `Phone`, `ShippingMethod`) VALUES
(1, 'bodi@gmail.com', 'Bodi', 'Linux', 'Bangladesh', 'Dhaka', 1212, '100 Feet', '0123456', '1'),
(2, '', '', '', '', '', 0, '', '', '3'),
(3, '', '', '', '', '', 0, '', '', '2'),
(4, 'john@gmail.com', 'John', 'Doe', 'BD', 'Dhk', 1212, '100 feet', '124355', '1'),
(5, '', '', '', '', '', 0, '', '', '1'),
(6, '', '', '', '', '', 0, '', '', '1'),
(7, '', '', '', '', '', 0, '', '', '1'),
(8, '', '', '', '', '', 0, '', '', '1'),
(9, '', '', '', '', '', 0, '', '', '1'),
(10, '', '', '', '', '', 0, '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE `winner` (
  `id` int(20) NOT NULL,
  `amount` int(200) NOT NULL,
  `bidder_mail` varchar(200) NOT NULL,
  `p_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winner`
--

INSERT INTO `winner` (`id`, `amount`, `bidder_mail`, `p_id`) VALUES
(10, 2, 'liu@liu.com', 3265),
(11, 5500000, 'liu@liu.com', 3268),
(12, 1322, 'nargis@nargis.com', 3269);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidder`
--
ALTER TABLE `bidder`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD KEY `CommentOfPost` (`postId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3270;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `winner`
--
ALTER TABLE `winner`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `CommentOfPost` FOREIGN KEY (`postId`) REFERENCES `blog` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
