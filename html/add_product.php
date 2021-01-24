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

  //controllo file caricato
  list($result, $msg) = checkImage($_FILES["product-img"]);
  if($result==1){
    //se il caricamento è avvenuto correttamente salvo il nuovo prodotto nel db
    $idProduct = $dbh->addNewProduct($_POST["product-name"], $_POST["product-brand"], $_POST["product-price"], $_POST["product-subcategory"], $_POST["description"], $json, $_POST["product-quantity"]);
    mkdir(UPLOAD_DIR."/".$idProduct);
    uploadImage(UPLOAD_DIR."/".$idProduct."/", $_FILES["product-img"]);
    $templateParams["product-insert"] = "Prodotto caricato correttamente!";
  }
  else{
    $templateParams["img-error"] = $msg;
  }
}

$templateParams["title"]="Climb9c - Nuovo Prodotto";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "new-product.php";

require './template/base-template.php';
?>
