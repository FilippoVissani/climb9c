<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["password"])){
    $result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($result)==0){
        //Login fallito
        $templateParams["login_error"] = "Errore! Username o password errata!";
    }
    else{
      $_SESSION["idCUSTOMER"] = $result[0]["idCUSTOMER"];
      $_SESSION["name"] = $result[0]["name"];
      $_SESSION["surname"] = $result[0]["surname"];
      $_SESSION["email"] = $result[0]["email"];
      $_SESSION["telephone"] = $result[0]["telephone"];
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

require 'template/base.php';
?>
