<?php
require_once 'bootstrap.php';
if(isset($_SESSION["idSELLER"]) || isset($_SESSION["idCUSTOMER"])){
    if(isset($_POST["recipientId"])){
        $dbh->addCustomerNotification($_POST["title"], $_POST["message"], $_POST["recipientId"]);
    }else{
        $dbh->addSellerNotification($_POST["title"], $_POST["message"]);
    }
}else{
    header("location: login-admin.php");
}
?>