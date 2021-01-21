<div class="card rounded shadow mb-5 h-100">
    <img src="<?php echo UPLOAD_DIR.$templateParams["idPRODUCT"]; ?>/1.jpg" class="card-img-top" alt="
    <?php echo $templateParams["productName"]; ?>">
    <div class="card-body border-top">
        <p class="card-title text-center fs-5">
            <?php echo $templateParams["productName"]; ?>
        </p>
        <a href="./product.php?id=<?php echo $templateParams["idPRODUCT"]; ?>" class="stretched-link"></a>
    </div>
    <div class="card-footer">
        <span class="badge bg-primary text-dark fs-5">
            <?php echo $templateParams["productPrice"]; ?> €
        </span>
        <p class="text-muted fs-5">
            Pezzi disponibili: <?php echo $templateParams["quantity"]; ?>
        </p>
    </div>
</div>