<?php
require_once 'bootstrap.php';

$templateParams["FilteredProduct"]=$dbh->filterProducts($_POST["categoria"], $_POST["chiave"], $_POST["valore"]);
$output='';
foreach($templateParams["FilteredProduct"] as $row)
		{
			$output .= '
                    <div class="col">
                        <div class="card h-100">
                        <img src="'.UPLOAD_DIR.$row["idPRODUCT"].'/1.jpg" class="card-img-top" alt="'.$row["name"].'">
                        <div class="card-body">
                            <h5 class="card-title">'.$row["name"].'</h5>
                            <p class="card-text text-center">'.$row["price"]. '€</p>
                            <a href="./product.php?id='.$row["idPRODUCT"].'" class="stretched-link"></a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Disponibili '.$row['quantity'].' pezzi</small>
                        </div>
                        </div>
                    </div>
			';
        }
        echo $output;
?>