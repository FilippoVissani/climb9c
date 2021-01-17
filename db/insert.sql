
-- insert sulle categorie

INSERT INTO `Climb_9c`.`CATEGORY` (`idCATEGORY`, `name`) VALUES (1, "Scarpe");

-- insert sulle sottocategorie 

INSERT INTO `Climb_9c`.`SUBCATEGORY` (`idSUBCATEGORY`, `idCATEGORY`, `name`) VALUES (1, 1, "Dure");

-- insert sul prodotto

INSERT INTO `Climb_9c`.`PRODUCT` (`idPRODUCT`, `name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `image_folder`, `quantity`) VALUES (1, "Nike Air Max", "NIKE", 123, 1, "La descrizione è molto breve: Scarpe molto performanti, adatte a tutti i piedi.", "Qui ci vanno le specifiche tecniche", ".\\upload\\products_images_by_id\\1", 8);


INSERT INTO `Climb_9c`.`PRODUCT` (`idPRODUCT`, `name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `image_folder`, `quantity`) VALUES (2, "La Sportiva Aragon Woman scarpette arrampicata donna", "La Sportiva", 85.50, 1, "La Sportiva Aragon Woman è la scarpetta da arrampicata perfetta se sei una prinicipiante o se cerchi un modello comodo, da utilizzare principalmente indoor, ma che si comporta bene anche su roccia!

La tomaia realizzata in pelle scamosciata è comoda a contatto con la pelle e con l'uso si adatterà perfettamente alla forma del tuo piede. Il sistema di chiusura a doppio velcro è veloce e comodo da utilizzare e ti permette di togliere e mettere le scarpette in un secondo, oltre a trovare in un lampo la regolazione adatta al tuo piede. Con Aragon il confort di calzata è ai massimi livelli!

La suola è invece realizzata in gomma Frixion Black che ti garantisce un ottimo grip e una buona resistenza all'abrasione in modo da aumentarne la durata e non doverle risuolare troppo spesso.", "Marchio
La Sportiva
Chiusura
Strappo
Utilizzo scarpetta
Falesia, Palestra
Tipo suola scarpetta
Mezza suola
Aggressività scarpetta
Comoda
Materiale tomaia
Scamosciato
Materiale suola
FriXion Black
Rigidità scarpetta
Media
Cede
Molto
Genere
Donna
Pianta scarpetta arrampicata
Larga
Consigliato rispetto alla taglia normale - Calzata comoda
Mezzo numero in meno
Consigliato rispetto alla taglia normale - Calzata media
Un numero in meno
Consigliato rispetto alla taglia normale - Calzata performante
Un numero e mezzo in meno", ".\\upload\\products_images_by_id\\2", 3);