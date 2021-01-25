<?php
require_once 'bootstrap.php';
if(isUserLoggedIn()){
    $dbh->addToCart($_SESSION["idCUSTOMER"], $_POST["product"], $_POST["quantity"]);
} else{
    echo "0";
}

?>
