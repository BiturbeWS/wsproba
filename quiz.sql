-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 09:39 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `galderarenTestua` varchar(280) NOT NULL,
  `eZuzena` varchar(100) NOT NULL,
  `eOkerra1` varchar(100) NOT NULL,
  `eOkerra2` varchar(100) NOT NULL,
  `eOkerra3` varchar(100) NOT NULL,
  `zailtasuna` int(1) NOT NULL,
  `gGaia` varchar(100) NOT NULL,
  `eposta` varchar(100) NOT NULL,
  `argazkia` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `indizea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`galderarenTestua`, `eZuzena`, `eOkerra1`, `eOkerra2`, `eOkerra3`, `zailtasuna`, `gGaia`, `eposta`, `argazkia`, `indizea`) VALUES
('ljknfdañnj', ' pnñp', 'n', 'on', 'ñj', 1, 'jnñ', 'jnskd@ehu.eus', NULL, 20),
('ñkjbñkbhñlhb', ' a', 'b', 'b', 'b', 1, 'b', 'eposta@ehu.eus', NULL, 21),
('asidfksjadfpjkñfbsañ', ' a', 'b', 'b', 'b', 1, 'lajhhbb', 'eposta@ehu.eus', '../images/pic3.png', 22),
('asidfksjadfpjkñfbsañ', ' a', 'b', 'b', 'b', 1, 'lajhhbb', 'eposta@ehu.eus', '../images/pic4.png', 23),
('asidfksjadfpjkñfbsañ', ' a', 'b', 'b', 'b', 1, 'lajhhbb', 'eposta@ehu.eus', '../images/pic5.png', 24),
('asidfksjadfpjkñfbsañ', ' a', 'b', 'b', 'b', 1, 'lajhhbb', 'eposta@ehu.eus', '../images/pic6.png', 25),
('jahfvosfldvs', ' a', 'b', 'b', 'b', 1, 'kjasdfn', 'eposta@ehu.eus', '../images/pic7.png', 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Eposta` varchar(30) NOT NULL,
  `ErabiltzaileMota` varchar(10) NOT NULL,
  `Deitura` varchar(30) NOT NULL,
  `Pasahitza` varchar(30) NOT NULL,
  `argazkia` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Eposta`, `ErabiltzaileMota`, `Deitura`, `Pasahitza`, `argazkia`) VALUES
(4, 'jhasd@ehu.eus', ' ikaslea', 'asd', '', NULL),
(5, 'lsf@ehu.eus', ' ikaslea', 'afs', '', NULL),
(6, 'slksdfv@ehu.eus', ' ikaslea', 'a', 'as', NULL),
(7, 'benatiturbe@ehu.eus', ' ikaslea', 'Beñat', 'Pasahitza', NULL),
(8, 'eposta@ehu.eus', ' irakaslea', 'Deitu Rak', 'pasahitza', NULL),
(9, 'espota@ehu.eus', ' irakaslea', 'Deiturek Hey', 'pasahitza', ''),
(10, 'lolposta@ehu.eus', ' ikaslea', 'dei turing', 'pasatxoa', ''),
(11, 'airakaslea@ehu.eus', ' irakaslea', 'aa', 'pasahitza', ''),
(12, 'irakosle@ehu.eus', ' ikaslea', 'asjda', 'pasahitza', 'get lost'),
(13, 'lelo@ehu.eus', ' ikaslea', 'adkñjfn', 'pasahitza', '../images/1.'),
(14, 'lolo@ehu.eus', ' ikaslea', 'alkfjls', 'pasahitza', '../images/1.'),
(15, 'poposta@ehu.eus', ' ikaslea', 'popo', 'pasahitza', '../images/1.'),
(16, 'poposta@ehu.eus', ' ikaslea', 'popo', 'pasahitza', '../images/1.'),
(17, 'poposta@ehu.eus', ' ikaslea', 'popo', 'pasahitza', '../images/1.'),
(18, 'sdfsm@ehu.eus', ' ikaslea', 'aslkfj', 'pasahitza', '../images/1.'),
(19, 'sdfsm@ehu.eus', ' ikaslea', 'aslkfj', 'pasahitza', '../images/1.'),
(20, 'sdfsm@ehu.eus', ' ikaslea', 'aslkfj', 'pasahitza', ''),
(21, 'sdfsm@ehu.eus', ' ikaslea', 'aslkfj', 'pasahitza', ''),
(22, 'sdfsm@ehu.eus', ' ikaslea', 'aslkfj', 'pasahitza', ''),
(23, 'eregis@ehu.eus', ' irakaslea', 'eregis@ehu.eus', 'eregis@ehu.eus', ''),
(24, 'eregis@ehu.eus', ' irakaslea', 'eregis@ehu.eus', 'eregis@ehu.eus', ''),
(25, 'eregis@ehu.eus', ' irakaslea', 'eregis@ehu.eus', 'pasahitza', ''),
(26, 'posta@ehu.eus', ' ikaslea', 'aaklfns', 'pasahitza', '../images/as.png'),
(27, 'erregistratu@ehu.eus', ' ikaslea', 'erre', 'pasahitza', '../images/as1.png'),
(28, 'beste@ehu.eus', ' ikaslea', 'dei turing', 'pasahitza', '../images/beste@ehu.eus'),
(29, 'leloaa@ehu.eus', ' ikaslea', 'lel', 'pasahitza', '../images/leloaa@ehu.eus'),
(30, 'sasa@ehu.eus', ' ikaslea', 'delank', 'pasahitza', '../images/sasa@ehu.euspng'),
(31, 'sasaaaa@ehu.eus', ' ikaslea', 'delank', 'pasahitza', '../images/sasaaaa@ehu.eus.png'),
(32, 'sasaaaaaaaa@ehu.eus', ' ikaslea', 'delank', 'pasahitza', '../images/sasaaaaaaaa.png'),
(33, 'erabiltzea@ehu.eus', ' ikaslea', 'delank', 'pasahitza', '../images/erabiltzea.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`indizea`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `indizea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
