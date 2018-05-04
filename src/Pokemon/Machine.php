<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 21:52
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Machine
 * @package PokeAPI\Pokemon
 */
class Machine extends Resource
{
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
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->item = $this->client->item($data['item']['url']);
        $this->move = $this->client->move($data['move']['url']);
        $this->versionGroup = $this->client->versionGroup($data['version_group']['url']);
    }

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