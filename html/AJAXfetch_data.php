<?php
require_once 'bootstrap.php';

$templateParams["FilteredProduct"]=$dbh->filterProducts($_POST["categoria"], $_POST["chiave"], $_POST["valore"]);
$output='';
foreach($templateParams["FilteredProduct"] as $row)
		{
			$output .= '
                    <div class="col">
                        <div class="card rounded shadow mb-5 h-100">
                        <img src="'.UPLOAD_DIR.$row["idPRODUCT"].'/1.jpg" class="card-img-top" alt="'.$row["name"].'">
                        <div class="card-body border-top">
                            <p class="card-title text-center fs-5">'.$row["name"].'</p>
                            
                            <a href="./product.php?id='.$row["idPRODUCT"].'" class="stretched-link"></a>
                        </div>
                        <div class="card-footer">
                            <span class="badge bg-primary text-dark fs-5">'.$row["price"]. '€</span>
                            <p class="text-muted fs-5">Pezzi disponibili: '.$row['quantity'].'</p>
                        </div>
                        </div>
                    </div>
			';
        }
        echo $output;
?>