<div class="row m-2">
    <div class="col-12 p-0">
        <h1 class="fw-bold">CERCA: <?php foreach($templateParams["wordsArray"] as $word){ echo strtoupper($word . " "); } ?></h1>
    </div>
</div>

<div class="row my-2 mx-5">
        <?php foreach($templateParams["products"] as $product): ?>
            <div class="col">
                <?php
                $templateParams["idPRODUCT"]=$product["idPRODUCT"];
                $templateParams["productName"]=$product["name"];
                $templateParams["productPrice"]=$product["price"];
                $templateParams["quantity"]=$product["quantity"];
                require "product-card-template.php";
                ?>
            </div>
        <?php endforeach; ?>
</div>