<?php
require_once 'bootstrap.php';

if(isset($_GET["logout"])){
  unset($_SESSION["idCUSTOMER"]);
  header("location: index.php");
}
else if(isset($_POST["address"])){
  $dbh->addNewAddressToCustomer($_SESSION["email"], $_POST["name"], $_POST["surname"], $_POST["address"], $_POST["province"], $_POST["city"], $_POST["zip_code"]);
}
header("location: login.php");

require './template/base-template.php';
?>
