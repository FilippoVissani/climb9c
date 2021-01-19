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
          <p><?php echo $_SESSION["name"]." ".$_SESSION["surname"]; ?></p>
          <p><?php echo $_SESSION["email"]; ?></p>
          <p><?php echo $_SESSION["telephone"]; ?></p>
          <?php endif; ?>
          <div class="row justify-content-center">
            <form class="" action="account.php" method="get">
              <input type="hidden" name="logout"/>
              <label for="logout" class="invisible">Logout</label>
              <input id="logout" type="submit" class="btn btn-primary" value="Logout"/>
            </form>
          </div>
        </section>
      </div>
      <hr/>
      <h2>RUBRICA</h2>
      <div class="col-12">
        <section>
          <h3 class="font-weight-bold">Informazioni di spedizione</h3>
          <p>Indirizzi</p>
          <div class="row justify-content-center">
            <form class="" action="account.php" method="get">
              <input type="hidden" name="add_address"/>
              <label for="add_address" class="invisible">Aggiungi indirizzo</label>
              <input id="add_address" type="submit" class="btn btn-primary" value="Aggiungi indirizzo"/>
            </form>
          </div>
        </section>
      </div>

    </div>
  </div>
</main>
