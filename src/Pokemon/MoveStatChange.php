<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 22:26
 */

namespace PokeAPI\Pokemon;

/**
 * Class MoveStatChange
 * @package PokeAPI\Pokemon
 */
class MoveStatChange
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