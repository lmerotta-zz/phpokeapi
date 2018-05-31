<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 21:56
 */

namespace PokeAPI\Pokemon;

/**
 * Class ItemPokemonDetails
 * @package PokeAPI\Pokemon
 */
class ItemPokemonDetails
{
    /**
     * @var integer
     */
    protected $rarity;

    /**
     * @var Version
     */
    protected $version;

    /**
     * @return int
     */
    public function getRarity(): int
    {
        return $this->rarity;
    }

    /**
     * @return Version
     */
    public function getVersion(): Version
    {
        return $this->version;
    }
}