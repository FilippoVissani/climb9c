<?php if((!isset($_SESSION["idCUSTOMER"]) && !isset($_SESSION["idSELLER"])) || !isset($templateParams["products"])){ header("location: login.php"); } ?>
<div class="row mx-auto mt-5">
    <div class="col-12 m-auto">
        <h1 class="m-auto fw-bold text-center">DETTAGLI ORDINE N° <?php echo $_POST["id"] ?></h1>
    </div>
</div>

<?php
$total = 0;
foreach ($templateParams["products"] as $product) : ?>
    <div class="row mx-auto mt-3 border-bottom border-3 border-dark">
        <div class="col-md-3 m-auto">
            <img class="w-100 shadow mb-5 w-100 px-auto rounded-pill-home" alt="immagine-prodotto" src="<?php echo UPLOAD_DIR . $product["idPRODUCT"]; ?>/1.jpg" />
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
    $total += $product["quantity"] * $product["unit_price"];
endforeach;
$total=calculateFinalPrice($total, $templateParams["orderDetails"][0]["discount"]);
?>

<div class="row mx-auto mt-5">
    <div class="col-12 m-auto">
        <p class="fs-5">Data ordine: <?php echo $templateParams["orderDetails"][0]["date"] ?></p>
        <p class="fs-5">Data spedizione: <?php echo $templateParams["orderDetails"][0]["shipping_date"] ?></p>
        <p class="fs-5">Città: <?php echo $templateParams["orderDetails"][0]["city"] ?></p>
        <p class="fs-5">Via: <?php echo $templateParams["orderDetails"][0]["street"] ?></p>
        <p class="fs-5">Provincia: <?php echo $templateParams["orderDetails"][0]["province"] ?></p>
        <p class="fs-5">CAP: <?php echo $templateParams["orderDetails"][0]["zip_code"] ?></p>
        <p class="fs-5">Coupon: <?php echo $templateParams["orderDetails"][0]["COUPONcode"] ?></p>
        <p class="fs-5">Totale: <?php echo $total ?> €</p>
    </div>
</div>
<?php if(isset($_SESSION["idSELLER"]) && !isset($templateParams["orderDetails"][0]["shipping_date"])): ?>
<div class="row mx-auto">
    <div class="col-md-12 m-auto d-flex">
        <button class="btn btn-primary fw-bold" id="ship">SPEDISCI</button>
        <div class="alert alert-success collapse" role="alert" id="ship-alert">
            Ordine spedito con successo!
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("button#ship").click(function(){
            $.ajax({
                url: "./AJAX-ship-order.php",
                method: "POST",
                data: {
                  id: <?php echo $_POST["id"] ?>
                }
            });
            $.ajax({
                url: "./send-notification.php",
                method: "POST",
                data: {
                  title: "Il tuo ordine è stato spedito!",
                  message: 'Il tuo ordine con ID=<?php echo $_POST["id"] ?> è stato spedito.',
                  recipientId: <?php echo $templateParams["orderDetails"][0]["idCUSTOMER"] ?>
                }
            });
            $("div#ship-alert").toggle();
            $("button#ship").toggle();
        });
    });
</script>
<?php endif; ?>
