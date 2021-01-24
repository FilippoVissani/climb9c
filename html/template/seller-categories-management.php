<div class="row mt-2">
    <div class="col-xl-1"></div>
    <div class="col-xl-10">












        <form class="row g-3" action="seller-manage-categories.php" method="post">
            <h1>CREA CATEGORIA</h1>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-nome">Categoria: </span>
                    <input type="text" name="nuovaCategoria" class="form-control" aria-label="Nuova categoria" aria-describedby="inputGroup-nome" required>
                </div>
            </div>

            <div class="col">
                <label for="inserisci-categoria" class="invisible" hidden>Aggiungi categoria</label>
                <button id="inserisci-categoria" type="submit" class="btn btn-primary mb-3">Aggiungi categoria</button>
            </div>
        </form>














        <form class="row g-3" action="seller-manage-categories.php" method="post">
            <h1>CREA SOTTOCATEGORIA</h1>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="product-subcategory">Categoria: </span>
                    <select class="" name="product-subcategory" aria-label="product-subcategory">
                        <?php $categories = $dbh->getCategories(); ?>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="input-group-text" id="inputGroup-sottocat">Sottocategoria: </span>
                    <input type="text" name="nuovaSottocategoria" class="form-control" aria-label="Nuova sottocategoria" aria-describedby="inputGroup-sottocat" required>
                </div>
            </div>

            <div class="col">

                <label for="inserisci-sottocategoria" class="invisible" hidden>Aggiungi sottocategoria</label>
                <button id="inserisci-sottocategoria" type="submit" class="btn btn-primary mb-3">Aggiungi sottocategoria</button>
            </div>
        </form>








        <form class="row g-3">
            <h1>CREA TAG</h1>
            <div class="col">
                <div class="input-group mb-4">
                    <span class="input-group-text" id="product-subcategory">Sottocategoria: </span>
                    <select class="" name="product-subcategory" aria-label="product-subcategory">
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
                    <span class="input-group-text" id="inputGroup-sizing-default">Tag: </span>
                    <input type="text" name="nuovoTag" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>

            <div class="col">
                <label for="inserisci-tag" class="invisible" hidden>Aggiungi tag</label>
                <button id="inserisci-tag" type="submit" class="btn btn-primary mb-3">Aggiungi tag</button>
            </div>
        </form>

    </div>
    <div class="col-xl-1"></div>
</div>