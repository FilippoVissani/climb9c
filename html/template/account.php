<div class="container-fluid h-100 text-dark">
  <div class="row justify-content-center">
    <header>
      <h1 class="font-weight-bold">IL MIO ACCOUNT</h1>
    </header>
  </div>
  <hr/>
  <main>
    <div class="row">
      <div class="col-12">
        <h2>INFORMAZIONI ACCOUNT</h2>
        <div class="col-12">
          <section>
            <h3 class="font-weight-bold">Informazioni di contatto</h3>
            <?php if(isset($_SESSION['idCUSTOMER'])): ?>
            <p><?php echo $templateParams["customer_logged_info"]["name"]." ".$templateParams["customer_logged_info"]["surname"]; ?></p>
            <p><?php echo $templateParams["customer_logged_info"]["email"]; ?></p>
            <p><?php echo $templateParams["customer_logged_info"]["telephone"]; ?></p>
            <?php endif; ?>
          </section>
        </div>
        <hr/>
        <h2>RUBRICA</h2>
        <div class="col-12">
          <section>
            <h3 class="font-weight-bold">Informazioni di spedizione</h3>
            <p>Indirizzi</p>
          </section>
        </div>
        <hr/>
        <div class="row justify-content-center">
          <label for="modifica" class="invisible">Modifica</label>
          <input id="modifica" type="submit" class="btn btn-primary" value="Modifica"/>
        </div>
      </div>
    </div>
  </main>
</div>
