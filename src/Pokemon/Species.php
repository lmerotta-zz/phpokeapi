<?php

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Species
 * @package PokeAPI\Pokemon
 */
class Species
{
    public const POKEAPI_ENDPOINT = 'pokemon-species';

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
     * @var float
     */
    protected $genderRate;

    /**
     * @var integer
     */
    protected $captureRate;

    /**
     * @var integer
     */
    protected $baseHappiness;

    /**
     * @var boolean
     */
    protected $baby;

    /**
     * @var integer
     */
    protected $hatchCounter;

    /**
     * @var boolean
     */
    protected $genderDifferences;

    /**
     * @var boolean
     */
    protected $formsSwitchable;

    /**
     * @var GrowthRate
     */
    protected $growthRate;

    /**
     * @var ArrayCollection|SpeciesPokedexEntry[]
     */
    protected $pokedexEntries;

    /**
     * @var ArrayCollection|EggGroup[]
     */
    protected $eggGroups;

    /**
     * @var Color
     */
    protected $color;

    /**
     * @var Shape
     */
    protected $shape;

    /**
     * @var Species|null
     */
    protected $evolutionOf;

    /**
     * @var EvolutionChain
     */
    protected $evolutionChain;

    /**
     * @var Habitat
     */
    protected $habitat;

    /**
     * @var Generation
     */
    protected $generation;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var ArrayCollection|PalParkEncounter[]
     */
    protected $palParkEncounters;

    /**
     * @var ArrayCollection|FlavorTextEntry[]
     */
    protected $flavorTexts;

    /**
     * @var Translations
     */
    protected $formDescriptions;

    /**
     * @var Translations
     */
    protected $genera;

    /**
     * @var ArrayCollection|Variety[]
     */
    protected $varieties;

    public function __construct()
    {
        $this->pokedexEntries = new ArrayCollection();
        $this->eggGroups = new ArrayCollection();
        $this->palParkEncounters = new ArrayCollection();
        $this->flavorTexts = new ArrayCollection();
        $this->varieties = new ArrayCollection();
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
     * @return float
     */
    public function getGenderRate(): float
    {
        return $this->genderRate;
    }

    /**
     * @return int
     */
    public function getCaptureRate(): int
    {
        return $this->captureRate;
    }

    /**
     * @return int
     */
    public function getBaseHappiness(): int
    {
        return $this->baseHappiness;
    }

    /**
     * @return bool
     */
    public function isBaby(): bool
    {
        return $this->baby;
    }

    /**
     * @param int $hatchCounter
     * @return Species
     */
    public function setHatchCounter(int $hatchCounter): Species
    {
        $this->hatchCounter = 255 * ($hatchCounter + 1);
        return $this;
    }

    /**
     * @return int
     */
    public function getHatchCounter(): int
    {
        return $this->hatchCounter;
    }

    /**
     * @return bool
     */
    public function isGenderDifferences(): bool
    {
        return $this->genderDifferences;
    }

    /**
     * @return bool
     */
    public function isFormsSwitchable(): bool
    {
        return $this->formsSwitchable;
    }

    /**
     * @return GrowthRate
     */
    public function getGrowthRate(): GrowthRate
    {
        return $this->growthRate;
    }

    /**
     * @return ArrayCollection|SpeciesPokedexEntry[]
     */
    public function getPokedexEntries(): ArrayCollection
    {
        return $this->pokedexEntries;
    }

    /**
     * @return ArrayCollection|EggGroup[]
     */
    public function getEggGroups(): ArrayCollection
    {
        return $this->eggGroups;
    }

    /**
     * @return Color
     */
    public function getColor(): Color
    {
        return $this->color;
    }

    /**
     * @return Shape
     */
    public function getShape(): Shape
    {
        return $this->shape;
    }

    /**
     * @return Species|null
     */
    public function getEvolutionOf() : ?Species
    {
        return $this->evolutionOf;
    }

    /**
     * @return EvolutionChain
     */
    public function getEvolutionChain(): EvolutionChain
    {
        return $this->evolutionChain;
    }

    /**
     * @return Habitat
     */
    public function getHabitat(): Habitat
    {
        return $this->habitat;
    }

    /**
     * @return Generation
     */
    public function getGeneration(): Generation
    {
        return $this->generation;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|PalParkEncounter[]
     */
    public function getPalParkEncounters(): ArrayCollection
    {
        return $this->palParkEncounters;
    }

    /**
     * @return ArrayCollection|FlavorTextEntry[]
     */
    public function getFlavorTexts(): ArrayCollection
    {
        return $this->flavorTexts;
    }

    /**
     * @return Translations
     */
    public function getFormDescriptions(): Translations
    {
        return $this->formDescriptions;
    }

    /**
     * @return Translations
     */
    public function getGenera(): Translations
    {
        return $this->genera;
    }

    /**
     * @return ArrayCollection|Variety[]
     */
    public function getVarieties(): ArrayCollection
    {
        return $this->varieties;
    }

}