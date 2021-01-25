<?php
require_once 'bootstrap.php';
if(isUserLoggedIn()){
  $dbh->updateCartQuantity($_SESSION["idCUSTOMER"], $_POST["product"], $_POST["quantity"]);
}

?>
