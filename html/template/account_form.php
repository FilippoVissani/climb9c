<div class="container-fluid">
  <div class="row my-2">
    <header class="p-0">
      <h1 class="font-weight-bold mb-0">IL MIO ACCOUNT</h1>
    </header>
  </div>
  <hr/>
  <?php if(!isUserLoggedIn()): ?>
    <div class="alert alert-danger text-center" role="alert">
      <a href="login.php" class="alert-link">ACCEDI PER VISUALIZZARE LE INFORMAZIONI DELL'ACCOUNT</a>
    </div>
  <?php else: $addresses = $dbh->getAddressByCustomerID($_SESSION['idCUSTOMER']); ?>
  <main>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-6">
        <h2>I MIEI ORDINI</h2>
      </div>
      <div class="p-0 col-md-3 col-sm-6 col-12 ms-4 text-center">
        <a class="btn btn-primary" href="orders-summary.php" role="button">Visualizza ordini effettuati</a>
      </div>
    </div>
    <hr/>
    <div class="row">
      <div class="col-md-4 col-sm-6 col-6">
        <h2>INFORMAZIONI ACCOUNT</h2>
      </div>
      <form class="col-md-3 col-6 p-0" action="account.php" method="get">
        <div class="d-grid d-md-block mx-auto">
          <input type="hidden" name="logout"/>
          <label for="logout" class="invisible">Logout</label>
          <input id="logout" type="submit" class="btn btn-primary btn-block" value="      Logout      "/>
        </div>
      </form>

      <div class="">
        <section>
          <h3 class="font-weight-bold">Informazioni di contatto</h3>
          <?php if(isUserLoggedIn()): ?>
          <p><?php echo $_SESSION["name"]." ".$_SESSION["surname"]; ?></p>
          <p><?php echo $_SESSION["email"]; ?></p>
          <p><?php echo $_SESSION["telephone"]; ?></p>
          <?php endif; ?>
        </section>
      </div>
    </div>
    <hr/>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-6 justify-content-center">
        <h2>RUBRICA</h2>
      </div>
      <?php if(!isset($_GET["add_address"])): ?>
      <form class="col-md-3 col-6 p-0 " action="#" method="get">
        <div class="d-grid gap-2 d-md-block mx-auto">
          <input type="hidden" name="add_address"/>
          <label for="add_address" class="invisible">Aggiungi indirizzo</label>
          <input id="add_address" type="submit" class="btn btn-primary btn-block m-0" value="Aggiungi indirizzo"/>
        </div>
      </form>
      <?php endif; ?>
      <div class="">
        <section>
          <h3 class="font-weight-bold">Informazioni di spedizione</h3>
          <ul class="list-group list-group-flush">
          <?php foreach($addresses as $address): ?>
            <li class="list-group-item bg-light">
              <p><?php echo $address["street"]; ?><br/>
              <?php echo $address["city"]; ?><br/>
              <?php echo $address["province"]; ?><br/>
              <?php echo $address["zip_code"]; ?></p>
            </li>
          <?php endforeach; ?>
          </ul>
        </section>
      </div>
      <?php if(isset($_GET["add_address"])): ?>
      <form class="row" action="account.php" method="post">
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
        <div class="col-12 text-center p-3">
          <label for="aggiungi" class="invisible">Aggiungi</label>
          <input id="aggiungi" type="submit" class="btn btn-primary btn-block p-2" value="Aggiungi"/>
        </div>
      </form>
      <?php endif; ?>
    </div>
  </main>
  <?php endif; ?>
</div>
