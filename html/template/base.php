<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $templateParams["title"]; ?></title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        
    </head>
    <body class="bg-light m-0">
        <div class="container-fluid p-0">
            <div class="row mb-2 mx-0">
                <div class="col-12 p-0">
                    <header>
                        <nav class="navbar navbar-dark bg-dark fw-bold">
                            <a class="navbar-brand" href="#">
                                <img src="./svg_icons/jam_mountain.svg" alt="" width="30" height="30" class="d-inline-block mx-2">
                                Climb9c
                            </a>
                            <div class="d-flex">
                                <img src="./svg_icons/user.svg" alt="" width="30" height="30" class="d-inline-block mx-3">
                                <img src="./svg_icons/shopping-cart.svg" alt="" width="30" height="30" class="d-inline-block mx-3">
                                <img src="./svg_icons/dash.svg" alt="" width="30" height="30" class="d-inline-block mx-3">
                            </div>
                        </nav>
                    </header>  
                </div>
            </div>

            <?php
            if($templateParams["search_bar"] == TRUE){
                require 'template/search-bar.php';
            }
            ?>

            <div class="row mx-0">
                <div class="col-12">
                    <footer>
                        <nav class="nav fixed-bottom bg-dark justify-content-center">
                            <a class="text-light" href="#">FOOTER</a>
                        </nav>
                    </footer>
                </div>
            </div>
        </div>
        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>
</html>