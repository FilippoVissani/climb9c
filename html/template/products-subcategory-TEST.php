<div class="container-fluid">
    <?php if(count($templateParams["subcategory"])==0): ?>
        <div class="alert alert-danger text-center" role="alert">
            La categoria non esiste. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
        </div>
    <?php else:
        $subcategory = $templateParams["subcategory"];
    ?>
        <div class="row mb-2">
            <div class="col-md-11 m-auto">
                <h2>Categoria: <?php echo $subcategory["categoryName"]; ?> > <?php echo $subcategory["subcategoryName"]; ?> </h2>
            </div>
            <div class="col-md-1 m-auto text-center">
                <!--Bottone per aprire scelta tag-->
                <button class="btn btn-outline-secondary md-5" type="button" id="btnShowFilters" aria-label="Seleziona filtri">
                    <span class="fas fa-cog"></span>
                </button>
            </div>


            <!-- Modal filtri -->
            <div class="modal fade" id="filters" tabindex="-1" aria-labelledby="filters" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!--HEADER-->
                        <div class="modal-header" id="modal-header">
                            <h5 class="modal-title" id="modal-title">Filtri ricerca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!--BODY-->
                        <div class="modal-body" id="modal-body">
                            <?php
                            $group = array();
                            foreach ( $templateParams["tags"] as $value ) {
                                $group[$value['chiave']][] = $value;
                            }
                            ?>

                            <div class="form-group">
                                <?php foreach ($group as $key=>$value): ?>
                                    <label for="<?php echo $key; ?>"><?php echo $key; ?></label>
                                    <select class="form-control" id="<?php echo $key; ?>">
                                    <option >Tutti</option>
                                    <?php foreach ($value as $k=>$v): ?>
                                        <option><?php echo $v["valore"]; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    <br/>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!--FOOTER-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnAnnulla">Annulla</button>
                            <a class="btn btn-primary" href="#" role="button" id="btnApply">Applica</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--END modal filtri-->



            
        </div>
        <?php if(count($templateParams["productsInSubcategory"])==0): ?>
            <div class="alert alert-secondary text-center" role="alert">
                Nessun prodotto in questa categoria. <a href="index.php" class="alert-link">Clicca qui per andare alla home</a>
            </div>
        <?php else: ?>
            <div class="row row-cols-2 row-cols-md-4 g-4 filter_data">
            
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<style>
#loading
{
	text-align:center; 
	background: url('images/loader.gif') no-repeat center; 
	height: 150px;
}
</style>


<script>

    $(document).ready(function(){  

        //mostra tags
        $('#btnShowFilters').click(function(){
            $('#filters').modal("show");
        });

        filter_data();

        $('select').on('change', function() {
            $chiave = this.id;
            $valore = this.value;

            $('.filter_data').html('<div id="loading" style="" ></div>');
            
            $.ajax({
                url:"./AJAXfetch_data.php",
                method:"POST",
                data:{categoria:<?php echo $subcategory["idSUBCATEGORY"]; ?>, chiave:$chiave, valore:$valore},
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        });

        function filter_data(){
            $.ajax({
                url:"./AJAXfetch_data.php",
                method:"POST",
                data:{categoria:<?php echo $subcategory["idSUBCATEGORY"]; ?>, chiave:"chiave", valore:"Tutti"},
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
            
        }



    });
</script>