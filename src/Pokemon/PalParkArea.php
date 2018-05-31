<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 23.12.17
 * Time: 16:48
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class PalParkArea
 * @package PokeAPI\Pokemon
 */
class PalParkArea
{

    const POKEAPI_ENDPOINT = 'pal-park-area';

    /**
     * @var string
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
     * @var ArrayCollection|PalParkEncounterSpecies[]
     */
    protected $encounters;

    /**
     * PalParkArea constructor.
     */
    public function __construct()
    {
        $this->encounters = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getId(): string
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
     * @return ArrayCollection|PalParkEncounterSpecies[]
     */
    public function getEncounters(): ArrayCollection
    {
        return $this->encounters;
    }
}