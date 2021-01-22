<div class="row mt-3 px-3">
  <?php foreach($templateParams["notifications"] as $notification): ?>
  <div class="col-md m-auto">
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
    })
    <?php endforeach; ?>
  });
</script>