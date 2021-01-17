<div class="container-fluid h-100 text-dark">
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
              <div class="col text-right">Totale</div>
              <div class="col text-center">Numero Articoli</div>
              <div class="col text-left">Costo</div>
            </div>
              <label for="procedi" class="invisible">Procedi all'ordine</label>
              <input id="procedi" type="submit" class="btn btn-primary btn-block" value="Procedi all'ordine"/>
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
