<?php
require_once 'bootstrap.php';
$templateParams["title"]="Climb9c - Notifications";
$templateParams["name"] = "notifications-template.php";
$templateParams["categories"]=$dbh->getCategories();
$templateParams["notificationTitle"] = "prova";
$templateParams["notificationMessage"] = "messaggio prova";
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}
require './template/base-template.php';
?>