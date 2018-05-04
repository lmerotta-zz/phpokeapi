<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 13:12
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PalParkEncounter
 * @package PokeAPI\Pokemon
 */
class PalParkEncounter extends Resource
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
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->baseScore = $data['base_score'];
        $this->rate = $data['rate'];
        $this->area = new PalParkArea($this->client, $data['area']);
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
     * @return PalParkArea
     */
    public function getArea(): PalParkArea
    {
        return $this->area;
    }
}