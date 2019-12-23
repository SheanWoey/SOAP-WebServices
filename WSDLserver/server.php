<?php

/*
 * Written by: Peter Gosling, DkIT
 * Copyright 2016
 * 
 */

function getAllPokemon() {
    $dsn = "mysql:host=localhost;dbname=pokemon";
    $username = "root";
    $password = "";

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        error_reporting(E_ALL);
    } catch (PDOExceptionc $e) {
        $error_message = $e->getMessage();
        exit();
    }

    try {

        $queryCategory = $db->prepare('SELECT * FROM pokemon_species');
        $queryCategory->execute();
        $rows = $queryCategory->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "Error fetching";
    }

    return json_encode($rows);
}

function getPokemonDetail($id) {
    $dsn = "mysql:host=localhost;dbname=pokemon";
    $username = "root";
    $password = "";

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        error_reporting(E_ALL);
    } catch (PDOExceptionc $e) {
        $error_message = $e->getMessage();
        exit();
    }

    try {

        $queryCategory = $db->prepare('SELECT * FROM pokemon_species WHERE ID= :ID');
        $queryCategory->bindParam(":ID", $id, PDO::PARAM_INT);
        $queryCategory->execute();
        $rows = $queryCategory->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "Error fetching";
    }

    return json_encode($rows);
}

function getPokemonByTypeLegend($type, $legend) {
    $dsn = "mysql:host=localhost;dbname=pokemon";
    $username = "root";
    $password = "";

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        error_reporting(E_ALL);
    } catch (PDOExceptionc $e) {
        $error_message = $e->getMessage();
        exit();
    }

    try {

        $queryCategory = $db->prepare('SELECT * FROM pokemon_species WHERE Legendary = :legend AND (Type1 = :Type OR Type2 = :Type2)');
        $queryCategory->bindParam(":legend", $legend, PDO::PARAM_STR);
        $queryCategory->bindParam(":Type", $type, PDO::PARAM_STR);
         $queryCategory->bindParam(":Type2", $type, PDO::PARAM_STR);
        $queryCategory->execute();
        $rows = $queryCategory->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "Error fetching";
    }

    return json_encode($rows);
}

ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("poke.wsdl");
$server->addFunction("getPokemonDetail");
$server->addFunction("getAllPokemon");
$server->addFunction("getPokemonByTypeLegend");
$server->handle();

?>