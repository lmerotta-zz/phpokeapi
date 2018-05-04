<?php

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Species
 * @package PokeAPI\Pokemon
 */
class Species extends Resource
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
     * @var array|PokedexEntry[]
     */
    protected $pokedexEntries = [];

    /**
     * @var array|EggGroup[]
     */
    protected $eggGroups = [];

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
     * @var array|PalParkEncounter[]
     */
    protected $palParkEncounters = [];

    /**
     * @var array|FlavorText[]
     */
    protected $flavorTexts = [];

    /**
     * @var Translations
     */
    protected $formDescriptions;

    /**
     * @var Translations
     */
    protected $genera;

    /**
     * @var array|Variety[]
     */
    protected $varieties = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->order = $data['order'];
        $this->genderRate = floatval(($data['gender_rate'] / 8) * 100.0);
        $this->captureRate = $data['capture_rate'];
        $this->baseHappiness = $data['base_happiness'];
        $this->baby = $data['is_baby'];
        $this->hatchCounter = 255 * ($data['hatch_counter'] + 1);
        $this->genderDifferences = $data['has_gender_differences'];
        $this->formsSwitchable = $data['forms_switchable'];
        $this->growthRate = $this->client->growthRate($data['growth_rate']['url']);

        foreach ($data['pokedex_numbers'] as $pokedexEntry) {
            $this->pokedexEntries[$pokedexEntry['name']] = new PokedexEntry($this->client, $pokedexEntry);
        }

        foreach ($data['egg_groups'] as $eggGroup) {
            $this->eggGroups[$eggGroup['name']] = $this->client->eggGroup($eggGroup['url']);
        }

        $this->color = $this->client->color($data['color']['url']);
        $this->shape = $this->client->shape($data['shape']['url']);

        if (!empty($data['evolves_from_species'])) {
            $this->evolutionOf = $this->client->species($data['evolves_from_species']['url']);
        }

        $this->evolutionChain = $this->client->evolutionChain($data['evolution_chain']['url']);

        if (!empty($data['habitat'])) {
            $this->habitat = $this->client->habitat($data['habitat']['url']);
        }

        $this->generation = $this->client->generation($data['generation']['url']);
        $this->names = new Translations($data['names'], 'name');

        foreach ($data['pal_park_encounters'] as $encounter) {
            $this->palParkEncounters = new PalParkEncounter($this->client, $encounter);
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

        $this->formDescriptions = new Translations($data['form_descriptions'], 'description');
        $this->genera = new Translations($data['genera'], 'genus');

        foreach ($data['varieties'] as $variety) {
            $this->varieties[] = new Variety($this->client, $variety);
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
     * @return array|PokedexEntry[]
     */
    public function getPokedexEntries() : array
    {
        return $this->pokedexEntries;
    }

    /**
     * @return array|EggGroup[]
     */
    public function getEggGroups() : array
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
     * @return array|PalParkEncounter[]
     */
    public function getPalParkEncounters() : array
    {
        return $this->palParkEncounters;
    }

    /**
     * @return array|FlavorText[]
     */
    public function getFlavorTexts() : array
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
     * @return array|Variety[]
     */
    public function getVarieties() : array
    {
        return $this->varieties;
    }

}