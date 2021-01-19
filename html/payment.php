<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn()){
  header("location: login.php");
}
if(isset($_POST["address"])){
  $dbh->addNewAddressToCustomer($_SESSION["email"], $_POST["name"], $_POST["surname"], $_POST["address"], $_POST["province"], $_POST["city"], $_POST["zip_code"]);
  header("location: payment.php");
}
if(isset($_GET["couponCode"])){
  //check validity
  echo "ciao";
  $coupon = $dbh->checkCouponValidity($_GET["couponCode"]);

  if(count($coupon)!==0 && $coupon[0]["validity"] ==1 ){
    $_SESSION["couponCode"]=$_GET["couponCode"];
    $_SESSION["couponDiscount"]=$coupon[0]["discount"];
  }else {
    $templateParams["coupon_error"] = "Errore! Coupon non valido!";
  }
  //aggiungi codice sconto all'ordine
}
$templateParams["title"]="Climb9c - Pagamento";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "payment_form.php";


require './template/base.php';
?>
