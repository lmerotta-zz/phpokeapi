<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 22:04
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class BerryFirmness
 * @package PokeAPI\Pokemon
 */
class BerryFirmness
{

    const POKEAPI_ENDPOINT = 'berry-firmness';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|Berry[]
     */
    protected $berries;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * BerryFirmness constructor.
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
     * @return ArrayCollection|Berry[]
     */
    public function getBerries(): ArrayCollection
    {
        return $this->berries;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}