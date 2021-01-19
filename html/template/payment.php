<div class="container-fluid h-100 text-dark">
  <div class="row">
    <header>
      <h1 class="font-weight-bold">PAGAMENTO</h1>
    </header>
  </div>
  <hr/>
  <main>
    <form action="#" method="post">
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
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <p>Articoli</p>
              <p><?php echo numberProduct($dbh->getCartByCustomerID($_SESSION['idCUSTOMER'])); ?></p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <p>Spese di spedizione</p>
              <p>0.00$</p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <p>Codice Sconto</p>
                <small>CODICESCONTO10</small>
              </div>
              <p>0.00$</p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <p class="font-weight-bold">TOTALE</p>
              <p><?php echo cartPrice($dbh->getCartByCustomerID($_SESSION['idCUSTOMER']))."€"; ?>
            </li>
          </ul>
          <form class="card p-2" action="#" method="post">
            <div class="input-group">
              <label for="codiceSconto" class="invisible">Codice sconto</label>
              <input id="codiceSconto" type="text" class="form-control" placeholder="Codice Sconto"/>
              <div class="input-group-append">
                <label for="inserisci" class="invisible">Inserisci</label>
                <input type="submit" class="btn btn-secondary" value="Inserisci"/>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row m-3">
        <div class="col">
          <form action="#" method="post">
            <fieldset>
              <legend>INDIRIZZO DI SPEDIZIONE</legend>
              <div class="form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault1" checked/>
                <label class="form-check-label" for="flexRadioDefault1">Indirizzo di default</label>
              </div>
            </fieldset>
            <div class="m-3">
              <label for="aggiungiIndirizzo" class="invisible">Aggiungi indirizzo</label>
              <input id="aggiungiIndirizzo" type="submit" class="btn btn-secondary btn-sm" value="Aggiungi indirizzo"/>
            </div>
          </form>
        </div>
      </div>
    </form>
  </main>
</div>
