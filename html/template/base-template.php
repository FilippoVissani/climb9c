<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $templateParams["title"]; ?></title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    </head>
    <body class="bg-light m-0">
        <?php
        require './template/menu-template.php';
        ?>
        <div class="container-fluid p-0">
            <div class="row mx-0">
                <div class="col-12 p-0">
                    <header class="navbar navbar-dark bg-dark fw-bold shadow">
                        <a class="navbar-brand" href="./index.php">
                        <span class="fas fa-mountain fs-2 mx-2"></span>
                                Climb9c
                        </a>
                        <div class="d-flex text-light">
                            <?php if(isset($_SESSION["idSELLER"])): ?>
                            <a href="<?php echo "seller-home.php" ?>">
                            <span class="d-inline-block mx-2 fas fa-home text-light fs-2"></span>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo "account.php" ?>">
                            <span class="d-inline-block mx-2 far fa-user text-light fs-2"></span>
                            </a>
                            <?php endif; ?>
                            <a href="<?php echo "notifications.php" ?>">
                            <span class="d-inline-block mx-2 far fa-envelope text-light fs-2"></span>
                            </a>
                            <a href="<?php echo "cart.php" ?>">
                            <span class="d-inline-block mx-2 fas fa-shopping-cart text-light fs-2"></span>
                            </a>
                            <span class="d-inline-block mx-2 fas fa-bars fs-2" id="menu-toggler"></span>
                        </div>
                    </header>
                </div>
            </div>

                <?php
                    if($templateParams["search_bar"] == TRUE){
                        require './template/search-bar-template.php';
                    }
                ?>
                <?php
                    if(isset($templateParams["name"])){
                        require($templateParams["name"]);
                    }
                ?>

            <div class="row mx-auto mt-3">
                <div class="col-12 p-0">
                    <footer class="nav bg-dark">
                        <div class="row mx-auto my-3">
                            <div class="col-3 border-end border-light text-center">
                                <span class="far fa-credit-card text-light fs-2"></span>
                                <p class="text-light">Metodo di pagamento sicuro</p>
                            </div>
                            <div class="col-3 border-end border-light text-center">
                                <span class="fas fa-truck-moving text-light fs-2"></span>
                                <p class="text-light">Spedizioni in tutto il mondo</p>
                            </div>
                            <div class="col-3 border-end border-light text-center">
                                <span class="fas fa-clock text-light fs-2"></span>
                                <p class="text-light">Spedizioni in 24 ore + 100 giorni per il reso</p>
                            </div>
                            <div class="col-3 text-center">
                                <span class="fas fa-percentage text-light fs-2"></span>
                                <p class="text-light">Coupon per gli acquisti</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <!-- jQuery, Popper.js, Bootstrap JS -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        <script src="./js/quantity-product.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha512/0.8.0/sha512.js"></script>
        <script src="./js/forms.js"></script>
        <script>
            var isDesktop=false;

            function setDesktop(){
                isDesktop = ($(window).width() >= 1366) ? true : false;
            }

            function checkDesktop(){
                if(isDesktop){
                    $("div#search-bar").addClass("w-25");
                    $("div.carousel-item > div > img").addClass("w-25");
                    $("div.home-card").addClass("w-50");
                }else{
                    $("div#search-bar").removeClass("w-25");
                    $("div.carousel-item > div > img").removeClass("w-25");
                    $("div.home-card").removeClass("w-50");
                }
            }

            $(document).ready(function(){

                setDesktop();
                checkDesktop();

                $(window).resize(function(){
                    setDesktop();
                    checkDesktop();
                });

                $("span#menu-toggler").click(function(){
                    $( "div#category-menu" ).slideDown();
                    if (!isDesktop) {
                        $( "div.container-fluid" ).slideUp();
                    }
                });
                $("span#menu-back").click(function(){
                    $( "div#category-menu" ).slideUp();
                    if (!isDesktop) {
                        $( "div.container-fluid" ).slideDown();
                    }
                });
            });
        </script>
    </body>
</html>
