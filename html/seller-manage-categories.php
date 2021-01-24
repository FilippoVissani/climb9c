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
        $templateParams["insertResult"]="Nuova categoria '".$_POST["nuovaCategoria"]."' aggiunta correttamente.";
    }

    if(isset($_POST["nuovaSottocategoria"])){
        $dbh->addNewSubcategory($_POST["product-subcategory"], $_POST["nuovaSottocategoria"]);
        $templateParams["insertResult"]="Nuova sottocategoria '".$_POST["nuovaSottocategoria"]."' aggiunta correttamente.";
    }

    if(isset($_POST["nuovoTag"])){
        $dbh->addNewTag($_POST["product-subcategoryID"], $_POST["nuovoTag"]);
        $templateParams["insertResult"]="Nuovo Tag '".$_POST["nuovoTag"]."' aggiunto correttamente.";
    }


    require './template/base-template.php';
} else{
    header("location: login-admin.php");
}
?>