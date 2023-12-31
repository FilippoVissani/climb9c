
-- insert sulle categorie

INSERT INTO `climb_9c`.`category` (`name`) VALUES ("Abbigliamento");

-- insert sulle sottocategorie 

INSERT INTO `climb_9c`.`subcategory` (`idCATEGORY`, `name`) VALUES (1, "Scarpe");

INSERT INTO `climb_9c`.`subcategory` (`idCATEGORY`, `name`) VALUES (1, "Caschi");

-- insert sul prodotto

-- 1
INSERT INTO `climb_9c`.`product` (`name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `quantity`) VALUES ("5.10 Five Ten Aleon VCS scarpette arrampicata", "Five Ten", "99.70", 1, "5.10 Five Ten Aleon VCS sono delle scarpette da arrampicata pensata per il boulder o per l'arrampicata in falesia. Tra tutte le novità da parte di Adidas Five Ten, le Aleon sono sicuramente le scarpette che meritano uno sguardo in più.

Con la tomaia Ptimeknit sono estremamente avvolgenti e non appena le indossi la loro calzata ti stupirà: completamente fascianti, non lasciano vuoti d'aria all'interno e ti sembreranno dei calzini!

La punta arcuata verso il basso ti permette di fare degli ottimi agganci grazie anche alla copertura di gomma e il tallone ti facilita soprattutto nel boulder!

La suola è una Stealth C4, classica suola presente nelle scarpette Five Ten. Ormai super conosciuta, dona un grip senza precedenti!

Attenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all'acquisto prova a vedere qui sotto i numeri consigliati da noi.", 0, 8);



-- 2
INSERT INTO `climb_9c`.`product` ( `name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `quantity`) VALUES ("La Sportiva Aragon Woman scarpette arrampicata donna", "La Sportiva", 85.50, 1, "La Sportiva Aragon Woman è la scarpetta da arrampicata perfetta se sei una prinicipiante o se cerchi un modello comodo, da utilizzare principalmente indoor, ma che si comporta bene anche su roccia!

La tomaia realizzata in pelle scamosciata è comoda a contatto con la pelle e con l'uso si adatterà perfettamente alla forma del tuo piede. Il sistema di chiusura a doppio velcro è veloce e comodo da utilizzare e ti permette di togliere e mettere le scarpette in un secondo, oltre a trovare in un lampo la regolazione adatta al tuo piede. Con Aragon il confort di calzata è ai massimi livelli!

La suola è invece realizzata in gomma Frixion Black che ti garantisce un ottimo grip e una buona resistenza all'abrasione in modo da aumentarne la durata e non doverle risuolare troppo spesso.", 0, 3);


-- 3
INSERT INTO `climb_9c`.`product` ( `name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `quantity`) VALUES ("5.10 Five Ten Anasazi Lace - The Pink scarpette arrampicata", "Five Ten", 106.95, 1, "5.10 Five Ten Anasazi Lace The Pink è una scarpetta da arrampicata con chiusura a lacci che si adatta alla perfezione per qualsiasi tipo di arrampicata, sia che si parli di palestre indoor sia di arrampicata su roccia.

La Anasazi Lace è una tra le scarpe più riuscite e storiche prodotte da Five Ten. Famosa è la precisione negli appoggi che la contraddistingue. Questo fa in modo che la scarpetta sia ottima sia per l'arrampicata outdoor sia per le palestre.

La forma è leggermente asimmetrica ma nel complesso è una forma comoda e confortevole che la rende una tra le scarpette più utilizzate sia dai principianti sia dagli arrampicatori un pò più esperti.

L'allacciatura tradizionale consente di regolare alla perfezione i volumi interni e di personalizzare la calzata.

L'insieme di tutte queste caratteristiche fa in modo che Anasazi Lace sia anche una scarpetta molto apprezzata per le vie multi-pitch.

Attenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all'acquisto prova a vedere qui sotto i numeri consigliati da noi.", 0, 5);

-- 4
INSERT INTO `climb_9c`.`product` (`name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `quantity`) VALUES ("5.10 Five Ten Anasazi Pro scarpette arrampicata", "Five Ten", 115.95, 1, "La scarpetta da arrampicata e boulder  Anasazi Pro di 5.10 Five Ten è polivalente e combina sensibilità e potenza per l'arrampicata a 360 gradi.

Anasazi Pro è dotata di tomaia in tessuto sintetico, suola Stealth C4 fino alla punta per favorirti negli agganci e garantirti il massimo grip.

Calzata precisa e stabile. L'intersuola a media rigidità offre comfort nelle lunghe giornate in falesia e la chiusura velcro, un facile accesso.

Anasazi Pro è la scarpetta perfetta se cerchi un prodotto comodo e performante!

Attenzione! Le scarpette da arrampicata 5.10 Five Ten vestono poco. Prima quindi di procedere all'acquisto prova a vedere qui sotto i numeri consigliati da noi.", 0, 7);

-- 5
INSERT INTO `climb_9c`.`product` (`name`, `brand`, `price`, `idSUBCATEGORY`, `description`, `tecnical_specifications`, `quantity`) VALUES ("BD Black Diamond Momentum Ash scarpette arrampicata", "Black Diamond", 76.55, 1, "BD Black Diamond Momentum scarpette arrampicata sono la scelta giusta per chi è alla ricerca di un modello comodo e confortevole per compiere i primi passi in parete.

La mescola Neo Regular è bella rigida e durevole, perfetta per la placca e perfetta se hai bisogno di una bestia da soma da sfruttare a lungo!

Una scarpetta dal carattere versatile che si presta bene non solo ad un utilizzo in palestra, ma anche in falesia e su vie lunghe.

Per garantirti un'eccellente traspirabilità, sostegno ed elasticità nei punti strategici, Black Diamond costruisce le Momentum con la nuova tecnologia Engineered Knit mentre la nuova gomma NeoFriction e l'intersuola ti offrono una straordinaria morbidezza e comodità per un buon livello di spalmata.

Un altro interessante accorgimento è la fodera in microfibra nella parte frontale, studiato per migliorare la longevità della scarpetta.

Grazie all'allacciatura in velcro, è facile da indossare e regolare.

BD Black Diamond Momentum per un comfort supremo ed eccellenti performance!", 0, 12);