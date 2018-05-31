<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 12:59
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PokedexEntry
 * @package PokeAPI\Pokemon
 */
class PokedexEntry
{
    /**
     * @var integer
     */
    protected $number;

    /**
     * @var Species
     */
    protected $species;

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return Species
     */
    public function getSpecies(): Species
    {
        return $this->species;
    }
}