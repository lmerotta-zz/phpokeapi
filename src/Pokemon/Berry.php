<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 21:53
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Berry
 * @package PokeAPI\Pokemon
 */
class Berry
{

    const POKEAPI_ENDPOINT = 'berry';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $growthTime;

    /**
     * @var integer
     */
    protected $maxHarvest;

    /**
     * @var integer
     */
    protected $naturalGiftPower;

    /**
     * @var integer
     */
    protected $size;

    /**
     * @var integer
     */
    protected $smoothness;

    /**
     * @var integer
     */
    protected $soilDryness;

    /**
     * @var BerryFirmness
     */
    protected $firmness;

    /**
     * @var ArrayCollection|BerryFlavorMap[]
     */
    protected $flavors;

    /**
     * @var Item
     */
    protected $item;

    /**
     * @var Type
     */
    protected $naturalGiftType;

    /**
     * Berry constructor.
     */
    public function __construct()
    {
        $this->flavors = new ArrayCollection();
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
     * @return int
     */
    public function getGrowthTime(): int
    {
        return $this->growthTime;
    }

    /**
     * @return int
     */
    public function getMaxHarvest(): int
    {
        return $this->maxHarvest;
    }

    /**
     * @return int
     */
    public function getNaturalGiftPower(): int
    {
        return $this->naturalGiftPower;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getSmoothness(): int
    {
        return $this->smoothness;
    }

    /**
     * @return int
     */
    public function getSoilDryness(): int
    {
        return $this->soilDryness;
    }

    /**
     * @return BerryFirmness
     */
    public function getFirmness(): BerryFirmness
    {
        return $this->firmness;
    }

    /**
     * @return ArrayCollection|BerryFlavorMap[]
     */
    public function getFlavors(): ArrayCollection
    {
        return $this->flavors;
    }

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->item;
    }

    /**
     * @return Type
     */
    public function getNaturalGiftType(): Type
    {
        return $this->naturalGiftType;
    }
}