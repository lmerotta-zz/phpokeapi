<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 28.01.18
 * Time: 11:41
 */

namespace PokeAPI\Pokemon;

/**
 * Class PokemonStat
 * @package PokeAPI\Pokemon
 */
class PokemonStat
{
    /**
     * @var Stat
     */
    protected $stat;

    /**
     * @var integer
     */
    protected $effort;

    /**
     * @var integer
     */
    protected $baseStat;

    /**
     * @return Stat
     */
    public function getStat(): Stat
    {
        return $this->stat;
    }

    /**
     * @return int
     */
    public function getEffort(): int
    {
        return $this->effort;
    }

    /**
     * @return int
     */
    public function getBaseStat(): int
    {
        return $this->baseStat;
    }
}