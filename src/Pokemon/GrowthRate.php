<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 08:14
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class GrowthRate
 * @package PokeAPI\Pokemon
 */
class GrowthRate extends Resource
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
     * @var string
     */
    protected $formula;

    /**
     * @var Translations
     */
    protected $descriptions;

    /**
     * @var array indexed by level
     */
    protected $levels = [];

    /**
     * @var array|Species
     */
    protected $species = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->formula = $data['formula'];
        $this->descriptions = new Translations($data['descriptions'], 'descriptions');

        foreach ($data['levels'] as $level) {
            $this->levels[$level['level']] = $level['experience'];
        }

        foreach ($data['pokemon_species'] as $species) {
            $this->species[$species['name']] = $this->client->species($species['url']);
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
     * @return string
     */
    public function getFormula(): string
    {
        return $this->formula;
    }

    /**
     * @return Translations
     */
    public function getDescriptions(): Translations
    {
        return $this->descriptions;
    }

    /**
     * @return array
     */
    public function getLevels(): array
    {
        return $this->levels;
    }

    /**
     * @return array|Species
     */
    public function getSpecies()
    {
        return $this->species;
    }
}