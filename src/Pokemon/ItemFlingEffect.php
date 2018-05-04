<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 26.12.17
 * Time: 11:56
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class ItemFlingEffect
 * @package PokeAPI\Pokemon
 */
class ItemFlingEffect extends Resource
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
    protected $effects;

    /**
     * @var array]Item[]
     */
    protected $items = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->effects = new Translations($data['effect_entries'], 'effect');

        foreach ($data['items'] as $item) {
            $this->items[$item['name']] = $this->client->item($item['url']);
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
    public function getEffects(): Translations
    {
        return $this->effects;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}