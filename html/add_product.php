<?php
require_once 'bootstrap.php';

if(isset($_POST["product-name"])){
  // creao array associativo con le specifiche tecniche
  $tecnical_specs[$_POST["specifica1"]] = $_POST["descrizione1"];
  for($i=2; $i<=$_POST["specifications_number"]; $i++){
    $tecnical_specs =  $tecnical_specs + array($_POST["specifica".$i] => $_POST["descrizione".$i]);
  }
  //lo trasformo in Json
  $json = json_encode($tecnical_specs);
  //salvo imgarticolo
  //list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["product-img"]);
  //salvo il nuovo prodotto nel db

  $idProduct = $dbh->addNewProduct($_POST["product-name"], $_POST["product-brand"], $_POST["product-price"], $_POST["product-subcategory"], $_POST["description"], $json, $_POST["product-quantity"]);
  //prodotto salvato con successo
  var_dump($_POST);

}
$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}

$templateParams["title"]="Climb9c - Nuovo Prodotto";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "new-product.php";

require './template/base-template.php';
?>
