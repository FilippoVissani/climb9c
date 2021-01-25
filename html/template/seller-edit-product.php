<div class="row mt-5 mx-2">
    <div class="col">

        <div class="card">

            <div class="card-header fw-bold fs-4 text-center">
                MODIFICA PRODOTTO
            </div>
            <!--Card Body-->
            <div class="card-body">

                <form class="" action="edit-product.php" method="post" enctype="multipart/form-data">
                    <!--Scelta prodotto-->




                    <!--END Scelta prodotto-->
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="product-subcategory">Prodotto: </span>
                        <select class="form-select" name="product-subcategory" aria-label="product-subcategory">
                            <?php foreach ($templateParams["products"] as $product) : ?>

                                        <option value="<?php echo $product["idPRODUCT"]; ?>"><?php echo $product["name"]; ?></option>
                                

                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="input-group mb-4">
                        <span class="input-group-text" id="product-name">NOME</span>
                        <input type="text" name="product-name" class="form-control" placeholder="Nome Prodotto" aria-label="product-name" aria-describedby="product-name" required />
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text" id="product-brand">BRAND</span>
                        <input type="text" name="product-brand" class="form-control" placeholder="Brand Prodotto" aria-label="product-brand" aria-describedby="product-brand" />
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text" id="product-price">PREZZO</span>
                        <input type="number" min="0" step="0.01" name="product-price" class="form-control" placeholder="Prezzo Prodotto" aria-label="product-price" aria-describedby="product-price" required />
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text">DESCRIZIONE</span>
                        <input type="text" class="form-control" name="description" aria-label="description" />
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text" id="product-subcategory">SOTTOCATEGORIA</span>
                        <select class="" name="product-subcategory" aria-label="product-subcategory">
                            <?php $categories = $dbh->getCategories(); ?>
                            <?php foreach ($categories as $category) : ?>
                                <option></option>
                                <optgroup label="<?php echo $category["name"]; ?>">
                                    <?php $subcategories = $dbh->getSubcategories($category["id"]); ?>
                                    <?php foreach ($subcategories as $subcategory) : ?>
                                        <option value="<?php echo $subcategory["id"]; ?>"><?php echo $subcategory["name"]; ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="input-group  mb-4">
                        <span class="input-group-text" id="product-quantity">QUANTITA'</span>
                        <input type="number" min="1" name="product-quantity" class="form-control" placeholder="Quantità in Magazzino" aria-label="product-quantity" aria-describedby="product-quantity" required />
                    </div>

                    <div class="input-group  mb-4">
                        <span class="input-group-text" id="product-img">IMMAGINE PRODOTTO</span>
                        <input type="file" name="product-img" class="form-control" aria-label="product-img" aria-describedby="product-img" required />
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
                                <td headers="specifica"><input class="col-12" type="text" name="specifica1" /> </td>
                                <td headers="descrizione"><input class="col-12" type="text" name="descrizione1" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="input-group-append text-center">
                        <button class="btn btn-outline-secondary" type="button" id="add_row" aria-label="Più">
                            <span class="fas fa-plus ">Aggiungi specifica</span>
                        </button>
                    </div>
                    <div class=" text-center mt-4">
                        <input type="hidden" id="specifications_number" name="specifications_number" value="1" />
                        <label for="inserisci-prodotto" class="invisible">Inserisci prodotto</label>
                        <input id="inserisci-prodotto" type="submit" class="btn btn-primary btn-lg btn-block w-100" value="Inserisci prodotto" />
                    </div>
                </form>
            </div>
            <!--END Card Body-->
        </div>
    </div>
</div>