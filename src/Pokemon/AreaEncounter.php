<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 28.01.18
 * Time: 11:39
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AreaEncounter
 * @package PokeAPI\Pokemon
 */
class AreaEncounter
{
    /**
     * @var Area
     */
    protected $area;

    /**
     * @var ArrayCollection|VersionEncounter[]
     */
    protected $versionEncounters;

    /**
     * AreaEncounter constructor.
     */
    public function __construct()
    {
        $this->versionEncounters = new ArrayCollection();
    }

    /**
     * @return Area
     */
    public function getArea(): Area
    {
        return $this->area;
    }

    /**
     * @return ArrayCollection|VersionEncounter[]
     */
    public function getVersionEncounters(): ArrayCollection
    {
        return $this->versionEncounters;
    }
}