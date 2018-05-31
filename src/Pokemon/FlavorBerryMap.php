<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 22:03
 */

namespace PokeAPI\Pokemon;

/**
 * Class FlavorBerryMap
 * @package PokeAPI\Pokemon
 */
class FlavorBerryMap
{

    /**
     * @var integer
     */
    protected $potency;

    /**
     * @var Berry
     */
    protected $berry;

    /**
     * @return int
     */
    public function getPotency(): int
    {
        return $this->potency;
    }

    /**
     * @return Berry
     */
    public function getFlavor(): Berry
    {
        return $this->berry;
    }
}