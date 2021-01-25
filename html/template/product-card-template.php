<div class="col d-flex">
    <div class="card rounded shadow mb-5 flex-fill card-hover">
        <img src="<?php echo UPLOAD_DIR.$templateParams["idPRODUCT"]; ?>/1.jpg" class="card-img-top" alt="
        <?php echo $templateParams["productName"]; ?>">
        <div class="card-body border-top pb-0">
            <p class="card-title text-center fs-5">
                <?php echo $templateParams["productName"]; ?>
            </p>
            <a href="./product.php?id=<?php echo $templateParams["idPRODUCT"]; ?>" class="stretched-link" title="link"></a>
        </div>
        <div class="text-center mb-1">
            <span class="badge bg-primary text-dark fs-5">
                <?php echo $templateParams["productPrice"]; ?> €
            </span>
        </div>
        <div class="card-footer ">
            <p class="text-muted  mb-0">
                Pezzi disponibili: <?php echo $templateParams["quantity"]; ?>
            </p>
        </div>
    </div>
</div>