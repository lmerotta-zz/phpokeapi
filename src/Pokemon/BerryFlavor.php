<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 22:09
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class BerryFlavor
 * @package PokeAPI\Pokemon
 */
class BerryFlavor
{

    const POKEAPI_ENDPOINT = 'berry-flavor';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|FlavorBerryMap[]
     */
    protected $berries;

    /**
     * @var ContestType
     */
    protected $contestType;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * BerryFlavor constructor.
     */
    public function __construct()
    {
        $this->berries = new ArrayCollection();
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
     * @return ArrayCollection|FlavorBerryMap[]
     */
    public function getBerries(): ArrayCollection
    {
        return $this->berries;
    }

    /**
     * @return ContestType
     */
    public function getContestType(): ContestType
    {
        return $this->contestType;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}