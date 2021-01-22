<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <header>
        <h1 class="font-weight-bold">REGISTRATI</h1>
      </header>
    </div>
  </div>
  <hr/>
  <main>
    <form id="form" class="row g-3" action="sign.php" method="post">
      <?php if(isset($templateParams["sign_up_error"])): ?>
      <p class="fw-bold  bg-danger text-white"><?php echo $templateParams["sign_up_error"]; ?></p>
      <?php endif; ?>
      <div class="col-md-6  pt-2">
        <label for="username" class="form-label">Email*</label>
        <input id="username" name="username" type="email" class="form-control" value="" required/>
      </div>
      <div class="col-md-6  pt-2">
        <label for="password" class="form-label">Password*</label>
        <input id="password" name="password" type="password" class="form-control" value="" required/>
      </div>
      <div class="col-md-6  pt-2">
        <label for="password-confirm" class="form-label">Conferma password*</label>
        <input id="password-confirm" name="password-confirm" type="password" class="form-control" value="" required/>
      </div>
      <div class="col-md-6 pt-2">
        <label for="name" class="form-label">Nome*</label>
        <input id="name" name="name" type="text" class="form-control" value="" required/>
      </div>
      <div class="col-md-6  pt-2">
        <label for="surname" class="form-label">Cognome*</label>
        <input id="surname" name="surname" type="text" class="form-control" value="" required/>
      </div>
      <div class="col-md-6  pt-2">
        <label for="telephone" class="form-label">Numero di telefono*</label>
        <input id="telephone" name="telephone" type="tel" class="form-control" value="" required/>
      </div>
      <fieldset class="col-md-6">
        <legend class="col-form-label  pt-2">Genere</legend>
        <div class="col-md-6">
          <div class="form-check">
            <input type="radio" id="male" name="gender" value="1"/>
            <label for="male">Uomo</label><br>
            <input type="radio" id="female" name="gender" value="0"/>
            <label for="female">Donna</label><br>
          </div>
        </div>
      </fieldset>
      <div class="col-md-6 pt-2">
        <label for="birthdate" class="form-label">Data di nascita*</label>
        <input id="birthdate" name="birthdate" class="form-control" type="date" required/>
      </div>
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
      <div class="col-md-12 justify-content-center h-100 p-3">
        <label for="registrati" class="invisible">Registrati</label>
        <input id="registrati" type="button" class="btn btn-primary btn-block btn-lg" value="Registrati"/>
      </div>
    </form>
  </main>
</div>
