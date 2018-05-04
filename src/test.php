<?php

require_once  __DIR__.'/../vendor/autoload.php';

$client = new \PokeAPI\Client();

$species = $client->species(1);

die(var_dump($species->isBaby()));