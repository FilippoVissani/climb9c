
-- insert sulle categorie

INSERT INTO `Climb_9c`.`CATEGORY` (`idCATEGORY`, `name`) VALUES (1, "Scarpe");

-- insert sulle sottocategorie 

INSERT INTO `Climb_9c`.`SUBCATEGORY` (`idSUBCATEGORY`, `idCATEGORY`, `name`) VALUES (1, 1, "Dure");

-- insert sul prodotto

INSERT INTO `Climb_9c`.`PRODUCT` (`idPRODUCT`, `name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `image_folder`, `quantity`) VALUES (1, "Nike Air Max", "NIKE", 123, 1, "La descrizione è molto breve: Scarpe molto performanti, adatte a tutti i piedi.", "Qui ci vanno le specifiche tecniche", ".\upload\products_images_by_id\1", 8);