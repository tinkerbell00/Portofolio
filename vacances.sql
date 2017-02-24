-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2016 at 09:59 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacances`
--

-- --------------------------------------------------------

--
-- Table structure for table `horaires`
--

CREATE TABLE `horaires` (
  `ID` int(11) NOT NULL,
  `id_employe` int(11) DEFAULT NULL,
  `horaires` text,
  `retards` text,
  `vacances` text,
  `semaine` int(11) NOT NULL,
  `mois` int(11) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horaires`
--

INSERT INTO `horaires` (`ID`, `id_employe`, `horaires`, `retards`, `vacances`, `semaine`, `mois`, `annee`) VALUES
(1, 3, 'Lun - Vend 08AM-04PM', '1', '', 50, 12, 2016),
(2, 2, 'Lun - Vend 08AM-04PM', NULL, NULL, 50, 12, 2016),
(3, 2, 'Lun - Vend 08AM-04PM', NULL, NULL, 51, 12, 2016),
(4, 3, 'Lun - Vend 08AM-04PM', '', '', 51, 12, 2016),
(5, 6, 'Lun - Vend 08AM-04PM', '2H', '', 51, 12, 2016),
(6, 7, 'Lun - Vend 08AM-04PM', '2H', '', 51, 12, 2016),
(7, 4, 'Lun - Vend 08AM-04PM', '2h', '', 51, 12, 2016),
(8, 5, 'Lun - Vend 08AM-04PM', '2', '4', 51, 12, 2016),
(9, 2, 'Lun - Vend 08AM-04PM', NULL, NULL, 1, 1, 2017),
(10, 3, 'Lun - Vend 08AM-04PM', '', '', 52, 12, 2016),
(11, 2, 'Lun - Vend 08AM-04PM', NULL, NULL, 1, 1, 2017),
(12, 3, 'Lun - Vend 08AM-04PM', '', '', 1, 1, 2017),
(13, 6, 'Lun - Vend 08AM-04PM', '2H', '', 1, 1, 2017),
(14, 4, 'Lun - Vend 08AM-04PM', '2h', '', 1, 1, 2017),
(15, 6, 'Lun - Vend 08AM-04PM', '2H', '', 1, 1, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `adresse` varchar(55) NOT NULL,
  `rights` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `nom`, `phone`, `adresse`, `rights`) VALUES
(2, 'empl3@gmail.com', 'polo', 'Pierre HENRI', '0678594737', '1 Av Thiers, 06189, Nice', 2),
(3, 'empl2@gmail.com', 'empl2', 'Marco ANTIP', '0769438756', '1 Av Thiers, 06189, Nice', 2),
(4, 'admin@gmail.com', 'admin', 'Admin Admin', '0678594737', '1 Av Thiers, 06189, Nice', 1),
(5, 'danarednic00@gmail.com', 'polo', 'Dana REDNIC', '0678594737', '21 Rue d Angleterre', 1),
(6, 'empl6@gmail.com', 'empl6', 'Mari MARTIN', '0789453456', '33 Av de Suisse, 06000, Nice', 2),
(7, 'empl7@gmail.com', 'empl7', 'Tom HANKS', '0454232344', '44 Rue des Fleures, 06000, Nice', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `horaires`
--
ALTER TABLE `horaires`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `horaires`
--
ALTER TABLE `horaires`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
