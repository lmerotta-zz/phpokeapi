<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 25.12.17
 * Time: 13:50
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class EncounterMethodRate
 * @package PokeAPI\Pokemon
 */
class EncounterMethodRate
{
    /**
     * @var EncounterMethod
     */
    protected $method;

    /**
     * @var ArrayCollection|EncounterVersionRate[]
     */
    protected $versionRates;

    /**
     * EncounterMethodRate constructor.
     */
    public function __construct()
    {
        $this->versionRates = new ArrayCollection();
    }

    /**
     * @return EncounterMethod
     */
    public function getMethod(): EncounterMethod
    {
        return $this->method;
    }

    /**
     * @return ArrayCollection|EncounterVersionRate[]
     */
    public function getVersionRates(): ArrayCollection
    {
        return $this->versionRates;
    }
}