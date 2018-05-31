<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 04.05.18
 * Time: 14:10
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Characteristic
 * @package PokeAPI\Pokemon
 */
class Characteristic
{

    const POKEAPI_ENDPOINT = 'characteristic';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $geneModulo;

    /**
     * @var ArrayCollection|integer[]
     */
    protected $possibleValues;

    /**
     * @var Translations
     */
    protected $descriptions;

    /**
     * Characteristic constructor.
     */
    public function __construct()
    {
        $this->possibleValues = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getGeneModulo(): int
    {
        return $this->geneModulo;
    }

    /**
     * @return ArrayCollection|integer[]
     */
    public function getPossibleValues()
    {
        return $this->possibleValues;
    }

    /**
     * @return Translations
     */
    public function getDescriptions(): Translations
    {
        return $this->descriptions;
    }
}