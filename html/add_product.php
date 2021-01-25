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
    //se l'immagine è adatta salvo il nuovo prodotto nel db e l'immagine nella directory corretta
    $idProduct = $dbh->addNewProduct($_POST["product-name"], $_POST["product-brand"], $_POST["product-price"], $_POST["product-subcategory"], $_POST["description"], $json, $_POST["product-quantity"]);
    mkdir(UPLOAD_DIR."/".$idProduct);
    uploadImage(UPLOAD_DIR."/".$idProduct."/", $_FILES["product-img"]);
    $templateParams["product-insert"] = "Prodotto caricato correttamente!";
    //pagina per inserire tag al prodotto
    $templateParams["title"]="Climb9c - Nuovo Prodotto - Tags";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"] = "add-tags-template.php";
    $templateParams["subcategory"]= $_POST["product-subcategory"];
    $templateParams["productId"]= $idProduct;
  }
  else{
    $templateParams["img-error"] = $msg;
    $templateParams["title"]="Climb9c - Nuovo Prodotto";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"] = "new-product.php";
  }
}
else {
  $templateParams["title"]="Climb9c - Nuovo Prodotto";
  $templateParams["search_bar"] = FALSE;
  $templateParams["name"] = "new-product.php";
}

if(isset($_POST["product-id"])){
  $tags = $dbh->getTagsNameBySubcategory($_POST["product-subcategory"]);
  foreach ($tags as $singleTag) {
    $name= "tag-".$singleTag["id"];
    if(isset($_POST[$name]) && strlen($_POST[$name])>0){
      $dbh->addTagProduct($singleTag["id"], $_POST["product-id"], $_POST[$name]);
    }
  }
  $templateParams["title"]="Climb9c - Seller home";
  $templateParams["search_bar"] = FALSE;
  $templateParams["name"] = "seller-home-template.php";
}

$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}

require './template/base-template.php';
?>
