<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 20:38
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Location
 * @package PokeAPI\Pokemon
 */
class Location extends Resource
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
     * @var Region
     */
    protected $region;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var array|GameIndex
     */
    protected $gameIndices = [];

    /**
     * @var array|Area
     */
    protected $areas = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->region = $this->client->region($data['region']['url']);
        $this->names = new Translations($data['names'], 'name');

        foreach ($data['game_indices'] as $gameIndex) {
            $this->gameIndices[] = new Gameindex($this->client, $gameIndex);
        }

        foreach ($data['areas'] as $area) {
            $this->areas[$area['name']] = $this->client->area($area['url']);
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
     * @return Region
     */
    public function getRegion(): Region
    {
        return $this->region;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return array|GameIndex
     */
    public function getGameIndices(): array
    {
        return $this->gameIndices;
    }

    /**
     * @return array|Area
     */
    public function getAreas(): array
    {
        return $this->areas;
    }
}