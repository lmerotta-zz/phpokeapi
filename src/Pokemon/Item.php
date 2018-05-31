<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 23.12.17
 * Time: 16:43
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Item
 * @package PokeAPI\Pokemon
 */
class Item
{

    const POKEAPI_ENDPOINT = 'item';

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
    protected $cost;

    /**
     * @var integer|null
     */
    protected $flingPower;

    /**
     * @var ItemFlingEffect|null
     */
    protected $flingEffect;

    /**
     * @var ArrayCollection|ItemAttribute[]
     */
    protected $attributes;

    /**
     * @var ItemCategory
     */
    protected $category;

    /**
     * @var Translations|null
     */
    protected $effects;

    /**
     * @var Translations|null
     */
    protected $shortEffects;

    /**
     * @var ArrayCollection|VersionGroupFlavorText[]
     */
    protected $flavorTexts;

    /**
     * @var ArrayCollection|GameIndex[]
     */
    protected $gameIndices;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var ArrayCollection|string[]
     */
    protected $sprites;

    /**
     * @var ArrayCollection|ItemPokemon[]
     */
    protected $heldByPokemons;

    /**
     * @var EvolutionChain|null
     */
    protected $babyTriggerFor;

    /**
     * @var ArrayCollection|ItemVersionMachine[]
     */
    protected $machines;

    /**
     * Item constructor.
     */
    public function __construct()
    {
        $this->flavorTexts = new ArrayCollection();
        $this->attributes = new ArrayCollection();
        $this->gameIndices = new ArrayCollection();
        $this->sprites = new ArrayCollection();
        $this->heldByPokemons = new ArrayCollection();
        $this->machines = new ArrayCollection();
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
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * @return int|null
     */
    public function getFlingPower(): ?int
    {
        return $this->flingPower;
    }

    /**
     * @return null|ItemFlingEffect
     */
    public function getFlingEffect(): ?ItemFlingEffect
    {
        return $this->flingEffect;
    }

    /**
     * @return ArrayCollection|ItemAttribute[]
     */
    public function getAttributes(): ArrayCollection
    {
        return $this->attributes;
    }

    /**
     * @return ItemCategory
     */
    public function getCategory(): ItemCategory
    {
        return $this->category;
    }

    /**
     * @return null|Translations
     */
    public function getEffects(): ?Translations
    {
        return $this->effects;
    }

    /**
     * @return null|Translations
     */
    public function getShortEffects(): ?Translations
    {
        return $this->shortEffects;
    }

    /**
     * @return ArrayCollection|VersionGroupFlavorText[]
     */
    public function getFlavorTexts(): ArrayCollection
    {
        return $this->flavorTexts;
    }

    /**
     * @return ArrayCollection|GameIndex[]
     */
    public function getGameIndices(): ArrayCollection
    {
        return $this->gameIndices;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|string[]
     */
    public function getSprites(): ArrayCollection
    {
        return $this->sprites;
    }

    /**
     * @return ArrayCollection|ItemPokemon[]
     */
    public function getHeldByPokemons(): ArrayCollection
    {
        return $this->heldByPokemons;
    }

    /**
     * @return null|EvolutionChain
     */
    public function getBabyTriggerFor(): ?EvolutionChain
    {
        return $this->babyTriggerFor;
    }

    /**
     * @return ArrayCollection|ItemVersionMachine[]
     */
    public function getMachines(): ArrayCollection
    {
        return $this->machines;
    }
}