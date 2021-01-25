<div class="row mt-5 mx-2">
    <div class="col">

        <div class="card">

            <div class="card-header fw-bold fs-4 text-center">
                MODIFICA PRODOTTO

                <!--Scelta prodotto-->
                <form class="" action="edit-product.php" method="post">

                    <div class="col-md">
                        <div class="input-group">
                            <span class="input-group-text" id="productSelect-text">Prodotto: </span>
                            <select class="form-select" id="productSelect" name="productSelect-text" aria-label="productSelect-text">
                                <?php foreach ($templateParams["products"] as $product) : ?>
                                    <option value="<?php echo $product["idPRODUCT"]; ?>"><?php echo $product["name"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="scegli-prodotto" class="invisible">Scegli</label>
                        <input id="scegli-prodotto" type="submit" class="btn btn-primary btn-lg btn-block w-100" value="Scegli" />
                    </div>

                </form>
                <!--END Scelta prodotto-->

            </div>
            <!--Card Body-->
            <div class="card-body">
                <?php if (isset($templateParams["selectedProduct"])) : ?>
                    <?php $selectedProduct=$templateParams["selectedProduct"]; ?>


                    <form class="" action="edit-product.php" method="post" enctype="multipart/form-data">

                        <!--Nome-->
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="product-name">NOME</span>
                            <input type="text" name="product-name" class="form-control" value="<?php echo $selectedProduct["name"]; ?>" placeholder="Nome Prodotto" aria-label="product-name" aria-describedby="product-name" required />
                        </div>


                        <!--Brand-->
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="product-brand">BRAND</span>
                            <input type="text" name="product-brand" class="form-control" value="<?php echo $selectedProduct["brand"]; ?>" placeholder="Brand Prodotto" aria-label="product-brand" aria-describedby="product-brand" />
                        </div>


                        <!--Prezzo-->
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="product-price">PREZZO</span>
                            <input type="number" min="0" step="0.01" name="product-price" class="form-control" value="<?php echo $selectedProduct["price"]; ?>" placeholder="Prezzo Prodotto" aria-label="product-price" aria-describedby="product-price" required />
                        </div>


                        <!--Descrizione-->
                        <div class="input-group mb-4">
                            <span class="input-group-text">DESCRIZIONE</span>
                            <textarea class="form-control" id="idDescrizione" rows="3" name="description" aria-label="description"><?php echo $selectedProduct["description"]; ?></textarea>
                            <!--<input type="text" class="form-control" name="description" aria-label="description" value=""/>-->
                        </div>


                        <!--Sottocategoria-->
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="product-subcategory">SOTTOCATEGORIA</span>
                            <select class="form-select" id="idSubcategory" name="product-subcategory" aria-label="product-subcategory">
                                <?php $categories = $dbh->getCategories(); ?>
                                <?php foreach ($categories as $category) : ?>
                                    <optgroup label="<?php echo $category["name"]; ?>">
                                        <?php $subcategories = $dbh->getSubcategories($category["id"]); ?>
                                        <?php foreach ($subcategories as $subcategory) : ?>
                                            <option value="<?php echo $subcategory["id"]; ?>"><?php echo $subcategory["name"]; ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!--END Sottocategoria-->

                        <!--Quantità-->
                        <div class="input-group  mb-4">
                            <span class="input-group-text" id="product-quantity">QUANTITA'</span>
                            <input type="number" min="0" name="product-quantity" class="form-control" value="<?php echo $selectedProduct["quantity"]; ?>"placeholder="Quantità in Magazzino" aria-label="product-quantity" aria-describedby="product-quantity" required />
                        </div>


                        <!--Immagine-->
                        <div class="input-group  mb-4">
                            <span class="input-group-text" id="product-img">IMMAGINE PRODOTTO</span>
                            <input type="file" name="product-img" class="form-control" aria-label="product-img" aria-describedby="product-img" required />
                        </div>


                        <!--Specifiche Tecniche-->
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
                        <!--END Specifiche Tecniche-->

                        <!--Bottone Modifica Prodotto-->
                        <div class=" text-center mt-4">
                            <input type="hidden" id="specifications_number" name="specifications_number" value="1" />
                            <label for="inserisci-prodotto" class="invisible">Modifica prodotto</label>
                            <input id="inserisci-prodotto" type="submit" class="btn btn-primary btn-lg btn-block w-100" value="Modifica prodotto" />
                        </div>
                        <!--END Bottone Modifica Prodotto-->

                    </form>

                <?php endif; ?>
            </div>
            <!--END Card Body-->
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        <?php if (isset($templateParams["selectedProduct"])) : ?>
            $("#productSelect").val(<?php echo $selectedProduct["idPRODUCT"]; ?>);
            $("#idSubcategory").val(<?php echo $selectedProduct["idSUBCATEGORY"]; ?>);

            <?php echo $selectedProduct["idSUBCATEGORY"]; ?>

            //$("input[name='product-name']").val("<?php echo $templateParams["selectedProduct"]["name"]; ?>");
            //brand
            //$("input[name='product-brand']").val("<?php echo $templateParams["selectedProduct"]["brand"]; ?>");
            //prezzo
           //$("input[name='product-price']").val(<?php echo $templateParams["selectedProduct"]["price"]; ?>);
            //descrizione
            //$("input[name='description']").val("");
        <?php endif; ?>
    });
</script>