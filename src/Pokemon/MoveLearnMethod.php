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
class MoveLearnMethod
{

    const POKEAPI_ENDPOINT = 'move-learn-method';

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
     * @var ArrayCollection|VersionGroup
     */
    protected $versionGroups = [];

    /**
     * MoveLearnMethod constructor.
     */
    public function __construct()
    {
        $this->versionGroups = new ArrayCollection();
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
     * @return ArrayCollection|VersionGroup
     */
    public function getVersionGroups(): ArrayCollection
    {
        return $this->versionGroups;
    }
}