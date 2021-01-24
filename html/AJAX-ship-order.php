<?php
require_once 'bootstrap.php';
if(isset($_SESSION["idSELLER"])){
    $dbh->shipOrder($_POST["id"]);
}
?>