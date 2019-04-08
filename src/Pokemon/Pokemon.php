<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 23.12.17
 * Time: 16:57
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Pokemon
 * @package PokeAPI\Pokemon
 */
class Pokemon
{
    const POKEAPI_ENDPOINT = 'pokemon';

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
    protected $baseExperience;

    /**
     * @var integer
     */
    protected $height;

    /**
     * @var boolean
     */
    protected $default;

    /**
     * @var integer
     */
    protected $order;

    /**
     * @var integer
     */
    protected $weight;

    /**
     * @var ArrayCollection|PokemonAbility[]
     */
    protected $abilities;

    /**
     * @var ArrayCollection|PokemonForm[]
     */
    protected $forms;

    /**
     * @var ArrayCollection|GameIndex[]
     */
    protected $gameIndices;

    /**
     * @var ArrayCollection|PokemonHeldItem[]
     */
    protected $heldItems;

    /**
     * @var ArrayCollection|AreaEncounter[]
     */
    protected $areaEncounters;

    /**
     * @var ArrayCollection|PokemonMove[]
     */
    protected $moves;

    /**
     * @var ArrayCollection an array indexed by sprite name
     */
    protected $sprites;

    /**
     * @var Species
     */
    protected $species;

    /**
     * @var ArrayCollection|PokemonStat[]
     */
    protected $stats;

    /**
     * @var ArrayCollection|PokemonType[]
     */
    protected $types;

    /**
     * Pokemon constructor.
     */
    public function __construct()
    {
        $this->abilities = new ArrayCollection();
        $this->forms = new ArrayCollection();
        $this->gameIndices = new ArrayCollection();
        $this->heldItems = new ArrayCollection();
        $this->areaEncounters = new ArrayCollection();
        $this->moves = new ArrayCollection();
        $this->sprites = new ArrayCollection();
        $this->species = new ArrayCollection();
        $this->types = new ArrayCollection();
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
    public function getBaseExperience(): int
    {
        return $this->baseExperience;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @return ArrayCollection|Ability[]
     */
    public function getAbilities(): ArrayCollection
    {
        return $this->abilities;
    }

    /**
     * @return ArrayCollection|PokemonForm[]
     */
    public function getForms(): ArrayCollection
    {
        return $this->forms;
    }

    /**
     * @return ArrayCollection|GameIndex[]
     */
    public function getGameIndices(): ArrayCollection
    {
        return $this->gameIndices;
    }

    /**
     * @return ArrayCollection|ItemPokemon[]
     */
    public function getHeldItems(): ArrayCollection
    {
        return $this->heldItems;
    }

    /**
     * @return ArrayCollection|PokemonMove[]
     */
    public function getMoves(): ArrayCollection
    {
        return $this->moves;
    }

    /**
     * @return ArrayCollection
     */
    public function getSprites(): ArrayCollection
    {
        return $this->sprites;
    }

    /**
     * @return Species
     */
    public function getSpecies(): Species
    {
        return $this->species;
    }

    /**
     * @return ArrayCollection|PokemonStat[]
     */
    public function getStats(): ArrayCollection
    {
        return $this->stats;
    }

    /**
     * @return ArrayCollection|PokemonType[]
     */
    public function getTypes(): ArrayCollection
    {
        return $this->types;
    }
}