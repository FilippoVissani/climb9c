<?php
require_once 'bootstrap.php';

function isUserLoggedIn(){
    return !empty($_SESSION['idCUSTOMER']);
}

if(isset($_POST["username"]) && isset($_POST["password"])){
    $result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($result)==0){
        //Login fallito
        $templateParams["login_error"] = "Errore! Username o password errata!";
    }
    else{
      $templateParams["customer_logged_info"] = $result[0];
      $_SESSION["idCUSTOMER"] = $templateParams["customer_logged_info"]["idCUSTOMER"];
    }
}

if(isUserLoggedIn()){
  $templateParams["title"]="Climb9c - Account";
  $templateParams["search_bar"] = FALSE;
  $templateParams["name"] = "account.php";
  //modifica account

}
else{
  $templateParams["title"]="Climb9c - Accedi";
  $templateParams["search_bar"] = FALSE;
  $templateParams["name"]="login_form.php";
}

require 'template/base.php';
?>
