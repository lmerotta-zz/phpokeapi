<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 21:52
 */

namespace PokeAPI\Pokemon;

/**
 * Class Machine
 * @package PokeAPI\Pokemon
 */
class Machine
{

    const POKEAPI_ENDPOINT = 'machine';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var Item
     */
    protected $item;

    /**
     * @var Move
     */
    protected $move;

    /**
     * @var VersionGroup
     */
    protected $versionGroup;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->item;
    }

    /**
     * @return Move
     */
    public function getMove(): Move
    {
        return $this->move;
    }

    /**
     * @return VersionGroup
     */
    public function getVersionGroup(): VersionGroup
    {
        return $this->versionGroup;
    }
}