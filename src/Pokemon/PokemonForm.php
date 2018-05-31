<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 28.01.18
 * Time: 11:33
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class PokemonForm
 * @package PokeAPI\Pokemon
 */
class PokemonForm
{

    const POKEAPI_ENDPOINT = 'pokemon-form';

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
     * @var integer
     */
    protected $formOrder;

    /**
     * @var boolean
     */
    protected $default;

    /**
     * @var boolean
     */
    protected $battleOnly;

    /**
     * @var boolean
     */
    protected $mega;

    /**
     * @var string|null
     */
    protected $formName;

    /**
     * @var Pokemon
     */
    protected $pokemon;

    /**
     * @var ArrayCollection indexed by sprite name
     */
    protected $sprites;

    /**
     * @var VersionGroup
     */
    protected $versionGroup;

    /**
     * @var Translations|null
     */
    protected $names;

    /**
     * @var Translations|null
     */
    protected $formNames;

    /**
     * PokemonForm constructor.
     */
    public function __construct()
    {
        $this->sprites = new ArrayCollection();
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
     * @return int
     */
    public function getFormOrder(): int
    {
        return $this->formOrder;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @return bool
     */
    public function isBattleOnly(): bool
    {
        return $this->battleOnly;
    }

    /**
     * @return bool
     */
    public function isMega(): bool
    {
        return $this->mega;
    }

    /**
     * @return null|string
     */
    public function getFormName(): ?string
    {
        return $this->formName;
    }

    /**
     * @return Pokemon
     */
    public function getPokemon(): Pokemon
    {
        return $this->pokemon;
    }

    /**
     * @return ArrayCollection
     */
    public function getSprites(): ArrayCollection
    {
        return $this->sprites;
    }

    /**
     * @return VersionGroup
     */
    public function getVersionGroup(): VersionGroup
    {
        return $this->versionGroup;
    }

    /**
     * @return null|Translations
     */
    public function getNames(): ?Translations
    {
        return $this->names;
    }

    /**
     * @return null|Translations
     */
    public function getFormNames(): ?Translations
    {
        return $this->formNames;
    }
}