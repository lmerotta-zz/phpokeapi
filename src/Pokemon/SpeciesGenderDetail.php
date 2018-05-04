<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 26.12.17
 * Time: 07:57
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class SpeciesGenderDetail
 * @package PokeAPI\Pokemon
 */
class SpeciesGenderDetail extends Resource
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
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->rate = $data['rate'];
        $this->species = $this->client->species($data['pokemon_species']['url']);
    }

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