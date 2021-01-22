<div class="row my-5">
    <div class="col-md-4 mx-auto">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <?php if(isset($templateParams["login_error"])): ?>
            <p class="fw-bold bg-danger text-white"><?php echo $templateParams["login_error"]; ?></p>
            <?php endif; ?>
            <div class="mb-3">
                <label for="email" class="form-label">Indirizzo email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Accedi</button>
        </form>
    </div>
</div>