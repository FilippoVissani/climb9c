<?php

function isUserLoggedIn(){
    return !empty($_SESSION['idCUSTOMER']);
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
?>