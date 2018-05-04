<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 25.12.17
 * Time: 13:59
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class EncounterMethod
 * @package PokeAPI\Pokemon
 */
class EncounterMethod extends Resource
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
     * @var integer
     */
    protected $order;

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
        $this->order = $data['order'];
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
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}