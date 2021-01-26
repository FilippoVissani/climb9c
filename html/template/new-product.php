<div class="row mt-5 mx-2">
    <div class="col">
      <?php if(isset($templateParams["product-insert"])): ?>
      <p class="fw-bold  bg-success text-white fs-4 text-center"><?php echo $templateParams["product-insert"]; ?></p>
      <?php endif; ?>
        <div class="card">
            <div class="card-header fw-bold fs-4 text-center">
                AGGIUNGI NUOVO PRODOTTO
            </div>
            <?php if(isset($templateParams["img-error"])): ?>
            <p class="fw-bold  bg-danger text-white fs-4 text-center"><?php echo $templateParams["img-error"]; ?></p>
            <?php endif; ?>
            <div class="card-body">
              <form class="" action="add_product.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-4">
                  <label class="input-group-text" for="product-name">NOME</label>
                  <input type="text" name="product-name" class="form-control" placeholder="Nome Prodotto" id="product-name" required/>
                </div>

                <div class="input-group mb-4">
                  <label class="input-group-text" for="product-brand">BRAND</label>
                  <input type="text" name="product-brand" class="form-control" placeholder="Brand Prodotto" id="product-brand"/>
                </div>

                <div class="input-group mb-4">
                  <label class="input-group-text" for="product-price">PREZZO</label>
                  <input type="number" min="0" step="0.01" name="product-price" class="form-control" placeholder="Prezzo Prodotto" id="product-price" required/>
                </div>

                <div class="input-group mb-4">
                  <label class="input-group-text" for="description">DESCRIZIONE</label>
                  <input type="text" class="form-control" name="description" id="description"/>
                </div>

                <div class="input-group mb-4">
                  <label class="input-group-text" for="product-subcategory">SOTTOCATEGORIA</label>
                  <select class="" name="product-subcategory" id="product-subcategory">
                    <?php $categories = $dbh->getCategories(); ?>
                    <option></option>
                    <?php foreach ($categories as $category): ?>
                    <optgroup label="<?php echo $category["name"]; ?>">
                      <?php $subcategories = $dbh->getSubcategories($category["id"]); ?>
                      <?php foreach ($subcategories as $subcategory): ?>
                      <option value="<?php echo $subcategory["id"]; ?>" label="<?php echo $subcategory["name"]; ?>"><?php echo $subcategory["name"]; ?></option>
                      <?php endforeach; ?>
                    </optgroup>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="input-group  mb-4">
                  <label class="input-group-text" for="product-quantity">QUANTITA'</label>
                  <input type="number" min="1" name="product-quantity" class="form-control" placeholder="Quantità in Magazzino" id="product-quantity" required/>
                </div>

                <div class="input-group  mb-4">
                  <label class="input-group-text" for="product-img">IMMAGINE PRODOTTO</label>
                  <input type="file" name="product-img" class="form-control" id="product-img" required/>
                </div>

                <table id="specifications-table" class="table">
                  <caption class="p-0">SPECIFICHE TECNICHE</caption>
                  <thead>
                    <tr>
                      <th id="specifica" scope="col">Specifica</th>
                      <th id="descrizione" scope="col">Descrizione</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td headers="specifica" ><input class="col-12" type="text" name="specifica1" /> </td>
                      <td headers="descrizione" ><input class="col-12" type="text" name="descrizione1"/></td>
                    </tr>
                  </tbody>
                </table>
                <div class="input-group-append text-center">
                  <button class="btn btn-outline-secondary" type="button" id="add_row" aria-label="Più">
                    <span class="fas fa-plus ">Aggiungi specifica</span>
                  </button>
                </div>
                <div class=" text-center mt-4">
                  <input type="hidden" id="specifications_number" name="specifications_number" value="1"/>
                  <label for="inserisci-prodotto" class="invisible">Inserisci prodotto</label>
                  <input id="inserisci-prodotto" type="submit" class="btn btn-primary btn-lg btn-block w-100" value="Inserisci prodotto"/>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function () {

    $("#add_row").click(function () {
      let row = $("#specifications_number");
      row.val(parseInt(row.val())+1);
      let nameS = "specifica"+row.val();
      let nameD = "descrizione"+row.val();
      let markup = '<tr><td headers="specifica" ><input class="col-12" type="text" name='+nameS+' /></td><td headers="descrizione" ><input class="col-12" type="text" name='+nameD+' /></td></tr>';
      $("table tbody").append(markup);

    })

  });
</script>
