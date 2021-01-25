<?php
require_once 'bootstrap.php';
if(!isset($_SESSION["idSELLER"])){
    header("location: login-admin.php");
}
$templateParams["title"]="Climb9c - Seller home";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "seller-home-template.php";
$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}
require './template/base-template.php';
?>