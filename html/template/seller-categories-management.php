<div class="row mx-auto">

    <div class="col-md-2"></div>
    <div class="col-md-8">
        <?php if (isset($templateParams["insertResult"])) : ?>
            <div class="alert alert-success text-center" role="alert">
                <?php echo $templateParams["insertResult"]; ?>
            </div>
        <?php endif; ?>

        <div class="row mb-0">
            <div>
                <a href="catalog-management.php" class="text-reset text-decoration-none fs-3 mb-0">
                    &lt; Torna alla gestione catalogo
                </a>
            </div>
            <hr />
        </div>

        <!--Crea categoria-->
        <form class="row mx-auto" action="seller-manage-categories.php" method="post">
            <p class="fs-1 mb-0">CREA CATEGORIA</p>

            <div class="col-md">
                <div class="input-group mb-3">

                    <label for="idInputCat" class="invisible" hidden>Categoria</label>
                    <span class="input-group-text" id="inputGroup-nome">Categoria: </span>
                    <input type="text" name="nuovaCategoria" id="idInputCat" class="form-control" aria-label="Nuova categoria" aria-describedby="inputGroup-nome" required>
                </div>
            </div>

            <div class="col-md-auto">
                <label for="inserisci-categoria" class="invisible" hidden>Aggiungi categoria</label>
                <button id="inserisci-categoria" type="submit" class="btn btn-primary mb-3">Aggiungi categoria</button>
            </div>

        </form>
        <!--END Crea categoria-->

        <hr />

        <!--Crea sottocategoria-->
        <form class="row mx-auto" action="seller-manage-categories.php" method="post">
            <p class="fs-1 mb-0">CREA SOTTOCATEGORIA</p>

            <div class="col-md-auto">
                <div class="input-group mb-3">
                    <label for="idSelectCat" class="invisible" hidden>Categoria</label>
                    <span class="input-group-text" id="product-subcategory">Categoria: </span>
                    <select class="" name="product-subcategory" id="idSelectCat" aria-label="product-subcategory">
                        <?php $categories = $dbh->getCategories(); ?>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md">
                <div class="input-group mb-3">

                    <label for="idInputSubcat" class="invisible" hidden>Sottocategoria</label>
                    <span class="input-group-text" id="inputGroup-sottocat">Sottocategoria: </span>
                    <input type="text" name="nuovaSottocategoria" id="idInputSubcat" class="form-control" aria-label="Nuova sottocategoria" aria-describedby="inputGroup-sottocat" required>
                </div>
            </div>

            <div class="col-md-auto">
                <label for="inserisci-sottocategoria" class="invisible" hidden>Aggiungi sottocategoria</label>
                <button id="inserisci-sottocategoria" type="submit" class="btn btn-primary mb-3">Aggiungi sottocategoria</button>
            </div>

        </form>
        <!--END Crea sottocategoria-->

        <hr />

        <!--Crea tag-->
        <form class="row mx-auto" action="seller-manage-categories.php" method="post">
            <p class="fs-1 mb-0">CREA TAG</p>

            <div class="col-md-auto">
                <div class="input-group mb-3">

                    <label for="idSelectSubcat" class="invisible" hidden>Sottocategoria</label>
                    <span class="input-group-text" id="product-subcategoryID">Sottocategoria: </span>
                    <select class="" name="product-subcategoryID" id="idSelectSubcat" aria-label="product-subcategoryID">
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
            </div>

            <div class="col-md">
                <div class="input-group mb-3">
                    <label for="idInputTag" class="invisible" hidden>tag</label>
                    <span class="input-group-text" id="inputGroup-newTag">Tag: </span>
                    <input type="text" name="nuovoTag" id="idInputTag" class="form-control" aria-label="Nuovo tag" aria-describedby="inputGroup-newTag" required>
                </div>
            </div>

            <div class="col-md-auto">
                <label for="inserisci-tag" class="invisible" hidden>Aggiungi tag</label>
                <button id="inserisci-tag" type="submit" class="btn btn-primary mb-3">Aggiungi tag</button>
            </div>
        </form>
        <!--END Crea tag-->

        <hr />

    </div>
    <div class="col-md-2"></div>
</div>