<?php
require_once 'bootstrap.php';

$templateParams["title"]="Climb9c - Carrello";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "cart.php";
$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}


require './template/base.php';
?>
