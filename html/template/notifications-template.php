<div class="row mt-5">
  <div class="col">
    <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
      <div class="card-header">
        <button type="button" class="btn-close" aria-label="Close"></button>
      </div>
      <div class="card-body text-dark">
        <h1 class="card-title fw-bold fs-5"><?php echo $templateParams["notificationTitle"]; ?></h1>
        <p class="card-text"><?php echo $templateParams["notificationMessage"]; ?></p>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $("button.btn-close").click(function(){
      $("div.card").hide();
    })
  });
</script>