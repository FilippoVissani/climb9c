<?php
require_once 'bootstrap.php';
$templateParams["title"]="Climb9c - Order detail";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "order-detail-template.php";
$templateParams["products"]=$dbh->getProducts($_POST["id"]);
if(isset($_SESSION["idCUSTOMER"])){
    $customerOrders = $dbh->getOrders($_SESSION["idCUSTOMER"]);
    foreach($customerOrders as $tmp){
        if($tmp["idORDER"]==$_POST["id"]){
            $templateParams["orderDetails"]=$tmp;
        }
    }
}
$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}
require './template/base.php';
?>