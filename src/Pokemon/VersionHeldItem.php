<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.02.18
 * Time: 22:56
 */

namespace PokeAPI\Pokemon;

/**
 * Class VersionHeldItem
 * @package PokeAPI\Pokemon
 */
class VersionHeldItem
{

    /**
     * @var Version
     */
    protected $version;

    /**
     * @var integer
     */
    protected $rarity;

    /**
     * @return Version
     */
    public function getVersion(): Version
    {
        return $this->version;
    }

    /**
     * @return int
     */
    public function getRarity(): int
    {
        return $this->rarity;
    }
}