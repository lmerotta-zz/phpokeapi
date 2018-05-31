<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 22:03
 */

namespace PokeAPI\Pokemon;

/**
 * Class BerryFlavorMap
 * @package PokeAPI\Pokemon
 */
class BerryFlavorMap
{

    /**
     * @var integer
     */
    protected $potency;

    /**
     * @var BerryFlavor
     */
    protected $flavor;

    /**
     * @return int
     */
    public function getPotency(): int
    {
        return $this->potency;
    }

    /**
     * @return BerryFlavor
     */
    public function getFlavor(): BerryFlavor
    {
        return $this->flavor;
    }
}