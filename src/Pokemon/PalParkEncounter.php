<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 13:12
 */

namespace PokeAPI\Pokemon;

/**
 * Class PalParkEncounter
 * @package PokeAPI\Pokemon
 */
class PalParkEncounter
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
     * @var PalParkArea
     */
    protected $area;

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
     * @return PalParkArea
     */
    public function getArea(): PalParkArea
    {
        return $this->area;
    }
}