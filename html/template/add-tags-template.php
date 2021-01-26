<div class="row mt-5 mx-2">
  <div class="col">
    <?php if(isset($templateParams["product-insert"])): ?>
    <p class="fw-bold  bg-success text-white fs-4 text-center"><?php echo $templateParams["product-insert"]; ?></p>
    <?php endif; ?>
    <?php if(isset($templateParams["subcategory"])): ?>
    <div class="card">
      <form class="" action="add_product.php" method="post" enctype="multipart/form-data">
        <div class="card-header fw-bold fs-4 text-center">AGGIUNGI TAGS AL PRODOTTO</div>
        <div class="card-body">
          <?php $tags = $dbh->getTagsNameBySubcategory($templateParams["subcategory"]); ?>
          <?php foreach ($tags as $singleTag): ?>
          <div class="input-group mb-4">
            <label class="input-group-text" for="tag-<?php echo $singleTag["name"] ?>"><?php echo $singleTag["name"] ?></label>
            <input type="text" name="tag-<?php echo $singleTag["id"] ?>" class="form-control" placeholder="<?php echo $singleTag["name"] ?>" id="tag-<?php echo $singleTag["name"] ?>"/>
          </div>
          <?php endforeach; ?>
          <div class=" text-center">
            <input type="hidden" id="product-id" name="product-id" value="<?php echo($templateParams["productId"]) ?>"/>
            <input type="hidden" id="product-subcategory" name="product-subcategory" value="<?php echo($templateParams["subcategory"]) ?>"/>
            <label for="inserisci-prodotto" class="invisible">Inserisci prodotto</label>
            <input id="inserisci-prodotto" type="submit" class="btn btn-primary btn-block w-100" value="Inserisci tag"/>
          </div>
        </div>
      </form>
    </div>
    <?php else: ?>
    <p class="fw-bold  bg-danger text-white fs-4 text-center">Impossibile aggiungere tag. Nessun prodotto inserito.</p>
    <?php endif; ?>
  </div>
</div>
