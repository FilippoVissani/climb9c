<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["p"])){
    $result = $dbh->checkLogin($_POST["username"]);
    if(count($result)==0){
        //Email non registrata
        $templateParams["login_error"] = "Errore! Utente non registrato!";
    }
    else{
      if(password_verify($_POST["p"], $result[0]["password"])){
        $_SESSION["idCUSTOMER"] = $result[0]["idCUSTOMER"];
        $_SESSION["name"] = $result[0]["name"];
        $_SESSION["surname"] = $result[0]["surname"];
        $_SESSION["email"] = $result[0]["email"];
        $_SESSION["telephone"] = $result[0]["telephone"];
      }
      else{
        $templateParams["login_error"] = "Errore! Password Errata!";
      }
    }
}

if(isUserLoggedIn()){
  $templateParams["title"]="Climb9c - Account";
  $templateParams["search_bar"] = FALSE;
  $templateParams["name"] = "account_form.php";

}
else{
  $templateParams["title"]="Climb9c - Accedi";
  $templateParams["search_bar"] = FALSE;
  $templateParams["name"]="login_form.php";
}

$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}

require 'template/base-template.php';
?>
