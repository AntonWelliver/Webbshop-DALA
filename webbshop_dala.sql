-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 17 mars 2019 kl 16:31
-- Serverversion: 10.1.37-MariaDB
-- PHP-version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `webbshop_dala`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `account`
--

CREATE TABLE `account` (
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IsSubscriber` tinyint(1) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `account`
--

INSERT INTO `account` (`Username`, `Email`, `Password`, `IsSubscriber`, `IsAdmin`) VALUES
('12345', '123456', '$2y$10$P4dxax/Aamb1GelmmeVHYORcajuU93FyFkxB7DMZyFUFX5Iko2Ppi', 0, 0),
('Alcr33k2', 'alex.all1e@hotmail.com', '$2y$10$GY/psuqiUZOIgc8XAKT85ugWLmDAbQQIsxsSvfsvU9.AqTasw.dV6', 0, 0),
('alcr33k4', 'alex.alle123@mail.com', '$2y$10$Nbc6hFkTkqCy0ISQkaos4uAN6J7RkyY0aEpLrZOb96dyzgYpsCRty', 1, 0),
('alex123', 'alex.alle1@hotmail.com', '$2y$10$gkYt3sOA/h5qp6CqZMSCEO/.cHeizGx0tzvGjQtSDV8fjTzG1ry72', 1, 0),
('alexanderb', 'alex.alle21@mail.com', '$2y$10$Vq4HIkn.qWE9RfP7uWMKsO/gU8/aaFIXJNHvO9yeofPMYrIbpR/m2', 0, 0),
('alcr33k', 'alex.alle@hotmail.com', '$2y$10$lOqR5EGe1S9T8CBgvTRie.cD7NasRxf64OuVnpOUn/UrKxDe1nDoO', 1, 0),
('dala', 'dala@gmail.com', '$2y$10$nAal.FeQvK.RrBgPKH6ytODA5Mrqv8f65aGK9FyRNQFSsO2TthIR.', 0, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Adress` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `PhoneNr` varchar(255) NOT NULL,
  `EmailAdress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `customer`
--

INSERT INTO `customer` (`CustomerID`, `Firstname`, `Lastname`, `Adress`, `City`, `PhoneNr`, `EmailAdress`) VALUES
(1, 'Lars', 'Nihlmark', 'Doktor Belfrages gata 24 lgh 1102', 'GÃ¶teborg', '0700513810', 'larsnihlmark@gmail.com'),
(2, 'Alexander', 'Björkenhall', 'Gamla Södåkravägen 504', 'Lerum', '12311213', 'alex.alex@hotmail.com'),
(9, 'Mike', 'Smith', 'Av Venture 71', 'New York', '+53 73828 3213', 'Mike@gmail.com'),
(10, 'John', 'Doe', '123 Fake Street', 'Göteborg', '01231233', 'fake@mail.com'),
(11, 'Test', '123', 'Test rd 1', 'Mölndal', '0793121212', 'test@email.co.uk'),
(14, 'Alexander', 'MrMcallingan', '123 Street', 'Partille', '123123123', 'alex.alle@mail.com'),
(15, 'James', 'Dala', 'Fake Street 123', 'Göteborg', '123456789', 'dala@gmail.com'),
(16, 'Mike', '123', 'fake 123', 'Lerum', '123456789', 'whey@mail.com'),
(17, 'John', 'Cena', '12321', 'Partille', '123456789', 'john@adsa.co'),
(21, 'Mike', 'Smith', '123 Fake Street', 'Partille', '123456789', 'Mike@fake.com');

-- --------------------------------------------------------

--
-- Tabellstruktur `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `ShippingAlternative` varchar(255) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Sent` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `order`
--

INSERT INTO `order` (`OrderID`, `TotalPrice`, `ShippingAlternative`, `CustomerID`, `Sent`) VALUES
(23, 30, 'PostNord', 11, 1),
(24, 95, 'PostNord', 13, 1),
(32, 81, 'DHL', 21, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `orderhistory`
--

CREATE TABLE `orderhistory` (
  `CustomerID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `orderhistory`
--

INSERT INTO `orderhistory` (`CustomerID`, `OrderID`) VALUES
(21, 32);

-- --------------------------------------------------------

--
-- Tabellstruktur `orderlist`
--

CREATE TABLE `orderlist` (
  `OrderID` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `orderlist`
--

INSERT INTO `orderlist` (`OrderID`, `Product`, `Quantity`) VALUES
(18, '4', 1),
(19, '4', 1),
(20, '4', 1),
(21, '4', 1),
(22, '4', 1),
(23, '4', 1),
(24, '4', 1),
(24, '5', 1),
(24, '6', 1),
(25, '4', 1),
(25, '5', 1),
(25, '6', 1),
(26, '4', 3),
(26, '6', 1),
(27, '10', 1),
(27, '8', 3),
(27, '6', 2),
(30, '10', 1),
(30, '8', 3),
(30, '6', 2),
(31, '10', 1),
(31, '8', 3),
(31, '6', 2),
(32, '1', 3),
(32, '2', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `imageSource` varchar(250) NOT NULL,
  `UnitsInStock` int(11) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Price`, `Category`, `imageSource`, `UnitsInStock`) VALUES
(1, 'Äpple', 22, 'Frukt', 'Apple.png', 97),
(2, 'Banan', 15, 'Frukt', 'Banan.png', 29),
(3, 'Vindruvor', 32, 'Frukt', 'Grapes.png', 30),
(4, 'Apelsin', 30, 'Frukt', 'Orange.png', 21),
(5, 'Päron', 35, 'Frukt', 'Pear.png', 28),
(6, 'Citron', 30, 'Grönsaker', 'citron.jpg', 21),
(7, 'Gurka', 76, 'Grönsaker', 'gurka.png', 30),
(8, 'Majs', 10, 'Grönsaker', 'majs.png', 21),
(9, 'Sallad', 20, 'Grönsaker', 'sallad.png', 30),
(10, 'Tomat', 6, 'Grönsaker', 'tomat.png', 27),
(11, 'Blandfärs', 120, 'Kött & fisk', 'blandfärs.png', 30),
(12, 'Fiskbullar', 44, 'Kött & fisk', 'Fiskbullar.png', 30),
(13, 'Juice', 18, 'Dryck', 'juice.png', 30),
(14, 'Mjölk', 10, 'Mejeri & Ost', 'Milk.png', 30),
(15, 'Coca Cola', 10, 'Dryck', 'coca-cola.png', 30),
(16, 'Loka', 10, 'Dryck', 'loka.png', 30),
(17, 'Red Bull', 20, 'Dryck', 'red-bull.jpg', 30),
(18, 'Vatten', 15, 'Dryck', 'vatten.png', 30),
(19, 'Fiskpinnar', 40, 'Kött & fisk', 'fiskpinnar.png', 30),
(20, 'Fläskkarré', 85, 'Kött & fisk', 'fläskkarre.png', 30),
(21, 'Kycklingklubbor', 84, 'Kött & fisk', 'kycklingklubbor.png', 30),
(22, 'Köttbullar', 100, 'Kött & fisk', 'köttbullar.png', 30),
(23, 'Chicken Nuggets', 66, 'Kött & fisk', 'nuggets.png', 30),
(24, 'Gravad Lax', 75, 'Kött & fisk', 'Gravad-lax.png', 30),
(25, 'Kallrökt Lax', 36, 'Kött & fisk', 'kallrökt-lax.png', 30),
(26, 'Vegansk Falafel', 36, 'Kött & fisk', 'vegansk-falafel.png', 30),
(27, 'Vegansk Filé', 40, 'Kött & fisk', 'veganskfile.gif', 30),
(28, 'Yoghurt', 23, 'Mejeri & Ost', 'Yogurt.png', 30),
(29, 'Smör', 80, 'Mejeri & Ost', 'Butter.png', 30),
(30, 'Ost', 68, 'Mejeri & Ost', 'Cheese.png', 30),
(31, 'Grädde', 50, 'Mejeri & Ost', 'Cream.png', 30),
(32, 'Ägg', 38, 'Mejeri & Ost', 'Egg.png', 30);

-- --------------------------------------------------------

--
-- Tabellstruktur `shipping`
--

CREATE TABLE `shipping` (
  `Company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `shipping`
--

INSERT INTO `shipping` (`Company`) VALUES
('DHL'),
('PostNord');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Email`);

--
-- Index för tabell `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Index för tabell `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`);

--
-- Index för tabell `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`OrderID`);

--
-- Index för tabell `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Index för tabell `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`Company`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT för tabell `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT för tabell `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
