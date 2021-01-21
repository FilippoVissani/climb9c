<?php
require_once 'bootstrap.php';
if(isUserLoggedIn()){
    $dbh->addToCart($_SESSION["idCUSTOMER"], $_POST["product"], $_POST["quantity"]);
} else{
    echo "devi fare il login per poter aggiungere prodotti al carrello";
}

?>