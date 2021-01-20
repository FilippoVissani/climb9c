<div class="row m-2">
    <div class="col-12 p-0">
        <h1>CERCA: <?php foreach($templateParams["wordsArray"] as $word){ echo strtoupper($word . " "); } ?></h1>
    </div>
</div>

<div class="row my-2 mx-5">
        <?php foreach($templateParams["products"] as $product): ?>
            <div class="col">
            <div class="card h-100">
            <img src="<?php echo UPLOAD_DIR.$product["idPRODUCT"]; ?>/1.jpg" class="card-img-top" alt="
            <?php echo $product["name"]; ?>">
            <div class="card-body">
                <p class="card-title">
                    <?php echo $product["name"]; ?>
                </p>
                <p class="card-text text-center">
                    <?php echo $product["price"]; ?> €
                </p>
                <a href="./product.php?id=<?php echo $product[" idPRODUCT"]; ?>" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <small class="text-muted">Disponibili
                    <?php echo $product["quantity"]; ?> pezzi
                </small>
            </div>
        </div>
        </div>
        <?php endforeach; ?>
</div>