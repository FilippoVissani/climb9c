
-- insert sulle categorie

INSERT INTO `Climb_9c`.`CATEGORY` (`idCATEGORY`, `name`) VALUES (1, "Scarpe");

-- insert sulle sottocategorie 

INSERT INTO `Climb_9c`.`SUBCATEGORY` (`idSUBCATEGORY`, `idCATEGORY`, `name`) VALUES (1, 1, "Dure");

INSERT INTO `Climb_9c`.`SUBCATEGORY` (`idSUBCATEGORY`, `idCATEGORY`, `name`) VALUES (2, 1, "Morbide");

-- insert sul prodotto

-- ID1
INSERT INTO `Climb_9c`.`PRODUCT` (`idPRODUCT`, `name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `image_folder`, `quantity`) VALUES (1, "Nike Air Max", "NIKE", 123, 1, "La descrizione è molto breve: Scarpe molto performanti, adatte a tutti i piedi.", "Qui ci vanno le specifiche tecniche", ".\\upload\\products_images_by_id\\1", 8);

-- DOPO AVER CARICATO LE NIKE FARE QUESTO UPDATE PER AVERE LE SCARPE DA ARRAMPICATA:
UPDATE `product` SET `name` = '5.10 Five Ten Aleon VCS scarpette arrampicata', `brand` = 'Five Ten', `description` = '5.10 Five Ten Aleon VCS sono delle scarpette da arrampicata pensata per il boulder o per l\'arrampicata in falesia. Tra tutte le novità da parte di Adidas Five Ten, le Aleon sono sicuramente le scarpette che meritano uno sguardo in più.\r\n\r\nCon la tomaia Ptimeknit sono estremamente avvolgenti e non appena le indossi la loro calzata ti stupirà: completamente fascianti, non lasciano vuoti d\'aria all\'interno e ti sembreranno dei calzini!\r\n\r\nLa punta arcuata verso il basso ti permette di fare degli ottimi agganci grazie anche alla copertura di gomma e il tallone ti facilita soprattutto nel boulder!\r\n\r\nLa suola è una Stealth C4, classica suola presente nelle scarpette Five Ten. Ormai super conosciuta, dona un grip senza precedenti!\r\n\r\nAttenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all\'acquisto prova a vedere qui sotto i numeri consigliati da noi.', `tecnical_specifications` = 'Marchio\r\nFive Ten\r\nChiusura\r\nStrappo\r\nUtilizzo scarpetta\r\nBoulder, Falesia\r\nTipo suola scarpetta\r\nSuola intera\r\nAggressività scarpetta\r\nPerformante\r\nMateriale tomaia\r\nPrimeknit\r\nMateriale suola\r\nStealth C4\r\nRigidità scarpetta\r\nMedia\r\nCede\r\nPoco\r\nGenere\r\nUnisex\r\nPianta scarpetta arrampicata\r\nLarga\r\nConsigliato rispetto alla taglia normale - Calzata comoda\r\nUn numero in più\r\nConsigliato rispetto alla taglia normale - Calzata media\r\nMezzo numero in più\r\nConsigliato rispetto alla taglia normale - Calzata performante\r\nStesso numero' WHERE `product`.`idPRODUCT` = 1

-- ID2
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


-- ID3
INSERT INTO `Climb_9c`.`PRODUCT` (`idPRODUCT`, `name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `image_folder`, `quantity`) VALUES (3, "5.10 Five Ten Anasazi Lace - The Pink scarpette arrampicata", "Five Ten", 106.95, 1, "5.10 Five Ten Anasazi Lace The Pink è una scarpetta da arrampicata con chiusura a lacci che si adatta alla perfezione per qualsiasi tipo di arrampicata, sia che si parli di palestre indoor sia di arrampicata su roccia.

La Anasazi Lace è una tra le scarpe più riuscite e storiche prodotte da Five Ten. Famosa è la precisione negli appoggi che la contraddistingue. Questo fa in modo che la scarpetta sia ottima sia per l'arrampicata outdoor sia per le palestre.

La forma è leggermente asimmetrica ma nel complesso è una forma comoda e confortevole che la rende una tra le scarpette più utilizzate sia dai principianti sia dagli arrampicatori un pò più esperti.

L'allacciatura tradizionale consente di regolare alla perfezione i volumi interni e di personalizzare la calzata.

L'insieme di tutte queste caratteristiche fa in modo che Anasazi Lace sia anche una scarpetta molto apprezzata per le vie multi-pitch.

Attenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all'acquisto prova a vedere qui sotto i numeri consigliati da noi.", "Marchio
Five Ten
Chiusura
Lacci
Utilizzo scarpetta
Boulder, Falesia, Multitiro, Palestra
Tipo suola scarpetta
Suola intera
Aggressività scarpetta
Intermedia
Materiale tomaia
Materiale sintetico
Materiale suola
Stealth C4
Rigidità scarpetta
Media
Cede
Abbastanza
Genere
Unisex
Pianta scarpetta arrampicata
Stretta
Consigliato rispetto alla taglia normale - Calzata comoda
Un numero in più
Consigliato rispetto alla taglia normale - Calzata media
Stesso numero
Consigliato rispetto alla taglia normale - Calzata performante
Stesso numero, Mezzo numero in meno", ".\\upload\\products_images_by_id\\3", 5);

-- ID4
INSERT INTO `Climb_9c`.`PRODUCT` (`idPRODUCT`, `name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `image_folder`, `quantity`) VALUES (4, "5.10 Five Ten Anasazi Pro scarpette arrampicata", "Five Ten", 115.95, 1, "La scarpetta da arrampicata e boulder  Anasazi Pro di 5.10 Five Ten è polivalente e combina sensibilità e potenza per l'arrampicata a 360 gradi.

Anasazi Pro è dotata di tomaia in tessuto sintetico, suola Stealth C4 fino alla punta per favorirti negli agganci e garantirti il massimo grip.

Calzata precisa e stabile. L'intersuola a media rigidità offre comfort nelle lunghe giornate in falesia e la chiusura velcro, un facile accesso.

Anasazi Pro è la scarpetta perfetta se cerchi un prodotto comodo e performante!

Attenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all'acquisto prova a vedere qui sotto i numeri consigliati da noi.", "Marchio
Five Ten
Chiusura
Strappo
Utilizzo scarpetta
Boulder, Falesia, Multitiro, Palestra
Tipo suola scarpetta
Suola intera
Aggressività scarpetta
Intermedia
Materiale tomaia
Materiale sintetico
Materiale suola
Stealth C4
Rigidità scarpetta
Rigida
Cede
Poco
Genere
Unisex
Pianta scarpetta arrampicata
Larga
Consigliato rispetto alla taglia normale - Calzata comoda
Un numero in più
Consigliato rispetto alla taglia normale - Calzata media
Mezzo numero in più
Consigliato rispetto alla taglia normale - Calzata performante", ".\\upload\\products_images_by_id\\4", 7);

-- ID5
INSERT INTO `Climb_9c`.`PRODUCT` (`idPRODUCT`, `name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `image_folder`, `quantity`) VALUES (5, "BD Black Diamond Momentum Ash scarpette arrampicata", "Black Diamond", 76.55, 1, "BD Black Diamond Momentum scarpette arrampicata sono la scelta giusta per chi è alla ricerca di un modello comodo e confortevole per compiere i primi passi in parete.

La mescola Neo Regular è bella rigida e durevole, perfetta per la placca e perfetta se hai bisogno di una bestia da soma da sfruttare a lungo!

Una scarpetta dal carattere versatile che si presta bene non solo ad un utilizzo in palestra, ma anche in falesia e su vie lunghe.

Per garantirti un'eccellente traspirabilità, sostegno ed elasticità nei punti strategici, Black Diamond costruisce le Momentum con la nuova tecnologia Engineered Knit mentre la nuova gomma NeoFriction e l'intersuola ti offrono una straordinaria morbidezza e comodità per un buon livello di spalmata.

Un altro interessante accorgimento è la fodera in microfibra nella parte frontale, studiato per migliorare la longevità della scarpetta.

Grazie all'allacciatura in velcro, è facile da indossare e regolare.

BD Black Diamond Momentum per un comfort supremo ed eccellenti performance!", "Marchio
Black Diamond
Chiusura
Strappo
Utilizzo scarpetta
Falesia, Multitiro, Palestra
Tipo suola scarpetta
Suola intera
Tecnologia scarpetta
Engineered Knit
Aggressività scarpetta
Comoda
Materiale tomaia
Materiale sintetico, Microfiber
Materiale suola
Neo Regular 4.3 mm
Rigidità scarpetta
Morbida
Cede
Abbastanza
Genere
Uomo
Pianta scarpetta arrampicata
Larga
Consigliato rispetto alla taglia normale - Calzata comoda
Un numero in più
Consigliato rispetto alla taglia normale - Calzata media
Mezzo numero in più
Consigliato rispetto alla taglia normale - Calzata performante
Stesso numero", ".\\upload\\products_images_by_id\\5", 12);