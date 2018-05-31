<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 27.12.17
 * Time: 15:26
 */

namespace PokeAPI\Pokemon;

/**
 * Class ItemMachine
 * @package PokeAPI\Pokemon
 */
class ItemMachine
{
    /**
     * @var Machine
     */
    protected $machine;

    /**
     * @var VersionGroup
     */
    protected $versionGroup;

    /**
     * @return Machine
     */
    public function getMachine(): Machine
    {
        return $this->machine;
    }

    /**
     * @return VersionGroup
     */
    public function getVersionGroup(): VersionGroup
    {
        return $this->versionGroup;
    }
}