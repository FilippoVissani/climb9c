<div class="container-fluid h-100 text-dark">
<?php
    $product = $dbh->getCartByCustomerID($_SESSION['idCUSTOMER']);
?>
  <div class="row">
    <header>
      <h1 class="font-weight-bold">CARRELLO</h1>
    </header>
  </div>
  <hr/>
  <main>
    <div class="row">
      <div class="col-12">
        <form class="" action="#" method="get">
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
          <fieldset>
            <legend>Riepilogo ordine</legend>
            <div class="row">
              <div class="col-md text-left">Oggetto</div>
              <div class="col-md text-left">Costo</div>
              <div class="col-md text-left">
                <label for="quantità" class="invisible">Quantità</label>
                <input id="quantità" type="number" required/>
              </div>
              <div class="col-md text-left">
                <label for="elimina" class="invisible">Elimina</label>
                <input id="elimina" type="button" value="Elimina"/>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </main>
</div>
