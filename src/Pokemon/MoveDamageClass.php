<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 22:19
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class MoveDamageClass
 * @package PokeAPI\Pokemon
 */
class MoveDamageClass extends Resource
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
     * @var Translations|null
     */
    protected $descriptions;

    /**
     * @var array|Move[]
     */
    protected $moves = [];

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];

        if (!empty($data['descriptions'])) {
            $this->descriptions = new Translations($data['descriptions'], 'description');
        }

        foreach ($data['moves'] as $move) {
            $this->moves[$move['name']] = $this->client->move($move['url']);
        }

        $this->names = new Translations($data['names'], 'name');
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
     * @return null|Translations
     */
    public function getDescriptions(): ?Translations
    {
        return $this->descriptions;
    }

    /**
     * @return array|Move[]
     */
    public function getMoves()
    {
        return $this->moves;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}