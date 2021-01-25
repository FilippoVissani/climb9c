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

function checkImage($image){
    $imageName = basename($image["name"]);
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 1;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "Il file caricato non è un'immagine! ";
        $result = 0;
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "Il file caricato pesa troppo! La dimensione massima è $maxKB KB. ";
        $result = 0;
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(", ", $acceptedExtensions);
        $result = 0;
    }
    return array($result, $msg);
}

function uploadImage($path, $image){
  $imageName = basename($image["name"]);
  $fullPath = $path.$imageName;
  move_uploaded_file($image["tmp_name"], $fullPath);
}
?>
