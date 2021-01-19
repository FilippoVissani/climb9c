<?php
require_once 'bootstrap.php';

if(isset($_GET["logout"])){
  unset($_SESSION["idCUSTOMER"]);
  header("location: index.php");
}
else {
  header("location: login.php");
}

require './template/base.php';
?>
