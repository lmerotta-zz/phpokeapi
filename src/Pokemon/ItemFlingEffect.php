<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 26.12.17
 * Time: 11:56
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class ItemFlingEffect
 * @package PokeAPI\Pokemon
 */
class ItemFlingEffect
{

    const POKEAPI_ENDPOINT = 'item-fling-effect';

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
    protected $effects;

    /**
     * @var ArrayCollection]Item[]
     */
    protected $items = [];

    /**
     * ItemFlingEffect constructor.
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
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
    public function getEffects(): Translations
    {
        return $this->effects;
    }

    /**
     * @return ArrayCollection|Item[]
     */
    public function getItems(): ArrayCollection
    {
        return $this->items;
    }
}