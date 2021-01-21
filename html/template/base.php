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
        require './template/menu.php';
        ?>
        <div class="container-fluid p-0">
            <div class="row mx-0">
                <div class="col-12 p-0">
                    <header class="navbar navbar-dark bg-dark fw-bold shadow">
                        <a class="navbar-brand" href="./index.php">
                            <img src="./svg_icons/jam_mountain.svg" alt="" width="30" height="30" class="d-inline-block mx-2">
                                Climb9c
                        </a>
                        <div class="d-flex">
                            <a href="<?php echo isset($_SESSION["idCUSTOMER"]) ? "account.php" : "login.php" ?>">
                                <img src="./svg_icons/user.svg" alt="" width="30" height="30" class="d-inline-block mx-3">
                            </a>
                            <a href="<?php echo isset($_SESSION["idCUSTOMER"]) ? "cart.php" : "login.php" ?>">
                                <img src="./svg_icons/shopping-cart.svg" alt="" width="30" height="30" class="d-inline-block mx-3">
                            </a>
                            <img src="./svg_icons/dash.svg" alt="" width="30" height="30" class="d-inline-block mx-3" id="menu-toggler">
                        </div>
                    </header>  
                </div>
            </div>
            
                <?php
                    if($templateParams["search_bar"] == TRUE){
                        require './template/search-bar.php';
                    }
                ?>
                <?php
                    if(isset($templateParams["name"])){
                        require($templateParams["name"]);
                    }
                ?>

            <div class="row m-0">
                <div class="col-12 p-0">
                    <footer class="nav bg-dark py-3">
                        <div class="col-3 border-end border-1 border-light mb-2">
                            <div class="row m-0 d-flex justify-content-center">
                                <img src="./svg_icons/credit-card.svg" alt="" width="30" height="30" class="mb-2 p-0" />
                            </div>
                            <div class="row m-0">
                                <p class="text-light text-center m-0 p-0">Metodo di pagamento sicuro</p>
                            </div>
                        </div>
                        <div class="col-3 border-end border-1 border-light mb-2">
                            <div class="row m-0 d-flex justify-content-center">
                                <img src="./svg_icons/delivery-truck.svg" alt="" width="30" height="30" class="mb-2 p-0" />
                            </div>
                            <div class="row m-0">
                                <p class="text-light text-center m-0 p-0">Spedizioni in tutto il mondo</p>
                            </div>
                        </div>
                        <div class="col-3 border-end border-1 border-light mb-2">
                            <div class="row m-0 d-flex justify-content-center">
                                <img src="./svg_icons/chronometer.svg" alt="" width="30" height="30" class="mb-2 p-0" />
                            </div>
                            <div class="row m-0">
                                <p class="text-light text-center m-0 p-0">Spedizioni in 24 ore + 100 giorni per il reso</p>
                            </div>
                        </div>
                        <div class="col-3 mb-2">
                            <div class="row m-0 d-flex justify-content-center">
                                <img src="./svg_icons/sale-tag.svg" alt="" width="30" height="30" class="mb-2 p-0" />
                            </div>
                            <div class="row m-0">
                                <p class="text-light text-center m-0 p-0">Coupon per gli acquisti</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <!-- jQuery, Popper.js, Bootstrap JS -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        <?php require './js/toggle-menu.php'; ?>
        <script src="./js/quantity-product.js"></script>
    </body>
</html>
