<?php

$url = "https://servicodados.ibge.gov.br/api/v1/paises/{paises}";

$resposta = file_get_contents($url);

$data = json_decode($resposta);

foreach ($data as $paises) {

    echo $paises -> area -> unidade -> multiplicador;
    echo "<br />";
}

?>