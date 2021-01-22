<div class="card rounded shadow mb-2 flex-fill">
    <img src="<?php echo UPLOAD_DIR.$templateParams["idPRODUCT"]; ?>/1.jpg" class="card-img-top" alt="
    <?php echo $templateParams["productName"]; ?>">
    <div class="card-body border-top">
        <p class="card-title fs-6">
        <?php echo $templateParams["productName"]; ?>
        </p>
        <span class="badge bg-primary text-dark fs-6">
            <?php echo $templateParams["productPrice"]; ?> €
        </span>
        <a href="./product.php?id=<?php echo $templateParams["idPRODUCT"]; ?>" class="stretched-link"></a>
    </div>
</div>