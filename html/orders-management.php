<?php
require_once 'bootstrap.php';
$templateParams["title"]="Climb9c - Gestione ordini";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "orders-management-template.php";
$templateParams["newOrders"]=$dbh->getNewOrders();
$templateParams["shippedOrders"]=$dbh->getShippedOrders();
$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}
require './template/base-template.php';
?>