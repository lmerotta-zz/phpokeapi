<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 25.12.17
 * Time: 13:51
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PokemonEncounter
 * @package PokeAPI\Pokemon
 */
class PokemonEncounter
{
    /**
     * @var Pokemon
     */
    protected $pokemon;

    /**
     * @var ArrayCollection|VersionEncounter[]
     */
    protected $versionEncounters;

    /**
     * PokemonEncounter constructor.
     */
    public function __construct()
    {
        $this->versionEncounters = new ArrayCollection();
    }

    /**
     * @return Pokemon
     */
    public function getPokemon(): Pokemon
    {
        return $this->pokemon;
    }

    /**
     * @return ArrayCollection|VersionEncounter[]
     */
    public function getVersionEncounters(): ArrayCollection
    {
        return $this->versionEncounters;
    }
}