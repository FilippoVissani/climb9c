<?php
require_once 'bootstrap.php';

//redirect alla home se non c'è l'id in GET
if(!isset($_GET["id"])){
    header("location: index.php");
}

$idProduct = $_GET["id"];

$templateParams["product"]=$dbh->getProductById($idProduct);

//se non trova l'articolo scrive nel title 'articolo non trovato'
if(!count($templateParams["product"])==0){
    $templateParams["product"]=$templateParams["product"][0];
    $templateParams["title"]="Climb9c - ".$templateParams["product"]["name"];
} else{
    $templateParams["title"]="Climb9c - Articolo non trovato";
}

$templateParams["search_bar"] = TRUE;
$templateParams["name"]="single_product.php";
require 'template/base.php';

?>