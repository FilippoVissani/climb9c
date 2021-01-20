<div class="row m-2">
    <div class="col-12 p-0">
        <h1>NUOVI ARRIVI</h1>
    </div>
</div>

<div class="row m-0">
    <div class="col-12 p-0">
        <div id="productCarousel" class="carousel carousel-dark slide shadow p-5 m-5 bg-white rounded-pill-home" data-bs-ride="carousel">
            <ol class="carousel-indicators m-auto">
                <?php
                                $active=TRUE;
                                $i=0;
                                foreach ($templateParams["carouselProducts"] as $carouselProduct):
                                    if($active):
                                        $active=FALSE;
                                ?>
                <li data-bs-target="#productCarousel" data-bs-slide-to="<?php echo $i ?>" class="active"></li>
                <?php else: ?>
                <li data-bs-target="#productCarousel" data-bs-slide-to="<?php echo $i ?>"></li>
                <?php
                                    endif;
                                    $i++;
                                endforeach;
                                ?>
                </ol>
                <div class="carousel-inner m-auto p-auto w-75">
                    <?php
                                $active=TRUE;
                                foreach ($templateParams["carouselProducts"] as $carouselProduct):
                                    if($active):
                                        $active=FALSE;
                                ?>
                        <div class="carousel-item active" data-bs-interval="10000">
                        <?php else: ?>
                        <div class="carousel-item" data-bs-interval="10000">
                            <?php endif; ?>
                            <div class="card border-0">
                                <img src="<?php echo UPLOAD_DIR.$carouselProduct["idPRODUCT"]; ?>/1.jpg" class="card-img-top img-fluid mx-auto" alt="<?php echo $carouselProduct["name"]; ?>">
                                <div class="card-body">
                                    <h2 class="card-title text-center"><?php echo $carouselProduct["name"]; ?></h2>
                                    <h3 class="card-text text-center"><?php echo $carouselProduct["price"]; ?> €</h3>
                                    <a href="./product.php?id=<?php echo $carouselProduct["idPRODUCT"]; ?>" class="stretched-link"></a>
                                </div>
                        
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

<div class="row my-2 mx-5">
    <div class="col-12">
        <div class="card text-white shadow p-0 mb-5 rounded-pill-home" id="home-card">
            <img src="./images/scarpette.jpg" class="card-img h-100 rounded-pill-home" alt="">
            <div class="card-img-overlay">
                <h1 class="card-title fw-bold">SCARPETTE DA ARRAMPICATA</h1>
                <h2 class="card-text fw-bold">
                    Indoor, outdoor e boulder
                </h2>
                <button type="button" class="btn btn-light fw-bold rounded-pill p-3">SCOPRI DI PIÙ</button>
            </div>
        </div>
    </div>
</div>

<div class="row my-2 mx-5">
    <div class="col-12">
        <div class="card text-white shadow p-0 mb-5 rounded-pill-home" id="home-card">
            <img src="./images/corde.jpg" class="card-img h-100 rounded-pill-home" alt="">
            <div class="card-img-overlay">
                <h1 class="card-title fw-bold text-dark">CORDE</h1>
                <h2 class="card-text fw-bold text-dark">
                    Corde singole e mezze corde
                </h2>
                <button type="button" class="btn btn-light fw-bold rounded-pill p-3">SCOPRI DI PIÙ</button>
            </div>
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
<a href="admin.php">admin json</a>

