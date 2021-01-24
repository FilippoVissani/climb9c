<?php
require_once 'bootstrap.php';
    if(isset($_SESSION["idSELLER"])) {
    $templateParams["title"]="Climb9c - Gestione ordini";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"] = "seller-categories-management.php";

    $templateParams["categories"]=$dbh->getCategories();
    foreach($templateParams["categories"] as $category){
        $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
    }

    if(isset($_POST["nuovaCategoria"])){
        $dbh->addNewCategory($_POST["nuovaCategoria"]);
    }

    if(isset($_POST["nuovaSottocategoria"])){
        $dbh->addNewSubcategory($_POST["product-subcategory"], $_POST["nuovaSottocategoria"]);
    }

    if(isset($_POST["nuovoTag"])){
        $dbh->addNewTag($_POST["product-subcategoryID"], $_POST["nuovoTag"]);
    }




    require './template/base-template.php';
} else{
    header("location: login-admin.php");
}
?>