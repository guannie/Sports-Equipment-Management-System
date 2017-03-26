-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2015 at 05:43 AM
-- Server version: 5.5.32-MariaDB
-- PHP Version: 5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_szbnr`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `idEquipment` int(11) NOT NULL,
  `EquipmentName` varchar(45) NOT NULL,
  `EquipmentAvgPrice` double NOT NULL,
  `EquipmentQuantity` int(11) NOT NULL,
  `AvailableEquipment` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`idEquipment`, `EquipmentName`, `EquipmentAvgPrice`, `EquipmentQuantity`, `AvailableEquipment`) VALUES
(1001, 'Badminton Racquet', 30, 50, 50),
(1002, 'Basket Ball', 50, 10, 10),
(1003, 'Soccer', 50, 70, 70),
(1004, 'hockey', 50, 10, 10),
(1005, 'PingPongBall', 25, 0, 0),
(1006, 'Swimming Goggle', 150, 30, 30),
(1007, 'Volley Ball', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `maintainance`
--

CREATE TABLE IF NOT EXISTS `maintainance` (
  `idMaintainance` int(11) NOT NULL,
  `invoiceNo` varchar(45) NOT NULL,
  `MaintainanceType` varchar(45) NOT NULL,
  `idEquipment` int(11) DEFAULT NULL,
  `idStaff` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintainance`
--

INSERT INTO `maintainance` (`idMaintainance`, `invoiceNo`, `MaintainanceType`, `idEquipment`, `idStaff`) VALUES
(1, 'INV001', 'UPDATE', NULL, 'S001'),
(2, '2324', 'INSERT', NULL, 'S001'),
(3, 'INV12345', 'INSERT', 1001, 'S001'),
(4, 'NULL', 'DELETE', 1001, 'S001'),
(5, 'INV570', 'UPDATE', 1003, 'S001'),
(6, 'INV2609', 'INSERT', 1005, 'S002');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `idStaff` varchar(11) NOT NULL,
  `idUser` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`idStaff`, `idUser`) VALUES
('S001', 'U001'),
('S002', 'U002'),
('S003', 'U003'),
('S004', 'U004');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `idTransaction` int(11) NOT NULL,
  `TransactionType` varchar(45) NOT NULL,
  `TransactionQuantity` int(11) NOT NULL,
  `TransactionDate` varchar(45) NOT NULL,
  `TransactionTime` varchar(45) NOT NULL,
  `idEquipment` int(11) DEFAULT NULL,
  `idUser` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`idTransaction`, `TransactionType`, `TransactionQuantity`, `TransactionDate`, `TransactionTime`, `idEquipment`, `idUser`) VALUES
(1, 'Lending', 1, '10/12/2015', '13:5:12', 1001, 'U001'),
(2, 'Returning', 1, '10/12/2015', '13:22:2', 1001, 'U001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` varchar(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `name`, `address`, `phone`) VALUES
('U001', 'Syakit', 'No35, Kampu', '123456789'),
('U002', 'Nino', 'No13, Kampu', '0234567891'),
('U003', 'Hajak', 'No15, Kampu', '0345678912'),
('U004', 'Lee', 'No13, Kampu', '0456789123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`idEquipment`);

--
-- Indexes for table `maintainance`
--
ALTER TABLE `maintainance`
  ADD PRIMARY KEY (`idMaintainance`), ADD KEY `idEquipment` (`idEquipment`), ADD KEY `idStaff` (`idStaff`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`idStaff`), ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`idTransaction`), ADD KEY `idEquipment` (`idEquipment`), ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `idEquipment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1008;
--
-- AUTO_INCREMENT for table `maintainance`
--
ALTER TABLE `maintainance`
  MODIFY `idMaintainance` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `idTransaction` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `maintainance`
--
ALTER TABLE `maintainance`
ADD CONSTRAINT `maintainance_ibfk_1` FOREIGN KEY (`idEquipment`) REFERENCES `equipment` (`idEquipment`),
ADD CONSTRAINT `maintainance_ibfk_2` FOREIGN KEY (`idStaff`) REFERENCES `staff` (`idStaff`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`idEquipment`) REFERENCES `equipment` (`idEquipment`),
ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
