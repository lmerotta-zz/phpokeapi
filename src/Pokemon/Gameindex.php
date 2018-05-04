<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 20:46
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Gameindex
 * @package PokeAPI\Pokemon
 */
class Gameindex extends Resource
{
    /**
     * @var integer
     */
    protected $index;

    /**
     * @var Generation
     */
    protected $generation;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->index = $data['game_index'];
        $this->generation = $this->client->generation($data['generation']['url']);
    }

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @return Generation
     */
    public function getGeneration(): Generation
    {
        return $this->generation;
    }
}