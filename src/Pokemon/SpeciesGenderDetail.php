<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 26.12.17
 * Time: 07:57
 */

namespace PokeAPI\Pokemon;

/**
 * Class SpeciesGenderDetail
 * @package PokeAPI\Pokemon
 */
class SpeciesGenderDetail
{
    /**
     * @var integer
     */
    protected $rate;

    /**
     * @var Species
     */
    protected $species;

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @return Species
     */
    public function getSpecies(): Species
    {
        return $this->species;
    }
}