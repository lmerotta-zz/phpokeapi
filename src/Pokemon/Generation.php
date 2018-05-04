<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 13:11
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Generation
 * @package PokeAPI\Pokemon
 */
class Generation extends Resource
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
     * @var array|Ability
     */
    protected $abilities = [];

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var Region
     */
    protected $mainRegion;

    /**
     * @var array|Move[]
     */
    protected $moves = [];

    /**
     * @var array|Species[]
     */
    protected $species = [];

    /**
     * @var array|Type[]
     */
    protected $types = [];

    /**
     * @var array|VersionGroup
     */
    protected $versionGroups = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];

        foreach ($data['abilities'] as $ability) {
            $this->abilities[$ability['name']] = $this->client->ability($ability['url']);
        }

        $this->names = new Translations($data['names'], 'name');
        $this->mainRegion = $this->client->region($data['region']['url']);

        foreach ($data['moves'] as $move) {
            $this->moves[$move['name']] = $this->client->move($move['url']);
        }
        
        foreach ($data['pokemon_species'] as $species) {
            $this->species[$species['name']] = $this->client->species($species['url']);
        }

        foreach ($data['types'] as $type) {
            $this->types[$type['name']] = $this->client->type($type['url']);
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
     * @return array|Ability
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return Region
     */
    public function getMainRegion(): Region
    {
        return $this->mainRegion;
    }

    /**
     * @return array|Move[]
     */
    public function getMoves()
    {
        return $this->moves;
    }

    /**
     * @return array|Species[]
     */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * @return array|Type[]
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @return array|VersionGroup
     */
    public function getVersionGroups()
    {
        return $this->versionGroups;
    }
}