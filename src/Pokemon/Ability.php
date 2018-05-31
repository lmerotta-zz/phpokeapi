<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 20:54
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Ability
 * @package PokeAPI\Pokemon
 */
class Ability
{
    const POKEAPI_ENDPOINT = 'ability';

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
     * @var Generation
     */
    protected $generation;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var Translations
     */
    protected $shortEffects;

    /**
     * @var Translations
     */
    protected $effects;

    /**
     * @var ArrayCollection|EffectChange[]
     */
    protected $effectChanges = [];

    /**
     * @var ArrayCollection|AbilityFlavorText[]
     */
    protected $flavorTexts = [];

    /**
     * @var ArrayCollection|AbilityPokemon
     */
    protected $pokemons = [];

    public function __construct()
    {
        $this->effectChanges = new ArrayCollection();
        $this->flavorTexts = new ArrayCollection();
        $this->pokemons = new ArrayCollection();
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
     * @return Translations
     */
    public function getShortEffects(): Translations
    {
        return $this->shortEffects;
    }

    /**
     * @return Translations
     */
    public function getEffects(): Translations
    {
        return $this->effects;
    }

    /**
     * @return ArrayCollection|EffectChange[]
     */
    public function getEffectChanges(): ArrayCollection
    {
        return $this->effectChanges;
    }

    /**
     * @return ArrayCollection|AbilityFlavorText[]
     */
    public function getFlavorTexts(): ArrayCollection
    {
        return $this->flavorTexts;
    }

    /**
     * @return ArrayCollection|AbilityPokemon
     */
    public function getPokemons(): ArrayCollection
    {
        return $this->pokemons;
    }
}