<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.02.18
 * Time: 22:43
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class VersionEncounter
 * @package PokeAPI\Pokemon
 */
class VersionEncounter
{

    /**
     * @var Version
     */
    protected $version;

    /**
     * @var integer
     */
    protected $maxChance;

    /**
     * @var ArrayCollection|Encounter[]
     */
    protected $encounters;

    /**
     * VersionEncounter constructor.
     */
    public function __construct()
    {
        $this->encounters = new ArrayCollection();
    }

    /**
     * @return Version
     */
    public function getVersion(): Version
    {
        return $this->version;
    }

    /**
     * @return int
     */
    public function getMaxChance(): int
    {
        return $this->maxChance;
    }

    /**
     * @return ArrayCollection|Encounter[]
     */
    public function getEncounters(): ArrayCollection
    {
        return $this->encounters;
    }
}