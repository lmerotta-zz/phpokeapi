<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 08.01.18
 * Time: 17:42
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class MoveCategory
 * @package PokeAPI\Pokemon
 */
class MoveCategory
{

    const POKEAPI_ENDPOINT = 'move-category';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|Move[]
     */
    protected $moves = [];

    /**
     * MoveCategory constructor.
     */
    public function __construct()
    {
        $this->moves = new ArrayCollection();
    }

    /**
     * @var Translations
     */
    protected $descriptions;

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
     * @return ArrayCollection|Move[]
     */
    public function getMoves(): ArrayCollection
    {
        return $this->moves;
    }

    /**
     * @return Translations
     */
    public function getDescriptions(): Translations
    {
        return $this->descriptions;
    }
}