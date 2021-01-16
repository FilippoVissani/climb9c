<div class="container-lg">
<?php if(count($templateParams["product"])==0): ?>
    <div class="alert alert-danger text-center" role="alert">
        L'articolo non esiste. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
    </div>
<?php else:
    $product = $templateParams["product"];
?>
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
    
<?php endif; ?>
</div>