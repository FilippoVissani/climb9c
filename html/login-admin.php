<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["p"])){
    $result = $dbh->checkAdminLogin($_POST["username"]);
    if(count($result)==0){
        //Email non registrata
        $templateParams["login_error"] = "Errore! Utente non registrato!";
    }
    else{
      if(password_verify($_POST["p"], $result[0]["password"])){
        $_SESSION["idSELLER"] = $result[0]["idSELLER"];
      }
      else{
        $templateParams["login_error"] = "Errore! Password Errata!";
      }
    }
}

if(isAdminLoggedIn()){
    header("location: seller-home.php");
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
