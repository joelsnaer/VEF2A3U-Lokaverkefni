-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2017 at 09:28 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Lokaverkefni`
--

-- --------------------------------------------------------

--
-- Table structure for table `myndir`
--

CREATE TABLE `myndir` (
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `thumbnailLink` varchar(255) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myndir`
--

INSERT INTO `myndir` (`name`, `link`, `thumbnailLink`, `userID`) VALUES
('blom1.jpg', 'myndir/6_blom1.jpg', 'myndir/Thumbnail/6_blom1.jpg', 6),
('blom2.jpg', 'myndir/6_blom2.jpg', 'myndir/Thumbnail/6_blom2.jpg', 6),
('blom4.jpg', 'myndir/6_blom4.jpg', 'myndir/Thumbnail/6_blom4.jpg', 6),
('einhverhamstur.jpg', 'myndir/6_einhverhamstur.jpg', 'myndir/Thumbnail/6_einhverhamstur.jpg', 6),
('hidethepainharold.jpg', 'myndir/6_hidethepainharold.jpg', 'myndir/Thumbnail/6_hidethepainharold.jpg', 6),
('mexican.jpg', 'myndir/6_mexican.jpg', 'myndir/Thumbnail/6_mexican.jpg', 6),
('doge.jpg', 'myndir/6_doge.jpg', 'myndir/Thumbnail/6_doge.jpg', 6),
('forsidaBedahreinsun.jpg', 'myndir/6_forsidaBedahreinsun.jpg', 'myndir/Thumbnail/6_forsidaBedahreinsun.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `email`, `name`, `password`) VALUES
(6, 'admin@admin.is', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(7, 'test@test.is', 'test2', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(8, 'kj@kj', 'gfd', '46874106f9ac7f3b68a422895aa223e1ea5ed0db860f179f6362cb166c65f8ca'),
(9, 'mikaeelmani99@gmail.com', 'Káro', '78cf7dc2eb6fc2b501af9a1d49df5c99715003620eed0d7bcfaebfd8bc68099e'),
(10, 'xxxx@xxxx.xxx', 'anonymoushacker', '4bce9f4eabe55b4e3fa8869475a636776dc156cd38f432c8df2f12b626a21869'),
(11, 'mikaeelmani99@gmail.com', 'mikki', 'af556d7ec4926bc7f981817320a8345c8c94c3c36abf097dd2ece51f0ff3b085'),
(14, 'blizzsnaer@gmail.com', 'Joel', '0ec3a5c3a2226141d76557641569a5f01cefeb56a0be9dd2b5bd5ecc8b7194b7'),
(15, 'penis@penis.is', 'penis', 'f6952d6eef555ddd87aca66e56b91530222d6e318414816f3ba7cf5bf694bf0f'),
(18, 'verkefni@verkefni.is', 'verkefni', '2744ccd10c7533bd736ad890f9dd5cab2adb27b07d500b9493f29cdc420cb2e0'),
(19, 'joelsnaer1999@hotmail.com', 'joel', 'a6761ccff1191f3ee53acada4f7965241538511ef6eb52d37974507ab5a9023e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myndir`
--
ALTER TABLE `myndir`
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `myndir`
--
ALTER TABLE `myndir`
  ADD CONSTRAINT `myndir_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
