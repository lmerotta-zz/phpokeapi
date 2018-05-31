<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 08:14
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class GrowthRate
 * @package PokeAPI\Pokemon
 */
class GrowthRate
{
    public const POKEAPI_ENDPOINT = 'growth-rate';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $formula;

    /**
     * @var Translations
     */
    protected $descriptions;

    /**
     * @var ArrayCollection|ExperienceLevel[]
     */
    protected $levels;

    /**
     * @var ArrayCollection|Species[]
     */
    protected $species;

    /**
     * GrowthRate constructor.
     */
    public function __construct()
    {
        $this->levels = new ArrayCollection();
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
     * @return string
     */
    public function getFormula(): string
    {
        return $this->formula;
    }

    /**
     * @return Translations
     */
    public function getDescriptions(): Translations
    {
        return $this->descriptions;
    }

    /**
     * @return ArrayCollection|ExperienceLevel[]
     */
    public function getLevels(): ArrayCollection
    {
        return $this->levels;
    }

    /**
     * @return ArrayCollection|Species[]
     */
    public function getSpecies(): ArrayCollection
    {
        return $this->species;
    }
}