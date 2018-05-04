<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 30.01.18
 * Time: 07:28
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PokemonMove
 * @package PokeAPI\Pokemon
 */
class PokemonMove extends Resource
{
    /**
     * @var Move
     */
    protected $move;

    /**
     * @var array|VersionGroupPokemonMove[]
     */
    protected $versionPokemonMoves = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->move = $this->client->move($data['move']['url']);

        foreach ($data['version_group_details'] as $detail) {
            $this->versionPokemonMoves[] = new VersionGroupPokemonMove($this->client, $detail);
        }
    }

    /**
     * @return Move
     */
    public function getMove(): Move
    {
        return $this->move;
    }

    /**
     * @return array|VersionGroupPokemonMove[]
     */
    public function getVersionPokemonMoves()
    {
        return $this->versionPokemonMoves;
    }
}