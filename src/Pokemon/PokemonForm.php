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
class PokemonForm extends Resource
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
     * @var array indexed by sprite name
     */
    protected $sprites = [];

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
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->order = $data['order'];
        $this->formOrder = $data['form_order'];
        $this->default = $data['is_default'];
        $this->battleOnly = $data['is_battle_only'];
        $this->mega = $data['is_mega'];
        $this->formName = empty($data['form_name']) ? null : $data['form_name'];
        $this->pokemon = $this->client->pokedex($data['pokemon']['url']);

        foreach ($data['sprites'] as $name => $value) {
            $this->sprites[$name] = $value;
        }

        $this->versionGroup = $this->client->versionGroup($data['version_group']['url']);
        $this->names = empty($data['names']) ? null : new Translations($data['names'], 'name');
        $this->formNames = empty($data['form_names']) ? null : new Translations($data['form_names'], 'name');
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
     * @return array
     */
    public function getSprites(): array
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