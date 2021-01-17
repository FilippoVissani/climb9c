<?php
require_once 'bootstrap.php';

//redirect alla home se non c'è l'id in GET
if(!isset($_GET["id"])){
    header("location: index.php");
}
$idSubcategory = $_GET["id"];

$templateParams["subcategory"]=$dbh->getSubcategoryById($idSubcategory);
$templateParams["productsInSubcategory"]=$dbh->getproductsInSubcategory($idSubcategory);


//se non trova l'articolo scrive nel title 'articolo non trovato'
if(!count($templateParams["subcategory"])==0){
    $templateParams["subcategory"]=$templateParams["subcategory"][0];
    $templateParams["title"]="Climb9c - ".$templateParams["subcategory"]["name"];
} else{
    $templateParams["title"]="Climb9c - Sottocategoria non trovata";
}

$templateParams["search_bar"] = TRUE;
$templateParams["name"]="products-subcategory.php";
require 'template/base.php';

?>