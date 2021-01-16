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
            <div class="row mb-2">
                <div class="col-10"> 
                    <h5 class="card-title"><?php echo $product["name"]; ?></h5>
                </div>
                <div class="col-2">
                    <span class="badge bg-success "><?php echo $product["price"]; ?> €</span>
                </div>
            </div>
            <a href="#" class="btn btn-primary d-grid">Aggiungi al carrello</a>
            <p class="card-text"><?php echo $product["description"]; ?></p>
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