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
class Area extends Resource
{
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
     * @var array|EncounterMethodRate[]
     */
    protected $encounterMethodRates = [];

    /**
     * @var Location
     */
    protected $location;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var array|PokemonEncounter[]
     */
    protected $encounters = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->gameIndex = $data['game_index'];

        foreach ($data['encounter_method_rates'] as $encounterMethodRate) {
            $this->encounterMethodRates[] = new EncounterMethodRate($this->client, $encounterMethodRate);
        }

        $this->location = $this->client->location($data['location']['url']);

        $this->names = new Translations($data['names'], 'name');

        foreach ($data['pokemon_encounters'] as $pokemon_encounter) {
            $this->encounters[] = new PokemonEncounter($this->client, $pokemon_encounter);
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
     * @return array|EncounterMethodRate[]
     */
    public function getEncounterMethodRates()
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
     * @return array|PokemonEncounter[]
     */
    public function getEncounters()
    {
        return $this->encounters;
    }
}