<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 04.05.18
 * Time: 14:08
 */

namespace PokeAPI\Pokemon;

/**
 * Class MoveStatAffect
 * @package PokeAPI\Pokemon
 */
class MoveStatAffect
{
    /**
     * @var integer
     */
    protected $amount;

    /**
     * @var Move
     */
    protected $move;

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return Move
     */
    public function getMove(): Move
    {
        return $this->move;
    }
}