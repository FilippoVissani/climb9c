<div class="container-fluid h-100 text-dark">
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">id prodotto</span>
    <input type="number" class="form-control" placeholder="idPRODUCT" aria-label="id prodotto" aria-describedby="basic-addon1">
    </div>
<?php
    $tecnical_specifications = [
    "Chiusura" => "Strappo",
    "Utilizzo scarpetta" => "Boulder, Falesia",
    "Tipo suola scarpetta" => "Suola intera",
    "Aggressivita scarpetta" => "Performante"
    ];

$json = json_encode($tecnical_specifications);

var_dump($json);

?>
</div>