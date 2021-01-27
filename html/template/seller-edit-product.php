<div class="row mt-5 mx-2">
    <div class="col">

        <div class="card">

            <div class="card-header fw-bold fs-4 text-center">
                MODIFICA PRODOTTO

                <!--Scelta prodotto-->
                <form class="" action="edit-product.php" method="post">

                    <div class="col-md">
                        <div class="input-group">

                            <label for="productSelect" class="invisible" hidden>Prodotto</label>
                            <span class="input-group-text" id="productSelect-text">Prodotto: </span>
                            <select class="form-select" id="productSelect" name="productSelect-text" aria-label="productSelect-text">
                                <?php foreach ($templateParams["products"] as $product) : ?>
                                    <option value="<?php echo $product["idPRODUCT"]; ?>"><?php echo $product["name"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="scegli-prodotto" class="invisible">Seleziona prodotto</label>
                        <input id="scegli-prodotto" type="submit" class="btn btn-primary btn-lg btn-block w-100" value="Scegli" />
                    </div>

                </form>
                <!--END Scelta prodotto-->

                <!--Warning se c'è stato un problema con l'upload dell'immagine-->
                <?php if (isset($templateParams["img-error"])) : ?>
                    <p class="fw-bold  bg-danger text-white fs-4 text-center mb-2 mt-2"><?php echo $templateParams["img-error"]; ?></p>
                <?php endif; ?>

                <!--Messaggio se è stato modificato correttamente-->
                <?php if (isset($templateParams["product-edit"])) : ?>
                    <p class="fw-bold  bg-success text-white fs-4 text-center mb-2 mt-2"><?php echo $templateParams["product-edit"]; ?></p>
                <?php endif; ?>

            </div>
            <!--Card Body-->
            <div class="card-body">
                <?php if (isset($templateParams["selectedProduct"])) : ?>
                    <?php $selectedProduct = $templateParams["selectedProduct"]; ?>


                    <form class="" action="edit-product.php" method="post" enctype="multipart/form-data">

                        <!--Nome-->
                        <div class="input-group mb-4">
                            <label for="idnome" class="invisible" hidden>NOME</label>
                            <span class="input-group-text" id="product-name">NOME</span>
                            <input type="text" name="product-name" id="idnome" class="form-control" value="<?php echo $selectedProduct["name"]; ?>" placeholder="Nome Prodotto" aria-label="product-name" aria-describedby="product-name" required />
                        </div>


                        <!--Brand-->
                        <div class="input-group mb-4">
                            <label for="idbrand" class="invisible" hidden>BRAND</label>
                            <span class="input-group-text" id="product-brand">BRAND</span>
                            <input type="text" name="product-brand" id="idbrand" class="form-control" value="<?php echo $selectedProduct["brand"]; ?>" placeholder="Brand Prodotto" aria-label="product-brand" aria-describedby="product-brand" />
                        </div>


                        <!--Prezzo-->
                        <div class="input-group mb-4">
                            <label for="idprezzo" class="invisible" hidden>PREZZO</label>
                            <span class="input-group-text" id="product-price">PREZZO</span>
                            <input type="number" id="idprezzo" min="0" step="0.01" name="product-price" class="form-control" value="<?php echo $selectedProduct["price"]; ?>" placeholder="Prezzo Prodotto" aria-label="product-price" aria-describedby="product-price" required />
                        </div>


                        <!--Descrizione-->
                        <div class="input-group mb-4">
                            <label for="idDescrizione" class="invisible" hidden>DESCRIZIONE</label>
                            <span class="input-group-text">DESCRIZIONE</span>
                            <textarea class="form-control" id="idDescrizione" rows="3" name="description" aria-label="description"><?php echo $selectedProduct["description"]; ?></textarea>
                            <!--<input type="text" class="form-control" name="description" aria-label="description" value=""/>-->
                        </div>


                        <!--Sottocategoria-->
                        <div class="input-group mb-4">

                            <label for="idSubcategory" class="invisible" hidden>SOTTOCATEGORIA</label>
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
                            <label for="idquantita" class="invisible" hidden>QUANTITA</label>
                            <span class="input-group-text" id="product-quantity">QUANTITA'</span>
                            <input type="number" id="idquantita" min="0" name="product-quantity" class="form-control" value="<?php echo $selectedProduct["quantity"]; ?>" placeholder="Quantità in Magazzino" aria-label="product-quantity" aria-describedby="product-quantity" required />
                        </div>


                        <!--Immagine Attuale-->
                        <div class="input-group  mb-4">
                            <span class="input-group-text" id="product-act-img">IMMAGINE ATTUALE PRODOTTO</span>
                            <a href="<?php echo UPLOAD_DIR . $selectedProduct["idPRODUCT"] . '/' . '1.jpg'; ?>"><img src="<?php echo UPLOAD_DIR . $selectedProduct["idPRODUCT"] . '/' . '1.jpg'; ?>" class="rounded float-start w-25 img-thumbnail" alt="Immagine corrente"></a>
                        </div>

                        <!--Immagine Nuova-->
                        <div class="input-group  mb-4">
                            <label for="idnuovaimg" class="invisible" hidden>NUOVA IMMAGINE</label>
                            <span class="input-group-text" id="product-img">NUOVA IMMAGINE</span>
                            <input type="file" id="idnuovaimg" name="product-img" class="form-control" aria-label="product-img" aria-describedby="product-img" />
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
                                <?php $numTechSpec = 0; ?>
                                <?php foreach ($templateParams["selectedProduct"]["tecnical_specifications"] as $key => $value) : ?>
                                    <tr id="<?php echo ++$numTechSpec; ?>">
                                        <td headers="specifica">
                                            <label for="idspecifica<?php echo $numTechSpec; ?>" class="invisible" hidden>Specifica</label>
                                            <input class="col-12" id="idspecifica<?php echo $numTechSpec; ?>" type="text" name="specifica<?php echo $numTechSpec; ?>" value="<?php echo $key; ?>" />
                                        </td>
                                        <td headers="descrizione">
                                            <label for="iddescrizione<?php echo $numTechSpec; ?>" class="invisible" hidden>Specifica</label>
                                            <input class="col-12" id="iddescrizione<?php echo $numTechSpec; ?>" type="text" name="descrizione<?php echo $numTechSpec; ?>" value="<?php echo $value; ?>" />
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                        <div class="input-group-append text-center">
                            <button class="btn btn-outline-secondary" type="button" id="remove_row" aria-label="Meno">
                                <span class="fas fa-minus "></span>
                                Rimuovi specifica
                            </button>
                            <button class="btn btn-outline-secondary" type="button" id="add_row" aria-label="Più">
                                <span class="fas fa-plus "></span>
                                Aggiungi specifica
                            </button>
                        </div>
                        <!--END Specifiche Tecniche-->

                        <!--Bottone Modifica Prodotto-->
                        <div class=" text-center mt-4">
                            <input type="hidden" id="specifications_number" name="specifications_number" value="<?php echo $numTechSpec; ?>" />
                            <input type="hidden" id="product_id" name="product_id" value="<?php echo $selectedProduct["idPRODUCT"]; ?>" />
                            <input type="hidden" id="buttonConfermaModifichePremuto" name="buttonConfermaModifichePremuto" value="<?php echo $selectedProduct["idPRODUCT"]; ?>" />
                            <label for="inserisci-prodotto" class="invisible">Conferma modifiche e vai alla modifica tag</label>
                            <input id="inserisci-prodotto" type="submit" class="btn btn-primary btn-lg btn-block w-100" value="Conferma modifiche e vai alla modifica tag" />
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

        //se ho selezionato il prodotto da modificare
        <?php if (isset($templateParams["selectedProduct"])) : ?>
            //setto id prodotto e id sottocategoria, per fare l'update
            $("#productSelect").val(<?php echo $selectedProduct["idPRODUCT"]; ?>);
            $("#idSubcategory").val(<?php echo $selectedProduct["idSUBCATEGORY"]; ?>);

            //click su rimuovi riga delle specifiche tecniche
            $("#remove_row").click(function() {
                let row = $("#specifications_number");
                if (parseInt(row.val()) > 0) {
                    $('table tr:last').remove();
                    row.val(parseInt(row.val()) - 1);
                }
            });

            //click su aggiungi riga delle specifiche tecniche
            $("#add_row").click(function() {
                let row = $("#specifications_number");
                row.val(parseInt(row.val()) + 1);
                let nameS = "specifica" + row.val();
                let nameD = "descrizione" + row.val();
                let markup = '<tr id="' + row.val() + '"><td headers="specifica" ><input class="col-12" type="text" name=' + nameS + ' /></td><td headers="descrizione" ><input class="col-12" type="text" name=' + nameD + ' /></td></tr>';
                $("table tbody").append(markup);
            });
        <?php endif; ?>

    });
</script>