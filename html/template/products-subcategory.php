<div class="container-fluid">
    <h2>Categoria: Scarpe > <?php echo $templateParams["subcategory"]["name"]; ?> </h2>
    <div class="row row-cols-2 row-cols-md-4 g-4">

        <?php foreach($templateParams["productsInSubcategory"] as $product): ?>
            <div class="col">
                <div class="card h-100">
                <img src="<?php echo UPLOAD_DIR.$product["idPRODUCT"]; ?>/1.jpg" class="card-img-top" alt="<?php echo $product["name"]; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product["name"]; ?></h5>
                    <p class="card-text text-center"><?php echo $product["price"]; ?> €</p>
                    <a href="./product.php?id=2" class="stretched-link"></a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Disponibili <?php echo $product["quantity"]; ?> pezzi</small>
                </div>
                </div>
            </div>
        <?php endforeach; ?>





    <!--


    <div class="col">
        <div class="card h-100">
        <img src="./upload/products_images_by_id/1/2.jpg" class="card-img-top" alt="<?php echo $templateParams["productsInSubcategory"][1]["name"]; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $templateParams["productsInSubcategory"][1]["name"]; ?></h5>
            <p class="card-text text-center"><?php echo $templateParams["productsInSubcategory"][1]["price"]; ?> €</p>
            <a href="./product.php?id=2" class="stretched-link"></a>
        </div>
        <div class="card-footer">
            <small class="text-muted">Disponibili <?php echo $templateParams["productsInSubcategory"][1]["quantity"]; ?> pezzi</small>
        </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100">
        <img src="./upload/products_images_by_id/2/1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Disponibili 3 pezzi</small>
        </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100">
        <img src="./upload/products_images_by_id/2/1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Disponibili 3 pezzi</small>
        </div>
        </div>
    </div>
    
    <div class="col">
        <div class="card h-100">
        <img src="./upload/products_images_by_id/2/1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Disponibili 3 pezzi</small>
        </div>
        </div>
    </div>
        -->

    </div>

</div>