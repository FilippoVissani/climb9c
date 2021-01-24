<div class="row mt-3 px-3">
<?php 
  if((!isset($_SESSION["idCUSTOMER"]) && !isset($_SESSION["idSELLER"])) || !isset($templateParams["notifications"])){ 
    header("location: login.php");
  }
  if(count($templateParams["notifications"])==0):
?>
<div class="col-md-4 m-auto">
  <div class="alert alert-primary text-center" role="alert">
    Non ci sono notifiche disponibili
  </div>
</div>
<?php 
  endif;
  foreach($templateParams["notifications"] as $notification):
    if(isset($_SESSION["idCUSTOMER"])){
      $tmp["id_notification"]=$notification["id_customer_notification"];
    }else{
      $tmp["id_notification"]=$notification["id_seller_notification"];
    }
?>
  <div class="col-md-4 m-auto">
    <div class="card border-dark mb-3 mx-auto" id="card-<?php echo $tmp["id_notification"]; ?>">
      <div class="card-header">
        <button type="button" class="btn-close" aria-label="Close" id="close-<?php echo $tmp["id_notification"]; ?>"></button>
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
  $(document).ready(function() {
    <?php foreach($templateParams["notifications"] as $notification):
        if(isset($_SESSION["idCUSTOMER"])){
          $tmp["id_notification"]=$notification["id_customer_notification"];
        }else{
          $tmp["id_notification"]=$notification["id_seller_notification"];
        }  
    ?>
    $("button#close-<?php echo $tmp["id_notification"]; ?>").click(function () {
      $("div#card-<?php echo $tmp["id_notification"]; ?>").hide();
      $.ajax({
                url: "./AJAX-set-notification-visualized.php",
                method: "POST",
                data: {
                  idNotification: <?php echo $tmp["id_notification"]; ?>
            }
        });
    });
    <?php endforeach; ?>
  });
</script>