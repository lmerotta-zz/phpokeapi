<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.02.18
 * Time: 22:58
 */

namespace PokeAPI\Pokemon;

/**
 * Class VersionGroupPokemonMove
 * @package PokeAPI\Pokemon
 */
class VersionGroupPokemonMove
{

    /**
     * @var MoveLearnMethod
     */
    protected $moveLearnMethod;

    /**
     * @var VersionGroup
     */
    protected $versionGroup;

    /**
     * @var integer
     */
    protected $learnLevel;

    /**
     * @return MoveLearnMethod
     */
    public function getMoveLearnMethod(): MoveLearnMethod
    {
        return $this->moveLearnMethod;
    }

    /**
     * @return VersionGroup
     */
    public function getVersionGroup(): VersionGroup
    {
        return $this->versionGroup;
    }

    /**
     * @return int
     */
    public function getLearnLevel(): int
    {
        return $this->learnLevel;
    }
}