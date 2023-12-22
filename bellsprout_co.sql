SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `bellsprout&co`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `characteristic`
--

CREATE TABLE `characteristic` (
  `characteristic_id` int(11) NOT NULL,
  `fat` tinyint(1) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `watering` int(11) DEFAULT NULL,
  `fruit` tinyint(1) DEFAULT NULL,
  `disease_resistance` varchar(255) DEFAULT NULL,
  `seasonality` varchar(255) DEFAULT NULL,
  `sunlight_exposure` varchar(255) DEFAULT NULL,
  `fragrance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `characteristic`
--

INSERT INTO `characteristic` (`characteristic_id`, `fat`, `type`, `watering`, `fruit`, `disease_resistance`, `seasonality`, `sunlight_exposure`, `fragrance`) VALUES
(1, 0, 'Perenne', 2, 1, 'Alta', 'Primavera-Estate', 'Piena luce solare', 'Leggermente profumata'),
(2, 1, 'Succulenta', 1, 0, 'Moderata', 'Tutto l\'anno', 'Luce solare diretta', 'Neutro'),
(3, 0, 'Sempreverde', 3, 1, 'Bassa', 'Tutto l\'anno', 'Mezza luce solare', 'Fiori profumati'),
(4, 1, 'Annuale', 2, 0, 'Alta', 'Primavera', 'Piena luce solare', 'Leggermente profumata'),
(5, 0, 'Perenne', 1, 1, 'Moderata', 'Tutto l\'anno', 'Luce solare diretta', 'Neutro'),
(6, 1, 'Succulenta', 3, 0, 'Bassa', 'Inverno', 'Mezza luce solare', 'Neutro'),
(7, 0, 'Sempreverde', 2, 1, 'Alta', 'Primavera-Estate', 'Piena luce solare', 'Leggermente profumata'),
(8, 1, 'Annuale', 1, 0, 'Moderata', 'Tutto l\'anno', 'Luce solare diretta', 'Neutro'),
(9, 0, 'Perenne', 3, 1, 'Bassa', 'Tutto l\'anno', 'Mezza luce solare', 'Fiori profumati'),
(10, 1, 'Succulenta', 2, 0, 'Bassa', 'Primavera', 'Mezza luce solare', 'Fiori profumati');

-- --------------------------------------------------------

--
-- Struttura della tabella `greenhouse`
--

CREATE TABLE `greenhouse` (
  `greenhouse_id` int(11) NOT NULL,
  `greenhouse_size` varchar(255) DEFAULT NULL,
  `plant` varchar(255) DEFAULT NULL,
  `plant_type` varchar(255) DEFAULT NULL,
  `greenhouse_temperature` int(11) DEFAULT NULL,
  `lighting_type` varchar(255) DEFAULT NULL,
  `humidity` varchar(255) DEFAULT NULL,
  `irrigation_system` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `greenhouse`
--

INSERT INTO `greenhouse` (`greenhouse_id`, `greenhouse_size`, `plant`, `plant_type`, `greenhouse_temperature`, `lighting_type`, `humidity`, `irrigation_system`, `shop_id`) VALUES
(1, 'Media', 'Orchidee', 'Fiori esotici', 25, 'LED', 'Alta', 'Goccia a goccia', 1),
(2, 'Piccola', 'Cactus', 'Piante grasse', 30, 'Sospensione', 'Moderata', 'Spruzzo', 2),
(3, 'Grande', 'Rose', 'Fiori da giardino', 22, 'Fluorescenti', 'Bassa', 'Goccia a goccia', 3),
(4, 'Media', 'Bambù', 'Piante ornamentali', 28, 'LED', 'Alta', 'Goccia a goccia', 4),
(5, 'Piccola', 'Piante acquatiche', 'Piante acquatiche', 26, 'Sospensione', 'Moderata', 'Spruzzo', 5),
(6, 'Grande', 'Girasoli', 'Fiori da giardino', 23, 'Fluorescenti', 'Bassa', 'Goccia a goccia', 6),
(7, 'Media', 'Lavanda', 'Piante aromatiche', 27, 'LED', 'Alta', 'Goccia a goccia', 7),
(8, 'Piccola', 'Fragole', 'Piante da frutto', 25, 'Sospensione', 'Moderata', 'Spruzzo', 8),
(9, 'Grande', 'Palme', 'Piante esotiche', 30, 'Fluorescenti', 'Bassa', 'Goccia a goccia', 9),
(10, 'Media', 'Peperoncini', 'Piante da orto', 28, 'LED', 'Alta', 'Goccia a goccia', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `id_utente` int(11) DEFAULT NULL,
  `data_ora` datetime NOT NULL,
  `indirizzo_ip` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `nursery`
--

CREATE TABLE `nursery` (
  `nursery_id` int(11) NOT NULL,
  `plant_count` int(11) DEFAULT NULL,
  `plant_type` varchar(255) DEFAULT NULL,
  `nursery_size` varchar(255) DEFAULT NULL,
  `cultivation_type` varchar(255) DEFAULT NULL,
  `propagation_area` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `nursery`
--

INSERT INTO `nursery` (`nursery_id`, `plant_count`, `plant_type`, `nursery_size`, `cultivation_type`, `propagation_area`, `shop_id`) VALUES
(1, 80, 'Fiori da giardino', 'Grande', 'Coltivazione biologica', 'Area di propagazione A', 1),
(2, 100, 'Piante grasse', 'Media', 'Idroponica', 'Area di propagazione B', 2),
(3, 90, 'Arbusti ornamentali', 'Piccola', 'Tradizionale', 'Area di propagazione C', 3),
(4, 70, 'Piante acquatiche', 'Media', 'Coltivazione biologica', 'Area di propagazione D', 4),
(5, 120, 'Alberi da frutto', 'Grande', 'Tradizionale', 'Area di propagazione E', 5),
(6, 85, 'Piante da interno', 'Media', 'Idroponica', 'Area di propagazione F', 6),
(7, 110, 'Rose', 'Piccola', 'Coltivazione biologica', 'Area di propagazione G', 7),
(8, 130, 'Piante rampicanti', 'Media', 'Tradizionale', 'Area di propagazione H', 8),
(9, 160, 'Bonsai', 'Piccola', 'Idroponica', 'Area di propagazione I', 9),
(10, 75, 'Piante carnivore', 'Grande', 'Coltivazione biologica', 'Area di propagazione J', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `plant`
--

CREATE TABLE `plant` (
  `plant_id` int(11) NOT NULL,
  `height` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `characteristic_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `plant`
--

INSERT INTO `plant` (`plant_id`, `height`, `color`, `price`, `characteristic_id`, `type_id`) VALUES
(1, 50, 'Rosso', 20.99, 1, 1),
(2, 30, 'Giallo', 15.50, 2, 2),
(3, 80, 'Viola', 30.75, 3, 3),
(4, 40, 'Giallo', 18.00, 1, 4),
(5, 60, 'Verde', 25.50, 2, 5),
(6, 35, 'Verde', 12.99, 3, 6),
(7, 70, 'Rosa', 22.75, 1, 7),
(8, 45, 'Rosso', 14.50, 2, 8),
(9, 55, 'Verde', 28.00, 3, 9),
(10, 75, 'Arancione', 32.99, 1, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `plant_count` int(11) DEFAULT NULL,
  `nursery` tinyint(1) DEFAULT NULL,
  `entrambi` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `shop`
--

INSERT INTO `shop` (`shop_id`, `address`, `plant_count`, `nursery`, `entrambi`) VALUES
(1, 'Via dei Fiori, 123', 100, 1, 0),
(2, 'Piazza delle Piante, 456', 150, 0, 1),
(3, 'Corso del Giardino, 789', 120, 0, 1),
(4, 'Viale delle Rose, 567', 80, 1, 0),
(5, 'Piazza del Verde, 890', 200, 1, 0),
(6, 'Via delle Piante Esotiche, 432', 90, 0, 1),
(7, 'Corso del Giardino, 765', 110, 1, 0),
(8, 'Viale dei Fiori, 987', 130, 0, 1),
(9, 'Piazza delle Piante Rare, 321', 170, 1, 0),
(10, 'Via del Bosco, 654', 95, 0, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `shop_plant`
--

CREATE TABLE `shop_plant` (
  `shop_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `shop_plant`
--

INSERT INTO `shop_plant` (`shop_id`, `plant_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `scientific_name` varchar(255) DEFAULT NULL,
  `common_name` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `type`
--

INSERT INTO `type` (`type_id`, `scientific_name`, `common_name`, `origin`) VALUES
(1, 'Rosa gallica', 'Rosa', 'Europa'),
(2, 'Opuntia ficus-indica', 'Fico d\'India', 'Americhe'),
(3, 'Lavandula angustifolia', 'Lavanda', 'Mediterraneo'),
(4, 'Helianthus annuus', 'Girasole', 'America'),
(5, 'Echinocactus grusonii', 'Cactus', 'Messico'),
(6, 'Bambusa', 'Bambù', 'Asia'),
(7, 'Rosa chinensis', 'Rosa', 'Asia'),
(8, 'Fragaria × ananassa', 'Fragola', 'Europa'),
(9, 'Phoenix dactylifera', 'Palma', 'Africa'),
(10, 'Capsicum annuum', 'Peperone', 'America');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nome`, `cognome`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@email.com'),
(2, 'paolo', 'paolo123', 'paolo', 'brosio', 'paolo@email.com'),
(3, 'franca', 'franca3', 'franca', 'franchi', 'franca@email.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `characteristic`
--
ALTER TABLE `characteristic`
  ADD PRIMARY KEY (`characteristic_id`);

--
-- Indici per le tabelle `greenhouse`
--
ALTER TABLE `greenhouse`
  ADD PRIMARY KEY (`greenhouse_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indici per le tabelle `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `nursery`
--
ALTER TABLE `nursery`
  ADD PRIMARY KEY (`nursery_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indici per le tabelle `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`plant_id`),
  ADD KEY `characteristic_id` (`characteristic_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indici per le tabelle `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indici per le tabelle `shop_plant`
--
ALTER TABLE `shop_plant`
  ADD PRIMARY KEY (`shop_id`,`plant_id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indici per le tabelle `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `greenhouse`
--
ALTER TABLE `greenhouse`
  ADD CONSTRAINT `greenhouse_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`);

--
-- Limiti per la tabella `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `user` (`user_id`);

--
-- Limiti per la tabella `nursery`
--
ALTER TABLE `nursery`
  ADD CONSTRAINT `nursery_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`);

--
-- Limiti per la tabella `plant`
--
ALTER TABLE `plant`
  ADD CONSTRAINT `plant_ibfk_1` FOREIGN KEY (`characteristic_id`) REFERENCES `characteristic` (`characteristic_id`),
  ADD CONSTRAINT `plant_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);

--
-- Limiti per la tabella `shop_plant`
--
ALTER TABLE `shop_plant`
  ADD CONSTRAINT `shop_plant_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`),
  ADD CONSTRAINT `shop_plant_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`plant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
