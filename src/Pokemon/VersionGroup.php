<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 13:33
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class VersionGroup
 * @package PokeAPI\Pokemon
 */
class VersionGroup extends Resource
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $order;

    /**
     * @var Generation
     */
    protected $generation;

    /**
     * @var array|MoveLearnMethod[]
     */
    protected $moveLearnMethods = [];

    /**
     * @var array|Pokedex[]
     */
    protected $pokedexes = [];

    /**
     * @var array|Region[]
     */
    protected $regions = [];

    /**
     * @var array|Version[]
     */
    protected $versions = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->order = $data['order'];
        $this->generation = $this->client->generation($data['generation']['url']);

        foreach ($data['move_learn_methods'] as $moveLearnMethod) {
            $this->moveLearnMethods[$moveLearnMethod['name']] = $this->client->moveLearnMethod($moveLearnMethod['url']);
        }

        foreach ($data['pokedexes'] as $pokedex) {
            $this->pokedexes[$pokedex['name']] = $this->client->pokedex($pokedex['url']);
        }

        foreach ($data['regions'] as $region) {
            $this->regions[$region['name']] = $this->client->region($region['url']);
        }

        foreach ($data['versions'] as $version) {
            $this->versions[$version['name']] = $this->client->version($version['url']);
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @return Generation
     */
    public function getGeneration(): Generation
    {
        return $this->generation;
    }

    /**
     * @return array|MoveLearnMethod[]
     */
    public function getMoveLearnMethods()
    {
        return $this->moveLearnMethods;
    }

    /**
     * @return array|Pokedex[]
     */
    public function getPokedexes()
    {
        return $this->pokedexes;
    }

    /**
     * @return array|Region[]
     */
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * @return array|Version[]
     */
    public function getVersions()
    {
        return $this->versions;
    }

}