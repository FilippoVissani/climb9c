<?php if(!isset($_SESSION["idCUSTOMER"]) || !isset($templateParams["customerOrders"])){ header("location: login.php"); } ?>
<div class="row mx-auto mt-5 mb-2">
    <div class="col-12 m-auto">
        <h1 class="m-auto fw-bold text-center">RIEPILOGO ORDINI</h1>
    </div>
</div>

<div class="row m-auto scroll">
    <div class="col-md-12 m-auto">
        <table class="table table-striped">
            <thead>
              <tr>
                <th id="ID" scope="col">ID</th>
                <th id="data-ordine" scope="col">Data Ordine</th>
                <th id="data-spedizione" scope="col">Data Spedizione</th>
                <th id="citta" scope="col">Città</th>
                <th id="via" scope="col">Via</th>
                <th id="provincia" scope="col">Provincia</th>
                <th id="codice-postale" scope="col">Codice Postale</th>
                <th id="coupon" scope="col">Coupon</th>
                <th id="dettagli" scope="col">Visualizza Dettagli</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($templateParams["customerOrders"] as $order): ?>
              <tr>
                <th id="ID-n-<?php echo $order["idORDER"]; ?>" headers="ID" scope="row"><?php echo $order["idORDER"] ?></th>
                <td headers="data-ordine"><?php echo $order["date"] ?></td>
                <td headers="data-spedizione"><?php echo $order["shipping_date"] ?></td>
                <td headers="citta"><?php echo $order["city"] ?></td>
                <td headers="via"><?php echo $order["street"] ?></td>
                <td headers="provincia"><?php echo $order["province"] ?></td>
                <td headers="codice-postale"><?php echo $order["zip_code"] ?></td>
                <td headers="coupon"><?php echo $order["COUPONcode"] ?></td>
                <td headers="dettagli">
                  <form action="./order-detail.php" method="post">
                    <input class="collapse" type="text" name="id" value="<?php echo $order["idORDER"] ?>" readonly="readonly" id="order-<?php echo $order["idORDER"] ?>">
                    <label for="order-<?php echo $order["idORDER"] ?>" hidden>order-<?php echo $order["idORDER"] ?> </label>
                    <button type="submit" class="btn btn-primary fw-bold">DETTAGLI</button>
                  </form>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
    </div>
</div>
