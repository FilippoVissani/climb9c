<?php
require_once 'bootstrap.php';
$templateParams["wordsArray"]=explode(" ", $_GET["search-text"]);
$templateParams["products"]=$dbh->searchElements($templateParams["wordsArray"]);
$templateParams["title"]="Climb9c - Search";
$templateParams["search_bar"] = TRUE;
$templateParams["name"] = "search-template.php";
$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}
require './template/base.php';
?>