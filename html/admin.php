<!--pagina di login dell'admin-->
<?php
require_once 'bootstrap.php';
$templateParams["title"]="Climb9c - Admin";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "admin-home.php";

if(isset($_GET["formmsg"])){
    $templateParams["formmsg"] = $_GET["formmsg"];
}
$tecnical_specifications = [
    "Chiusura" => "Strappo",
    "Utilizzo scarpetta" => "Boulder, Falesia",
    "Tipo suola scarpetta" => "Suola intera",
    "Aggressivita scarpetta" => "Performante"
    ];

$json = json_encode($tecnical_specifications);
//$dbh->addJson($json);


require './template/base.php';
?>
