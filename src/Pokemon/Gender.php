<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 25.12.17
 * Time: 14:03
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Gender
 * @package PokeAPI\Pokemon
 */
class Gender
{

    const POKEAPI_ENDPOINT = 'gender';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|SpeciesGenderDetail[]
     */
    protected $speciesGenderDetails;

    /**
     * @var ArrayCollection|Species[]
     */
    protected $requiredForEvolution;

    /**
     * Gender constructor.
     */
    public function __construct()
    {
        $this->speciesGenderDetails = new ArrayCollection();
        $this->requiredForEvolution = new ArrayCollection();
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
     * @return ArrayCollection|SpeciesGenderDetail[]
     */
    public function getSpeciesGenderDetails(): ArrayCollection
    {
        return $this->speciesGenderDetails;
    }

    /**
     * @return ArrayCollection|Species[]
     */
    public function getRequiredForEvolution(): ArrayCollection
    {
        return $this->requiredForEvolution;
    }
}