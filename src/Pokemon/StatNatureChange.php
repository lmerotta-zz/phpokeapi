<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 03.06.18
 * Time: 16:29
 */

namespace PokeAPI\Pokemon;

/**
 * Class StatNatureChange
 * @package src\Pokemon
 */
class StatNatureChange
{

    /**
     * @var integer
     */
    protected $maxChange;

    /**
     * @var Nature
     */
    protected $nature;

    /**
     * @return int
     */
    public function getMaxChange(): int
    {
        return $this->maxChange;
    }

    /**
     * @return Nature
     */
    public function getNature(): Nature
    {
        return $this->nature;
    }
}