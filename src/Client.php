<?php

namespace PokeAPI;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Exception\NetworkException;
use PokeAPI\Pokemon\Ability;
use PokeAPI\Pokemon\Color;
use PokeAPI\Pokemon\EggGroup;
use PokeAPI\Pokemon\EvolutionChain;
use PokeAPI\Pokemon\Generation;
use PokeAPI\Pokemon\GrowthRate;
use PokeAPI\Pokemon\Habitat;
use PokeAPI\Pokemon\Location;
use PokeAPI\Pokemon\MoveLearnMethod;
use PokeAPI\Pokemon\Pokedex;
use PokeAPI\Pokemon\Region;
use PokeAPI\Pokemon\Shape;
use PokeAPI\Pokemon\Species;
use PokeAPI\Pokemon\VersionGroup;
use ProxyManager\Factory\LazyLoadingValueHolderFactory;
use ProxyManager\Proxy\LazyLoadingInterface;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Simple\FilesystemCache;

/**
 * Class Client
 * @package PokeAPI
 */
class Client
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * Client constructor.
     * @param string $url
     */
    public function __construct(string $url = 'http://pokeapi.co/api/v2/', CacheInterface $cache)
    {
        $this->baseUrl = $url;
        $this->cache = $cache ?: new FilesystemCache('pokeapi');
    }

    /**
     * @param int|string $idOrName
     */
    public function species($idOrName) : Species
    {
        return $this->createProxy(Species::class, 'pokemon-species', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function growthRate($idOrName) : GrowthRate
    {
        return $this->createProxy(GrowthRate::class, 'growth-rate', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function eggGroup($idOrName) : EggGroup
    {
        return $this->createProxy(EggGroup::class, 'egg-group', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function color($idOrName) : Color
    {
        return $this->createProxy(Color::class, 'pokemon-color', $idOrName);
    }


    /**
     * @param int|string $idOrName
     */
    public function shape($idOrName) : Shape
    {
        return $this->createProxy(Shape::class, 'pokemon-shape', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function evolutionChain($idOrName) : EvolutionChain
    {
        return $this->createProxy(EvolutionChain::class, 'evolution-chain', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function habitat($idOrName) : Habitat
    {
        return $this->createProxy(Habitat::class, 'pokemon-habitat', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function version($idOrName) : Version
    {
        return $this->createProxy(Version::class, 'version', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function pokedex($idOrName) : Pokedex
    {
        return $this->createProxy(Pokedex::class, 'pokedex', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function region($idOrName) : Region
    {
        return $this->createProxy(Region::class, 'region', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function location($idOrName) : Location
    {
        return $this->createProxy(Location::class, 'location', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function generation($idOrName) : Generation
    {
        return $this->createProxy(Generation::class, 'generation', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function ability($idOrName) : Ability
    {
        return $this->createProxy(Ability::class, 'ability', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function versionGroup($idOrName) : VersionGroup
    {
        return $this->createProxy(VersionGroup::class, 'version-group', $idOrName);
    }

    /**
     * @param int|string $idOrName
     */
    public function moveLearnMethod($idOrName) : MoveLearnMethod
    {
        return $this->createProxy(MoveLearnMethod::class, 'move-learn-method', $idOrName);
    }

    /**
     * @param string $uri
     * @param int|string $identifier
     * @return ArrayCollection
     * @throws NetworkException
     */
    public function sendRequest(string $uri, $identifier) : ArrayCollection
    {

        $url = sprintf(
            "%s/%s",
            $this->baseUrl,
            $uri
        );

        $url .= str_replace($url, $identifier);

        if ($this->cache->has($url)) {
            return $this->cache->get($url);
        }

        $ch = curl_init();
        $timeout = 5;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        $data = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code != 200) {
            throw new NetworkException($url, $data);
        }

        $data = new ArrayCollection(json_encode($data, true));

        $this->cache->set($url, $data);

        return $data;

    }

    /**
     * @param string $class
     * @param string $resourceUri
     * @param int|string $identifier
     * @return object a proxy of $class
     */
    private function createProxy(string $class, string $resourceUri, $identifier)
    {
        $client = $this;
        $factory     = new LazyLoadingValueHolderFactory();
        $initializer = function (& $wrappedObject, LazyLoadingInterface $proxy, $method, array $parameters, & $initializer) use ($client, $class, $resourceUri, $identifier) {
            $response = $client->sendRequest($resourceUri, $identifier);
            $initializer   = null; // disable initialization
            $wrappedObject = new $class($client, $response); // fill your object with values here

            return true; // confirm that initialization occurred correctly
        };

        return $factory->createProxy($class, $initializer);
    }
}