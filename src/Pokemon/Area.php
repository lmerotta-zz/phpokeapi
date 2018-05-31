<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 20:46
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Area
 * @package PokeAPI\Pokemon
 */
class Area
{

    const POKEAPI_ENDPOINT = 'location-area';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var integer
     */
    protected $gameIndex;

    /**
     * @var ArrayCollection|EncounterMethodRate[]
     */
    protected $encounterMethodRates;

    /**
     * @var Location
     */
    protected $location;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var ArrayCollection|PokemonEncounter[]
     */
    protected $encounters;

    /**
     * Area constructor.
     */
    public function __construct()
    {
        $this->encounterMethodRates = new ArrayCollection();
        $this->encounters = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getGameIndex(): int
    {
        return $this->gameIndex;
    }

    /**
     * @return ArrayCollection|EncounterMethodRate[]
     */
    public function getEncounterMethodRates(): ArrayCollection
    {
        return $this->encounterMethodRates;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|PokemonEncounter[]
     */
    public function getEncounters(): ArrayCollection
    {
        return $this->encounters;
    }
}