<?php
require_once 'bootstrap.php';
$templateParams["title"]="Climb9c - Home";
$templateParams["search_bar"] = TRUE;
$templateParams["name"] = "home-template.php";
$templateParams["carouselProducts"]=$dbh->getLatestArticlesAdded(10);
$templateParams["bestSeller"]=$dbh->getBestSeller(6);
$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}
require './template/base-template.php';
?>
