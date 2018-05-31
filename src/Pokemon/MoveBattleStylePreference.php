<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 21:45
 */

namespace PokeAPI\Pokemon;

/**
 * Class MoveBattleStylePreference
 * @package PokeAPI\Pokemon
 */
class MoveBattleStylePreference
{

    /**
     * @var integer
     */
    protected $lowHpPreference;

    /**
     * @var integer
     */
    protected $highHpPreference;

    /**
     * @var MoveBattleStyle
     */
    protected $moveBattleStyle;

    /**
     * @return int
     */
    public function getLowHpPreference(): int
    {
        return $this->lowHpPreference;
    }

    /**
     * @return int
     */
    public function getHighHpPreference(): int
    {
        return $this->highHpPreference;
    }

    /**
     * @return MoveBattleStyle
     */
    public function getMoveBattleStyle(): MoveBattleStyle
    {
        return $this->moveBattleStyle;
    }
}