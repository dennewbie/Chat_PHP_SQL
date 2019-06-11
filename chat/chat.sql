-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2018 at 11:57 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messaggio`
--

CREATE TABLE `messaggio` (
  `codMessaggio` int(50) NOT NULL,
  `datainvio` datetime NOT NULL,
  `messaggio` varchar(3000) NOT NULL,
  `username` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messaggio`
--

INSERT INTO `messaggio` (`codMessaggio`, `datainvio`, `messaggio`, `username`) VALUES
(1, '2018-04-03 18:25:06', 'prova', 'Denny'),
(2, '2018-04-03 18:33:30', 'Salve ragazzi.', 'Denny'),
(3, '2018-04-03 18:35:37', 'Tutto bene? Come state?', 'Giorgio99'),
(4, '2018-04-03 19:34:02', 'Hey Giorgio.', 'Denny'),
(5, '2018-04-03 19:43:43', 'A me tutto bene. A te?', 'Denny'),
(6, '2018-04-03 19:44:00', 'Bene bene. Ora vado.', 'Giorgio99'),
(7, '2018-04-03 19:47:57', 'Ciao ragazzi. Mi sono appena registrato.', 'LucaEsposito1'),
(8, '2018-04-04 17:02:36', 'buona sera a tutti', 'IlaC.'),
(9, '2018-04-04 17:02:53', 'Ciao IlaC.', 'Denny'),
(10, '2018-05-01 13:51:32', 'Heyyy. Ragazzi ciaoo. Ma da quanto tempo non ci vediamo? SarÃ  il caso di organizzare una rimpatriata o no? :D', 'Giorgio99');

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `username` varchar(50) NOT NULL,
  `passcode` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `datanascita` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`username`, `passcode`, `email`, `nome`, `cognome`, `datanascita`, `status`) VALUES
('Denny', '4f2912363b0b45bcf8acb4090b73a192', 'denny-sscn10@hotmail.it', 'Denny', 'Caruso', '2000-02-20', 0),
('Giorgio99', '2ad85b1ad503d11fa709cd270244f3a2', 'giorgio.esposito@gmail.com', 'Giorgio', 'Esposito', '1999-02-01', 0),
('Giovanni22', 'fa6f4958e71b234b41e47d38a656878a', 'opreigojs@rgjgn.com', 'Giovanni', 'Piedimonte', '2000-02-20', 0),
('IlaC.', 'd336c1a668add6feba2b7508fdc0484c', 'ilaria.caruso@live.com', 'Ilaria', 'Caruso', '1992-08-13', 0),
('LucaEsposito1', 'eda6391f45c4a9de2088403d924518e9', 'luca.esposito@gmail.com', 'Luca', 'Esposito', '1980-03-13', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messaggio`
--
ALTER TABLE `messaggio`
  ADD PRIMARY KEY (`codMessaggio`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messaggio`
--
ALTER TABLE `messaggio`
  MODIFY `codMessaggio` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `messaggio`
--
ALTER TABLE `messaggio`
  ADD CONSTRAINT `messaggio_ibfk_1` FOREIGN KEY (`username`) REFERENCES `utente` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
