<div class="row m-auto">
    <div class="col-12 m-auto">
        <h1 class="m-auto fw-bold text-center">NUOVI ARRIVI</h1>
    </div>
</div>

<div class="row mb-5 mx-auto">
    <div class="col-12 p-0">
        <div id="productCarousel" class="carousel carousel-dark slide shadow p-5 m-3 bg-white rounded-pill-home" data-bs-ride="carousel">
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
                            <img src="<?php echo UPLOAD_DIR.$carouselProduct["idPRODUCT"]; ?>/1.jpg"
                            class="card-img-top img-fluid mx-auto" alt="
                            <?php echo $carouselProduct["name"]; ?>">
                            <div class="card-body">
                                <h2 class="card-title text-center">
                                    <?php echo $carouselProduct["name"]; ?>
                                </h2>
                                <h3 class="card-text text-center">
                                    <?php echo $carouselProduct["price"]; ?> €
                                </h3>
                                <a href="./product.php?id=<?php echo $carouselProduct["idPRODUCT"]; ?>"
                                    class="stretched-link"></a>
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

<div class="row m-auto">
    <div class="col-12 m-auto">
        <h1 class="m-auto fw-bold text-center">IN EVIDENZA</h1>
    </div>
</div>

<div class="row my-2 mx-auto">
    <div class="col-md-12">
        <div class="card text-white shadow mb-5 w-100 px-auto rounded-pill-home" id="home-card">
            <img src="./images/trave2.jpg" class="card-img rounded-pill-home" alt="">
            <div class="card-img-overlay">
                <h1 class="card-title fw-bold text-light">TRAVI ARRAMPICATA</h1>
                <h2 class="card-text fw-bold text-light">
                    Allenarsi bene, allenarsi sempre
                </h2>
                <button type="button" class="btn btn-light fw-bold rounded-pill p-3">SCOPRI DI PIÙ</button>
            </div>
        </div>
    </div>
</div>

<div class="row my-2 mx-auto">
    <div class="col-md-4">
        <div class="card text-white shadow mb-5 w-100 px-auto rounded-pill-home" id="home-card">
            <img src="./images/corde.jpg" class="card-img h-100 rounded-pill-home" alt="">
            <div class="card-img-overlay">
                <h1 class="card-title fw-bold text-dark">CORDE</h1>
                <h2 class="card-text fw-bold text-dark">
                    Volare sicuri
                </h2>
                <button type="button" class="btn btn-light fw-bold rounded-pill p-3">SCOPRI DI PIÙ</button>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white shadow mb-5 w-100 px-auto rounded-pill-home" id="home-card">
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

    <div class="col-md-4">
        <div class="card text-white shadow mb-5 w-100 px-auto rounded-pill-home" id="home-card">
            <img src="./images/ghiaccio.jpg" class="card-img h-100 rounded-pill-home" alt="">
            <div class="card-img-overlay">
                <h1 class="card-title fw-bold text-light">ATTREZZATURA DA GHIACCIO</h1>
                <h2 class="card-text fw-bold text-light">
                    Picche, ramponi e molto altro
                </h2>
                <button type="button" class="btn btn-light fw-bold rounded-pill p-3">SCOPRI DI PIÙ</button>
            </div>
        </div>
    </div>
</div>

<div class="row m-auto">
    <div class="col-12 m-auto">
        <h1 class="m-auto fw-bold text-center">BEST SELLER</h1>
    </div>
</div>

<div class="row m-auto">
    <?php foreach($templateParams["bestSeller"] as $product): ?>
    <div class="col-md-2 mx-auto">
        <?php 
        $templateParams["idPRODUCT"]=$product["idPRODUCT"];
        $templateParams["productName"]=$product["name"];
        $templateParams["productPrice"]=$product["price"];
        $templateParams["quantity"]=$product["quantity"];
        require "product-card-template.php"
        ?>
    </div>
    <?php endforeach; ?>
</div>
