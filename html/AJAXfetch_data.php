<?php
require_once 'bootstrap.php';

$templateParams["FilteredProduct"] = $dbh->filterProducts($_POST["categoria"], $_POST["chiave"], $_POST["valore"]);
$output = '';
foreach ($templateParams["FilteredProduct"] as $row) {
    $output .= '
                    <div class="col d-flex">
                        <div class="card rounded shadow mb-5 flex-fill card-hover">
                        <img src="' . UPLOAD_DIR . $row["idPRODUCT"] . '/1.jpg" class="card-img-top" alt="' . $row["name"] . '">
                        <div class="card-body border-top pb-0">
                            <p class="card-title text-center fs-5">' . $row["name"] . '</p>
                            
                            <a href="./product.php?id=' . $row["idPRODUCT"] . '" class="stretched-link" title="link"></a>
                            
                            
                        </div>
                        <div class="text-center mb-1">
                        <span class="badge bg-primary text-dark fs-5">' . $row["price"] . '€</span>
                        </div>
                        <div class="card-footer ">
                            <p class="text-muted  mb-0">Pezzi disponibili: ' . $row['quantity'] . '</p>
                        </div>
                        </div>
                    </div>
			';
}
echo $output;
?>