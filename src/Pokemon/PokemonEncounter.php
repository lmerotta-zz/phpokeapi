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
class PokemonEncounter extends Resource
{
    /**
     * @var Pokemon
     */
    protected $pokemon;

    /**
     * @var array|VersionEncounter[]
     */
    protected $versionEncounters = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->pokemon = $this->client->pokemon($data['pokemon']['url']);

        foreach ($data['version_details'] as $detail) {
            $this->versionEncounters[] = new VersionEncounter($this->client, $detail);
        }
    }

    /**
     * @return Pokemon
     */
    public function getPokemon(): Pokemon
    {
        return $this->pokemon;
    }

    /**
     * @return array|VersionEncounter[]
     */
    public function getVersionEncounters()
    {
        return $this->versionEncounters;
    }
}