<?php
require_once 'bootstrap.php';

if (!isset($_SESSION["idSELLER"])) {
    header("location: login-admin.php");
}



if (isset($_POST["productSelect-text"])) {
    $templateParams["selectedProduct"] = $dbh->getProductById($_POST["productSelect-text"])[0];
    $templateParams["selectedProduct"]["tecnical_specifications"] = json_decode($templateParams["selectedProduct"]["tecnical_specifications"]);
}

var_dump($_FILES["product-img"]);

//click sul pulsante modifica
if (isset($_POST["product-name"])) {
    // creao array associativo con le specifiche tecniche

    if ($_POST["specifications_number"] > 0) {
        $tecnical_specs[$_POST["specifica1"]] = $_POST["descrizione1"];
        for ($i = 2; $i <= $_POST["specifications_number"]; $i++) {
            $tecnical_specs =  $tecnical_specs + array($_POST["specifica" . $i] => $_POST["descrizione" . $i]);
        }
    } else {
        $tecnical_specs["Specifica"] = "Descrizione";
    }

    //lo trasformo in Json
    $json = json_encode($tecnical_specs);

    //se l'immagine è settata
    if (false && isset($_FILES["product-img"])) {
        //faccio update prodotto e dell'immagine
        //controllo l'immagine
        list($result, $msg) = checkImage($_FILES["product-img"]);
        if ($result == 1) {
            //se l'immagine è adatta salvo il nuovo prodotto nel db e l'immagine nella directory corretta
            mkdir(UPLOAD_DIR . "/" . $idProduct);
            uploadImage(UPLOAD_DIR . "/" . $idProduct . "/", $_FILES["product-img"]);
            $dbh->editProduct($_POST["product-name"], $_POST["product-brand"], $_POST["product-price"], $_POST["product-subcategory"], $_POST["description"], $json, $_POST["product-quantity"], $_POST["product_id"]);
            $templateParams["product-insert"] = "Prodotto modificato correttamente!";
        } else {
            $templateParams["img-error"] = $msg;
            $templateParams["title"] = "Climb9c - Modifica Prodotto";
            $templateParams["search_bar"] = FALSE;
            $templateParams["name"] = "seller-edit-product.php";
        }
    } else {
        //se l'immagine non è settata  faccio solo update prodotto
        $dbh->editProduct($_POST["product-name"], $_POST["product-brand"], $_POST["product-price"], $_POST["product-subcategory"], $_POST["description"], $json, $_POST["product-quantity"], $_POST["product_id"]);
    }
}




$templateParams["title"] = "Climb9c - Modifica Prodotto";
$templateParams["search_bar"] = FALSE;
$templateParams["name"] = "seller-edit-product.php";

$templateParams["categories"] = $dbh->getCategories();
foreach ($templateParams["categories"] as $category) {
    $templateParams[$category["id"] . "-subcategory"] = $dbh->getSubcategories($category["id"]);
}


$templateParams["products"] = $dbh->getAllProducts();



require './template/base-template.php';
