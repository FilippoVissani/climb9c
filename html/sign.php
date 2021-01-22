<?php
require_once 'bootstrap.php';

if(count($_POST) > 0){
  //check username esistente || check pw != pw-confirm
  if($dbh->checkEmailPresence($_POST["username"]) == TRUE || $_POST["p"] != $_POST["pc"]){
    $templateParams["sign_up_error"] = "Errore! Dati inseriti non validi";
    $templateParams["title"]="Climb9c - Registrati";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"]="sign_up.php";
  }
  else{
    //add customer to db
    $pw = password_hash($_POST["p"], PASSWORD_BCRYPT);
    $dbh->addNewCustomer($_POST["username"], $pw, $_POST["name"], $_POST["surname"], $_POST["telephone"], $_POST["gender"], $_POST["birthdate"]);
    //inserisci indirizzo nel db
    $dbh->addNewAddressToCustomer($_POST["username"], $_POST["name"], $_POST["surname"], $_POST["address"], $_POST["province"], $_POST["city"], $_POST["zip_code"]);
    //visualizza pagina account
    $templateParams["title"]="Climb9c - Account";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"]="account_form.php";
  }

}
else{
  $templateParams["title"]="Climb9c - Registrati";
  $templateParams["search_bar"] = FALSE;
  $templateParams["name"]="sign_up.php";
}

$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}

require 'template/base-template.php';
?>
