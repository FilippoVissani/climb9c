<div class="container-fluid">
    <?php if (count($templateParams["subcategory"]) == 0) : ?>
        <div class="alert alert-danger text-center" role="alert">
            La categoria non esiste. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
        </div>
    <?php else :
        $subcategory = $templateParams["subcategory"];
    ?>


        <div class="row">
            <!--Filtri-->
            <div class="col-md-2">
                <?php
                $group = array();
                foreach ($templateParams["tags"] as $value) {
                    $group[$value['chiave']][] = $value;
                };
                ?>
                <h3>FILTRI</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="" name="radioFilter" id="Tutti" checked>
                    <label class="form-check-label" for="Tutti">
                        Senza filtri
                    </label>
                </div>
                <?php foreach ($group as $key => $value) : ?>
                    <h4><?php echo $key; ?></h4>

                    <?php foreach ($value as $k => $v) : ?>
                        <div class="form-check">
                            <input class="form-check-input" value="<?php echo $key; ?>" type="radio" name="radioFilter" id="<?php echo $v["valore"]; ?>">
                            <label class="form-check-label" for="<?php echo $v["valore"]; ?>">
                                <?php echo $v["valore"]; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
            <!--END Filtri-->

            <!--Prodotti-->
            <div class="col-md-10">
                <div class="row mb-2">
                    <h2>Categoria: <?php echo $subcategory["categoryName"]; ?> > <?php echo $subcategory["subcategoryName"]; ?> </h2>
                </div>
                <?php if (count($templateParams["productsInSubcategory"]) == 0) : ?>
                    <div class="alert alert-secondary text-center" role="alert">
                        Nessun prodotto in questa categoria. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
                    </div>
                <?php else : ?>

                    <div class="row row-cols-2 row-cols-xl-4 g-4 filter_data">

                    </div>

                    <div id="loading" class="text-center m-5">
                        <div class="spinner-border" style="width: 5rem; height: 5rem;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
            <!--END Prodotti-->
        </div>



    <?php endif; ?>
</div>
<style>
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }
</style>

<script>
    $(document).ready(function() {

        filter_data("Chiave", "Tutti");

        $('input[type=radio][name=radioFilter]').on('change', function() {
            $chiave = this.value;
            $valore = this.id;

            filter_data($chiave, $valore);
        });

        function filter_data($chiave, $valore) {
            $('.filter_data').html("");
            $("#loading").show();
            $('#filters').modal("hide");
            $.ajax({
                url: "./AJAXfetch_data.php",
                method: "POST",
                data: {
                    categoria: <?php echo $subcategory["idSUBCATEGORY"]; ?>,
                    chiave: $chiave,
                    valore: $valore
                },
                success: function(data) {
                    $("#loading").hide();
                    $('.filter_data').html(data);
                }
            });
        }
    });
</script>