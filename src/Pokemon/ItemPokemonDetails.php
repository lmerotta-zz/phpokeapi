<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 21:56
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ItemPokemonDetails
 * @package PokeAPI\Pokemon
 */
class ItemPokemonDetails extends Resource
{
    /**
     * @var integer
     */
    protected $rarity;

    /**
     * @var Version
     */
    protected $version;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->rarity = $data['rarity'];
        $this->version = $this->client->version($data['version']['url']);
    }

    /**
     * @return int
     */
    public function getRarity(): int
    {
        return $this->rarity;
    }

    /**
     * @return Version
     */
    public function getVersion(): Version
    {
        return $this->version;
    }
}