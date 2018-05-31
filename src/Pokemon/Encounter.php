<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 18:48
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Encounter
 * @package PokeAPI\Pokemon
 */
class Encounter
{

    /**
     * @var integer
     */
    protected $minLevel;

    /**
     * @var integer
     */
    protected $maxLevel;

    /**
     * @var ArrayCollection|EncounterConditionValue[]
     */
    protected $conditionValues;

    /**
     * @var integer
     */
    protected $chancePercent;

    /**
     * @var EncounterMethod
     */
    protected $method;

    /**
     * Encounter constructor.
     */
    public function __construct()
    {
        $this->conditionValues = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    /**
     * @return int
     */
    public function getMaxLevel(): int
    {
        return $this->maxLevel;
    }

    /**
     * @return ArrayCollection|EncounterConditionValue[]
     */
    public function getConditionValues(): ArrayCollection
    {
        return $this->conditionValues;
    }

    /**
     * @return int
     */
    public function getChancePercent(): int
    {
        return $this->chancePercent;
    }

    /**
     * @return EncounterMethod
     */
    public function getMethod(): EncounterMethod
    {
        return $this->method;
    }
}