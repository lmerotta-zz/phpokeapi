<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 13:05
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Color
 * @package PokeAPI\Pokemon
 */
class Color
{

    const POKEAPI_ENDPOINT = 'pokemon-color';

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
     * @var ArrayCollection|Species[]
     */
    protected $species;

    /**
     * Color constructor.
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