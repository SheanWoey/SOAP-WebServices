<?php

$client = new SoapClient("http://localhost/WSDLserver/poke.wsdl");
$response1 = $client->getAllPokemon();


$response = $client->getPokemonByTypeLegend($_POST['type'],$_POST['legend']);

echo $response;
?>