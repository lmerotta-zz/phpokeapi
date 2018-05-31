<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 26.12.17
 * Time: 13:38
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class ItemCategory
 * @package PokeAPI\Pokemon
 */
class ItemCategory
{

    const POKEAPI_ENDPOINT = 'item-category';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|Item[]
     */
    protected $items;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var ItemPocket
     */
    protected $pocket;

    /**
     * ItemCategory constructor.
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
     * @return ArrayCollection|Item[]
     */
    public function getItems(): ArrayCollection
    {
        return $this->items;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ItemPocket
     */
    public function getPocket(): ItemPocket
    {
        return $this->pocket;
    }
}