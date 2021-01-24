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
                    <th scope="col">ID</th>
                    <th scope="col">Data Ordine</th>
                    <th scope="col">Città</th>
                    <th scope="col">Via</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Codice Postale</th>
                    <th scope="col">Coupon</th>
                    <th scope="col">Visualizza Dettagli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($templateParams["newOrders"] as $order): ?>
                    <tr>
                        <th scope="row"><?php echo $order["idORDER"]; ?></th>
                        <td><?php echo $order["date"]; ?></td>
                        <td><?php echo $order["city"]; ?></td>
                        <td><?php echo $order["street"]; ?></td>
                        <td><?php echo $order["province"]; ?></td>
                        <td><?php echo $order["zip_code"]; ?></td>
                        <td><?php echo $order["COUPONcode"]; ?></td>
                        <td>
                            <form action="./order-detail.php" method="post">
                                <input class="collapse" type="text" name="id" value="<?php echo $order["idORDER"] ?>" readonly="readonly">
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
                    <th scope="col">ID</th>
                    <th scope="col">Data Ordine</th>
                    <th scope="col">Data Spedizione</th>
                    <th scope="col">Città</th>
                    <th scope="col">Via</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Codice Postale</th>
                    <th scope="col">Coupon</th>
                    <th scope="col">Visualizza Dettagli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($templateParams["shippedOrders"] as $order): ?>
                    <tr>
                        <th scope="row"><?php echo $order["idORDER"]; ?></th>
                        <td><?php echo $order["date"]; ?></td>
                        <td><?php echo $order["shipping_date"]; ?></td>
                        <td><?php echo $order["city"]; ?></td>
                        <td><?php echo $order["street"]; ?></td>
                        <td><?php echo $order["province"]; ?></td>
                        <td><?php echo $order["zip_code"]; ?></td>
                        <td><?php echo $order["COUPONcode"]; ?></td>
                        <td>
                            <form action="./order-detail.php" method="post">
                                <input class="collapse" type="text" name="id" value="<?php echo $order["idORDER"] ?>" readonly="readonly">
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