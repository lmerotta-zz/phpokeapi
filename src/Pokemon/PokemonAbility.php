<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 08.04.19
 * Time: 14:03
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PokemonAbility
 * @package PokeAPI\Pokemon
 */
class PokemonAbility
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
     * @var Ability
     */
    protected $ability;

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
     * @return Ability
     */
    public function getAbility(): Ability
    {
        return $this->ability;
    }
}