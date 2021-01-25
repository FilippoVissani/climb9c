<div class="container-xl">
    <?php if (count($templateParams["product"]) == 0) : ?>
        <div class="alert alert-danger text-center" role="alert">
            L'articolo non esiste. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
        </div>
    <?php else : $product = $templateParams["product"]; ?>

        <div class="row">
            <div class="row mb-0">
                <div>
                    <a href="subcategory.php?id=<?php echo $templateParams["posizione"]["idSubcategory"]; ?>" class="text-reset text-decoration-none fs-3 mb-0">
                        Categoria: <?php echo $templateParams["posizione"]["category"]; ?> > <?php echo $templateParams["posizione"]["subcategory"]; ?>
                    </a>
                </div>
                <hr />
            </div>

            <!--Immagine-->
            <div class="col-xl-6">
                <img class="w-100 shadow px-auto rounded-pill-home" src="<?php echo UPLOAD_DIR . $product["idPRODUCT"]; ?>/1.jpg" alt="<?php echo $product["name"]; ?>">
            </div>
            <!--END Immagine-->

            <!--Colonna a destra dell'immagine-->
            <div class="col-xl-6">
                <!--riga nome e prezzo-->
                <div class="row mb-2  text-center">
                    <p class="fs-2"><?php echo $product["name"]; ?></p>
                    <p class="fs-3 fw-bold">Prezzo: <?php echo $product["price"]; ?> €</p>
                </div>
                <!--END riga nome e prezzo-->


                <div class="row p-2">
                    <div class="col-sm-6 mb-2">
                        <!--riga quantità-->
                        <label for="text-quantity" class="fs-5" hidden>Quantità: </label>
                        <div class="input-group quantity-wrapper">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="button-quantity-minus" aria-label="Meno">
                                    <span class="fas fa-minus"></span>
                                </button>
                            </div>
                            <input type="number" name="Quantità" id="text-quantity" class="form-control input-number input-sm quantity-style text-center remove-number-arrows" value="1" min="1" placeholder="Quantità">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-quantity-plus" aria-label="Più">
                                    <span class="fas fa-plus"></span>
                                </button>
                            </div>
                        </div>
                        <!--END riga quantità-->
                    </div>
                    <div class="col-sm-6">
                        <!--Aggiungi al carrello-->
                        <div class="d-grid">
                            <button type="button" id="addToCart" class="btn btn-primary fw-bold btn-block" <?php echo ($product["quantity"] > 0) ? "" : "disabled"; ?>><?php echo ($product["quantity"] > 0) ? "<span class='fas fa-shopping-cart pr-2'></span> Aggiungi al carrello" : "Articolo esaurito"; ?></button>
                        </div>
                        <!--END Aggiungi al carrello-->
                    </div>
                </div>

                <!--Caratteristiche tecniche-->
                <div class="row">
                    <hr />
                    <p class="fs-3">Caratteristiche tecniche:</p>
                    <?php $tecnical_specs = json_decode($product["tecnical_specifications"]); ?>
                    <?php if (JSON_ERROR_NONE == json_last_error()) : ?>
                        <!--<div style="height: 320px;overflow: scroll;">-->
                        <table class="table table-striped table-responsive">
                            <tbody>
                                <?php foreach ($tecnical_specs as $key => $val) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $key ?></th>
                                        <td><?php echo $val ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!--</div>-->

                </div>
                <!--END Caratteristiche tecniche-->


            </div>
            <!--END Colonna a destra dell'immagine-->




            <!-- descrizione -->
            <div class="col">
                <hr />
                <p class="fs-3">Descrizione:</p>
                <p class="fs-5" style="text-align: justify"><?php echo $product["description"]; ?></p>

            <?php endif; ?>
            </div>
            <!-- END descrizione -->


        </div>

        <!-- Modal prodotto aggiunto-->
        <div class="modal fade" id="addedToCart" tabindex="-1" aria-labelledby="addedToCart" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" id="modal-header">
                        <h5 class="modal-title" id="modal-title"><?php echo $product["name"]; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        Prodotto aggiunto al carrello.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="continueShopping">Continua gli acquisti</button>
                        <a class="btn btn-primary" href="cart.php" role="button" id="goToCart">Vai al carrello</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal prodotto aggiunto-->

        <!-- Modal caricamento-->
        <div class="modal" id="adding" tabindex="-1" aria-labelledby="adding" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div id="loading" class="text-center m-5">
                        <div class="spinner-border" style="width: 5rem; height: 5rem;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal caricamento-->

    <?php endif; ?>
</div>


<script>
    $(document).ready(function() {
        $('#addToCart').click(function() {

            $('#adding').modal("show");

            $.ajax({
                url: "./AJAXaddToCart.php",
                method: "post",
                data: {
                    product: <?php echo $product['idPRODUCT']; ?>,
                    quantity: $("#text-quantity").val()
                },
                success: function(data) {

                    if (data == 0) {
                        //se non sei loggato
                        $('#addedToCart').on('show.bs.modal', function() {
                            $('#modal-title').text("ATTENZIONE");
                            $("#modal-header").addClass("bg-warning");
                            $('#modal-body').text("devi fare il login per poter aggiungere prodotti al carrello");
                            $("#goToCart").html("Login");
                            $("#goToCart").prop('href', 'login.php');
                            $("#continueShopping").html("Annulla");
                        });
                    } else {
                        //se sei loggato
                        $('#addedToCart').on('show.bs.modal', function() {
                            $('#modal-body').text(data);
                        });
                    };
                    $('#adding').modal("hide");
                    $('#addedToCart').modal("show");
                },
                error: function() {
                    alert("Errore nel database, contattare l'amministratore del sito");
                }
            });
        });
    });
</script>