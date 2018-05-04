<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 08.01.18
 * Time: 17:54
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Stat
 * @package PokeAPI\Pokemon
 */
class Stat extends Resource
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
    protected $gameIndex;

    /**
     * @var boolean
     */
    protected $battleOnly;

    /**
     * @var array|MoveStatAffect[]
     */
    protected $affectingMoves = [];

    /**
     * @var array|NatureStatAffect[]
     */
    protected $affectingNatures = [];

    /**
     * @var array|Characteristic[]
     */
    protected $characteristics = [];

    /**
     * @var MoveDamageClass
     */
    protected $moveDamageClass;

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
        $this->gameIndex = $data['game_index'];
        $this->battleOnly = $data['is_battle_only'];

        foreach ($data['affecting_moves'] as $affectingMoveSet) {
            foreach ($affectingMoveSet as $affectingMove) {
                $this->affectingMoves[] = new MoveStatAffect($this->client, $affectingMove);
            }
        }

        foreach ($data['affecting_natures'] as $affectingNatureSet) {
            foreach ($affectingNatureSet as $affectingNature) {
                $this->$affectingNature[] = new NatureStatAffect($this->client, $affectingNature);
            }
        }

        foreach ($data['characteristics'] as $characteristic) {
            $this->characteristics[] = $this->client->characteristic($characteristic['url']);
        }

        $this->moveDamageClass = $this->client->moveDamageClass($data['move_damage_class']['url']);
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
    public function getGameIndex(): int
    {
        return $this->gameIndex;
    }

    /**
     * @return bool
     */
    public function isBattleOnly(): bool
    {
        return $this->battleOnly;
    }

    /**
     * @return array|MoveStatAffect[]
     */
    public function getAffectingMoves()
    {
        return $this->affectingMoves;
    }

    /**
     * @return array|NatureStatAffect[]
     */
    public function getAffectingNatures()
    {
        return $this->affectingNatures;
    }

    /**
     * @return array|Characteristic[]
     */
    public function getCharacteristics()
    {
        return $this->characteristics;
    }

    /**
     * @return MoveDamageClass
     */
    public function getMoveDamageClass(): MoveDamageClass
    {
        return $this->moveDamageClass;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}