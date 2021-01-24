<?php
require_once 'bootstrap.php';
if(isset($_SESSION["idSELLER"])){
    $templateParams["title"]="Climb9c - Home";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"] = "seller-home-template.php";
    $templateParams["categories"]=$dbh->getCategories();
    foreach($templateParams["categories"] as $category){
        $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
    }
}else{
    header("location: login-admin.php");
}
require './template/base-template.php';
?>