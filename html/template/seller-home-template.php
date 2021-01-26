<?php
if(isset($_POST["logout"]) && $_POST["logout"]==TRUE){
    unset($_SESSION["idSELLER"]);
    header("location: login-admin.php");
}
?>
<div class="row mt-5 mx-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header fw-bold fs-4">
                Gestione catalogo
            </div>
            <div class="card-body">
                <p class="card-text fs-4">Accedi all'area dedicata.</p>
                <a href="catalog-management.php" class="btn btn-primary">Accedi</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header fw-bold fs-4">
                Gestione ordini
            </div>
            <div class="card-body">
                <p class="card-text fs-4">Accedi all'area dedicata.</p>
                <a href="orders-management.php" class="btn btn-primary">Accedi</a>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5 mx-2">
    <div class="col-md-12">
        <form action="./seller-home.php" method="post">
            <input class="collapse" type="text" name="logout" value="TRUE" readonly="readonly" id="logout">
            <label for="logout" hidden>logout </label>
            <button type="submit" class="btn btn-primary fw-bold">Logout</button>
        </form>
    </div>
</div>
