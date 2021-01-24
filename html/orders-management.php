<?php
require_once 'bootstrap.php';
if(isset($_SESSION["idCUSTOMER"])){
    $templateParams["title"]="Climb9c - Gestione ordini";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"] = "orders-management-template.php";
    $templateParams["newOrders"]=$dbh->getNewOrders();
    $templateParams["shippedOrders"]=$dbh->getShippedOrders();
    $templateParams["categories"]=$dbh->getCategories();
    foreach($templateParams["categories"] as $category){
        $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
    }   
}else{
    header("location: login-admin.php");
}
require './template/base-template.php';
?>