<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 23.12.17
 * Time: 16:44
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ChainLink
 * @package PokeAPI\Pokemon
 */
class ChainLink extends Resource
{
    /**
     * @var boolean
     */
    protected $baby;

    /**
     * @var Species
     */
    protected $species;

    /**
     * @var array|EvolutionDetails[]
     */
    protected $details = [];

    /**
     * @var array|ChainLink[]
     */
    protected $evolutions = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->baby = $data['is_baby'];
        $this->species = $this->client->species($data['species']['url']);

        foreach ($data['evolution_details'] as $evolutionDetail) {
            $this->details[] = new EvolutionDetails($this->client, $evolutionDetail);
        }

        foreach ($data['evolves_to'] as $evolution) {
            $this->evolutions[] = new ChainLink($this->client, $evolution);
        }
    }

    /**
     * @return bool
     */
    public function isBaby(): bool
    {
        return $this->baby;
    }

    /**
     * @return Species
     */
    public function getSpecies(): Species
    {
        return $this->species;
    }

    /**
     * @return array|EvolutionDetails[]
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @return array|ChainLink[]
     */
    public function getEvolutions()
    {
        return $this->evolutions;
    }
}