<div class="container-fluid">
  <div class="row">
    <header>
      <h1 class="font-weight-bold">CARRELLO</h1>
    </header>
  </div>
  <hr/>
  <?php if(!isset($_SESSION["idCUSTOMER"])): ?>
  <div class="alert alert-danger text-center" role="alert">
    <a href="login.php" class="alert-link">ACCEDI PER VISUALIZZARE IL CARRELLO</a>
  </div>
<?php else: $product = $dbh->getCartByCustomerID($_SESSION['idCUSTOMER']);?>
  <main>
    <div class="row">
      <div class="col-12">
        <section>
          <div class="row">
            <div class="col text-center">Totale</div>
            <div class="col text-center">
              <p><?php echo numberProduct($product)." "."Articoli"; ?></p>
            </div>
            <div class="col text-center">
              <p><?php echo cartPrice($product)."€"; ?></p>
            </div>
          </div>
          <?php if(numberProduct($product)!=0): ?>
          <div class="row justify-content-center pt-3">
            <div class="col-md-3 col-10 text-center">
              <a class="btn btn-primary btn-block w-100" href="payment.php" role="button">Procedi all'ordine</a>
            </div>
          </div>
          <?php endif; ?>
        </section>
        <hr/>
        <?php if(numberProduct($product)!=0): ?>
        <fieldset>
          <legend>RIEPILOGO ORDINE</legend>
          <div class="row justify-content-center p-0"><div class="col-md-3 col-10 text-center" id="update"></div></div>
          <?php foreach($product as $singleProduct): ?>
          <form class="" action="#" method="get">
            <div class="row m-2">
              <div class="col-md text-center"><?php echo $singleProduct["productName"]; ?></div>
              <div class="col-md text-center"><?php echo $singleProduct["productPrice"]."€"; ?></div>
              <div class="col-md justify-content-center input-group quantity-wrapper  pb-2">
                <label for="quantity-<?php echo $singleProduct["idPRODUCT"]; ?>" class="invisible">Quantità: </label>
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary" type="button" id="button-quantity-minus-<?php echo $singleProduct["idPRODUCT"]; ?>" aria-label="Meno">
                    <span class="fas fa-minus"></span>
                  </button>
                </div>
                <input type="number" name="Quantità" id="quantity-<?php echo $singleProduct["idPRODUCT"]; ?>" class="form-control input-number input-sm quantity-style text-center remove-number-arrows" value="<?php echo $singleProduct["productQuantity"]; ?>" min="1" placeholder="Quantità">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="button-quantity-plus-<?php echo $singleProduct["idPRODUCT"]; ?>" aria-label="Più">
                    <span class="fas fa-plus"></span>
                  </button>
                </div>
              </div>
              <div class="col-md justify-content-center">
                <label for="<?php echo $singleProduct["idPRODUCT"]; ?>" class="invisible">Elimina</label>
                <input id="<?php echo $singleProduct["idPRODUCT"]; ?>" name="delete" type="submit" class="btn btn-secondary" value="Elimina"/>
              </div>
              <input type="hidden" name="idproduct" value="<?php echo $singleProduct["idPRODUCT"]; ?>" />
            </div>

            <script>
              $(document).ready(function () {
                let value = $("#quantity-<?php echo $singleProduct["idPRODUCT"]; ?>");
                $("#button-quantity-minus-<?php echo $singleProduct["idPRODUCT"]; ?>").click(function () {
                    if(parseInt(value.val())>1){
                        value.val(parseInt(value.val())-1);
                    } else{
                        value.val(1);
                    }

                    if($("div#update a").length!=1){
                      let markup = '<a class="btn btn-secondary btn-block  w-100 mb-2" href="cart.php" role="button">AGGIORNA CARRELLO</a>';
                      $("div#update").append(markup);
                    }

                    $.ajax({
                        url: "./AJAXUpdateCartQuantity.php",
                        method: "post",
                        data: {
                            product: <?php echo $singleProduct['idPRODUCT']; ?>,
                            quantity: $("#quantity-<?php echo $singleProduct["idPRODUCT"]; ?>").val()
                        },
                    });
                });
                $("#button-quantity-plus-<?php echo $singleProduct["idPRODUCT"]; ?>").click(function () {

                    if(parseInt(value.val())<parseInt(<?php echo $singleProduct["stockQuantity"]; ?>)){
                        value.val(parseInt(value.val())+1);
                    }

                    if($("div#update a").length!=1){
                      console.log($("div#update a"));
                      let markup = '<a class="btn btn-secondary btn-block  w-100 mb-2" href="cart.php" role="button">AGGIORNA CARRELLO</a>';
                      $("div#update").append(markup);
                    }

                    $.ajax({
                        url: "./AJAXUpdateCartQuantity.php",
                        method: "post",
                        data: {
                            product: <?php echo $singleProduct['idPRODUCT']; ?>,
                            quantity: $("#quantity-<?php echo $singleProduct["idPRODUCT"]; ?>").val()
                        },
                    });
                });

              });
            </script>

          </form>
          <hr/>
          <?php endforeach; ?>
        </fieldset>
        <?php endif; ?>

      </div>
    </div>
  </main>
  <?php endif; ?>
</div>
