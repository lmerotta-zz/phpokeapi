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
class Item extends Resource
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
     * @var array|ItemAttribute[]
     */
    protected $attributes = [];

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
     * @var array|FlavorText[]
     */
    protected $flavorTexts = [];

    /**
     * @var array|Gameindex[]
     */
    protected $gameIndices = [];

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var string
     */
    protected $sprite;

    /**
     * @var array|ItemPokemon[]
     */
    protected $heldByPokemons = [];

    /**
     * @var EvolutionChain|null
     */
    protected $babyTriggerFor;

    /**
     * @var array|ItemVersionMachine[]
     */
    protected $machines = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->cost = $data['cost'];
        $this->flingPower = $data['fling_power'];

        if (!empty($data['fling_effect'])) {
            $this->flingEffect = $this->client->flingEffect($data['fling_effect']['url']);
        }

        foreach ($data['attributes'] as $attribute) {
            $this->attributes[$attribute['name']] = $this->client->itemAttribute($attribute['url']);
        }

        $this->category = $this->client->itemCategory($data['category']);

        if (!empty($data['effect_entries'])) {
            $this->effects = new Translations($data['effect_entries'], 'effect');
            $this->shortEffects = new Translations($data['effect_entries'], 'short_effect');
        }

        $versions = [];
        $sortedFlavorTexts = [];
        foreach ($data['flavor_text_entries'] as $flavorTextEntry) {
            $versionName = $flavorTextEntry['version']['name'];

            if (empty($versions[$versionName])) {
                $versions[$versionName] = $this->client->version($flavorTextEntry['version']['url']);
                $sortedFlavorTexts[$versionName] = [];
            }

            $sortedFlavorTexts[$versionName][] = [
                'language' => $flavorTextEntry['language'],
                'flavor_text' => $flavorTextEntry['flavor_text']
            ];
        }

        foreach ($sortedFlavorTexts as $versionName => $entries) {
            $this->flavorTexts[] = new FlavorText($this->client, ['version' => $versions[$versionName], 'entries' => $entries]);
        }

        foreach ($data['game_indices'] as $gameIndex) {
            $this->gameIndices[] = new Gameindex($this->client, $gameIndex);
        }

        $this->name = new Translations($data['names'], 'name');
        $this->sprite = $data['sprites']['default'];

        foreach ($data['held_by_pokemon'] as $heldBy) {
            $this->heldByPokemons[] = new ItemPokemon($this->client, $heldBy);
        }

        if (!empty($data['baby_trigger_for'])) {
            $this->babyTriggerFor = $this->client->evolutionChain($data['baby_trigger_for']['url']);
        }

        foreach ($data['machines'] as $machine) {
            $this->machines[] = new ItemVersionMachine($this->client, $machine);
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
     * @return array|ItemAttribute[]
     */
    public function getAttributes()
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
     * @return array|FlavorText[]
     */
    public function getFlavorTexts()
    {
        return $this->flavorTexts;
    }

    /**
     * @return array|Gameindex[]
     */
    public function getGameIndices()
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
     * @return string
     */
    public function getSprite(): string
    {
        return $this->sprite;
    }

    /**
     * @return array|ItemPokemon[]
     */
    public function getHeldByPokemons()
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
     * @return array|ItemVersionMachine[]
     */
    public function getMachines()
    {
        return $this->machines;
    }
}