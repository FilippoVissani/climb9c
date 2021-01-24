<?php
require_once 'bootstrap.php';
if(isset($_SESSION["idCUSTOMER"]) || isset($_SESSION["idSELLER"])){
    $templateParams["title"]="Climb9c - Order detail";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"] = "order-detail-template.php";
    $templateParams["products"]=$dbh->getProducts($_POST["id"]);
    $templateParams["orderDetails"] = $dbh->getOrderDetails($_POST["id"]);
    $templateParams["categories"]=$dbh->getCategories();
    foreach($templateParams["categories"] as $category){
        $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
    }
    require './template/base-template.php';
}else{
    header("location: login.php");
}
?>