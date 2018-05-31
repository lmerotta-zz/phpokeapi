<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 30.01.18
 * Time: 07:31
 */

namespace PokeAPI\Pokemon;

/**
 * Class PokemonType
 * @package PokeAPI\Pokemon
 */
class PokemonType
{
    /**
     * @var integer
     */
    protected $slot;

    /**
     * @var Type
     */
    protected $type;

    /**
     * @return int
     */
    public function getSlot(): int
    {
        return $this->slot;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }
}