<div class="row mt-5 mx-2">
  <div class="col">
    <?php if(isset($templateParams["product-edit"])): ?>
    <p class="fw-bold  bg-success text-white fs-4 text-center"><?php echo $templateParams["product-edit"]; ?></p>
    <?php endif; ?>
    <?php if(isset($templateParams["subcategory"])): ?>
    <div class="card">
      <form class="" action="edit-product.php" method="post" enctype="multipart/form-data">
        <div class="card-header fw-bold fs-4 text-center">MODIFICA TAGS DEL PRODOTTO</div>
        <div class="card-body">
          <?php foreach ($templateParams["tagsProduct"] as $singleTag): ?>
          <div class="input-group mb-4">
            <label class="input-group-text" for="tag-<?php echo $singleTag["tagKey"] ?>"><?php echo $singleTag["tagKey"] ?></label>
            <input type="text" value="<?php echo $singleTag["tagValue"]; ?>" name="tag-<?php echo $singleTag["id"] ?>" class="form-control" placeholder="<?php echo $singleTag["tagKey"] ?>" id="tag-<?php echo $singleTag["tagKey"] ?>"/>
          </div>
          <?php endforeach; ?>
          <div class=" text-center">
            <input type="hidden" id="product-id" name="product-id" value="<?php echo($templateParams["productId"]) ?>"/>
            <input type="hidden" id="product-subcategory" name="product-subcategory" value="<?php echo($templateParams["subcategory"]) ?>"/>
            <label for="inserisci-prodotto" class="invisible">Modifica Tags</label>
            <input id="inserisci-prodotto" type="submit" class="btn btn-primary btn-block w-100" value="Modifica tags"/>
          </div>
        </div>
      </form>
    </div>
    <?php else: ?>
    <p class="fw-bold  bg-danger text-white fs-4 text-center">Errore.</p>
    <?php endif; ?>
  </div>
</div>
