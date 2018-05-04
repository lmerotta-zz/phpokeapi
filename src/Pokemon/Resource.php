<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 19.12.17
 * Time: 22:14
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Client;

/**
 * Class Resource
 * @package PokeAPI\Pokemon
 */
abstract class Resource
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Resource constructor.
     * @param Client $client
     * @param array $apiResponse
     */
    public function __construct(Client $client, array $apiResponse)
    {
        $this->client = $client;

        $this->hydrate($apiResponse);
    }

    /**
     * @param ArrayCollection $data
     */
    abstract protected function hydrate(ArrayCollection $data) : void;
}