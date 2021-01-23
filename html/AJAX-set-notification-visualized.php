<?php
require_once 'bootstrap.php';

$dbh->setCustomerNotificationVisualized($_POST["idCustomer"],$_POST["idNotification"]);
?>