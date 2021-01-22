<div class="card rounded shadow mb-2">
    <img src="<?php echo UPLOAD_DIR.$templateParams["idPRODUCT"]; ?>/1.jpg" class="card-img-top" alt="
    <?php
    $wordsArray=array_slice(explode(" ", $templateParams["productName"]), 0, 5);
    foreach($wordsArray as $word){
        echo $word . " ";
    }
    ?>">
    <div class="card-body border-top">
        <p class="card-title fs-6">
        <?php
        foreach($wordsArray as $word){
            echo $word . " ";
        }
        ?>
        </p>
        <span class="badge bg-primary text-dark fs-6">
            <?php echo $templateParams["productPrice"]; ?> €
        </span>
        <a href="./product.php?id=<?php echo $templateParams["idPRODUCT"]; ?>" class="stretched-link"></a>
    </div>
</div>