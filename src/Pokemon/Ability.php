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
class Ability extends Resource
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
     * @var boolean
     */
    protected $mainSeries;

    /**
     * @var Generation
     */
    protected $generation = null;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var Translations|null
     */
    protected $effects;

    /**
     * @var Translations|null
     */
    protected $shortEffects;

    /**
     * @var array|EffectChange[]
     */
    protected $effectChanges = [];

    /**
     * @var array|AbilityFlavorText[]
     */
    protected $flavorTexts = [];

    /**
     * @var array|AbilityPokemon
     */
    protected $pokemons = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->mainSeries = $data['is_main_series'];
        $this->generation = $this->client->generation($data['generation']['url']);
        $this->names = new Translations($data['names'], 'name');

        // For short_effect and effect, we assume that since the first item in the array has a key and it is not empty
        // Every item in the array has it
        if (!empty($data['effect_entries'][0]['effect'])) {
            $this->effects = new Translations($data['effect_entries'], 'effect');
        }

        if (!empty($data['effect_entries'][0]['short_effect'])) {
            $this->shortEffects = new Translations($data['effect_entries'], 'short_effect');
        }

        foreach ($data['effect_changes'] as $effectChange) {
            $this->effectChanges[] = new EffectChange($this->client, $effectChange);
        }

        $versionGroups = [];
        $sortedFlavorTextEntries = [];
        foreach ($data['flavor_text_entries'] as $flavorTextEntry) {
            $versionGroupName = $flavorTextEntry['version_group']['name'];
            if (empty($sortedFlavorTextEntries[$versionGroupName])) {
                $sortedFlavorTextEntries[$versionGroupName] = [];
                $versionGroups[$versionGroupName] = $flavorTextEntry['version_group'];
            }

            $sortedFlavorTextEntries[$versionGroupName][] = $flavorTextEntry;
        }

        foreach ($versionGroups as $versionGroupName => $versionGroup) {
            $this->flavorTexts[] = new AbilityFlavorText($this->client, ['version' => $versionGroup, 'entries' => $sortedFlavorTextEntries[$versionGroupName]]);
        }

        foreach ($data['pokemon'] as $pokemon) {
            $this->pokemons[] = new AbilityPokemon($this->client, $pokemon);
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
     * @return Translations|null
     */
    public function getEffects(): ?Translations
    {
        return $this->effects;
    }

    /**
     * @return Translations|null
     */
    public function getShortEffects(): ?Translations
    {
        return $this->shortEffects;
    }

    /**
     * @return array|EffectChange[]
     */
    public function getEffectChanges()
    {
        return $this->effectChanges;
    }

    /**
     * @return array|AbilityFlavorText[]
     */
    public function getFlavorTexts()
    {
        return $this->flavorTexts;
    }

    /**
     * @return array|AbilityPokemon
     */
    public function getPokemons()
    {
        return $this->pokemons;
    }
}