<?php
require_once 'bootstrap.php';

if(isset($_SESSION["idCUSTOMER"])){
    $dbh->setCustomerNotificationVisualized($_SESSION["idCUSTOMER"],$_POST["idNotification"]);
}else if(isset($_SESSION["idSELLER"])){
    $dbh->setSellerNotificationVisualized($_POST["idNotification"]);
}else{
    header("location: login.php");
}
?>