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
class Generation
{
    public const POKEAPI_ENDPOINT = 'generation';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|Ability
     */
    protected $abilities;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var Region
     */
    protected $region;

    /**
     * @var ArrayCollection|Move[]
     */
    protected $moves;

    /**
     * @var ArrayCollection|Species[]
     */
    protected $species;

    /**
     * @var ArrayCollection|Type[]
     */
    protected $types;

    /**
     * @var ArrayCollection|VersionGroup
     */
    protected $versionGroups;

    /**
     * Generation constructor.
     */
    public function __construct()
    {
        $this->versionGroups = new ArrayCollection();
        $this->types = new ArrayCollection();
        $this->species = new ArrayCollection();
        $this->moves = new ArrayCollection();
        $this->abilities = new ArrayCollection();
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
     * @return ArrayCollection|Ability
     */
    public function getAbilities(): ArrayCollection
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
    public function getRegion(): Region
    {
        return $this->region;
    }

    /**
     * @return ArrayCollection|Move[]
     */
    public function getMoves(): ArrayCollection
    {
        return $this->moves;
    }

    /**
     * @return ArrayCollection|Species[]
     */
    public function getSpecies(): ArrayCollection
    {
        return $this->species;
    }

    /**
     * @return ArrayCollection|Type[]
     */
    public function getTypes(): ArrayCollection
    {
        return $this->types;
    }

    /**
     * @return ArrayCollection|VersionGroup
     */
    public function getVersionGroups(): ArrayCollection
    {
        return $this->versionGroups;
    }
}