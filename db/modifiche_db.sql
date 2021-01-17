
-- prezzo in decimal
ALTER TABLE `product` CHANGE `price` `price` DECIMAL(10,2) NOT NULL;

--name in TINYTEXT
ALTER TABLE `product` CHANGE `name` `name` TINYTEXT NOT NULL;

--togliere image_folder da prodotto
ALTER TABLE `product` DROP `image_folder`;