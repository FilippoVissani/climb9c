<div class="row mt-3 px-3">
  <?php
  if(!isset($_SESSION["idCUSTOMER"]) || !isset($templateParams["notifications"])){ header("location: login.php"); }
  foreach($templateParams["notifications"] as $notification):
  ?>
  <div class="col-md-4 m-auto">
    <div class="card border-dark mb-3 mx-auto" id="card-<?php echo $notification["id_customer_notification"]; ?>">
      <div class="card-header">
        <button type="button" class="btn-close" aria-label="Close" id="close-<?php echo $notification["id_customer_notification"]; ?>"></button>
      </div>
      <div class="card-body text-dark">
        <h1 class="card-title fw-bold fs-5">
          <?php echo $notification["title"]; ?>
        </h1>
        <p class="card-text">
          <?php echo $notification["message"]; ?>
        </p>
        <p class="card-text text-end">
          <?php echo $notification["time"]; ?>
        </p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<script>
  $(document).ready(function () {
    <?php foreach($templateParams["notifications"] as $notification): ?>
    $("button#close-<?php echo $notification["id_customer_notification"]; ?>").click(function () {
      $("div#card-<?php echo $notification["id_customer_notification"]; ?>").hide();
      $.ajax({
                url: "./AJAX-set-notification-visualized.php",
                method: "POST",
                data: {
                    idCustomer: <?php echo $notification["id_customer"]; ?>,
                    idNotification: <?php echo $notification["id_customer_notification"]; ?>
            }
        });
    })
    <?php endforeach; ?>
  });
</script>