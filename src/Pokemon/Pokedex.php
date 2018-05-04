<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 13:14
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Pokedex
 * @package PokeAPI\Pokemon
 */
class Pokedex extends Resource
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
     * @var Translations
     */
    protected $descriptions;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var array|PokedexEntry[]
     */
    protected $pokedexEntries = [];

    /**
     * @var Region|null
     */
    protected $region;

    /**
     * @var array|VersionGroup[]
     */
    protected $versionGroups = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->mainSeries = $data['is_main_series'];
        $this->descriptions = new Translations($data['descriptions'], 'description');
        $this->names = new Translations($data['names'], 'name');

        foreach ($data['pokemon_entries'] as $pokedexEntry) {
            $this->pokedexEntries[$pokedexEntry['name']] = new PokedexEntry($this->client, $pokedexEntry);
        }

        if (!empty($data['region'])) {
            $this->region = $this->client->region($data['region']['url']);
        }

        foreach ($data['version_groups'] as $versionGroup) {
            $this->versionGroups[$versionGroup['name']] = $this->client->versionGroup($versionGroup['url']);
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
     * @return Translations
     */
    public function getDescriptions(): Translations
    {
        return $this->descriptions;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return array|PokedexEntries[]
     */
    public function getPokedexEntries() : array
    {
        return $this->pokedexEntries;
    }

    /**
     * @return Region|null
     */
    public function getRegion(): ?Region
    {
        return $this->region;
    }

    /**
     * @return array|VersionGroup[]
     */
    public function getVersionGroups() : array
    {
        return $this->versionGroups;
    }
}