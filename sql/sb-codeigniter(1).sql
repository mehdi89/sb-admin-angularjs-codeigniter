-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2015 at 12:17 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sb-codeigniter`
--
CREATE DATABASE IF NOT EXISTS `sb-codeigniter` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sb-codeigniter`;

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE IF NOT EXISTS `navigations` (
  `NavigationId` int(11) NOT NULL AUTO_INCREMENT,
  `NavName` varchar(100) NOT NULL,
  `NavOrder` int(11) NOT NULL,
  `ActionPath` varchar(100) NOT NULL,
  `ParentNavId` int(11) DEFAULT NULL,
  PRIMARY KEY (`NavigationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`NavigationId`, `NavName`, `NavOrder`, `ActionPath`, `ParentNavId`) VALUES
(1, 'User', 2, 'Users', 4),
(2, 'Role', 4, 'Roles', 4),
(3, 'Navigation', 2, 'Navigations', 4),
(4, 'Authorize', 1, 'Authorize', NULL),
(5, 'Navigation View Right', 3, 'NavigViewRight', 4),
(6, 'Charts', 5, 'Chart', NULL),
(7, 'Home', 0, 'Home', NULL),
(8, 'UI-Component', 6, 'Components', NULL),
(9, 'Button', 8, 'Button', 8),
(10, 'Dialog', 9, 'Dialog', 8),
(13, 'Forms', 11, 'Forms', 8),
(14, 'Tabs', 11, 'Tabs', 8),
(16, 'Toast', 12, 'Toast', 8),
(17, 'Products', 15, 'Products', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `navigviewright`
--

CREATE TABLE IF NOT EXISTS `navigviewright` (
  `NavgViewId` int(11) NOT NULL AUTO_INCREMENT,
  `Navigations` int(11) NOT NULL,
  `Roles` int(11) DEFAULT NULL,
  `Users` int(11) DEFAULT NULL,
  PRIMARY KEY (`NavgViewId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `navigviewright`
--

INSERT INTO `navigviewright` (`NavgViewId`, `Navigations`, `Roles`, `Users`) VALUES
(1, 1, 1, NULL),
(2, 4, 1, NULL),
(3, 5, 1, NULL),
(4, 3, 1, NULL),
(5, 6, 1, NULL),
(35, 2, 1, NULL),
(36, 7, 1, NULL),
(38, 7, 3, 0),
(40, 8, 1, 0),
(41, 9, 1, 0),
(42, 10, 1, 0),
(43, 13, 1, 0),
(44, 14, 1, 0),
(46, 6, 2, 3),
(47, 7, 2, 3),
(48, 8, 2, 3),
(49, 9, 2, 3),
(50, 10, 2, 3),
(51, 13, 2, 3),
(52, 14, 2, 3),
(53, 16, 2, 3),
(54, 6, 3, 6),
(55, 17, 1, 2),
(56, 17, 2, 3),
(57, 17, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(40) NOT NULL,
  `QuantityPerUnit` varchar(20) DEFAULT NULL,
  `UnitPrice` decimal(10,4) DEFAULT '0.0000',
  `UnitsInStock` smallint(2) DEFAULT '0',
  `UnitsOnOrder` smallint(2) DEFAULT '0',
  `Discontinued` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`ProductID`),
  KEY `ProductName` (`ProductName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `QuantityPerUnit`, `UnitPrice`, `UnitsInStock`, `UnitsOnOrder`, `Discontinued`) VALUES
(1, 'Chai', '10 boxes x 20 bags', '18.0000', 39, 0, b'0'),
(2, 'Chang', '24 - 12 oz bottles', '19.0000', 17, 40, b'0'),
(3, 'Aniseed Syrup', '12 - 550 ml bottles', '10.0000', 13, 70, b'0'),
(4, 'Chef Anton''s Cajun Seasoning', '48 - 6 oz jars', '22.0000', 53, 0, b'0'),
(5, 'Chef Anton''s Gumbo Mix', '36 boxes', '21.3500', 0, 0, b'1'),
(6, 'Grandma''s Boysenberry Spread', '12 - 8 oz jars', '25.0000', 120, 0, b'0'),
(7, 'Uncle Bob''s Organic Dried Pears', '12 - 1 lb pkgs.', '30.0000', 15, 0, b'0'),
(8, 'Northwoods Cranberry Sauce', '12 - 12 oz jars', '40.0000', 6, 0, b'0'),
(9, 'Mishi Kobe Niku', '18 - 500 g pkgs.', '97.0000', 29, 0, b'1'),
(10, 'Ikura', '12 - 200 ml jars', '31.0000', 31, 0, b'0'),
(11, 'Queso Cabrales', '1 kg pkg.', '21.0000', 22, 30, b'0'),
(12, 'Queso Manchego La Pastora', '10 - 500 g pkgs.', '38.0000', 86, 0, b'0'),
(13, 'Konbu', '2 kg box', '6.0000', 24, 0, b'0'),
(14, 'Tofu', '40 - 100 g pkgs.', '23.2500', 35, 0, b'0'),
(15, 'Genen Shouyu', '24 - 250 ml bottles', '15.5000', 39, 0, b'0'),
(16, 'Pavlova', '32 - 500 g boxes', '17.4500', 29, 0, b'0'),
(17, 'Alice Mutton', '20 - 1 kg tins', '39.0000', 0, 0, b'1'),
(18, 'Carnarvon Tigers', '16 kg pkg.', '62.5000', 42, 0, b'0'),
(19, 'Teatime Chocolate Biscuits', '10 boxes x 12 pieces', '9.2000', 25, 0, b'0'),
(20, 'Sir Rodney''s Marmalade', '30 gift boxes', '81.0000', 40, 0, b'0'),
(21, 'Sir Rodney''s Scones', '24 pkgs. x 4 pieces', '10.0000', 3, 40, b'0'),
(22, 'Gustaf''s Knckebrd', '24 - 500 g pkgs.', '21.0000', 104, 0, b'0'),
(23, 'Tunnbrd', '12 - 250 g pkgs.', '9.0000', 61, 0, b'0'),
(24, 'Guaran Fantstica', '12 - 355 ml cans', '4.5000', 20, 0, b'1'),
(25, 'NuNuCa Nu-Nougat-Creme', '20 - 450 g glasses', '14.0000', 76, 0, b'0'),
(26, 'Gumbr Gummibrchen', '100 - 250 g bags', '31.2300', 15, 0, b'0'),
(27, 'Schoggi Schokolade', '100 - 100 g pieces', '43.9000', 49, 0, b'0'),
(28, 'Rssle Sauerkraut', '25 - 825 g cans', '45.6000', 26, 0, b'1'),
(29, 'Thringer Rostbratwurst', '50 bags x 30 sausgs.', '123.7900', 0, 0, b'1'),
(30, 'Nord-Ost Matjeshering', '10 - 200 g glasses', '25.8900', 10, 0, b'0'),
(31, 'Gorgonzola Telino', '12 - 100 g pkgs', '12.5000', 0, 70, b'0'),
(32, 'Mascarpone Fabioli', '24 - 200 g pkgs.', '32.0000', 9, 40, b'0'),
(33, 'Geitost', '500 g', '2.5000', 112, 0, b'0'),
(34, 'Sasquatch Ale', '24 - 12 oz bottles', '14.0000', 111, 0, b'0'),
(35, 'Steeleye Stout', '24 - 12 oz bottles', '18.0000', 20, 0, b'0'),
(36, 'Inlagd Sill', '24 - 250 g  jars', '19.0000', 112, 0, b'0'),
(37, 'Gravad lax', '12 - 500 g pkgs.', '26.0000', 11, 50, b'0'),
(38, 'Cte de Blaye', '12 - 75 cl bottles', '263.5000', 17, 0, b'0'),
(39, 'Chartreuse verte', '750 cc per bottle', '18.0000', 69, 0, b'0'),
(40, 'Boston Crab Meat', '24 - 4 oz tins', '18.4000', 123, 0, b'0'),
(41, 'Jack''s New England Clam Chowder', '12 - 12 oz cans', '9.6500', 85, 0, b'0'),
(42, 'Singaporean Hokkien Fried Mee', '32 - 1 kg pkgs.', '14.0000', 26, 0, b'1'),
(43, 'Ipoh Coffee', '16 - 500 g tins', '46.0000', 17, 10, b'0'),
(44, 'Gula Malacca', '20 - 2 kg bags', '19.4500', 27, 0, b'0'),
(45, 'Rogede sild', '1k pkg.', '9.5000', 5, 70, b'0'),
(46, 'Spegesild', '4 - 450 g glasses', '12.0000', 95, 0, b'0'),
(47, 'Zaanse koeken', '10 - 4 oz boxes', '9.5000', 36, 0, b'0'),
(48, 'Chocolade', '10 pkgs.', '12.7500', 15, 70, b'0'),
(49, 'Maxilaku', '24 - 50 g pkgs.', '20.0000', 10, 60, b'0'),
(50, 'Valkoinen suklaa', '12 - 100 g bars', '16.2500', 65, 0, b'0'),
(51, 'Manjimup Dried Apples', '50 - 300 g pkgs.', '53.0000', 20, 0, b'0'),
(52, 'Filo Mix', '16 - 2 kg boxes', '7.0000', 38, 0, b'0'),
(53, 'Perth Pasties', '48 pieces', '32.8000', 0, 0, b'1'),
(54, 'Tourtire', '16 pies', '7.4500', 21, 0, b'0'),
(55, 'Pt chinois', '24 boxes x 2 pies', '24.0000', 115, 0, b'0'),
(56, 'Gnocchi di nonna Alice', '24 - 250 g pkgs.', '38.0000', 21, 10, b'0'),
(57, 'Ravioli Angelo', '24 - 250 g pkgs.', '19.5000', 36, 0, b'0'),
(58, 'Escargots de Bourgogne', '24 pieces', '13.2500', 62, 0, b'0'),
(59, 'Raclette Courdavault', '5 kg pkg.', '55.0000', 79, 0, b'0'),
(60, 'Camembert Pierrot', '15 - 300 g rounds', '34.0000', 19, 0, b'0'),
(61, 'Sirop d''rable', '24 - 500 ml bottles', '28.5000', 113, 0, b'0'),
(62, 'Tarte au sucre', '48 pies', '49.3000', 17, 0, b'0'),
(63, 'Vegie-spread', '15 - 625 g jars', '43.9000', 24, 0, b'0'),
(64, 'Wimmers gute Semmelkndel', '20 bags x 4 pieces', '33.2500', 22, 80, b'0'),
(65, 'Louisiana Fiery Hot Pepper Sauce', '32 - 8 oz bottles', '21.0500', 76, 0, b'0'),
(66, 'Louisiana Hot Spiced Okra', '24 - 8 oz jars', '17.0000', 4, 100, b'0'),
(67, 'Laughing Lumberjack Lager', '24 - 12 oz bottles', '14.0000', 52, 0, b'0'),
(68, 'Scottish Longbreads', '10 boxes x 8 pieces', '12.5000', 6, 10, b'0'),
(69, 'Gudbrandsdalsost', '10 kg pkg.', '36.0000', 26, 0, b'0'),
(70, 'Outback Lager', '24 - 355 ml bottles', '15.0000', 15, 10, b'0'),
(71, 'Flotemysost', '10 - 500 g pkgs.', '21.5000', 26, 0, b'0'),
(72, 'Mozzarella di Giovanni', '24 - 200 g pkgs.', '34.8000', 14, 0, b'0'),
(73, 'Rd Kaviar', '24 - 150 g jars', '15.0000', 101, 0, b'0'),
(74, 'Longlife Tofu', '5 kg pkg.', '10.0000', 4, 20, b'0'),
(75, 'Rhnbru Klosterbier', '24 - 0.5 l bottles', '7.7500', 125, 0, b'0'),
(76, 'Lakkalikri', '500 ml', '18.0000', 57, 0, b'0'),
(77, 'Original Frankfurter grne Soe', '12 boxes', '13.0000', 32, 0, b'0'),
(78, 'Test Add', NULL, '3.0000', 5, NULL, b'1'),
(79, 'Test Add', NULL, '3.0000', 5, 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `RoleId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) NOT NULL,
  `NavigationId` int(11) NOT NULL,
  `IsRead` tinyint(1) NOT NULL,
  `IsInsert` tinyint(1) NOT NULL,
  `IsUpdate` tinyint(1) NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`RoleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleId`, `RoleName`, `NavigationId`, `IsRead`, `IsInsert`, `IsUpdate`, `IsDelete`) VALUES
(1, 'Super Admin', 1, 1, 1, 1, 1),
(2, 'Users', 9, 1, 1, 0, 0),
(3, 'Test', 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Role` int(11) NOT NULL,
  `NavigationId` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserName`, `Password`, `FirstName`, `LastName`, `Email`, `Role`, `NavigationId`, `IsActive`, `UserId`) VALUES
('admin', 'admin', 'jasim', 'jasimff', 'jasim@email.com', 1, NULL, 1, 2),
('user', 'user', 'user', 'user', 'user@gmail.com', 2, NULL, 1, 3),
('hasan', 'hasan', 'hasan', 'hasan', 'a@gmail.cim', 2, NULL, 0, 4),
('mehdi89', '123456', 'Mehedi', 'Hasan', 'a@gmail.com', 3, NULL, 1, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
