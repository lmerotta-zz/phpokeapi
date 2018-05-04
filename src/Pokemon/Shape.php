<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 13:07
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Shape
 * @package PokeAPI\Pokemon
 */
class Shape extends Resource
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
     * @var Translations
     */
    protected $awesomeNames;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var array|Species[]
     */
    protected $species = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->names = new Translations($data['awesome_names'], 'awesome_name');
        $this->names = new Translations($data['names'], 'name');

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
     * @return Translations
     */
    public function getAwesomeNames(): Translations
    {
        return $this->awesomeNames;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return array|Species[]
     */
    public function getSpecies()
    {
        return $this->species;
    }
}