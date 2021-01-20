<div class="row">
  <header>
    <h1 class="font-weight-bold">PAGAMENTO</h1>
  </header>
</div>
<hr/>
<main>
  <!--<form action="#" method="post">-->
    <div class="row m-3">
      <div class="col orderd-first">
        <fieldset>
          <legend>METODO DI PAGAMENTO</legend>
          <label for="name" class="invisible">Nome sulla carta</label>
          <input type="text" id="name" class="form-control" placeholder="Nome sulla Carta" required/>
          <label for="ccnum" class="invisible">Numero della Carta</label>
          <input type="text" id="ccnum" class="form-control" placeholder="Numero della carta" required/>
          <label for="scadenza" class="invisible">Data di scadenza</label>
          <input type="date" id="scadenza" class="form-control" placeholder="Data di scadenza" required/>
          <label for="cvv" class="invisible">CVV</label>
          <input type="text" id="cvv" class="form-control" placeholder="CVV" required/>
        </fieldset>
      </div>
      <div class="col-md-4 order-md-2">
        <h2>RIEPILOGO CARRELLO</h2>
        <ul class="list-group">
          <?php if(isset($templateParams["coupon_error"])): ?>
            <p class="fw-bold  bg-danger text-white"><?php echo $templateParams["coupon_error"]; ?></p>
          <?php endif; ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <p>Articoli</p>
            <p><?php echo numberProduct($dbh->getCartByCustomerID($_SESSION['idCUSTOMER'])); ?></p>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <p>Totale Articoli</p>
            <p><?php $total = cartPrice($dbh->getCartByCustomerID($_SESSION['idCUSTOMER'])); echo $total."€";?></p>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <p>Codice Sconto</p>
              <small><?php
                if(isset($_SESSION["couponCode"])){
                    echo $_SESSION["couponCode"];
                }
                else {
                  echo "NESSUNCODICESCONTOINSERITO";
                }
                ?></small>
            </div>
            <p><?php
              if(isset($_SESSION["couponDiscount"])){
                  echo $_SESSION["couponDiscount"]."%";
              }
              ?></p>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <p class="font-weight-bold">TOTALE</p>
            <p><?php
              if(isset($_SESSION["couponDiscount"])){
                echo calculateFinalPrice($total, $_SESSION["couponDiscount"])."€";
              }
              else{
                echo $total."€";
              }
            ?></p>
          </li>
        </ul>
        <form class="card p-2" action="payment.php" method="get">
          <div class="input-group">
            <label for="coupon" class="invisible">Codice sconto</label>
            <input id="coupon" name="couponCode" type="text" class="form-control" placeholder="Codice Sconto"/>
            <div class="input-group-append">
              <label for="inserisci" class="invisible">Inserisci</label>
              <input id="inserisci" type="submit" class="btn btn-secondary" value="Inserisci"/>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row m-3">
      <div class="col">
        <fieldset>
          <legend>INDIRIZZO DI SPEDIZIONE</legend>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="flexRadioDefault1" checked/>
            <label class="form-check-label" for="flexRadioDefault1">Indirizzo di default</label>
          </div>
        </fieldset>
        <?php if(!isset($_GET["add_address"])): ?>
        <div class="m-3">
          <form class="" action="" method="get">
            <input type="hidden" name="add_address"/>
            <label for="add_address" class="invisible">Aggiungi indirizzo</label>
            <input id="add_address" type="submit" class="btn btn-primary" value="Aggiungi indirizzo"/>
          </form>
        </div>
        <?php endif; ?>
        <?php if(isset($_GET["add_address"])): ?>
        <form class="row g-3" action="#" method="post">
          <div class="col-md-6 pt-2">
            <label for="address" class="form-label">Indirizzo*</label>
            <input id="address" name="address" type="text" class="form-control" value="" required/>
          </div>
          <div class="col-md-6  pt-2">
            <label for="city" class="form-label">Città*</label>
            <input id="city" name="city" type="text" class="form-control" value="" required/>
          </div>
          <div class="col-md-6  pt-2">
            <label for="province" class="form-label">Provincia*</label>
            <input id="province" name="province" type="text" class="form-control" value="" required/>
          </div>
          <div class="col-md-6  pt-2">
            <label for="zip" class="form-label">CAP*</label>
            <input id="zip" name="zip_code" type="text" class="form-control" value="" required/>
          </div>
          <div class="col-md-6 pt-2">
            <label for="name" class="form-label">Nome sul campanello*</label>
            <input id="name" name="name" type="text" class="form-control" value="" required/>
          </div>
          <div class="col-md-6  pt-2">
            <label for="surname" class="form-label">Cognome sul campanello*</label>
            <input id="surname" name="surname" type="text" class="form-control" value="" required/>
          </div>
          <div class="col-md-12 justify-content-center h-100 p-3">
            <label for="aggiungi" class="invisible">Aggiungi</label>
            <input id="aggiungi" type="submit" class="btn btn-primary btn-block btn-lg" value="Aggiungi"/>
          </div>
        </form>
        <?php endif; ?>
      </div>
    </div>
  <!--</form>-->
</main>
