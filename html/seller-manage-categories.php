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
        var_dump($_POST["nuovaCategoria"]);
        $dbh->addNewCategory($_POST["nuovaCategoria"]);
    }

    if(isset($_POST["nuovaSottocategoria"])){
        
        var_dump($_POST["product-subcategory"]);
        
        var_dump($_POST["nuovaSottocategoria"]);
    }

    if(isset($_POST["nuovoTag"])){
        var_dump($_POST["nuovoTag"]);
    }




    require './template/base-template.php';
} else{
    header("location: login-admin.php");
}
?>