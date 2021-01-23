<?php
require_once 'bootstrap.php';
if(isset($_SESSION["idCUSTOMER"])){
    $templateParams["notifications"]=$dbh->getCustomerNotifications($_SESSION["idCUSTOMER"]);
}else if (isset($_SESSION["idSELLER"])){
    $templateParams["notifications"]=$dbh->getSellerNotifications($_SESSION["idSELLER"]);
}else{
    header("location: login.php");
}
$templateParams["title"]="Climb9c - Notifications";
$templateParams["name"] = "notifications-template.php";
$templateParams["search_bar"] = FALSE;
$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}
require './template/base-template.php';
?>
