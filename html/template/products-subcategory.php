<div class="container-fluid">
    <?php if (count($templateParams["subcategory"]) == 0) : ?>
        <div class="alert alert-danger text-center" role="alert">
            La categoria non esiste. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
        </div>
    <?php else :
        $subcategory = $templateParams["subcategory"];
    ?>


        <div class="row">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="row mb-2">
                        <h2>Categoria: <?php echo $subcategory["categoryName"]; ?> > <?php echo $subcategory["subcategoryName"]; ?> </h2>
                    </div>
                </div>
            </div>
            <!--Filtri-->
            <div class="col-md-2">
                <div class="accordion mb-2" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="buttonFilters">
                                <span class="fas fa-filter"></span>Filtri
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <!-- Require filtri-->
                                <?php require "filter.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END Filtri-->

            <!--Prodotti-->
            <div class="col-md-10">
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

<script>
    $(document).ready(function() {
        adaptFilter();

        $(window).resize(function() {
            adaptFilter();
        });

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

        function adaptFilter() {
            if ($(this).width() < 768) {
                //mobile
                $("#collapseOne").removeClass("show");
                $("#buttonFilters").addClass("collapsed");
            } else {
                //desktop
                $("#collapseOne").addClass("show");
                $("#buttonFilters").removeClass("collapsed");
            }
        }
    });
</script>