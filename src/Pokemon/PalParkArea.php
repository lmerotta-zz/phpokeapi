<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 23.12.17
 * Time: 16:48
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class PalParkArea
 * @package PokeAPI\Pokemon
 */
class PalParkArea extends Resource
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var array|PalParkEncounterSpecies[]
     */
    protected $encounters = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->names = new Translations($data['names'], 'name');

        foreach ($data['pokemon_encounters'] as $encounter) {
            $this->encounters[] = new PalParkEncounterSpecies($this->client, $encounter);
        }
    }

    /**
     * @return string
     */
    public function getId(): string
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
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return array|PalParkEncounterSpecies[]
     */
    public function getEncounters()
    {
        return $this->encounters;
    }
}