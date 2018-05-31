<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 07:28
 */

namespace PokeAPI\Pokemon;

/**
 * Class Variety
 * @package PokeAPI\Pokemon
 */
class Variety
{
    /**
     * @var boolean
     */
    protected $default;

    /**
     * @var Pokemon
     */
    protected $pokemon;

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @return Pokemon
     */
    public function getPokemon(): Pokemon
    {
        return $this->pokemon;
    }
}