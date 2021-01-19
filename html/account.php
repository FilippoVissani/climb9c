<?php
require_once 'bootstrap.php';

function isUserLoggedIn(){
    return !empty($_SESSION['idCUSTOMER']);
}

if (isUserLoggedIn()){
  
}

 ?>
