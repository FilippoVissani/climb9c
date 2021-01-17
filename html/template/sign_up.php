<div class="container-fluid text-dark">
  <div class="row">
    <div class="col-12">
      <header>
        <h1 class="font-weight-bold">REGISTRATI</h1>
      </header>
    </div>
  </div>
  <hr/>
  <main>
    <form class="row g-3" action="#" method="post">
      <div class="col-md-6  pt-2">
        <label for="username" class="form-label">Email*</label>
        <input id="username" type="email" class="form-control" value="" required/>
      </div>
      <div class="col-md-6  pt-2">
        <label for="password" class="form-label">Password*</label>
        <input id="password" type="password" class="form-control" value="" required/>
      </div>
      <div class="col-md-6  pt-2">
        <label for="password-confirm" class="form-label">Conferma password*</label>
        <input id="password-confirm" type="password" class="form-control" value="" required/>
      </div>
      <div class="col-md-6 pt-2">
        <label for="name" class="form-label">Nome*</label>
        <input id="name" type="text" class="form-control" value="" required/>
      </div>
      <div class="col-md-6  pt-2">
        <label for="surname" class="form-label">Cognome*</label>
        <input id="surname" type="text" class="form-control" value="" required/>
      </div>
      <div class="col-md-6  pt-2">
        <label for="telephone" class="form-label">Numero di telefono*</label>
        <input id="telephone" type="tel" class="form-control" value="" required/>
      </div>
      <fieldset class="col-md-6">
        <legend class="col-form-label  pt-2">Genere</legend>
        <div class="col-md-6">
          <div class="form-check">
            <input id="gender" type="radio" class="form-check-input"/>
            <label for="gender" class="form-check-label">Uomo</label>
          </div>
          <div class="form-check">
            <input id="gender" type="radio" class="form-check-input"/>
            <label for="gender" class="form-check-label">Donna</label>
          </div>
        </div>
      </fieldset>
      <div class="col-md-6 pt-2">
        <label for="birthdate" class="form-label">Data di nascita</label>
        <input id="birthdate" class="form-control" type="date"/>
      </div>
        <div class="col-md-6 pt-2">
          <label for="address" class="form-label">Indirizzo*</label>
          <input id="address" type="text" class="form-control" value="" required/>
        </div>
        <div class="col-md-6  pt-2">
          <label for="city" class="form-label">Città*</label>
          <input id="city" type="text" class="form-control" value="" required/>
        </div>
        <div class="col-md-6  pt-2">
          <label for="province" class="form-label">Provincia*</label>
          <input id="province" type="text" class="form-control" value="" required/>
        </div>
        <div class="col-md-6  pt-2">
          <label for="zip" class="form-label">CAP*</label>
          <input id="zip" type="text" class="form-control" value="" required/>
        </div>
      <div class="col-md-12 justify-content-center h-100 p-3">
        <label for="registrati" class="invisible">Registrati</label>
        <input id="registrati" type="submit" class="btn btn-primary btn-block btn-lg" value="Registrati"/>
      </div>
    </form>
  </main>
</div>
