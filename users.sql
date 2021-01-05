-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Oca 2021, 20:50:28
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `users`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminpanel`
--

CREATE TABLE `adminpanel` (
  `rate` int(50) NOT NULL,
  `expense` int(50) NOT NULL,
  `expensename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `adminpanel`
--

INSERT INTO `adminpanel` (`rate`, `expense`, `expensename`) VALUES
(2500, 3000, 'Gardening'),
(3000, 5000, 'Pool');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `adminID` int(50) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminUsername` varchar(50) NOT NULL,
  `adminPsw` varchar(50) NOT NULL,
  `adminEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`adminID`, `adminName`, `adminUsername`, `adminPsw`, `adminEmail`) VALUES
(1, 'Onur Ata Asar', 'onurataasar', '192837465', 'onurataasar@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payment`
--

CREATE TABLE `payment` (
  `payno` int(25) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `payment`
--

INSERT INTO `payment` (`payno`, `name`, `username`, `price`, `date`) VALUES
(1, 'Onur Ata Asar', 'onur', 3000, '05.Jan.2021'),
(2, 'Ömer Eren', 'omer', 3000, '05.Jan.2021'),
(3, 'Pınar Cengiz', 'pinar', 3000, '05.Jan.2021'),
(4, 'Eda Avci', 'eda', 3000, '05.Jan.2021');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userID` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `block` varchar(7) NOT NULL DEFAULT 'A Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userID`, `username`, `psw`, `name`, `email`, `block`) VALUES
(1, 'onur', '4297f44b13955235245b2497399d7a93', 'Onur Asar', 'onurasar@gmail.com', 'A Block'),
(2, 'pinar', '4297f44b13955235245b2497399d7a93', 'Pınar Cengiz', 'pinarcengiz@gmail.com', 'B Block'),
(3, 'ersin', '4297f44b13955235245b2497399d7a93', 'Ersin Kasap', 'ersinkasap@gmail.com', 'C Block'),
(4, 'omer', '4297f44b13955235245b2497399d7a93', 'Ömer Melih Eren', 'omereren@gmail.com', 'B Block'),
(5, 'eda', '4297f44b13955235245b2497399d7a93', 'Eda Avci', 'edaavci@gmail.com', 'A Block'),
(6, 'cem', '4297f44b13955235245b2497399d7a93', 'Cem Dinçman', 'cem@gmail.com', 'B Block');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminpanel`
--
ALTER TABLE `adminpanel`
  ADD PRIMARY KEY (`rate`);

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Tablo için indeksler `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payno`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `payment`
--
ALTER TABLE `payment`
  MODIFY `payno` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
