<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 23.12.17
 * Time: 15:35
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class MoveLearnMethod
 * @package PokeAPI\Pokemon
 */
class MoveLearnMethod extends Resource
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
    protected $descriptions;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var array|VersionGroup
     */
    protected $versionGroups = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->descriptions = new Translations($data['descriptions'], 'description');
        $this->names = new Translations($data['names'], 'name');

        foreach ($data['version_groups'] as $versionGroup) {
            $this->versionGroups[$versionGroup['name']] = $this->client->versionGroup($versionGroup['url']);
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Translations
     */
    public function getDescriptions(): Translations
    {
        return $this->descriptions;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return array|VersionGroup
     */
    public function getVersionGroups()
    {
        return $this->versionGroups;
    }
}