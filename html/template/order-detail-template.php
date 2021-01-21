<div class="row mx-auto mt-5">
    <div class="col-12 m-auto">
        <h1 class="m-auto fw-bold text-center">DETTAGLI ORDINE N° <?php echo $_POST["id"] ?></h1>
    </div>
</div>

<?php foreach($templateParams["products"] as $product): ?>
<div class="row mx-auto mt-3 border-bottom border-3 border-dark">
    <div class="col-md-3 m-auto">
        <img class="w-100 shadow mb-5 w-100 px-auto rounded-pill-home" src="<?php echo UPLOAD_DIR.$product["idPRODUCT"]; ?>/1.jpg" />
    </div>
    <div class="col-md-9 m-auto">
        <h1>
            <?php echo $product["name"] ?>
        </h1>
        <p class="fs-5">
            Brand: <?php echo $product["brand"] ?>
        </p>
        <p class="fs-5">
            Quantità: <?php echo $product["quantity"] ?>
        </p>
        <p class="fs-5">
            Prezzo: <?php echo $product["unit_price"] ?> €
        </p>
    </div>
</div>
<?php
$total+=$product["quantity"]*$product["unit_price"];
endforeach;
?>

<div class="row mx-auto mt-5">
    <div class="col-12 m-auto">
        <p class="fs-5">Data ordine: <?php echo $templateParams["orderDetails"]["date"] ?></p>
        <p class="fs-5">Data spedizione: <?php echo $templateParams["orderDetails"]["shipping_date"] ?></p>
        <p class="fs-5">Città: <?php echo $templateParams["orderDetails"]["city"] ?></p>
        <p class="fs-5">Via: <?php echo $templateParams["orderDetails"]["street"] ?></p>
        <p class="fs-5">Provincia: <?php echo $templateParams["orderDetails"]["province"] ?></p>
        <p class="fs-5">CAP: <?php echo $templateParams["orderDetails"]["zip_code"] ?></p>
        <p class="fs-5">Coupon: <?php echo $templateParams["orderDetails"]["COUPONcode"] ?></p>
        <p class="fs-5">Totale: <?php echo $total ?> €</p>
    </div>
</div>
