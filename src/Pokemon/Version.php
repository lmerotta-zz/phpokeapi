<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 07:12
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Version
 * @package PokeAPI\Pokemon
 */
class Version extends Resource
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var array|VersionGroup[]
     */
    protected $versionGroups = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->names = new Translations($data['names'], 'name');

        foreach ($data['version_groups'] as $versionGroup) {
            $this->versionGroups[$versionGroup['name']] = $this->client->versionGroup($versionGroup['url']);
        }
    }

}