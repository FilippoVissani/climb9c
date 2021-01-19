<!--pagina di login dell'admin-->
<?php
require_once 'bootstrap.php';
$templateParams["title"]="Climb9c - Admin";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "admin-home.php";

if(isset($_GET["formmsg"])){
    $templateParams["formmsg"] = $_GET["formmsg"];
}

require './template/base.php';
?>
