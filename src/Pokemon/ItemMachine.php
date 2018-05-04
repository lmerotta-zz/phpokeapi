<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 27.12.17
 * Time: 15:26
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ItemMachine
 * @package PokeAPI\Pokemon
 */
class ItemMachine extends Resource
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
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->machine = $this->client->machine($data['machine']['url']);
        $this->versionGroup = $this->client->versionGroup($data['version_group']['url']);
    }

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