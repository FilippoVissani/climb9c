<div class="row m-0">
    <div class="col-12 p-0">
        <div id="productCarousel" class="carousel carousel-light slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach ($templateParams["carouselProducts"] as $carouselProduct): ?>
                <li data-bs-target="#productCarousel" data-bs-slide-to="0" class=""></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($templateParams["carouselProducts"] as $carouselProduct): ?>
                    <div class="carousel-item" data-bs-interval="10000">
                        <img src="#" class="d-block w-100" alt="#">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>                
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#productCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#productCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</div>
<h1>Only 4 test:</h1>
<a href="subcategory.php?id=1">Mostra i prodotti della sottocategoria con id 1</a>
<br/>
<a href="product.php?id=2">pagina del prodotto con id 2</a>
<br/>
<a href="product.php?id=99">pagina del prodotto che non esiste</a>
<br/>
<a href="subcategory.php?id=5">pagina della categoria che non esiste</a>
<br/>
<a href="subcategory.php?id=2">pagina della categoria senza articoli</a>
