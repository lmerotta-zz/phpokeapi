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
 * Class AbilityItem
 * @package PokeAPI\Pokemon
 */
class AbilityItem
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