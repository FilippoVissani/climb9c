-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 26, 2021 alle 13:53
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `climb_9c`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `address`
--

CREATE TABLE `address` (
  `idADDRESS` int(11) NOT NULL,
  `street` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `address`
--

INSERT INTO `address` (`idADDRESS`, `street`, `province`, `city`, `zip_code`, `name`, `surname`) VALUES
(17, 'Via Palmiro Togliatti n°2', 'Arezzo', 'Sansepolcro', '52037', 'Sofia', 'Belloni'),
(18, 'via dei tulipani 8', 'FC', 'Bivio', '83920', 'Mario', 'Rossi'),
(32, 'indirizzo prova 10/2', 'provincia', 'città', '34567', 'Prova', '2'),
(33, 'indirizzo prova 8/2', 'provincia', 'città', '34567', 'Prova', '2'),
(34, 'indirizzo prova 10/2', 'provincia', 'città', '34567', 'Prova', '2'),
(35, 'via dei tulipani 8', 'FC', 'Bivio', '83920', 'Mario', 'Rossi'),
(36, 'Via Palmiro Togliatti n°2', 'Arezzo', 'Sansepolcro', '52037', 'Sofia', 'Belloni'),
(37, 'Via Palmiro Togliatti n°2', 'Arezzo', 'Sansepolcro', '52037', 'Sofia', 'Belloni'),
(38, 'indirizzo prova 66', 'provincia', 'città', '87644', 'Prova', '2'),
(39, 'indirizzo prova 66', 'provincia', 'città', '87644', 'Prova', '2'),
(40, 'indirizzo prova 8/2', 'provincia', 'città', '34567', 'Prova', '2'),
(41, 'Via Palmiro Togliatti n°2', 'Arezzo', 'Sansepolcro', '52037', 'Sofia', 'Belloni'),
(42, 'Via Palmiro Togliatti n°2', 'Arezzo', 'Sansepolcro', '52037', 'Sofia', 'Belloni'),
(43, 'Piazza della Costituzione', 'Milano', 'Milano', '20019', 'Mario', 'Rossi'),
(44, '', '', '', '', '', ''),
(45, 'Via della Repubblica 10', 'PU', 'Fano', '61032', 'Eddie', 'Barzi'),
(46, '', '', '', '', '', ''),
(47, 'Via Palmiro Togliatti n°2', 'Arezzo', 'Sansepolcro', '52037', 'Sara', 'Belloni'),
(48, 'via dei tulipani 8', 'FC', 'Bivio', '83920', 'Mario', 'Rossi'),
(49, 'Via XXV Aprile, 396', 'FC', 'Cesena', '47521', 'Eddie', 'Barzi'),
(50, 'Via della Costituzione n°7', 'Arezzo', 'Sansepolcro', '52037', 'Sofia', 'Belloni');

-- --------------------------------------------------------

--
-- Struttura della tabella `cart`
--

CREATE TABLE `cart` (
  `idCUSTOMER` int(11) NOT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cart`
--

INSERT INTO `cart` (`idCUSTOMER`, `last_update`) VALUES
(3, '2021-01-22'),
(4, '2021-01-22'),
(8, '2021-01-25'),
(9, '2021-01-26');

-- --------------------------------------------------------

--
-- Struttura della tabella `cart_product`
--

CREATE TABLE `cart_product` (
  `idCART` int(11) NOT NULL,
  `idPRODUCT` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cart_product`
--

INSERT INTO `cart_product` (`idCART`, `idPRODUCT`, `quantity`) VALUES
(4, 1, 1),
(8, 2, 10),
(9, 2, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `idCATEGORY` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `category`
--

INSERT INTO `category` (`idCATEGORY`, `name`) VALUES
(1, 'Abbigliamento'),
(2, 'Arrampicata'),
(3, 'Ferramenta'),
(4, 'Trekking');

-- --------------------------------------------------------

--
-- Struttura della tabella `coupon`
--

CREATE TABLE `coupon` (
  `code` varchar(10) NOT NULL,
  `discount` varchar(45) NOT NULL,
  `validity` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `coupon`
--

INSERT INTO `coupon` (`code`, `discount`, `validity`) VALUES
('0000000001', '30', 1),
('0000000002', '10', 0),
('25122021', '5', 1),
('COUPON30', '30', 1),
('TEST', '100', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `customer`
--

CREATE TABLE `customer` (
  `idCUSTOMER` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `customer`
--

INSERT INTO `customer` (`idCUSTOMER`, `name`, `surname`, `email`, `password`, `telephone`, `gender`, `birthdate`) VALUES
(1, 'Sofia', 'Belloni', 'sofiabelloni@gmail.com', 'prova', '3206658639', 0, '2021-01-03'),
(3, 'Prova', '2', 'accountprova@ex.it', 'ciao', '1234567890', 1, '2006-01-05'),
(4, 'Prova', '2', 'accountprovahash@ex.it', '$2y$10$T3iG4jgdfEiZlI4lm.jud.3/q6cJvFZpEJ3lsqmaGyUiwNjwoWAsm', '1234567890', 1, '2021-01-02'),
(5, 'Sofia', 'Belloni', 'sofiabelloni99@gmail.com', '$2y$10$bQjIU/YNV3846SpW/DcfY.eMRAlN4hnEbOhkxczsl3/l4IShLu96C', '3206658639', 0, '1999-05-23'),
(6, 'Mario', 'Rossi', 'mariorossi@libero.it', '$2y$10$FcWkKpi2KQJWAOfTdkTKgeOIDkDXv/W44jhCtImgHDg9Sa9h5Bcqm', '3388527629', 1, '1982-10-21'),
(7, 'Eddie', 'Barzi', 'eddie@barzi.it', '$2y$10$lFqmhPr9Jm0ih.8AAoPybuM5.xblxmmItMOk9Bno1EPkVunh9iKzi', '3405307777', 1, '1999-03-06'),
(8, 'Sara', 'Belloni', 'sarabelloni@gmail.com', '$2y$10$Fc/PzoHgCVk7tPCZiRqMb.hlQ4MDBrWcL4DxW/af6HeGnU93PYxL2', '3206658639', 0, '2021-01-10'),
(9, 'Eddie', 'Barzi', 'eddie@gmail.com', '$2y$10$ulKmd73jJX0ImVAMoEMCdeafiTDNSmrpUmpaT6bLSveF/w9RFPVTC', '3652512300', 1, '1999-03-06'),
(10, 'Sofia', 'Belloni', 'sofiabelloni2@gmail.com', '$2y$10$GKgJ5X/8e1H7GLooO9XMQ.2N6pgbzAQUl.zzLlZKsr.1qiXK6b4AW', '3206658639', 0, '1993-07-16');

-- --------------------------------------------------------

--
-- Struttura della tabella `customer_address`
--

CREATE TABLE `customer_address` (
  `idCUSTOMER` int(11) NOT NULL,
  `idADDRESS` int(11) NOT NULL,
  `idCUSTOMER_ADDRESS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `customer_address`
--

INSERT INTO `customer_address` (`idCUSTOMER`, `idADDRESS`, `idCUSTOMER_ADDRESS`) VALUES
(1, 17, 1),
(1, 18, 2),
(1, 32, 3),
(1, 33, 4),
(1, 34, 5),
(1, 35, 6),
(1, 36, 7),
(1, 37, 8),
(1, 38, 9),
(3, 39, 10),
(4, 40, 11),
(5, 42, 12),
(6, 43, 13),
(7, 45, 14),
(8, 47, 15),
(8, 48, 16),
(9, 49, 17),
(10, 50, 18);

-- --------------------------------------------------------

--
-- Struttura della tabella `customer_notification`
--

CREATE TABLE `customer_notification` (
  `id_customer_notification` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `message` text NOT NULL,
  `visualized` tinyint(1) DEFAULT 0,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `customer_notification`
--

INSERT INTO `customer_notification` (`id_customer_notification`, `id_customer`, `title`, `message`, `visualized`, `time`) VALUES
(3, 7, 'qwertyuiop', 'qwertyuiop', 1, '2021-01-22 23:10:26'),
(4, 7, 'asdfghjkl', 'asdfghjkl', 1, '2021-01-22 23:11:19'),
(5, 7, 'zxcvbnm', 'zxcvbnm', 1, '2021-01-22 23:11:34'),
(6, 7, 'argreg', 'ergege', 0, '2021-01-23 21:37:41'),
(10, 9, 'Il tuo ordine è stato spedito!', 'Il tuo ordine con ID=23 è stato spedito. Visualizza ordine <a href=\'order-detail.php?id=23\'>LINK</a>', 1, '2021-01-24 09:08:50'),
(11, 9, 'Il tuo ordine è stato spedito!', 'Il tuo ordine con ID=23 è stato spedito. Visualizza ordine <a href=\'order-detail.php?id=23\'>LINK</a>', 1, '2021-01-24 09:10:19'),
(12, 9, 'Il tuo ordine è stato spedito!', 'Il tuo ordine con ID=23 è stato spedito. Visualizza ordine <a href=\'order-detail.php?id=23\'>LINK</a>', 1, '2021-01-24 09:10:34'),
(13, 9, 'Il tuo ordine è stato spedito!', 'Il tuo ordine con ID=23 è stato spedito', 1, '2021-01-24 09:12:29'),
(14, 9, 'Il tuo ordine è stato spedito!', 'Il tuo ordine con ID=23 è stato spedito', 1, '2021-01-24 09:13:55'),
(15, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=35 è stato effettuato con successo.', 1, '2021-01-24 10:07:07'),
(16, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=36 è stato effettuato con successo.', 1, '2021-01-24 10:14:07'),
(17, 9, 'Il tuo ordine è stato spedito!', 'Il tuo ordine con ID=36 è stato spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"36\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 10:14:52'),
(18, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=37 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"37\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 10:21:57'),
(19, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=38 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"38\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 10:25:02'),
(20, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=39 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"39\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 10:30:27'),
(21, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=40 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"40\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 10:36:31'),
(22, 9, 'Il tuo ordine è stato spedito!', 'Il tuo ordine con ID=40 è stato spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"40\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 11:15:35'),
(23, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=42 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"42\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 11:42:02'),
(24, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=43 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"43\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 14:57:01'),
(25, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=44 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"44\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 15:05:04'),
(26, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=45 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"45\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 15:06:48'),
(27, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=46 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"46\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 15:09:51'),
(28, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=47 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"47\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 15:11:19'),
(29, 9, 'Il tuo ordine è stato spedito!', 'Il tuo ordine con ID=27 è stato spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"27\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-25 22:05:02'),
(30, 9, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=48 è stato effettuato con successo. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"48\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-25 22:56:37'),
(31, 10, 'Ordine effettuato con successo!', 'Il tuo ordine con ID=49 è stato effettuato con successo.', 1, '2021-01-26 10:18:26');

-- --------------------------------------------------------

--
-- Struttura della tabella `order`
--

CREATE TABLE `order` (
  `idORDER` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_address` int(11) NOT NULL,
  `shipping_date` date DEFAULT NULL,
  `COUPONcode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `order`
--

INSERT INTO `order` (`idORDER`, `date`, `customer_address`, `shipping_date`, `COUPONcode`) VALUES
(1, '2021-01-20', 1, '2021-01-23', NULL),
(2, '2021-01-19', 2, '2021-01-23', NULL),
(3, '2021-01-01', 4, '2021-01-23', NULL),
(8, '2021-01-21', 5, '2021-01-21', 'COUPON30'),
(9, '2021-01-21', 1, '2021-01-21', NULL),
(10, '2021-01-21', 4, '2021-01-21', NULL),
(11, '2021-01-21', 10, '2021-01-21', NULL),
(12, '2021-01-22', 9, '2021-01-22', 'COUPON30'),
(13, '2021-01-22', 1, '2021-01-22', 'COUPON30'),
(14, '2021-01-22', 8, '2021-01-22', 'COUPON30'),
(15, '2021-01-22', 8, '2021-01-22', 'COUPON30'),
(16, '2021-01-22', 4, '2021-01-22', 'COUPON30'),
(18, '2021-01-23', 14, '2021-01-23', NULL),
(20, '2021-01-23', 12, '2021-01-24', NULL),
(23, '2021-01-23', 17, '2021-01-24', NULL),
(24, '2021-01-23', 17, NULL, 'COUPON30'),
(27, '2021-01-23', 17, '2021-01-25', NULL),
(28, '2021-01-23', 17, NULL, 'COUPON30'),
(29, '2021-01-23', 16, NULL, NULL),
(30, '2021-01-23', 17, NULL, NULL),
(31, '2021-01-23', 17, NULL, NULL),
(32, '2021-01-23', 17, '2021-01-23', NULL),
(33, '2021-01-24', 17, NULL, NULL),
(34, '2021-01-24', 17, NULL, NULL),
(35, '2021-01-24', 17, NULL, NULL),
(36, '2021-01-24', 17, '2021-01-24', NULL),
(37, '2021-01-24', 17, NULL, NULL),
(38, '2021-01-24', 17, NULL, NULL),
(39, '2021-01-24', 17, NULL, NULL),
(40, '2021-01-24', 17, '2021-01-24', NULL),
(41, '2021-01-24', 17, NULL, NULL),
(42, '2021-01-24', 17, NULL, NULL),
(43, '2021-01-24', 17, NULL, NULL),
(44, '2021-01-24', 17, NULL, NULL),
(45, '2021-01-24', 17, NULL, NULL),
(46, '2021-01-24', 17, NULL, NULL),
(47, '2021-01-24', 17, NULL, NULL),
(48, '2021-01-25', 17, NULL, 'COUPON30'),
(49, '2021-01-26', 18, NULL, '0000000001'),
(50, '2021-01-26', 18, NULL, '0000000001');

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `idPRODUCT` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `brand` varchar(45) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `idSUBCATEGORY` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `tecnical_specifications` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`tecnical_specifications`)),
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`idPRODUCT`, `name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `quantity`) VALUES
(1, '5.10 Five Ten Aleon VCS scarpette arrampicata', 'Five Ten', '99.00', 1, '5.10 Five Ten Aleon VCS sono delle scarpette da arrampicata pensata per il boulder o per l\'arrampicata in falesia. Tra tutte le novità da parte di Adidas Five Ten, le Aleon sono sicuramente le scarpette che meritano uno sguardo in più.\r\n\r\nCon la tomaia Ptimeknit sono estremamente avvolgenti e non appena le indossi la loro calzata ti stupirà: completamente fascianti, non lasciano vuoti d\'aria all\'interno e ti sembreranno dei calzini!\r\n\r\nLa punta arcuata verso il basso ti permette di fare degli ottimi agganci grazie anche alla copertura di gomma e il tallone ti facilita soprattutto nel boulder!\r\n\r\nLa suola è una Stealth C4, classica suola presente nelle scarpette Five Ten. Ormai super conosciuta, dona un grip senza precedenti!\r\n\r\nAttenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all\'acquisto prova a vedere qui sotto i numeri consigliati da noi.', '{\"Chiusura\":\"Strappo\",\"Utilizzo scarpetta\":\"Boulder, Falesia\",\"Tipo suola scarpetta\":\"Suola intera\",\"Aggressivita scarpetta\":\"Performante\"}', 5),
(2, 'La Sportiva Aragon Woman scarpette arrampicata donna', 'La Sportiva', '85.50', 1, 'La Sportiva Aragon Woman è la scarpetta da arrampicata perfetta se sei una prinicipiante o se cerchi un modello comodo, da utilizzare principalmente indoor, ma che si comporta bene anche su roccia!\r\n\r\nLa tomaia realizzata in pelle scamosciata è comoda a contatto con la pelle e con l\'uso si adatterà perfettamente alla forma del tuo piede. Il sistema di chiusura a doppio velcro è veloce e comodo da utilizzare e ti permette di togliere e mettere le scarpette in un secondo, oltre a trovare in un lampo la regolazione adatta al tuo piede. Con Aragon il confort di calzata è ai massimi livelli!\r\n\r\nLa suola è invece realizzata in gomma Frixion Black che ti garantisce un ottimo grip e una buona resistenza all\'abrasione in modo da aumentarne la durata e non doverle risuolare troppo spesso.', '{\"Chiusura\":\"Strappo\",\"Utilizzo scarpetta\":\"Boulder, Falesia, Palestra\",\"Tipo suola scarpetta\":\"Mezza suola\",\"Aggressivita\' scarpetta\":\"Performante\",\"Tecnologia scarpetta\":\"P3\",\"Materiale tomaia\":\"Scamosciato + Microfiber\",\"Materiale suola\":\"Vibram XS Grip\",\"Rigidit\\u00e0 scarpetta\":\"Morbida\"}', 10),
(3, '5.10 Five Ten Anasazi Lace - The Pink scarpette arrampicata', 'Five Ten', '86.95', 1, '5.10 Five Ten Anasazi Lace The Pink è una scarpetta da arrampicata con chiusura a lacci che si adatta alla perfezione per qualsiasi tipo di arrampicata, sia che si parli di palestre indoor sia di arrampicata su roccia.\r\n\r\nLa Anasazi Lace è una tra le scarpe più riuscite e storiche prodotte da Five Ten. Famosa è la precisione negli appoggi che la contraddistingue. Questo fa in modo che la scarpetta sia ottima sia per l\'arrampicata outdoor sia per le palestre.\r\n\r\nLa forma è leggermente asimmetrica ma nel complesso è una forma comoda e confortevole che la rende una tra le scarpette più utilizzate sia dai principianti sia dagli arrampicatori un pò più esperti.\r\n\r\nL\'allacciatura tradizionale consente di regolare alla perfezione i volumi interni e di personalizzare la calzata.\r\n\r\nL\'insieme di tutte queste caratteristiche fa in modo che Anasazi Lace sia anche una scarpetta molto apprezzata per le vie multi-pitch.\r\n\r\nAttenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all\'acquisto prova a vedere qui sotto i numeri consigliati da noi.', '{\"Chiusura\":\"Lacci\",\"Utilizzo scarpetta\":\"Falesia, Multitiro\",\"Tipo suola scarpetta\":\"Suola intera\",\"Aggressivita\' scarpetta\":\"Intermedia\",\"Tecnologia scarpetta\":\"P3\",\"Materiale tomaia\":\"Materiale sintetico\",\"Materiale suola\":\"Stealth C4\",\"Rigidit\\u00e0 scarpetta\":\"Media\"}', 10),
(4, '5.10 Five Ten Anasazi Pro scarpette arrampicata', 'Five Ten', '75.95', 1, 'La scarpetta da arrampicata e boulder  Anasazi Pro di 5.10 Five Ten è polivalente e combina sensibilità e potenza per l\'arrampicata a 360 gradi.\r\n\r\nAnasazi Pro è dotata di tomaia in tessuto sintetico, suola Stealth C4 fino alla punta per favorirti negli agganci e garantirti il massimo grip.\r\n\r\nCalzata precisa e stabile. L\'intersuola a media rigidità offre comfort nelle lunghe giornate in falesia e la chiusura velcro, un facile accesso.\r\n\r\nAnasazi Pro è la scarpetta perfetta se cerchi un prodotto comodo e performante!\r\n\r\nAttenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all\'acquisto prova a vedere qui sotto i numeri consigliati da noi.', '{\"Chiusura\":\"Strappo\",\"Utilizzo scarpetta\":\"Falesia, Multitiro\",\"Tipo suola scarpetta\":\"Suola intera\",\"Aggressivita\' scarpetta\":\"Intermedia\",\"Tecnologia scarpetta\":\"P3\",\"Materiale tomaia\":\"Materiale sintetico\",\"Materiale suola\":\"Stealth C4\",\"Rigidit\\u00e0 scarpetta\":\"Media\"}', 10),
(5, 'BD Black Diamond Momentum Ash scarpette arrampicata', 'Black Diamond', '63.55', 1, 'BD Black Diamond Momentum scarpette arrampicata sono la scelta giusta per chi è alla ricerca di un modello comodo e confortevole per compiere i primi passi in parete.\r\n\r\nLa mescola Neo Regular è bella rigida e durevole, perfetta per la placca e perfetta se hai bisogno di una bestia da soma da sfruttare a lungo!\r\n\r\nUna scarpetta dal carattere versatile che si presta bene non solo ad un utilizzo in palestra, ma anche in falesia e su vie lunghe.\r\n\r\nPer garantirti un\'eccellente traspirabilità, sostegno ed elasticità nei punti strategici, Black Diamond costruisce le Momentum con la nuova tecnologia Engineered Knit mentre la nuova gomma NeoFriction e l\'intersuola ti offrono una straordinaria morbidezza e comodità per un buon livello di spalmata.\r\n\r\nUn altro interessante accorgimento è la fodera in microfibra nella parte frontale, studiato per migliorare la longevità della scarpetta.\r\n\r\nGrazie all\'allacciatura in velcro, è facile da indossare e regolare.\r\n\r\nBD Black Diamond Momentum per un comfort supremo ed eccellenti performance!', '{\"Chiusura\":\"Strappo\",\"Utilizzo scarpetta\":\"Falesia, Multitiro\",\"Tipo suola scarpetta\":\"Suola intera\",\"Aggressivita\' scarpetta\":\"Intermedia\",\"Tecnologia scarpetta\":\"P3\",\"Materiale tomaia\":\"Materiale sintetico\",\"Materiale suola\":\"Stealth C4\",\"Rigidit\\u00e0 scarpetta\":\"Media\"}', 10),
(6, 'BD Black Diamond Half Dome casco arrampicata', 'Black Diamond', '49.00', 2, 'BD Black Diamond Half Dome è un caschetto ottimo per l\'arrampicata e le vie ferrata. Nella nuova versione rivisitata per il 2019, Half Dome è un caso comodo e funzionale da poter tenere indossato anche per molte ore.\r\n\r\nRidisegnate le clip per portare la lampada frontale, ridisegnato anche il cinturino di chiusura sotto la gola. Più sicuro e facilmente regolabile quando si è su roccia.\r\n\r\nLa scocca è realizzata in policarbonato con una calotta in EPS interna con profilo ribassato per aumentarne la comodità.\r\n\r\nIl sistema di regolazione è intuibile e utilizzabile anche con una mano sola, Half Dome infatti si può regolare attrevarso una rotella.', '{\"Genere\":\"Unisex\",\"Peso\":\"330 g\",\"Materiale\":\"Policarbonato + EPS\",\"Sistema di regolazione\":\"Rotella\"}', 4),
(13, 'La Sportiva Genius No Edge scarpette arrampicata', 'La Sportiva', '127.00', 1, 'La Sportiva Genius No Edge scarpetta da arrampicata sportiva e bouldering polivalente.\r\n\r\nLa scarpetta La Sportiva Genius è realizzata con tecnologie innovative. La costruzione No-Edge favorisce una maggiore sensibilità, permettendo un\'arrampicata più naturale e precisa. La chiusura a lacci garantisce comfort e adattabilità alla conformazione del piede, sia esso a pianta stretta che a pianta larga. Il sistema brevettato P3 (Permanent Power Platform) mantiene e distribuisce la tensione costante nel tempo. La tomaia, in costruzione tubolare, abbina vitello scamosciato e microfibra. La suola è Vibram® XS Grip2 3mm. L\'intersuola LaSpoFlex 1,1 mm completa è abbinata al P3 System.', '{\"Chiusura\":\"Lacci\",\"Utilizzo scarpetta\":\"Boulder, Falesia\",\"Tipo suola\":\"No Edge\",\"Tecnologia scarpetta\":\"P3\",\"Aggressivit\\u00e0 scarpetta\":\"Performante\"}', 18),
(14, 'La Sportiva Miura VS scarpette arrampicata', 'La Sportiva', '111.00', 1, 'La Sportiva Miura VS scarpetta da arrampicata sportiva e multipitch polivalente aggressiva e performante.  La scarpetta Miura VS è realizzata con la tecnologia innovativa P3 (Permanent Power Platform) che permette di mantenere la forma più a lungo nel tempo anche dopo numerosi utilizzi. E\' munita di allacciatura con tre velcri che velocizzano e facilitano la calzata. La tomaia a costruzione tubolare, è in vitello scamosciato. La suola è Vibram® XS Edge 4 mm. L\'intersuola LaSpoFlex 1,1 mm presente solo anteriormente, è abbinata al sistema P3. ', '{\"Chiusura\":\"Strappo\",\"Utilizzo scarpetta\":\"Falesia, Multitiro\",\"Tipo suola\":\"Suola intera\",\"Aggressivit\\u00e0 scarpetta\":\"Performante\"}', 43),
(16, 'Sacco a pelo ', 'brand', '55.00', 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '{\"specifica1\":\"descrzione1\",\"spec2\":\"desc2\"}', 5),
(17, 'CAMP Denali Line 800 sacco a pelo spedizioni', 'Piuma', '465.00', 4, 'CAMP Denali Line 800 è un sacco a pelo estremamente caldo, comodo e comprimibile. questa è la versione più leggera della linea Denali che, come ci dice il nome, ha un imbottitura di 800 g di piuma d\'oca di altissima qualità (filling power 750 cuin) per un ottimo isolamento.  Questo prodotto è stato studiato per le escursioni alpinistiche e per le spedizioni dove il peso e il volume sono un fattore importante. Infatto, grazie all\'utilizzo di materiali come l\'Araneum presente esternamente, si può comprimere fino ad occupare uno spazio davvero minimo. Per quanto riguarda il peso, invece, Denali Line 800 pesa solo 1350 g, considerando che l\'imbottitura ne pesa già 800!  Può raggiungere temperature davvero estreme (-12°/-32° C) questo grazie soprattutto ai particolari ottimi di questo prodotto: inanzitutto la costruzione a Down Box nella parete superiore, ci assicura che l\'imbottitura rimanga ben ferma donando quindi un ottimo isolamento. Ma a trattenere il calore non c\'è solo questo, infatti contribuiscono anche la pattella interna imbottita in corrispondenza della cerniera e il collare interno ed esterno intorno al cappuccio.', '{\"Forma\":\"Mummia\",\"Certificazione\":\"CE EN 13537\",\"Tecnologia\":\"3-D\",\"Peso\":\"1850 g\",\"Larghezza\":\"60 cm\"}', 25),
(19, 'Marmot Palisade sacco a pelo', 'Piuma', '221.00', 4, 'Marmot Palisade è un sacco a pelo con imbottitura in piuma certificata RDS ottimo per le tue escursioni primaverili e per le notti in campeggio.  La sua imbottitura in piuma 650 Fill Power con tecnologia Down Defender ti mantiene caldo anche in condizioni climatiche più rigide ed inoltre le sua proprietà termiche rimangono inalterate anche in caso di esposizione agli agenti atmosferici. Questa tecnologia è infatti un trattamento impermeabilizzante.  La forma è a mummia per mantenere il calore il più raccolto possibile mentre per facilitare l\'accesso è presente una zip che corre lungo tutta la lunghezza del sacco a pelo.', '{\"Forma\":\"Mummia\",\"Certificazione\":\"CE EN 13537\"}', 11),
(21, 'La Sportiva Kataki scarpette arrampicata', 'La Sportiva', '129.00', 1, 'La Sportiva Kataki scarpette arrampicata sono progettate per la falesia e dotate di chiusura lacci. La suola spezzata a 3/4 ti permette grande sensibilità nonostante la Kataki sia una scarpa bella rigida che ti sostiene durante i passaggi di placca più tecnici su appigli minimi. Il sistema di allacciatura è misto così che tu possa regolare perfettamente i volumi interni su tutta la lunghezza del collo. Il tallone S-Heel consiste nell\'innovativo sistema fasciante, confortevole soprattutto su pareti molto strapiombanti. La suola con plantare P3 mantiene a lungo la forma e permette una risuolatura perfetta. La mescola usata per la suola è la rinomata Vibram XS Edge.', '{\"Chiusura\":\"Lacci\",\"Utilizzo scarpetta\":\"Falesia\",\"Tipo suola\":\"Mezza suola\",\"Tecnologia scarpetta\":\"P3\",\"Aggressivit\\u00e0 scarpetta\":\"Performante\"}', 24),
(22, 'Black Diamond 9.4 Rope corda arrampicata', 'Black Diamond', '162.00', 8, 'BD Black Diamond 9.4 Rope corda arrampicata è la perfetta combinazione tra efficacia, resistenza e leggerezza, ideale per l\'arrampicata su roccia e indirizzata a chi cerca un alto livello di performance e di affidabilità giorno dopo giorno.  La corda è infatti resistente anche se usata per ripetute moulinette, ma allo stesso tempo rimane con un peso contenuto per permetterti di fare lavorazione di vie dure in falesia.  La sensazione al tatto è di una corda solida ma allo stesso tempo morbida e che scorre bene negli assicuratori. I trefoli della 9.4 sono intrecciati con il trattamento Regular Sheath, due su due: questa costruzione è la migliore quando l\'obiettivo è aumentare la resistenza all\'uso prolungato di ogni giorno.  9.4 è una corda che ti segue senza lamentarsi in tutte le attività verticali, così che potrai utilizzarla a lungo senza preoccuparti della sua tenuta nel tempo.  La metà della corda è segnata con HalfMark.', '{\"Tipologia corda\":\" Corda singola\",\"Diametro\":\" 9.4 mm\",\"Peso\":\" 58 g al metro\",\"Allungamento dinamico corda singola\":\" 34 %\",\"Forza d\'impatto corda singola\":\"8 kN\",\"Numero di cadute corda singola\":\"7\",\"Certificazione\":\" CE EN 892, UIAA\"}', 56),
(23, 'E9 Enove Rondo X 2 pantaloni uomo', 'E9', '71.00', 12, 'E9 Enove Rondo X 2 pantaloni da uomo perfetti per l\'arrampicata invernale: elastici e in cotone.  Hanno due tasche davanti e una dietro, in fondo alla gamba hanno una coulisse con cui puoi stringerli a piacimento per il massimo del comfort.', '{\"Genere\":\"Uomo\",\"Stagione\":\"Autunno-Inverno 2020-2021\",\"Materiale\":\"98% Organic Cotton, 2% Spandex\"}', 27),
(24, 'Crazy Idea Short Gulp Man pantaloni corti uomo', 'Crazy Idea', '67.00', 12, 'Crazy Idea Short Gulp Man sono pantaloni corti da uomo ottimi per l\'arrampicata dalla comoda vestibilità che non impedisce alcun tipo di movimento. ', '{\"Genere\":\"Uomo\",\"Stagione\":\" Primavera-Estate 2020\",\"Materiale\":\"97% cotone, 3% elastina\"}', 25),
(25, 'Rafiki Cliffbase pantaloni 3/4 uomo', 'Rafiki', '38.00', 12, 'Rafiki Cliffbase sono pantaloni a tre quarti da uomo ottimi per l\'arrampicata sia in inverno quando scalare al sole con i pantaloni lunghi fa caldo, ma sopratutto in estate se non vuoi ammaccarti troppo le ginocchia negli agganci di ginocchia sulle canne!', '{\"Genere\":\"Uomo\",\"Stagione\":\"Primavera-Estate 2020\",\"Materiale\":\"97% cotone, 3% elastina\"}', 65),
(26, 'Grivel Duetto casco alpinismo e scialpinismo', 'Grivel', '122.00', 2, 'Grivel Duettto è un casco estremamente innovativo con doppia certificazione: lo puoi infatti utilizzare per arrampicata / alpinismo ma anche per sciare.  La cosa particolare di questo casco è che Grivel è riuscita a creare un prodotto interamente in EPS senza doverci aggiungere nessun tipo di calotta rigida. Così facendo avrai un casco super leggero (solo 215 g) ma allo stesso resistente come se avesse la parte rigida.  Svariate aperture e quattro clip per la frontale completano la novità 2019 di Grivel.  Taglia unica da 53 a 60 cm di circonferenza testa.', '{\"Genere\":\"Unisex\",\"Peso\":\"215 g\",\"Certificazione\":\"CE EN 1077\\/B, CE EN 12492, UIAA 106\",\"Materiale\":\"EPS\"}', 27);

-- --------------------------------------------------------

--
-- Struttura della tabella `product_order`
--

CREATE TABLE `product_order` (
  `idPRODUCT` int(11) NOT NULL,
  `idORDER` int(11) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `product_order`
--

INSERT INTO `product_order` (`idPRODUCT`, `idORDER`, `quantity`, `unit_price`) VALUES
(1, 1, '2', '95.00'),
(1, 2, '10', '90.00'),
(1, 8, '8', '99.70'),
(1, 9, '8', '99.70'),
(1, 10, '8', '99.70'),
(1, 11, '1', '99.70'),
(1, 12, '1', '99.70'),
(1, 13, '1', '99.70'),
(1, 20, '1', '99.70'),
(1, 23, '1', '99.70'),
(1, 24, '1', '99.70'),
(1, 29, '2', '99.70'),
(1, 30, '1', '99.70'),
(1, 36, '1', '99.70'),
(1, 46, '2', '99.70'),
(1, 47, '8', '99.70'),
(2, 1, '7', '100.00'),
(2, 8, '1', '85.50'),
(2, 9, '1', '85.50'),
(3, 8, '4', '86.95'),
(3, 9, '4', '86.95'),
(3, 10, '4', '86.95'),
(3, 13, '3', '86.95'),
(3, 28, '1', '86.95'),
(3, 29, '1', '86.95'),
(3, 35, '1', '86.95'),
(3, 45, '11', '86.95'),
(4, 3, '20', '74.00'),
(4, 8, '5', '75.95'),
(4, 9, '5', '75.95'),
(4, 10, '5', '75.95'),
(4, 18, '2', '75.95'),
(4, 30, '1', '75.95'),
(4, 31, '1', '75.95'),
(4, 38, '1', '75.95'),
(4, 43, '2', '75.95'),
(5, 2, '2', '82.00'),
(5, 8, '5', '63.55'),
(5, 9, '5', '63.55'),
(5, 10, '5', '63.55'),
(5, 11, '2', '63.55'),
(5, 13, '2', '63.55'),
(5, 27, '1', '63.55'),
(5, 34, '1', '63.55'),
(5, 44, '4', '63.55'),
(6, 32, '15', '49.99'),
(6, 33, '1', '49.99'),
(6, 37, '1', '49.99'),
(6, 39, '1', '49.99'),
(6, 40, '1', '49.99'),
(6, 41, '1', '49.99'),
(6, 42, '1', '49.99'),
(6, 48, '4', '49.99'),
(6, 49, '1', '49.99'),
(19, 49, '1', '221.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `review`
--

CREATE TABLE `review` (
  `idREVIEW` int(11) NOT NULL,
  `idCUSTOMER` int(11) NOT NULL,
  `idPRODUCT` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `vote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `seller`
--

CREATE TABLE `seller` (
  `idSELLER` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `seller`
--

INSERT INTO `seller` (`idSELLER`, `email`, `password`) VALUES
(1, 'linus.trovalds@gmail.com', 'prova'),
(2, 'eddie@gmail.com', '$2y$10$ulKmd73jJX0ImVAMoEMCdeafiTDNSmrpUmpaT6bLSveF/w9RFPVTC');

-- --------------------------------------------------------

--
-- Struttura della tabella `seller_notification`
--

CREATE TABLE `seller_notification` (
  `id_seller_notification` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `message` text NOT NULL,
  `visualized` tinyint(1) NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `seller_notification`
--

INSERT INTO `seller_notification` (`id_seller_notification`, `title`, `message`, `visualized`, `time`) VALUES
(1, 'Nuovo ordine disponibile!', 'L\'ordine ID=35 è stato effettuato con successo ed è pronto per essere spedito.', 1, '2021-01-24 10:07:08'),
(2, 'Nuovo ordine disponibile!', 'L\'ordine ID=36 è stato effettuato con successo ed è pronto per essere spedito.', 1, '2021-01-24 10:14:08'),
(3, 'Nuovo ordine disponibile!', 'L`ordine ID=37 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"37\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 10:21:58'),
(4, 'Nuovo ordine disponibile!', 'L`ordine ID=38 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"38\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 10:25:03'),
(5, 'Nuovo ordine disponibile!', 'L`ordine ID=39 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"39\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 10:30:28'),
(6, 'Nuovo ordine disponibile!', 'L`ordine ID=40 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"40\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 10:36:32'),
(7, 'Nuovo ordine disponibile!', 'L`ordine ID=41 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"41\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 10:38:33'),
(8, 'Nuovo ordine disponibile!', 'L`ordine ID=42 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"42\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 11:42:01'),
(9, 'Nuovo ordine disponibile!', 'L`ordine ID=43 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"43\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 14:57:00'),
(10, 'Nuovo ordine disponibile!', 'L`ordine ID=44 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"44\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 15:05:02'),
(11, 'Nuovo ordine disponibile!', 'L`ordine ID=45 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"45\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 15:06:47'),
(12, 'Prodotto non più disponibile in magazzino!', 'Il prodotto 5.10 Five Ten Anasazi Lace - The Pink scarpette arrampicata, non è più disponibile in magazzino.', 1, '2021-01-24 15:06:49'),
(13, 'Nuovo ordine disponibile!', 'L`ordine ID=46 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"46\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 15:09:50'),
(14, 'Nuovo ordine disponibile!', 'L`ordine ID=47 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"47\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-24 15:11:17'),
(15, 'Prodotto non più disponibile in magazzino!', 'Il prodotto 5.10 Five Ten Aleon VCS scarpette arrampicata, non è più disponibile in magazzino.', 1, '2021-01-24 15:11:20'),
(16, 'Nuovo ordine disponibile!', 'L`ordine ID=48 è stato effettuato con successo ed è pronto per essere spedito. <form action=\"./order-detail.php\" method=\"post\"><input class=\"collapse\" type=\"text\" name=\"id\" value=\"48\" readonly=\"readonly\"><button type=\"submit\" class=\"btn btn-primary fw-bold\">DETTAGLI</button></form>', 1, '2021-01-25 22:56:36'),
(17, 'Nuovo ordine disponibile!', 'L`ordine ID=49 è stato effettuato con successo ed è pronto per essere spedito.', 0, '2021-01-26 10:18:24');

-- --------------------------------------------------------

--
-- Struttura della tabella `subcategory`
--

CREATE TABLE `subcategory` (
  `idSUBCATEGORY` int(11) NOT NULL,
  `idCATEGORY` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `subcategory`
--

INSERT INTO `subcategory` (`idSUBCATEGORY`, `idCATEGORY`, `name`) VALUES
(1, 2, 'Scarpette'),
(2, 2, 'Caschi'),
(3, 4, 'Tende'),
(4, 4, 'Sacchi a pelo'),
(5, 3, 'Dadi'),
(6, 2, 'Crash Pad'),
(7, 2, 'Travi'),
(8, 2, 'Corde'),
(9, 2, 'Attrezzatura da ghiaccio'),
(10, 3, 'Chiodi da roccia'),
(11, 4, 'Fornelli'),
(12, 1, 'Pantaloni'),
(13, 1, 'Magliette');

-- --------------------------------------------------------

--
-- Struttura della tabella `tag`
--

CREATE TABLE `tag` (
  `idTAG` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tag`
--

INSERT INTO `tag` (`idTAG`, `name`) VALUES
(1, 'Colore'),
(2, 'Chiusura'),
(3, 'Regolazione'),
(4, 'Forma'),
(5, 'Misura'),
(6, 'Lato apertura'),
(7, 'Colore'),
(8, 'Lunghezza'),
(9, 'Tipologia'),
(10, 'Rigidità'),
(11, 'Aggressività'),
(12, 'Colore'),
(13, 'Colore'),
(14, 'Colore');

-- --------------------------------------------------------

--
-- Struttura della tabella `tag_product`
--

CREATE TABLE `tag_product` (
  `idTAG` int(11) NOT NULL,
  `idPRODUCT` int(11) NOT NULL,
  `value` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tag_product`
--

INSERT INTO `tag_product` (`idTAG`, `idPRODUCT`, `value`) VALUES
(1, 1, 'Rosso'),
(1, 2, 'Grigio'),
(1, 3, 'Rosa'),
(1, 4, 'Arancione'),
(1, 5, 'Grigio'),
(1, 13, 'Rosso'),
(1, 14, 'Viola'),
(1, 21, 'Giallo'),
(2, 1, 'Strappo'),
(2, 2, 'Strappo'),
(2, 3, 'Lacci'),
(2, 4, 'Strappo'),
(2, 5, 'Strappo'),
(2, 13, 'Lacci'),
(2, 14, 'Lacci'),
(2, 21, 'Lacci'),
(3, 6, 'Rotella'),
(3, 14, 'Rotella'),
(3, 26, 'Fettuccia'),
(6, 17, 'Centrale'),
(6, 19, 'Destra'),
(7, 22, 'Verde'),
(8, 22, '70 m'),
(9, 22, 'Corda singola'),
(10, 14, 'Dura'),
(10, 21, 'Morbida'),
(11, 14, 'Performante'),
(11, 21, 'Performante'),
(12, 23, 'Grigio'),
(12, 24, 'Blu'),
(12, 25, 'Arancione');

-- --------------------------------------------------------

--
-- Struttura della tabella `tag_subcategory`
--

CREATE TABLE `tag_subcategory` (
  `idTAG` int(11) NOT NULL,
  `idSUBCATEGORY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tag_subcategory`
--

INSERT INTO `tag_subcategory` (`idTAG`, `idSUBCATEGORY`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3),
(5, 5),
(6, 4),
(7, 8),
(8, 8),
(9, 8),
(10, 1),
(11, 1),
(12, 12),
(14, 13);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`idADDRESS`),
  ADD UNIQUE KEY `idADDRESS_UNIQUE` (`idADDRESS`);

--
-- Indici per le tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idCUSTOMER`),
  ADD UNIQUE KEY `idCUSTOMER_UNIQUE` (`idCUSTOMER`);

--
-- Indici per le tabelle `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`idCART`,`idPRODUCT`),
  ADD KEY `fk_CART_PRODUCT_2_idx` (`idPRODUCT`);

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCATEGORY`),
  ADD UNIQUE KEY `idCATEGORY_UNIQUE` (`idCATEGORY`);

--
-- Indici per le tabelle `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`code`);

--
-- Indici per le tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCUSTOMER`),
  ADD UNIQUE KEY `idUTENTE_UNIQUE` (`idCUSTOMER`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indici per le tabelle `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`idCUSTOMER_ADDRESS`),
  ADD UNIQUE KEY `idCUSTOMER_ADDRESS_UNIQUE` (`idCUSTOMER_ADDRESS`),
  ADD KEY `fk_CUSTOMER_ADDRESS_1_idx` (`idADDRESS`),
  ADD KEY `fk_CUSTOMER_ADDRESS_2_idx` (`idCUSTOMER`);

--
-- Indici per le tabelle `customer_notification`
--
ALTER TABLE `customer_notification`
  ADD PRIMARY KEY (`id_customer_notification`),
  ADD KEY `fk_id_customer` (`id_customer`);

--
-- Indici per le tabelle `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idORDER`),
  ADD UNIQUE KEY `idORDINE_UNIQUE` (`idORDER`),
  ADD KEY `fk_ORDER_1_idx` (`COUPONcode`),
  ADD KEY `fk_ORDER_1` (`customer_address`);

--
-- Indici per le tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idPRODUCT`),
  ADD UNIQUE KEY `idPRODUCT_UNIQUE` (`idPRODUCT`),
  ADD KEY `fk_PRODUCT_1_idx` (`idSUBCATEGORY`);

--
-- Indici per le tabelle `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`idPRODUCT`,`idORDER`),
  ADD KEY `fk_PRODUCT_ORDER_1_idx` (`idORDER`);

--
-- Indici per le tabelle `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idREVIEW`),
  ADD UNIQUE KEY `idREVIEW_UNIQUE` (`idREVIEW`),
  ADD KEY `fk_REVIEW_1_idx` (`idCUSTOMER`),
  ADD KEY `fk_REVIEW_2_idx` (`idPRODUCT`);

--
-- Indici per le tabelle `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`idSELLER`),
  ADD UNIQUE KEY `idSELLER_UNIQUE` (`idSELLER`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`);

--
-- Indici per le tabelle `seller_notification`
--
ALTER TABLE `seller_notification`
  ADD PRIMARY KEY (`id_seller_notification`);

--
-- Indici per le tabelle `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`idSUBCATEGORY`),
  ADD UNIQUE KEY `SUBCATEGORY_UNIQUE` (`idSUBCATEGORY`),
  ADD KEY `fk_SUBCATEGORY_1_idx` (`idCATEGORY`);

--
-- Indici per le tabelle `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`idTAG`),
  ADD UNIQUE KEY `idTAG_UNIQUE` (`idTAG`);

--
-- Indici per le tabelle `tag_product`
--
ALTER TABLE `tag_product`
  ADD PRIMARY KEY (`idTAG`,`idPRODUCT`),
  ADD KEY `fk_TAG_PRODUCT_2_idx` (`idPRODUCT`);

--
-- Indici per le tabelle `tag_subcategory`
--
ALTER TABLE `tag_subcategory`
  ADD PRIMARY KEY (`idTAG`,`idSUBCATEGORY`),
  ADD KEY `fk_TAG_SUBCATEGORY_2_idx` (`idSUBCATEGORY`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `address`
--
ALTER TABLE `address`
  MODIFY `idADDRESS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `idCATEGORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `customer`
--
ALTER TABLE `customer`
  MODIFY `idCUSTOMER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `idCUSTOMER_ADDRESS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `customer_notification`
--
ALTER TABLE `customer_notification`
  MODIFY `id_customer_notification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT per la tabella `order`
--
ALTER TABLE `order`
  MODIFY `idORDER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `idPRODUCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT per la tabella `review`
--
ALTER TABLE `review`
  MODIFY `idREVIEW` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `seller`
--
ALTER TABLE `seller`
  MODIFY `idSELLER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `seller_notification`
--
ALTER TABLE `seller_notification`
  MODIFY `id_seller_notification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `idSUBCATEGORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `tag`
--
ALTER TABLE `tag`
  MODIFY `idTAG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_CART_1` FOREIGN KEY (`idCUSTOMER`) REFERENCES `customer` (`idCUSTOMER`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `fk_CART_PRODUCT_1` FOREIGN KEY (`idCART`) REFERENCES `cart` (`idCUSTOMER`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CART_PRODUCT_2` FOREIGN KEY (`idPRODUCT`) REFERENCES `product` (`idPRODUCT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `fk_CUSTOMER_ADDRESS_1` FOREIGN KEY (`idADDRESS`) REFERENCES `address` (`idADDRESS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CUSTOMER_ADDRESS_2` FOREIGN KEY (`idCUSTOMER`) REFERENCES `customer` (`idCUSTOMER`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `customer_notification`
--
ALTER TABLE `customer_notification`
  ADD CONSTRAINT `fk_id_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`idCUSTOMER`);

--
-- Limiti per la tabella `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_ORDER_1` FOREIGN KEY (`customer_address`) REFERENCES `customer_address` (`idCUSTOMER_ADDRESS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ORDER_2` FOREIGN KEY (`COUPONcode`) REFERENCES `coupon` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_PRODUCT_1` FOREIGN KEY (`idSUBCATEGORY`) REFERENCES `subcategory` (`idSUBCATEGORY`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `fk_PRODUCT_ORDER_1` FOREIGN KEY (`idORDER`) REFERENCES `order` (`idORDER`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCT_ORDER_2` FOREIGN KEY (`idPRODUCT`) REFERENCES `product` (`idPRODUCT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_REVIEW_1` FOREIGN KEY (`idCUSTOMER`) REFERENCES `customer` (`idCUSTOMER`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_REVIEW_2` FOREIGN KEY (`idPRODUCT`) REFERENCES `product` (`idPRODUCT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `fk_SUBCATEGORY_1` FOREIGN KEY (`idCATEGORY`) REFERENCES `category` (`idCATEGORY`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `tag_product`
--
ALTER TABLE `tag_product`
  ADD CONSTRAINT `fk_TAG_PRODUCT_1` FOREIGN KEY (`idTAG`) REFERENCES `tag` (`idTAG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TAG_PRODUCT_2` FOREIGN KEY (`idPRODUCT`) REFERENCES `product` (`idPRODUCT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `tag_subcategory`
--
ALTER TABLE `tag_subcategory`
  ADD CONSTRAINT `fk_TAG_SUBCATEGORY_1` FOREIGN KEY (`idTAG`) REFERENCES `tag` (`idTAG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TAG_SUBCATEGORY_2` FOREIGN KEY (`idSUBCATEGORY`) REFERENCES `subcategory` (`idSUBCATEGORY`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
