<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 13:07
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Shape
 * @package PokeAPI\Pokemon
 */
class Shape
{

    const POKEAPI_ENDPOINT = 'pokemon-shape';

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
    protected $awesomeNames;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var ArrayCollection|Species[]
     */
    protected $species;

    /**
     * Shape constructor.
     */
    public function __construct()
    {
        $this->species = new ArrayCollection();
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
    public function getAwesomeNames(): Translations
    {
        return $this->awesomeNames;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|Species[]
     */
    public function getSpecies(): ArrayCollection
    {
        return $this->species;
    }
}