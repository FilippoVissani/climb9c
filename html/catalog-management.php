<?php
require_once 'bootstrap.php';
    if(isset($_SESSION["idSELLER"])) {
    $templateParams["title"]="Climb9c - Gestione ordini";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"] = "seller-catalog-management.php";

    $templateParams["categories"]=$dbh->getCategories();
    foreach($templateParams["categories"] as $category){
        $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
    }
    require './template/base-template.php';
} else{
    header("location: login-admin.php");
}
?>