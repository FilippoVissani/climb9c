<div class="row justify-content-center">
  <header>
    <h1 class="font-weight-bold">IL MIO ACCOUNT</h1>
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
    <div class="col-12">
      <h2>INFORMAZIONI ACCOUNT</h2>
      <div class="col-12">
        <section>
          <h3 class="font-weight-bold">Informazioni di contatto</h3>
          <?php if(isUserLoggedIn()): ?>
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
          <?php if(!isset($_GET["add_address"])): ?>
          <div class="row justify-content-center">
            <form class="" action="" method="get">
              <input type="hidden" name="add_address"/>
              <label for="add_address" class="invisible">Aggiungi indirizzo</label>
              <input id="add_address" type="submit" class="btn btn-primary" value="Aggiungi indirizzo"/>
            </form>
          </div>
          <?php endif; ?>
        </section>
      </div>
      <?php if(isset($_GET["add_address"])): ?>
      <form class="row g-3" action="account.php" method="post">
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
</main>
<?php endif; ?>
