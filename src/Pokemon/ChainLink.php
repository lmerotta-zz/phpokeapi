<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 23.12.17
 * Time: 16:44
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ChainLink
 * @package PokeAPI\Pokemon
 */
class ChainLink
{
    /**
     * @var boolean
     */
    protected $baby;

    /**
     * @var Species
     */
    protected $species;

    /**
     * @var ArrayCollection|EvolutionDetails[]
     */
    protected $details;

    /**
     * @var ArrayCollection|ChainLink[]
     */
    protected $evolutions;

    /**
     * ChainLink constructor.
     */
    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->evolutions = new ArrayCollection();
    }

    /**
     * @return bool
     */
    public function isBaby(): bool
    {
        return $this->baby;
    }

    /**
     * @return Species
     */
    public function getSpecies(): Species
    {
        return $this->species;
    }

    /**
     * @return ArrayCollection|EvolutionDetails[]
     */
    public function getDetails(): ArrayCollection
    {
        return $this->details;
    }

    /**
     * @return ArrayCollection|ChainLink[]
     */
    public function getEvolutions(): ArrayCollection
    {
        return $this->evolutions;
    }
}