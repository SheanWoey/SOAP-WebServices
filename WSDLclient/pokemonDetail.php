<?php

$client = new SoapClient("http://localhost/WSDLserver/poke.wsdl");
$response1 = $client->getAllPokemon();


$response = $client->getPokemonDetail($_POST['uid']);

echo $response;
?>