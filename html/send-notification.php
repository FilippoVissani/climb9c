<?php
require_once 'bootstrap.php';
if(isset($_POST["recipientId"])){
    $dbh->addCustomerNotification($_POST["title"], $_POST["message"], $_POST["recipientId"]);
}else{
    $dbh->addSellerNotification($_POST["title"], $_POST["message"]);
}
?>