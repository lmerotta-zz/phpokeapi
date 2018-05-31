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
class Version
{

    const POKEAPI_ENDPOINT = 'version';

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
     * @var ArrayCollection|VersionGroup[]
     */
    protected $versionGroups;

    /**
     * Version constructor.
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
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|VersionGroup[]
     */
    public function getVersionGroups(): ArrayCollection
    {
        return $this->versionGroups;
    }
}