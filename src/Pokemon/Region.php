<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 13:32
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Region
 * @package PokeAPI\Pokemon
 */
class Region extends Resource
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
     * @var array|Location[]
     */
    protected $locations = [];

    /**
     * @var Generation
     */
    protected $mainGeneration;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var array|Pokedex[]
     */
    protected $pokedexes = [];

    /**
     * @var array|VersionGroup[]
     */
    protected $versionGroups;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];

        foreach ($data['locations'] as $location) {
            $this->locations[$location['name']] = $this->client->location($location['url']);
        }

        $this->mainGeneration = $this->client->generation($data['main_generation']['name']);
        $this->names = new Translations($data['names'], 'name');

        foreach ($data['pokedexes'] as $pokedex) {
            $this->pokedexes[$pokedex['name']] = $this->client->pokedex($pokedex['url']);
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
     * @return array|Location[]
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * @return Generation
     */
    public function getMainGeneration(): Generation
    {
        return $this->mainGeneration;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return array|Pokedex[]
     */
    public function getPokedexes()
    {
        return $this->pokedexes;
    }

    /**
     * @return array|VersionGroup[]
     */
    public function getVersionGroups()
    {
        return $this->versionGroups;
    }
}