<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 25.12.17
 * Time: 14:03
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Gender
 * @package PokeAPI\Pokemon
 */
class Gender extends Resource
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array|SpeciesGenderDetail[]
     */
    protected $speciesGenderDetails = [];

    /**
     * @var array|Species[]
     */
    protected $requiredForEvolution = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];

        foreach ($data['pokemon_species_details'] as $speciesGenderDetail) {
            $this->speciesGenderDetails[] = new SpeciesGenderDetail($this->client, $speciesGenderDetail);
        }

        foreach ($data['required_for_evolution'] as $species) {
            $this->requiredForEvolution[$species['name']] = $this->client->species($species['url']);
        }
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
     * @return array|SpeciesGenderDetail[]
     */
    public function getSpeciesGenderDetails()
    {
        return $this->speciesGenderDetails;
    }

    /**
     * @return array|Species[]
     */
    public function getRequiredForEvolution()
    {
        return $this->requiredForEvolution;
    }
}