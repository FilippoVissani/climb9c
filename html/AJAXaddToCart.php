<?php
require_once 'bootstrap.php';

$dbh->addToCart($_POST["customer"], $_POST["product"], $_POST["quantity"]);

?>