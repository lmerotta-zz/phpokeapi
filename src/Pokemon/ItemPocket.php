<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 21:46
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class ItemPocket
 * @package PokeAPI\Pokemon
 */
class ItemPocket
{

    const POKEAPI_ENDPOINT = 'item-pocket';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|ItemCategory[]
     */
    protected $categories = [];

    /**
     * @var Translations
     */
    protected $names;

    /**
     * ItemPocket constructor.
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection();
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
     * @return ArrayCollection|ItemCategory[]
     */
    public function getCategories(): ArrayCollection
    {
        return $this->categories;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}