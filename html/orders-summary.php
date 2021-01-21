<?php
require_once 'bootstrap.php';
$templateParams["title"]="Climb9c - Riepilogo ordini";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "orders-summary-template.php";
if(isset($_SESSION["idCUSTOMER"])){
    $templateParams["customerOrders"] = $dbh->getOrders($_SESSION["idCUSTOMER"]); 
}
$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}
require './template/base.php';
?>
