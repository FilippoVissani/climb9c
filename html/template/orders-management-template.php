<div class="row my-5 mx-auto">
    <div class="col mx-auto">
        <h1 class="m-auto fw-bold text-center">GESTIONE ORDINI</h1>
    </div>
</div>
<div class="row my-5 mx-auto">
    <div class="col mx-auto">
        <h1 class="m-auto text-center">NUOVI ORDINI</h1>
    </div>
</div>
<div class="row mx-auto">
    <div class="col-10 mx-auto table-responsive-md">
        <div class="overflow-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th id="ID-th-n" scope="col">ID</th>
                    <th id="data-ordine-th-n" scope="col">Data Ordine</th>
                    <th id="citta-th-n" scope="col">Città</th>
                    <th id="via-th-n" scope="col">Via</th>
                    <th id="provincia-th-n" scope="col">Provincia</th>
                    <th id="codice-postale-th-n" scope="col">Codice Postale</th>
                    <th id="coupon-th-n" scope="col">Coupon</th>
                    <th id="visualizza-dettagli-th-n" scope="col">Visualizza Dettagli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($templateParams["newOrders"] as $order): ?>
                    <tr>
                        <th id="ID-n-<?php echo $order["idORDER"]; ?>" headers="ID-th-n" scope="row"><?php echo $order["idORDER"]; ?></th>
                        <td headers="data-ordine-th-n"><?php echo $order["date"]; ?></td>
                        <td headers="citta-th-n"><?php echo $order["city"]; ?></td>
                        <td headers="via-th-n"><?php echo $order["street"]; ?></td>
                        <td headers="provincia-th-n"><?php echo $order["province"]; ?></td>
                        <td headers="codice-postale-th-n"><?php echo $order["zip_code"]; ?></td>
                        <td headers="coupon-th-n"><?php echo $order["COUPONcode"]; ?></td>
                        <td headers="visualizza-dettagli-th-n">
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
</div>
<div class="row my-5 mx-auto">
    <div class="col mx-auto">
        <h1 class="m-auto text-center">ORDINI SPEDITI</h1>
    </div>
</div>
<div class="row mx-auto">
    <div class="col-10 mx-auto table-responsive-md">
        <div class="overflow-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th id="ID-th" scope="col">ID</th>
                    <th id="data-ordine-th" scope="col">Data Ordine</th>
                    <th id="data-spedizione-th" scope="col">Data Spedizione</th>
                    <th id="citta-th" scope="col">Città</th>
                    <th id="via-th" scope="col">Via</th>
                    <th id="provincia-th" scope="col">Provincia</th>
                    <th id="codice-postale-th" scope="col">Codice Postale</th>
                    <th id="coupon-th" scope="col">Coupon</th>
                    <th id="visualizza-dettagli-th" scope="col">Visualizza Dettagli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($templateParams["shippedOrders"] as $order): ?>
                    <tr>
                        <th id="ID-<?php echo $order["idORDER"]; ?>" headers="ID-th" scope="row"><?php echo $order["idORDER"]; ?></th>
                        <td headers="data-ordine-th"><?php echo $order["date"]; ?></td>
                        <td headers="data-spedizione-th"><?php echo $order["shipping_date"]; ?></td>
                        <td headers="citta-th"><?php echo $order["city"]; ?></td>
                        <td headers="via-th"><?php echo $order["street"]; ?></td>
                        <td headers="provincia-th"><?php echo $order["province"]; ?></td>
                        <td headers="codice-postale-th"><?php echo $order["zip_code"]; ?></td>
                        <td headers="coupon-th"><?php echo $order["COUPONcode"]; ?></td>
                        <td headers="visualizza-dettagli-th">
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
</div>
<script>
    $(document).ready(function(){
        $("div.overflow-auto").css("height", $(window).height()/3);
    });
</script>