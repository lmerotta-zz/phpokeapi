<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 13:14
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Pokedex
 * @package PokeAPI\Pokemon
 */
class Pokedex
{

    const POKEAPI_ENDPOINT = 'pokedex';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var boolean
     */
    protected $mainSeries;

    /**
     * @var Translations
     */
    protected $descriptions;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var ArrayCollection|PokedexEntry[]
     */
    protected $pokedexEntries;

    /**
     * @var Region|null
     */
    protected $region;

    /**
     * @var ArrayCollection|VersionGroup[]
     */
    protected $versionGroups;

    /**
     * Pokedex constructor.
     */
    public function __construct()
    {
        $this->pokedexEntries = new ArrayCollection();
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
     * @return bool
     */
    public function isMainSeries(): bool
    {
        return $this->mainSeries;
    }

    /**
     * @return Translations
     */
    public function getDescriptions(): Translations
    {
        return $this->descriptions;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|PokedexEntries[]
     */
    public function getPokedexEntries(): ArrayCollection
    {
        return $this->pokedexEntries;
    }

    /**
     * @return Region|null
     */
    public function getRegion(): ?Region
    {
        return $this->region;
    }

    /**
     * @return ArrayCollection|VersionGroup[]
     */
    public function getVersionGroups(): ArrayCollection
    {
        return $this->versionGroups;
    }
}