<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 26.12.17
 * Time: 13:32
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class ItemAttribute
 * @package PokeAPI\Pokemon
 */
class ItemAttribute
{

    const POKEAPI_ENDPOINT = 'item-attribute';

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
     * @var Translations
     */
    protected $descriptions;

    /**
     * ItemAttribute constructor.
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
     * @return Translations
     */
    public function getDescriptions(): Translations
    {
        return $this->descriptions;
    }
}