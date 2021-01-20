<?php
require_once 'bootstrap.php';

if(count($_POST) > 0){
  //check username esistente || check pw != pw-confirm
  if($dbh->checkEmailPresence($_POST["username"]) == TRUE || $_POST["password"] != $_POST["password-confirm"]){
    $templateParams["sign_up_error"] = "Errore! Dati inseriti non validi";
    $templateParams["title"]="Climb9c - Registrati";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"]="sign_up.php";
  }
  else{
    //add customer to db
    $dbh->addNewCustomer($_POST["username"], $_POST["password"], $_POST["name"], $_POST["surname"], $_POST["telephone"], $_POST["gender"], $_POST["birthdate"]);
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
require 'template/base.php';
?>
