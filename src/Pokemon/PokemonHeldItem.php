<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 30.01.18
 * Time: 07:23
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PokemonHeldItem
 * @package PokeAPI\Pokemon
 */
class PokemonHeldItem
{
    /**
     * @var Item
     */
    protected $item;

    /**
     * @var ArrayCollection|VersionHeldItem[]
     */
    protected $versionHeldItems;

    public function __construct()
    {
        $this->versionHeldItems = new ArrayCollection();
    }

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->item;
    }

    /**
     * @return ArrayCollection|VersionHeldItem[]
     */
    public function getVersionHeldItems(): ArrayCollection
    {
        return $this->versionHeldItems;
    }
}