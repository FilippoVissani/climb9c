<div class="container-fluid">
    <?php if(count($templateParams["subcategory"])==0): ?>
        <div class="alert alert-danger text-center" role="alert">
            La categoria non esiste. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
        </div>
    <?php else:
        $subcategory = $templateParams["subcategory"];
    ?>
        <h2>Categoria: Scarpe > <?php echo $subcategory["name"]; ?> </h2>
        <?php if(count($templateParams["productsInSubcategory"])==0): ?>
            <div class="alert alert-secondary text-center" role="alert">
                Nessun prodotto in questa categoria. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
            </div>
        <?php else: ?>
            <div class="row row-cols-2 row-cols-md-4 g-4">

                <?php foreach($templateParams["productsInSubcategory"] as $product): ?>
                    <div class="col">
                        <div class="card h-100">
                        <img src="<?php echo UPLOAD_DIR.$product["idPRODUCT"]; ?>/1.jpg" class="card-img-top" alt="<?php echo $product["name"]; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product["name"]; ?></h5>
                            <p class="card-text text-center"><?php echo $product["price"]; ?> €</p>
                            <a href="./product.php?id=<?php echo $product["idPRODUCT"]; ?>" class="stretched-link"></a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Disponibili <?php echo $product["quantity"]; ?> pezzi</small>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>