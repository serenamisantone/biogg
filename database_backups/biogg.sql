-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 08, 2023 alle 13:40
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biogg`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `address`
--

CREATE TABLE `address` (
  `user_id` int(11) NOT NULL,
  `regione` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `comune` varchar(100) DEFAULT NULL,
  `via` varchar(100) DEFAULT NULL,
  `civico` int(11) DEFAULT NULL,
  `other_info` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shopping_cart_id` int(11) NOT NULL,
  `total` decimal(7,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `is_online` tinyint(1) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `product_feature`
--

CREATE TABLE `product_feature` (
  `product_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `product_info`
--

CREATE TABLE `product_info` (
  `product_id` int(11) NOT NULL,
  `ingredients` text DEFAULT NULL,
  `image1` varchar(100) DEFAULT NULL,
  `image2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `product_offer`
--

CREATE TABLE `product_offer` (
  `offer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `service`
--

CREATE TABLE `service` (
  `code` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `service_has_group`
--

CREATE TABLE `service_has_group` (
  `group_id` int(11) NOT NULL,
  `service_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `shipping`
--

CREATE TABLE `shipping` (
  `order_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `info` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_open` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `shopping_cart_product`
--

CREATE TABLE `shopping_cart_product` (
  `shopping_cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_quantity` int(11) DEFAULT 0,
  `actual_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `user_has_group`
--

CREATE TABLE `user_has_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `address`
--
ALTER TABLE `address`
  ADD KEY `uder_address` (`user_id`);

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_order` (`user_id`),
  ADD KEY `shopping_cart_order` (`shopping_cart_id`);

--
-- Indici per le tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product` (`category_id`);

--
-- Indici per le tabelle `product_feature`
--
ALTER TABLE `product_feature`
  ADD KEY `feature_constraint` (`product_id`);

--
-- Indici per le tabelle `product_info`
--
ALTER TABLE `product_info`
  ADD KEY `product_info` (`product_id`);

--
-- Indici per le tabelle `product_offer`
--
ALTER TABLE `product_offer`
  ADD KEY `offer_constraint` (`offer_id`),
  ADD KEY `product_constraint` (`product_id`);

--
-- Indici per le tabelle `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_review` (`user_id`);

--
-- Indici per le tabelle `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`code`);

--
-- Indici per le tabelle `service_has_group`
--
ALTER TABLE `service_has_group`
  ADD KEY `group_constraint` (`group_id`),
  ADD KEY `service_constraint` (`service_code`);

--
-- Indici per le tabelle `shipping`
--
ALTER TABLE `shipping`
  ADD KEY `order_shipping` (`order_id`);

--
-- Indici per le tabelle `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_shopping_cart` (`user_id`);

--
-- Indici per le tabelle `shopping_cart_product`
--
ALTER TABLE `shopping_cart_product`
  ADD KEY `shopping_cart` (`shopping_cart_id`),
  ADD KEY `product` (`product_id`);

--
-- Indici per le tabelle `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique` (`email`,`password`),
  ADD UNIQUE KEY `username_unique` (`username`);

--
-- Indici per le tabelle `user_has_group`
--
ALTER TABLE `user_has_group`
  ADD KEY `_user` (`user_id`),
  ADD KEY `_group` (`group_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `uder_address` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `shopping_cart_order` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_cart` (`id`),
  ADD CONSTRAINT `user_order` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_product` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `product_feature`
--
ALTER TABLE `product_feature`
  ADD CONSTRAINT `feature_constraint` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `product_info`
--
ALTER TABLE `product_info`
  ADD CONSTRAINT `product_info` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `product_offer`
--
ALTER TABLE `product_offer`
  ADD CONSTRAINT `offer_constraint` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_constraint` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `user_review` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `service_has_group`
--
ALTER TABLE `service_has_group`
  ADD CONSTRAINT `group_constraint` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_constraint` FOREIGN KEY (`service_code`) REFERENCES `service` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `order_shipping` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `user_shopping_cart` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `shopping_cart_product`
--
ALTER TABLE `shopping_cart_product`
  ADD CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_cart` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `user_has_group`
--
ALTER TABLE `user_has_group`
  ADD CONSTRAINT `_group` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
