<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 27.12.17
 * Time: 15:24
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ItemPokemon
 * @package PokeAPI\Pokemon
 */
class ItemPokemon extends Resource
{
    /**
     * @var Pokemon
     */
    protected $pokemon;

    /**
     * @var array|ItemPokemonDetails
     */
    protected $details = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->pokemon = $this->client->pokemon($data['pokemon']['url']);

        foreach ($data['version_details'] as $details) {
            $this->details[] = new ItemPokemonDetails($this->client, $details);
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
     * @return array|ItemPokemonDetails
     */
    public function getDetails()
    {
        return $this->details;
    }
}