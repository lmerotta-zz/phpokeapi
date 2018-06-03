<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 03.06.18
 * Time: 22:54
 */

namespace PokeAPI\Pokemon;

use PokeAPI\Translations;

/**
 * Class ContestType
 * @package PokeAPI\Pokemon
 */
class ContestType
{

    const POKEAPI_ENDPOINT = 'contest-type';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var BerryFlavor
     */
    protected $berryFlavor;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var Translations
     */
    protected $colorNames;

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
     * @return BerryFlavor
     */
    public function getBerryFlavor(): BerryFlavor
    {
        return $this->berryFlavor;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return Translations
     */
    public function getColorNames(): Translations
    {
        return $this->colorNames;
    }
}