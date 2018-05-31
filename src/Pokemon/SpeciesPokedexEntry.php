<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 12:59
 */

namespace PokeAPI\Pokemon;

/**
 * Class SpeciesPokedexEntry
 * @package PokeAPI\Pokemon
 */
class SpeciesPokedexEntry
{
    /**
     * @var integer
     */
    protected $number;

    /**
     * @var Pokedex
     */
    protected $pokedex;

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return Pokedex
     */
    public function getPokedex(): Pokedex
    {
        return $this->pokedex;
    }
}