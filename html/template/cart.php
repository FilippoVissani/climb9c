<div class="container-fluid h-100 text-dark">
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
  <?php else: $product = $dbh->getCartByCustomerID($_SESSION['idCUSTOMER']); ?>
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
          <div class="row justify-content-center pt-3">
            <a class="btn btn-primary btn-block" href="payment.php" role="button">Procedi all'ordine</a>
          </div>
        </section>
        <hr/>
        <form class="" action="#" method="get">
          <fieldset>
            <legend>RIEPILOGO ORDINE</legend>
            <?php foreach($product as $singleProduct): ?>
            <div class="row m-2">
              <div class="col-md text-center"><?php echo $singleProduct["productName"]; ?></div>
              <div class="col-md text-center"><?php echo $singleProduct["productPrice"]."€"; ?></div>
              <div class="col-md justify-content-center input-group quantity-wrapper  pb-2">
                <label for="text-quantity" class="invisible">Quantità: </label>
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
              <div class="col-md justify-content-center">
                <label for="elimina" class="invisible">Elimina</label>
                <input id="elimina" type="button" class="btn btn-secondary" value="Elimina"/>
              </div>
            </div>
            <hr/>
            <?php endforeach; ?>
          </fieldset>
        </form>
      </div>
    </div>
  </main>

<?php endif; ?>
</div>
