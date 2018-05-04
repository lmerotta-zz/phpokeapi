<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 26.12.17
 * Time: 13:38
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class ItemCategory
 * @package PokeAPI\Pokemon
 */
class ItemCategory extends Resource
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
     * @var ItemPocket
     */
    protected $pocket;

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
        $this->pocket = $this->client->itemPocket($data['pocket']['url']);
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
     * @return ItemPocket
     */
    public function getPocket(): ItemPocket
    {
        return $this->pocket;
    }
}