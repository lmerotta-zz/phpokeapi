<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 20:38
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Location
 * @package PokeAPI\Pokemon
 */
class Location
{
    public const POKEAPI_ENDPOINT = 'location';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Region
     */
    protected $region;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var ArrayCollection|GameIndex
     */
    protected $gameIndices;

    /**
     * @var ArrayCollection|Area
     */
    protected $areas;

    /**
     * Location constructor.
     */
    public function __construct()
    {
        $this->gameIndices = new ArrayCollection();
        $this->areas = new ArrayCollection();
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
     * @return Region
     */
    public function getRegion(): Region
    {
        return $this->region;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|GameIndex[]
     */
    public function getGameIndices(): ArrayCollection
    {
        return $this->gameIndices;
    }

    /**
     * @return ArrayCollection|Area[]
     */
    public function getAreas(): ArrayCollection
    {
        return $this->areas;
    }
}