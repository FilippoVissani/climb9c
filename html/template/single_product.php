<div class="container-lg">
<?php if(count($templateParams["product"])==0): ?>
    <div class="alert alert-danger text-center" role="alert">
        L'articolo non esiste. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
    </div>
<?php else:
    $product = $templateParams["product"];
?>

<div class="col-12">
    <div class="card">
        <img class="card-img-top" src="./upload/products_images_by_id/<?php echo $product["idPRODUCT"]; ?>/1.jpg" alt="<?php echo $product["name"]; ?>">
        <div class="card-body">

            <!--riga nome e prezzo-->
            <div class="row mb-2">
                <div class="col-9"> 
                    <h2 class="card-title"><?php echo $product["name"]; ?></h2>
                </div>
                <div class="col-3 single-product-price">
                    <!--<span class="badge bg-success"><?php echo $product["price"]; ?> €</span>-->
                    <p><?php echo $product["price"]; ?> €</p>
                </div>
            </div>
            <!--END riga nome e prezzo-->

            <!--riga quantità-->
            <div class="row mb-2">
                <div class="col-auto align-self-center">
                    <span class="align-middle">Quantità:</span>
                </div>
                <div class="col-auto">
                    <div class="input-group quantity-wrapper mb-2">
                                    
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button" id="button-quantity-minus">-</button>
                        </div>

                        <input type="number" id="text-quantity" class="form-control input-number input-sm quantity-style text-center" value="1" min="1" disabled>

                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-quantity-plus">+</button>
                        </div>

                    </div>
                </div>
            </div>
            <!--END riga quantità-->

            <a href="#" class="btn btn-primary d-grid mb-2">Aggiungi al carrello</a>
            <div class="col">
                <hr/>
                <h3>Descrizione:</h3>
                <p class="card-text"><?php echo $product["description"]; ?></p>
                <hr/>
                <h3>Caratteristiche tecniche:</h3>
                <p class="card-text"><?php echo $product["tecnical_specifications"]; ?></p>
            </div>
        </div>
    </div>
</div>






        <!--
            <div class="row">
            <div class="col-12">
                <img src="./upload/products_images_by_id/<?php echo $product["idPRODUCT"]; ?>/1.jpg" class="card-img-top" alt="...">
                <div class="row">
                    <div class="col-9">
                        <h5><?php echo $product["name"]; ?></h5>
                    </div>
                    <div class="col-3">
                        <span class="badge bg-success "><?php echo $product["price"]; ?> €</span>
                    </div>
                </div>
                <div class="row">
                    <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                </div>
                    <p class="card-text"><?php echo $product["description"]; ?></p>
                </div>
            </div>
        </div>
        -->
    
<?php endif; ?>
</div>

