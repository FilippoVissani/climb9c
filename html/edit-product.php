<?php
require_once 'bootstrap.php';




$templateParams["title"]="Climb9c - Modifica prodotto";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "seller-edit-product.php";

$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}


$templateParams["products"]=$dbh->getAllProducts();

if(isset($_POST["productSelect-text"])){
    $templateParams["selectedProduct"]=$dbh->getProductById($_POST["productSelect-text"])[0];
    
    var_dump($templateParams["selectedProduct"]["idPRODUCT"]);
}


require './template/base-template.php';
?>