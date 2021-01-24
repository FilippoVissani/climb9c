<?php

function isUserLoggedIn(){
    return !empty($_SESSION['idCUSTOMER']);
}

function isAdminLoggedIn(){
    return !empty($_SESSION['idSELLER']);
}

function numberProduct($productArray){
  $total = 0;
  for($i = 0; $i < count($productArray); $i++) {
        $total += $productArray[$i]["productQuantity"];
  }
  return $total;
}

function cartPrice($productArray){
  $total = 0;
  for($i = 0; $i < count($productArray); $i++) {
    $price = $productArray[$i]["productPrice"]*$productArray[$i]["productQuantity"];
    $total += $price;
  }
  return $total;
}

function calculateFinalPrice($total, $discount){
  $finalPrice = $total - ($total*$discount)/100;
  return round($finalPrice, 2);
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;

    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}
?>
