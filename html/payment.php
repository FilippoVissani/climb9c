<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn()){
  header("location: login.php");
}

if(isset($_POST["cvv"])){
  if(isset($_POST["idADDRESS"])){
    //completa pagamento
    //salva ordine su db
    if(!isset($_SESSION["couponCode"])){
      $_SESSION["couponCode"]=NULL;
    }
    $templateParams["IdOrder"] = $dbh->addNewOrder(date("Y/m/d"), $_SESSION["idCUSTOMER"], $_POST["idADDRESS"], $_SESSION["couponCode"]);
    //elimina ordine dal carrello
    $dbh->deleteCart($_SESSION["idCUSTOMER"]);
    $templateParams["products"] = $dbh->getProducts($templateParams["IdOrder"]);

    $templateParams["title"]="Climb9c - Pagamento";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"] = "payment_done.php";
  }
  else{
      $templateParams["payment_error"] = "Scegli un indirizzo di spedizione";
      $templateParams["title"]="Climb9c - Pagamento";
      $templateParams["search_bar"] = FALSE;
      $templateParams["name"] = "payment_form.php";
  }
}
else{
  //add new address
  if(isset($_POST["address"])){
    $dbh->addNewAddressToCustomer($_SESSION["email"], $_POST["name"], $_POST["surname"], $_POST["address"], $_POST["province"], $_POST["city"], $_POST["zip_code"]);
    header("location: payment.php");
  }
  //check coupon
  if(isset($_GET["couponCode"])){
    $coupon = $dbh->getCoupon($_GET["couponCode"]);

    if(count($coupon)!==0 && $coupon[0]["validity"] ==1 ){
      $_SESSION["couponCode"]=$_GET["couponCode"];
      $_SESSION["couponDiscount"]=$coupon[0]["discount"];
    }else {
      $templateParams["coupon_error"] = "Errore! Coupon non valido!";
    }
  }

  $templateParams["title"]="Climb9c - Pagamento";
  $templateParams["search_bar"] = FALSE;
  $templateParams["name"] = "payment_form.php";

}


$templateParams["categories"]=$dbh->getCategories();
foreach($templateParams["categories"] as $category){
    $templateParams[$category["id"]."-subcategory"]=$dbh->getSubcategories($category["id"]);
}

require './template/base-template.php';
?>
