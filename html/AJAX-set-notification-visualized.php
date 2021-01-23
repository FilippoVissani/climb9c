<?php
require_once 'bootstrap.php';

if(isset($_SESSION["idCUSTOMER"]) && $_SESSION["idCUSTOMER"]==$_POST["idCustomer"]){
    $dbh->setCustomerNotificationVisualized($_POST["idCustomer"],$_POST["idNotification"]);
}
?>