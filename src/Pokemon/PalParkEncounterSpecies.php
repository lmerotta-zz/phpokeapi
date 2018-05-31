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
class PalParkEncounterSpecies
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
     * @var ArrayCollection|Species[]
     */
    protected $species;

    /**
     * PalParkEncounterSpecies constructor.
     */
    public function __construct()
    {
        $this->species = new ArrayCollection();
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
     * @return ArrayCollection|Species[]
     */
    public function getSpecies(): ArrayCollection
    {
        return $this->species;
    }
}