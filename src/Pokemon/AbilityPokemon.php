<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 22.12.17
 * Time: 17:20
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbilityPokemon
 * @package PokeAPI\Pokemon
 */
class AbilityPokemon
{
    /**
     * @var boolean
     */
    protected $hidden;

    /**
     * @var integer
     */
    protected $slot;

    /**
     * @var Pokemon
     */
    protected $pokemon;

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * @return int
     */
    public function getSlot(): int
    {
        return $this->slot;
    }

    /**
     * @return Pokemon
     */
    public function getPokemon(): Pokemon
    {
        return $this->pokemon;
    }
}