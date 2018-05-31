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
class ItemPokemon
{
    /**
     * @var Pokemon
     */
    protected $pokemon;

    /**
     * @var ArrayCollection|ItemPokemonDetails
     */
    protected $details;

    /**
     * ItemPokemon constructor.
     */
    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    /**
     * @return Pokemon
     */
    public function getPokemon(): Pokemon
    {
        return $this->pokemon;
    }

    /**
     * @return ArrayCollection|ItemPokemonDetails
     */
    public function getDetails(): ArrayCollection
    {
        return $this->details;
    }
}