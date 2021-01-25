<?php
require_once 'bootstrap.php';
if(isset($_SESSION["idSELLER"])){
    if(isset($_POST["validity"])){
        $dbh->editCoupon($_POST["code"], $_POST["discount"], $_POST["validity"]);
        //$dbh->editCoupon("TEST", "35", 1);
    }else{
        $dbh->addCoupon($_POST["code"], $_POST["discount"]);
    }
}
?>