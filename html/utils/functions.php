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
    $acceptedExtensions = "jpg";
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
    if($imageFileType != $acceptedExtensions){
        $msg .= "Accettate solo le immagini in formato ".$acceptedExtensions;
        $result = 0;
    }
    return array($result, $msg);
}

function uploadImage($path, $image){
  $imageName = basename($image["name"]);
  $imageFileType = strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
  $imageName = "1.".$imageFileType;
  $fullPath = $path.$imageName;
  if (file_exists($fullPath)) {
       $i = 1;
       do{
           ++$i;
           $imageName = $i.".".$imageFileType;
       }
       while(file_exists($path.$imageName));
       $fullPath = $path.$imageName;
   }
  move_uploaded_file($image["tmp_name"], $fullPath);
}

function overwriteImage($path, $image){
  $imageName = basename($image["name"]);
  $imageFileType = strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
  $imageName = "1.".$imageFileType;
  $fullPath = $path.$imageName;
  move_uploaded_file($image["tmp_name"], $fullPath);
}
?>
