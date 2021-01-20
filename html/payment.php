<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn()){
  header("location: login.php");
}
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


require './template/base.php';
?>
