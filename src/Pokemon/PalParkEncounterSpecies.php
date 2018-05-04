<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 26.01.18
 * Time: 17:32
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PalParkEncounterSpecies
 * @package PokeAPI\Pokemon
 */
class PalParkEncounterSpecies extends Resource
{
    /**
     * @var integer
     */
    protected $baseScore;

    /**
     * @var integer
     */
    protected $rate;

    /**
     * @var array|Species[]
     */
    protected $species = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->baseScore = $data['base_score'];
        $this->rate = $data['rate'];

        foreach ($data['pokemon_species'] as $species) {
            $this->species[$species['name']] = $this->client->species($species['url']);
        }
    }

    /**
     * @return int
     */
    public function getBaseScore(): int
    {
        return $this->baseScore;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @return array|Species[]
     */
    public function getSpecies()
    {
        return $this->species;
    }
}