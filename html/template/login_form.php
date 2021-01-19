<div class="row justify-content-center align-items-center">
  <header>
    <h1>LOGIN</h1>
  </header>
</div>
<hr/>
<main>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col-md-5">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php if(isset($templateParams["login_error"])): ?>
        <p class="fw-bold  bg-danger text-white"><?php echo $templateParams["login_error"]; ?></p>
        <?php endif; ?>
        <div class="form-group">
          <label for="username" class="invisible">Username</label>
          <input id="username" name ="username" type="email" class="form-control" autocomplete="on" placeholder="Username" required />
        </div>
        <div class="form-group">
          <label for="password" class="invisible">Password</label>
          <input id="password" name="password" type="password" class="form-control" autocomplete="on" placeholder="Password" required/>
        </div>
        <div class="row justify-content-center align-items-center h-100">
          <label for="accedi" class="invisible">Accedi</label>
          <input id="accedi" type="submit" class="btn btn-primary" value="Accedi"/>
        </div>
      </form>
      <div class="text-center p-4">
        <p>Non sei ancora registrato? <a href="sign.php" class="pe-auto">REGISTRATI</a></p>

      </div>
    </div>
  </div>
</main>