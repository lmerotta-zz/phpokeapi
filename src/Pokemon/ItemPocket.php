<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 21:46
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class ItemPocket
 * @package PokeAPI\Pokemon
 */
class ItemPocket extends Resource
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
     * @var array|ItemCategory[]
     */
    protected $categories = [];

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

        foreach ($data['categories'] as $category) {
            $this->categories[$category['name']] = $this->client->itemCategory($category['url']);
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
     * @return array|ItemCategory[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}