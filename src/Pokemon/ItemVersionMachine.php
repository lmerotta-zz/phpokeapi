<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 21:40
 */

namespace PokeAPI\Pokemon;

/**
 * Class ItemVersionMachine
 * @package PokeAPI\Pokemon
 */
class ItemVersionMachine
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