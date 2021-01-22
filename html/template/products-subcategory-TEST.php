<div class="container-fluid">
    <?php if (count($templateParams["subcategory"]) == 0) : ?>
        <div class="alert alert-danger text-center" role="alert">
            La categoria non esiste. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
        </div>
    <?php else :
        $subcategory = $templateParams["subcategory"];
    ?>
        <div class="row mb-2">
            <h2>Categoria: <?php echo $subcategory["categoryName"]; ?> > <?php echo $subcategory["subcategoryName"]; ?> </h2>
        </div>

        <div class="row">
            <!--Filtri-->
            <div class="col-md-2">
                <?php
                    $group = array();
                    foreach ( $templateParams["tags"] as $value ) {
                        $group[$value['chiave']][] = $value;
                    };
                ?>

                <?php foreach($group as $key=>$value): ?>
                <div class="list-group">
                    <h3><?php echo $key; ?></h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                    
                    </div>
                </div>
                <?php endforeach; ?> 
            </div>
            <!--END Filtri-->

            <!--Prodotti-->
            <div class="col-md-10">
                <?php if (count($templateParams["productsInSubcategory"]) == 0) : ?>
                    <div class="alert alert-secondary text-center" role="alert">
                        Nessun prodotto in questa categoria. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
                    </div>
                <?php else : ?>

                    <div class="row row-cols-2 row-cols-md-4 g-4 filter_data">

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


<script>
    $(document).ready(function() {

        filter_data("Chiave", "Tutti");

        $('select').on('change', function() {
            $chiave = this.id;
            $valore = this.value;

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