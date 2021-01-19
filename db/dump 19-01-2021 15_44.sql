-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 19, 2021 alle 15:44
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
(1, 'Via Palmiro Togliatti n°2', 'Arezzo', 'Sansepolcro', '52037', 'Sofia', 'Belloni');

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
(1, '2021-01-19');

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
(1, 2, 1),
(1, 3, 4);

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
(1, 'Abbigliamento');

-- --------------------------------------------------------

--
-- Struttura della tabella `coupon`
--

CREATE TABLE `coupon` (
  `code` varchar(10) NOT NULL,
  `discount` varchar(45) NOT NULL,
  `validity` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `customer`
--

CREATE TABLE `customer` (
  `idCUSTOMER` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `customer`
--

INSERT INTO `customer` (`idCUSTOMER`, `name`, `surname`, `email`, `password`, `telephone`, `gender`, `birthdate`) VALUES
(1, 'Sofia', 'Belloni', 'sofiabelloni@gmail.com', 'prova', '3206658639', 0, '2021-01-03');

-- --------------------------------------------------------

--
-- Struttura della tabella `customer_address`
--

CREATE TABLE `customer_address` (
  `idCUSTOMER` int(11) NOT NULL,
  `idADDRESS` int(11) NOT NULL,
  `idCUSTOMER_ADDRESS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '5.10 Five Ten Aleon VCS scarpette arrampicata', 'Five Ten', '99.70', 1, '5.10 Five Ten Aleon VCS sono delle scarpette da arrampicata pensata per il boulder o per l\'arrampicata in falesia. Tra tutte le novità da parte di Adidas Five Ten, le Aleon sono sicuramente le scarpette che meritano uno sguardo in più.\r\n\r\nCon la tomaia Ptimeknit sono estremamente avvolgenti e non appena le indossi la loro calzata ti stupirà: completamente fascianti, non lasciano vuoti d\'aria all\'interno e ti sembreranno dei calzini!\r\n\r\nLa punta arcuata verso il basso ti permette di fare degli ottimi agganci grazie anche alla copertura di gomma e il tallone ti facilita soprattutto nel boulder!\r\n\r\nLa suola è una Stealth C4, classica suola presente nelle scarpette Five Ten. Ormai super conosciuta, dona un grip senza precedenti!\r\n\r\nAttenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all\'acquisto prova a vedere qui sotto i numeri consigliati da noi.', '{\"Chiusura\":\"Strappo\",\"Utilizzo scarpetta\":\"Boulder, Falesia\",\"Tipo suola scarpetta\":\"Suola intera\",\"Aggressivita scarpetta\":\"Performante\"}', 8),
(2, 'La Sportiva Aragon Woman scarpette arrampicata donna', 'La Sportiva', '85.50', 1, 'La Sportiva Aragon Woman è la scarpetta da arrampicata perfetta se sei una prinicipiante o se cerchi un modello comodo, da utilizzare principalmente indoor, ma che si comporta bene anche su roccia!\r\n\r\nLa tomaia realizzata in pelle scamosciata è comoda a contatto con la pelle e con l\'uso si adatterà perfettamente alla forma del tuo piede. Il sistema di chiusura a doppio velcro è veloce e comodo da utilizzare e ti permette di togliere e mettere le scarpette in un secondo, oltre a trovare in un lampo la regolazione adatta al tuo piede. Con Aragon il confort di calzata è ai massimi livelli!\r\n\r\nLa suola è invece realizzata in gomma Frixion Black che ti garantisce un ottimo grip e una buona resistenza all\'abrasione in modo da aumentarne la durata e non doverle risuolare troppo spesso.', '{\"Chiusura\":\"Strappo\",\"Utilizzo scarpetta\":\"Boulder, Falesia, Palestra\",\"Tipo suola scarpetta\":\"Mezza suola\",\"Aggressivita\' scarpetta\":\"Performante\",\"Tecnologia scarpetta\":\"P3\",\"Materiale tomaia\":\"Scamosciato + Microfiber\",\"Materiale suola\":\"Vibram XS Grip\",\"Rigidit\\u00e0 scarpetta\":\"Morbida\"}', 3),
(3, '5.10 Five Ten Anasazi Lace - The Pink scarpette arrampicata', 'Five Ten', '106.95', 1, '5.10 Five Ten Anasazi Lace The Pink è una scarpetta da arrampicata con chiusura a lacci che si adatta alla perfezione per qualsiasi tipo di arrampicata, sia che si parli di palestre indoor sia di arrampicata su roccia.\r\n\r\nLa Anasazi Lace è una tra le scarpe più riuscite e storiche prodotte da Five Ten. Famosa è la precisione negli appoggi che la contraddistingue. Questo fa in modo che la scarpetta sia ottima sia per l\'arrampicata outdoor sia per le palestre.\r\n\r\nLa forma è leggermente asimmetrica ma nel complesso è una forma comoda e confortevole che la rende una tra le scarpette più utilizzate sia dai principianti sia dagli arrampicatori un pò più esperti.\r\n\r\nL\'allacciatura tradizionale consente di regolare alla perfezione i volumi interni e di personalizzare la calzata.\r\n\r\nL\'insieme di tutte queste caratteristiche fa in modo che Anasazi Lace sia anche una scarpetta molto apprezzata per le vie multi-pitch.\r\n\r\nAttenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all\'acquisto prova a vedere qui sotto i numeri consigliati da noi.', '{\"Chiusura\":\"Lacci\",\"Utilizzo scarpetta\":\"Falesia, Multitiro\",\"Tipo suola scarpetta\":\"Suola intera\",\"Aggressivita\' scarpetta\":\"Intermedia\",\"Tecnologia scarpetta\":\"P3\",\"Materiale tomaia\":\"Materiale sintetico\",\"Materiale suola\":\"Stealth C4\",\"Rigidit\\u00e0 scarpetta\":\"Media\"}', 5),
(4, '5.10 Five Ten Anasazi Pro scarpette arrampicata', 'Five Ten', '115.95', 1, 'La scarpetta da arrampicata e boulder  Anasazi Pro di 5.10 Five Ten è polivalente e combina sensibilità e potenza per l\'arrampicata a 360 gradi.\r\n\r\nAnasazi Pro è dotata di tomaia in tessuto sintetico, suola Stealth C4 fino alla punta per favorirti negli agganci e garantirti il massimo grip.\r\n\r\nCalzata precisa e stabile. L\'intersuola a media rigidità offre comfort nelle lunghe giornate in falesia e la chiusura velcro, un facile accesso.\r\n\r\nAnasazi Pro è la scarpetta perfetta se cerchi un prodotto comodo e performante!\r\n\r\nAttenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all\'acquisto prova a vedere qui sotto i numeri consigliati da noi.', '{\"Chiusura\":\"Strappo\",\"Utilizzo scarpetta\":\"Falesia, Multitiro\",\"Tipo suola scarpetta\":\"Suola intera\",\"Aggressivita\' scarpetta\":\"Intermedia\",\"Tecnologia scarpetta\":\"P3\",\"Materiale tomaia\":\"Materiale sintetico\",\"Materiale suola\":\"Stealth C4\",\"Rigidit\\u00e0 scarpetta\":\"Media\"}', 7),
(5, 'BD Black Diamond Momentum Ash scarpette arrampicata', 'Black Diamond', '76.55', 1, 'BD Black Diamond Momentum scarpette arrampicata sono la scelta giusta per chi è alla ricerca di un modello comodo e confortevole per compiere i primi passi in parete.\r\n\r\nLa mescola Neo Regular è bella rigida e durevole, perfetta per la placca e perfetta se hai bisogno di una bestia da soma da sfruttare a lungo!\r\n\r\nUna scarpetta dal carattere versatile che si presta bene non solo ad un utilizzo in palestra, ma anche in falesia e su vie lunghe.\r\n\r\nPer garantirti un\'eccellente traspirabilità, sostegno ed elasticità nei punti strategici, Black Diamond costruisce le Momentum con la nuova tecnologia Engineered Knit mentre la nuova gomma NeoFriction e l\'intersuola ti offrono una straordinaria morbidezza e comodità per un buon livello di spalmata.\r\n\r\nUn altro interessante accorgimento è la fodera in microfibra nella parte frontale, studiato per migliorare la longevità della scarpetta.\r\n\r\nGrazie all\'allacciatura in velcro, è facile da indossare e regolare.\r\n\r\nBD Black Diamond Momentum per un comfort supremo ed eccellenti performance!', '{\"Chiusura\":\"Strappo\",\"Utilizzo scarpetta\":\"Falesia, Multitiro\",\"Tipo suola scarpetta\":\"Suola intera\",\"Aggressivita\' scarpetta\":\"Intermedia\",\"Tecnologia scarpetta\":\"P3\",\"Materiale tomaia\":\"Materiale sintetico\",\"Materiale suola\":\"Stealth C4\",\"Rigidit\\u00e0 scarpetta\":\"Media\"}', 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `product_order`
--

CREATE TABLE `product_order` (
  `idPRODUCT` int(11) NOT NULL,
  `idORDER` int(11) NOT NULL,
  `quantity` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 'Scarpe'),
(2, 1, 'Caschi');

-- --------------------------------------------------------

--
-- Struttura della tabella `tag`
--

CREATE TABLE `tag` (
  `idTAG` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `tag_product`
--

CREATE TABLE `tag_product` (
  `idTAG` int(11) NOT NULL,
  `idPRODUCT` int(11) NOT NULL,
  `value` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `tag_subcategory`
--

CREATE TABLE `tag_subcategory` (
  `idTAG` int(11) NOT NULL,
  `idSUBCATEGORY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `idADDRESS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `idCATEGORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `customer`
--
ALTER TABLE `customer`
  MODIFY `idCUSTOMER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `idCUSTOMER_ADDRESS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `order`
--
ALTER TABLE `order`
  MODIFY `idORDER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `idPRODUCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `review`
--
ALTER TABLE `review`
  MODIFY `idREVIEW` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `seller`
--
ALTER TABLE `seller`
  MODIFY `idSELLER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `idSUBCATEGORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `tag`
--
ALTER TABLE `tag`
  MODIFY `idTAG` int(11) NOT NULL AUTO_INCREMENT;

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
