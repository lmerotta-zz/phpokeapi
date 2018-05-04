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
class Pokemon extends Resource
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
     * @var array|Ability[]
     */
    protected $abilities = [];

    /**
     * @var array|PokemonForm[]
     */
    protected $forms = [];

    /**
     * @var array|Gameindex[]
     */
    protected $gameIndices = [];

    /**
     * @var array|PokemonHeldItem[]
     */
    protected $heldItems = [];

    /**
     * @var array|PokemonMove[]
     */
    protected $moves = [];

    /**
     * @var array an array indexed by sprite name
     */
    protected $sprites = [];

    /**
     * @var Species
     */
    protected $species;

    /**
     * @var array|PokemonStat[]
     */
    protected $stats = [];

    /**
     * @var array|PokemonType[]
     */
    protected $types = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->baseExperience = $data['base_experience'];
        $this->height = $data['height'];
        $this->default = $data['is_default'];
        $this->order = $data['order'];
        $this->weight = $data['weight'];

        foreach ($data['abilities'] as $ability) {
            $this->abilities[$ability['name']] = $this->client->ability($ability['url']);
        }

        foreach ($data['forms'] as $form) {
            $this->forms[$form['name']] = $this->client->form($form['url']);
        }

        foreach ($data['game_indices'] as $gameIndex) {
            $this->gameIndices[] = new Gameindex($this->client, $gameIndex);
        }

        foreach ($data['held_items'] as $heldItem) {
            $this->heldItems[] = new PokemonHeldItem($this->client, $heldItem);
        }

        foreach ($data['moves'] as $move) {
            $this->moves[] = new PokemonMove($this->client, $move);
        }

        foreach ($data['sprites'] as $name => $value) {
            $this->sprites[$name] = $value;
        }

        foreach ($data['species'] as $species) {
            $this->species[$species['name']] = $this->client->species($species['url']);
        }

        foreach ($data['stats'] as $stat) {
            $this->stats[] = new PokemonStat($this->client, $stat);
        }

        foreach ($data['types'] as $type) {
            $this->types[] = new PokemonType($this->client, $type);
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
     * @return array|Ability[]
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * @return array|PokemonForm[]
     */
    public function getForms()
    {
        return $this->forms;
    }

    /**
     * @return array|Gameindex[]
     */
    public function getGameIndices()
    {
        return $this->gameIndices;
    }

    /**
     * @return array|ItemPokemon[]
     */
    public function getHeldItems()
    {
        return $this->heldItems;
    }

    /**
     * @return array|PokemonMove[]
     */
    public function getMoves()
    {
        return $this->moves;
    }

    /**
     * @return array
     */
    public function getSprites(): array
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
     * @return array|PokemonStat[]
     */
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * @return array|PokemonType[]
     */
    public function getTypes()
    {
        return $this->types;
    }
}