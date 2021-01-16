<?php

if(isset($_GET["id"])){
    $idProduct = $_GET["id"];
}

$templateParams["title"]="Climb9c - ".$idProduct; //fare query per prendere nome articolo
$templateParams["search_bar"] = TRUE;
$templateParams["name"]="single_product.php";
require 'template/base.php';

?>