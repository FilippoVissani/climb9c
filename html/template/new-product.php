<div class="row mt-5 mx-2">
    <div class="col">
        <div class="card">
            <div class="card-header fw-bold fs-4 text-center">
                Aggiungi nuovo prodotto
            </div>
            <div class="card-body">
              <form class="" action="index.html" method="post">
                <div class="input-group mb-4">
                  <span class="input-group-text" id="product-name">NOME</span>
                  <input type="text" name="product-name" class="form-control" placeholder="Nome Prodotto" aria-label="product-name" aria-describedby="product-name">
                </div>

                <div class="input-group mb-4">
                  <span class="input-group-text" id="product-brand">BRAND</span>
                  <input type="text" name="product-brand" class="form-control" placeholder="Brand Prodotto" aria-label="product-brand" aria-describedby="product-brand">
                </div>

                <div class="input-group mb-4">
                  <span class="input-group-text" id="product-price">PREZZO</span>
                  <input type="number" min="0" step=".01" name="product-price" class="form-control" placeholder="Prezzo Prodotto" aria-label="product-price" aria-describedby="product-price">
                </div>

                <div class="input-group mb-4">
                  <span class="input-group-text">DESCRIZIONE</span>
                  <textarea class="form-control" name="description" aria-label="description"></textarea>
                </div>

                <div class="input-group mb-4">
                  <span class="input-group-text" id="product-subcategory">SOTTOCATEGORIA</span>
                  <select class="" name="product-subcategory" aria-label="product-subcategory">
                    <option></option>
                    <option value="SC1">Sottocategoria-1</option>
                    <option value="SC2">Sottocategoria-2</option>
                  </select>
                </div>

                <div class="input-group  mb-4">
                <span class="input-group-text" id="product-quantity">QUANTITA'</span>
                    <input type="number" min="1" class="form-control" placeholder="Quantità in Magazzino" aria-label="product-quantity" aria-describedby="product-quantity">
                </div>

                <div class="text-center">
                  <label for="aggiungi" class="invisible">Accedi</label>
                  <input id="aggiungi" type="submit" class="btn btn-primary" value="Aggiungi"/>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
