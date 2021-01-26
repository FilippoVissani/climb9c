<div class="container-fluid">
  <div class="row">
    <header>
      <h1 class="font-weight-bold">PAGAMENTO EFFETUATO</h1>
    </header>
  </div>
  <hr />
  <div class="alert alert-secondary text-center" role="alert">
    Pagamento avvenuto con successo! <a href="index.php" class="alert-link">Clicca qui per tornare alla home</a>
  </div>
</div>
<script>
  $(document).ready(function () {
    $.ajax({
      url: "./send-notification.php",
      method: "POST",
      data: {
        title: "Nuovo ordine disponibile!",
        message: 'L`ordine ID=<?php echo $templateParams["IdOrder"] ?> è stato effettuato con successo ed è pronto per essere spedito. <form action="./order-detail.php" method="post"><input class="collapse" type="text" name="id" value="<?php echo $templateParams["IdOrder"] ?>" readonly="readonly"><label for="id" hidden>id</label><button type="submit" class="btn btn-primary fw-bold">DETTAGLI</button></form>',
      }
    });
    $.ajax({
      url: "./send-notification.php",
      method: "POST",
      data: {
        title: "Ordine effettuato con successo!",
        message: 'Il tuo ordine con ID=<?php echo $templateParams["IdOrder"] ?> è stato effettuato con successo. <form action="./order-detail.php" method="post"><input class="collapse" type="text" name="id" value="<?php echo $templateParams["IdOrder"] ?>" readonly="readonly"><label for="id" hidden>id</label><button type="submit" class="btn btn-primary fw-bold">DETTAGLI</button></form>',
        recipientId: <?php echo $_SESSION["idCUSTOMER"]; ?>
      }
    });
    <?php 
    foreach($templateParams["products"] as $product):
      if($product["stock_quantity"]==0):
    ?>
    $.ajax({
      url: "./send-notification.php",
      method: "POST",
      data: {
        title: "Prodotto non più disponibile in magazzino!",
        message: "Il prodotto <?php echo $product["name"] ?>, non è più disponibile in magazzino.",
      }
    });
    <?php
      endif;
    endforeach;
    ?>
  });
</script>