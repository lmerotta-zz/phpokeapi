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
class VersionGroup
{
    const POKEAPI_ENDPOINT = 'version-group';

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
     * @var ArrayCollection|MoveLearnMethod[]
     */
    protected $moveLearnMethods;

    /**
     * @var ArrayCollection|Pokedex[]
     */
    protected $pokedexes;

    /**
     * @var ArrayCollection|Region[]
     */
    protected $regions;

    /**
     * @var ArrayCollection|Version[]
     */
    protected $versions;

    /**
     * VersionGroup constructor.
     */
    public function __construct()
    {
        $this->moveLearnMethods = new ArrayCollection();
        $this->pokedexes = new ArrayCollection();
        $this->regions = new ArrayCollection();
        $this->versions = new ArrayCollection();
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
     * @return ArrayCollection|MoveLearnMethod[]
     */
    public function getMoveLearnMethods(): ArrayCollection
    {
        return $this->moveLearnMethods;
    }

    /**
     * @return ArrayCollection|Pokedex[]
     */
    public function getPokedexes(): ArrayCollection
    {
        return $this->pokedexes;
    }

    /**
     * @return ArrayCollection|Region[]
     */
    public function getRegions(): ArrayCollection
    {
        return $this->regions;
    }

    /**
     * @return ArrayCollection|Version[]
     */
    public function getVersions(): ArrayCollection
    {
        return $this->versions;
    }

}