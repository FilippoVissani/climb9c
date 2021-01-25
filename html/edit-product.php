<?php
require_once 'bootstrap.php';

if (!isset($_SESSION["idSELLER"])) {
    header("location: login-admin.php");
}


//se ho selezionato il prodotto prendo i suoi dati
if (isset($_POST["productSelect-text"])) {
    $templateParams["selectedProduct"] = $dbh->getProductById($_POST["productSelect-text"])[0];
    $templateParams["selectedProduct"]["tecnical_specifications"] = json_decode($templateParams["selectedProduct"]["tecnical_specifications"]);
}


//click sul pulsante modifica
if (isset($_POST["product-name"])) {

    // creo array associativo con le specifiche tecniche
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
            $templateParams["product-edit"] = "Prodotto modificato correttamente!";
        } else {
            $templateParams["img-error"] = $msg;
            $templateParams["title"] = "Climb9c - Modifica Prodotto";
            $templateParams["search_bar"] = FALSE;
            $templateParams["name"] = "seller-edit-product.php";
        }
    } else {
        //se l'immagine non è settata  faccio solo update prodotto
        $dbh->editProduct($_POST["product-name"], $_POST["product-brand"], $_POST["product-price"], $_POST["product-subcategory"], $_POST["description"], $json, $_POST["product-quantity"], $_POST["product_id"]);
        $templateParams["product-edit"] = "Prodotto modificato correttamente!";

        $templateParams["title"] = "Climb9c - Modifica Prodotto - Tags";
        $templateParams["search_bar"] = FALSE;
        $templateParams["name"] = "seller-edit-tags-product.php";

        $templateParams["subcategory"] = $_POST["product-subcategory"];
        $templateParams["productId"] = $_POST["product_id"];
        $templateParams["tagsProduct"] = $dbh->getTagsByProductIDandSubID($_POST["product_id"], $_POST["product-subcategory"]);
    }
} else {
    $templateParams["title"] = "Climb9c - Modifica Prodotto";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"] = "seller-edit-product.php";
}

if (isset($_POST["product-id"])) {
    $tags = $dbh->getTagsNameBySubcategory($_POST["product-subcategory"]);
    foreach ($tags as $singleTag) {
        $name = "tag-" . $singleTag["id"];
        if (isset($_POST[$name]) && strlen($_POST[$name]) > 0) {
            $dbh->editTagProduct($singleTag["id"], $_POST["product-id"], $_POST[$name]);
        }
    }
    $templateParams["title"] = "Climb9c - Seller home";
    $templateParams["search_bar"] = FALSE;
    $templateParams["name"] = "seller-home-template.php";
}




$templateParams["categories"] = $dbh->getCategories();
foreach ($templateParams["categories"] as $category) {
    $templateParams[$category["id"] . "-subcategory"] = $dbh->getSubcategories($category["id"]);
}


$templateParams["products"] = $dbh->getAllProducts();



require './template/base-template.php';
