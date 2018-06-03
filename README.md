# PHPokéAPI

A PHP7.1+ wrapper for PokéAPI. This package offers the possibility to query the majority of the PokéAPI endpoints (see exceptions below). It supports caching of responses and lazy-loading relations.

## Installation

`composer require lmerotta/phpokeapi`

## Basic Usage

Use`PokeAPI\Client` to query the endpoints directly through the named methods.

```php
<?php

use PokeAPI\Client;

$client = new Client();

// Returns a PokeAPI\Pokemon\Species instance
$species = $client->species('bulbasaur'); // or $client->species(1);

````
You can then traverse the returned object. All its relations will be proxies, and won't make any new requests to the API except if you explicitly call one of their getters

```php
<?php

// ...

$species->getName(); // 'bulbasaur'
$growthRate = $species->getGrowthRate(); // A proxy of PokeAPI\Pokemon\GrowthRate 

$growthRate->getName(); // Here the real API call to the GrowthRate endpoint is made 

```

All the requests made are cached, so you won't have to query twice for the same dataset.

#### PokeAPI\Client

The `PokeAPI\Client` takes 3 optional parameters:
- `$url`, a string pointing to the base URL of the PokéAPI. Defaults to pokeapi.co
- `$cache`, A `Psr\SimpleCache\CacheInterface`. Defaults to a `Symfony\Component\Cache\Simple\FilesystemCache` instance
- `$serializer`, A `JMS\Serializer\SerializerInterface` implementation.

## Contributing

Feel free to open pull requests or submit issues!