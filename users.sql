-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Oca 2021, 21:23:54
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
  `expenseid` int(50) NOT NULL,
  `expense` int(50) NOT NULL,
  `expensename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `adminpanel`
--

INSERT INTO `adminpanel` (`rate`, `expenseid`, `expense`, `expensename`) VALUES
(2500, 1, 3000, 'Gardening'),
(3000, 2, 5000, 'Pool'),
(4000, 3, 2000, 'Cinema'),
(30000, 4, 2400, 'Maintenance'),
(3000, 5, 5000, 'Maintenance');

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
-- Tablo için tablo yapısı `announcement`
--

CREATE TABLE `announcement` (
  `annoid` int(50) NOT NULL,
  `announcement` text NOT NULL,
  `subject` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `announcement`
--

INSERT INTO `announcement` (`annoid`, `announcement`, `subject`, `date`) VALUES
(1, 'No water', 'Water', '2021-01-30'),
(2, 'No internet from today to tomorrow.', 'Internet', '2021-01-30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `message` text NOT NULL,
  `messageid` int(50) NOT NULL,
  `subject` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`message`, `messageid`, `subject`, `date`, `username`) VALUES
('hello', 1, 'hi', '2021-01-30', 'pinar'),
('i love you', 2, 'whats up', '2021-01-30', 'pinar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `incomes`
--

CREATE TABLE `incomes` (
  `incomeid` int(50) NOT NULL,
  `income` int(50) NOT NULL,
  `incomename` text NOT NULL,
  `incomedate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `incomes`
--

INSERT INTO `incomes` (`incomeid`, `income`, `incomename`, `incomedate`) VALUES
(1, 234, 'sdfsd', '2021-01-29'),
(2, 341, 'Supermarket Rent', '2021-01-29'),
(3, 5000, 'Barbet Rent', '2021-01-29'),
(4, 300, 'Rent', '2021-01-30');

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
(1, 'Onur Ata Asar', 'onur', 3000, '2021-01'),
(2, 'Ömer Eren', 'omer', 3000, '2021-01'),
(3, 'Pınar Cengiz', 'pinar', 3000, '2021-01'),
(4, 'Eda Avci', 'eda', 3000, '2021-01'),
(5, 'Onur Asar', 'onur', 3000, '2021-01'),
(6, 'Onur Ata Asar', 'onur', 3000, '2021-01'),
(7, 'Pınar Cengiz', 'pinar', 2500, '2021-01'),
(8, 'Pınar Cengiz', 'pinar', 3000, '2020-12');

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
  `block` varchar(7) NOT NULL DEFAULT 'A Block',
  `entrydate` date NOT NULL DEFAULT current_timestamp(),
  `outdate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `doorno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userID`, `username`, `psw`, `name`, `email`, `block`, `entrydate`, `outdate`, `status`, `doorno`) VALUES
(1, 'onur', '4297f44b13955235245b2497399d7a93', 'Onur Asar', 'onurasar@gmail.com', 'A Block', '2021-01-29', NULL, 1, 1),
(2, 'pinar', '4297f44b13955235245b2497399d7a93', 'Pınar Cengiz', 'pinarcengiz@gmail.com', 'B Block', '2021-01-29', NULL, 1, 1),
(3, 'ersin', '4297f44b13955235245b2497399d7a93', 'Ersin Kasap', 'ersinkasap@gmail.com', 'C Block', '2021-01-29', NULL, 1, 1),
(4, 'omer', '4297f44b13955235245b2497399d7a93', 'Ömer Melih Eren', 'omereren@gmail.com', 'B Block', '2021-01-29', NULL, 1, 2),
(5, 'eda', '4297f44b13955235245b2497399d7a93', 'Eda Avci', 'edaavci@gmail.com', 'A Block', '2021-01-29', NULL, 1, 2),
(6, 'cem', '4297f44b13955235245b2497399d7a93', 'Cem Dinçman', 'cem@gmail.com', 'B Block', '2021-01-29', '2021-01-29', 0, 3),
(7, 'efe', '4297f44b13955235245b2497399d7a93', 'Efe Ozdal', 'efeozdal@gmail.com', 'C Block', '2021-01-29', '2021-01-29', 0, 2),
(8, 'halilasar', '4297f44b13955235245b2497399d7a93', 'Halil Asar', 'halilasar@gmail.com', 'B Block', '2021-01-30', '2021-01-30', 0, 4);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminpanel`
--
ALTER TABLE `adminpanel`
  ADD PRIMARY KEY (`expenseid`),
  ADD KEY `rate` (`rate`) USING BTREE;

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Tablo için indeksler `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`annoid`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`messageid`);

--
-- Tablo için indeksler `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`incomeid`);

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
-- Tablo için AUTO_INCREMENT değeri `adminpanel`
--
ALTER TABLE `adminpanel`
  MODIFY `expenseid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `announcement`
--
ALTER TABLE `announcement`
  MODIFY `annoid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `messageid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `incomes`
--
ALTER TABLE `incomes`
  MODIFY `incomeid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `payment`
--
ALTER TABLE `payment`
  MODIFY `payno` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
