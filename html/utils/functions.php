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
        $total += $productArray[$i]["productPrice"];
  }
  return $total;
}

function calculateFinalPrice($total, $discount){
  $finalPrice = $total - ($total*$discount)/100;
  return round($finalPrice, 2);
}
?>
