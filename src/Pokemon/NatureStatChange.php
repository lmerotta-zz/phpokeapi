<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 03.06.18
 * Time: 16:29
 */

namespace PokeAPI\Pokemon;

/**
 * Class NatureStatChange
 * @package src\Pokemon
 */
class NatureStatChange
{

    /**
     * @var integer
     */
    protected $maxChange;

    /**
     * @var PokeathlonStat
     */
    protected $pokeathlonStat;

    /**
     * @return int
     */
    public function getMaxChange(): int
    {
        return $this->maxChange;
    }

    /**
     * @return PokeathlonStat
     */
    public function getPokeathlonStat(): PokeathlonStat
    {
        return $this->pokeathlonStat;
    }
}