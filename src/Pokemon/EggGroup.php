<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 13:02
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class EggGroup
 * @package PokeAPI\Pokemon
 */
class EggGroup extends Resource
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
        $this->names = new Translations($data['names'], 'name');

        foreach ($data['pokemon_species'] as $species) {
            $this->species[$species['name']] = $this->client->species($species['url']);
        }
    }

}