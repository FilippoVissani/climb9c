<?php
require_once 'bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $result = $dbh->checkAdminLogin($_POST["email"], $_POST["password"]);
    if(count($result)==0){
        //Login fallito
        $templateParams["login_error"] = "Errore! Username o password errata!";
    }
    else{
      $_SESSION["idSELLER"] = $result[0]["idSELLER"];
    }
}

if(isset($_SESSION["idSELLER"])){
    header("location: admin.php");
}

$templateParams["title"]="Climb9c - Admin login";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "login-form-admin-template.php";
$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}
require './template/base-template.php';
?>