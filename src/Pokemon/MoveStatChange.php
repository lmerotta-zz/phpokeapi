<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 22:26
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class MoveStatChange
 * @package PokeAPI\Pokemon
 */
class MoveStatChange extends Resource
{
    /**
     * @var integer
     */
    protected $change;

    /**
     * @var Stat
     */
    protected $stat;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->change = $data['change'];
        $this->stat = $this->client->stat($data['stat']['url']);
    }

    /**
     * @return int
     */
    public function getChange(): int
    {
        return $this->change;
    }

    /**
     * @return Stat
     */
    public function getStat(): Stat
    {
        return $this->stat;
    }
}