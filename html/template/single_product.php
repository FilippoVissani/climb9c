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
        <img class="card-img-top" src="<?php echo UPLOAD_DIR.$product["idPRODUCT"]; ?>/1.jpg" alt="<?php echo $product["name"]; ?>">
        <div class="card-body">

            <!--riga nome e prezzo-->
            <div class="row mb-2">
                <div class="col-9"> 
                    <h2 class="card-title"><?php echo $product["name"]; ?></h2>
                </div>
                <div class="col-3 single-product-price">
                    <!--<span class="badge bg-success"><?php echo $product["price"]; ?> €</span>-->
                    <p><?php echo $product["price"]; ?> €</p>
                </div>
            </div>
            <!--END riga nome e prezzo-->

            <!--riga quantità-->
            <div class="row mb-2">
                <div class="col-auto align-self-center">
                    <label for="text-quantity" class="align-middle">Quantità: </label>
                </div>
                <div class="col-auto">
                    <div class="input-group quantity-wrapper mb-2">
                                    
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
                </div>
            </div>
            <!--END riga quantità-->

            <!--Aggiungi al carrello-->
            <button type="button" id="addToCart" class="btn btn-primary d-grid mb-2">Aggiungi al carrello</button>
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
            <!-- Modal caricamento-->
            <div class="modal fade" id="adding" tabindex="-1" aria-labelledby="Loading" aria-hidden="true">
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
            <!--END Aggiungi al carrello-->



            <!-- descrizione e caratteristiche tecniche-->
            <div class="col">
                <hr/>
                <h3>Descrizione:</h3>
                <p class="card-text"><?php echo $product["description"]; ?></p>
                <hr/>
                <h3>Caratteristiche tecniche:</h3>
                <p class="card-text">
                    <?php $tecnical_specs=json_decode($product["tecnical_specifications"]); ?>
                    <?php if(JSON_ERROR_NONE == json_last_error()): ?>
                        <table class="table table-striped">
                            <tbody>
                                <?php foreach ($tecnical_specs as $key => $val):?>
                                    <tr>
                                    <th scope="row"><?php echo $key?></th>
                                    <td><?php echo $val?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    <?php endif;?>
                </p>
            </div>
            <!-- END descrizione e caratteristiche tecniche-->

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

<script>  
 $(document).ready(function(){  
      $('#addToCart').click(function(){  

        $('#adding').modal("show"); 

            $.ajax({  
                url:"./AJAXaddToCart.php",  
                method:"post",  
                data:{product:<?php echo $product['idPRODUCT']; ?>, quantity:$("#text-quantity").val()},  
                success:function(data){  
                    
                    if(data==0){
                        //se non sei loggato
                        $('#addedToCart').on('show.bs.modal', function () {
                            $('#modal-title').text("ATTENZIONE");
                            $("#modal-header").addClass("bg-warning");
                            $('#modal-body').text("devi fare il login per poter aggiungere prodotti al carrello");
                            $("#goToCart").html("Login");
                            $("#goToCart").prop('href', 'login.php');
                            $("#continueShopping").html("Annulla");
                        });
                    } else{
                        //se sei loggato
                        $('#addedToCart').on('show.bs.modal', function () {
                            $('#modal-body').text(data);
                        });
                    };
                    $('#adding').modal("hide"); 
                    $('#addedToCart').modal("show");  
                },
                error: function()
                {
                    alert("Errore nel database, contattare l'amministratore del sito");
                }  
           });  
      });  
 });  
 </script>