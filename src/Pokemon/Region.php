<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 13:32
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Region
 * @package PokeAPI\Pokemon
 */
class Region
{
    public const POKEAPI_ENDPOINT = 'region';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|Location[]
     */
    protected $locations;

    /**
     * @var Generation
     */
    protected $mainGeneration;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var ArrayCollection|Pokedex[]
     */
    protected $pokedexes;

    /**
     * @var ArrayCollection|VersionGroup[]
     */
    protected $versionGroups;

    /**
     * Region constructor.
     */
    public function __construct()
    {
        $this->locations = new ArrayCollection();
        $this->pokedexes = new ArrayCollection();
        $this->versionGroups = new ArrayCollection();
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
     * @return ArrayCollection|Location[]
     */
    public function getLocations(): ArrayCollection
    {
        return $this->locations;
    }

    /**
     * @return Generation
     */
    public function getMainGeneration(): Generation
    {
        return $this->mainGeneration;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|Pokedex[]
     */
    public function getPokedexes(): ArrayCollection
    {
        return $this->pokedexes;
    }

    /**
     * @return ArrayCollection|VersionGroup[]
     */
    public function getVersionGroups(): ArrayCollection
    {
        return $this->versionGroups;
    }
}