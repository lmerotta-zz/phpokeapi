<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 26.12.17
 * Time: 13:32
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use phpDocumentor\Reflection\DocBlock\Description;
use PokeAPI\Translations;

/**
 * Class ItemAttribute
 * @package PokeAPI\Pokemon
 */
class ItemAttribute extends Resource
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
     * @var array|Item[]
     */
    protected $items = [];

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var Description
     */
    protected $descriptions;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];

        foreach ($data['items'] as $item) {
            $this->items[$item['name']] = $this->client->item($item['url']);
        }

        $this->names = new Translations($data['names'], 'name');
        $this->descriptions = new Translations($data['descriptions'], 'description');
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
     * @return array|Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return Description
     */
    public function getDescriptions(): Description
    {
        return $this->descriptions;
    }
}