<?php
require_once 'bootstrap.php';

if($_SESSION["idCUSTOMER"]==$_POST["idOwner"]){
    $dbh->setCustomerNotificationVisualized($_POST["idOwner"],$_POST["idNotification"]);
}else if($_SESSION["idSELLER"]==$_POST["idOwner"]){
    $dbh->setSellerNotificationVisualized($_POST["idOwner"],$_POST["idNotification"]);
}else{
    header("location: login.php");
}
?>