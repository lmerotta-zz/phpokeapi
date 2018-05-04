<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 08.01.18
 * Time: 17:41
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class MoveAilment
 * @package PokeAPI\Pokemon
 */
class MoveAilment extends Resource
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