<?php

namespace PokeAPI;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\SerializerInterface;
use PokeAPI\Exception\NetworkException;
use PokeAPI\JMS\Serializer\PokeApiJmsSerializerBuilder;
use PokeAPI\Pokemon\Ability;
use PokeAPI\Pokemon\Area;
use PokeAPI\Pokemon\Berry;
use PokeAPI\Pokemon\BerryFirmness;
use PokeAPI\Pokemon\BerryFlavor;
use PokeAPI\Pokemon\Characteristic;
use PokeAPI\Pokemon\Color;
use PokeAPI\Pokemon\ContestEffect;
use PokeAPI\Pokemon\ContestType;
use PokeAPI\Pokemon\EggGroup;
use PokeAPI\Pokemon\EncounterCondition;
use PokeAPI\Pokemon\EncounterConditionValue;
use PokeAPI\Pokemon\EncounterMethod;
use PokeAPI\Pokemon\EvolutionChain;
use PokeAPI\Pokemon\EvolutionTrigger;
use PokeAPI\Pokemon\Gender;
use PokeAPI\Pokemon\Generation;
use PokeAPI\Pokemon\GrowthRate;
use PokeAPI\Pokemon\Habitat;
use PokeAPI\Pokemon\Item;
use PokeAPI\Pokemon\ItemAttribute;
use PokeAPI\Pokemon\ItemCategory;
use PokeAPI\Pokemon\ItemFlingEffect;
use PokeAPI\Pokemon\ItemPocket;
use PokeAPI\Pokemon\Location;
use PokeAPI\Pokemon\Machine;
use PokeAPI\Pokemon\Move;
use PokeAPI\Pokemon\MoveAilment;
use PokeAPI\Pokemon\MoveBattleStyle;
use PokeAPI\Pokemon\MoveCategory;
use PokeAPI\Pokemon\MoveDamageClass;
use PokeAPI\Pokemon\MoveLearnMethod;
use PokeAPI\Pokemon\MoveTarget;
use PokeAPI\Pokemon\Nature;
use PokeAPI\Pokemon\PalParkArea;
use PokeAPI\Pokemon\PokeathlonStat;
use PokeAPI\Pokemon\Pokedex;
use PokeAPI\Pokemon\Pokemon;
use PokeAPI\Pokemon\PokemonForm;
use PokeAPI\Pokemon\Region;
use PokeAPI\Pokemon\Shape;
use PokeAPI\Pokemon\Species;
use PokeAPI\Pokemon\Stat;
use PokeAPI\Pokemon\SuperContestEffect;
use PokeAPI\Pokemon\Type;
use PokeAPI\Pokemon\VersionGroup;
use ProxyManager\Factory\LazyLoadingValueHolderFactory;
use ProxyManager\Proxy\LazyLoadingInterface;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Simple\FilesystemCache;

/**
 * Class Client
 * @package PokeAPI
 */
class Client
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var callable
     */
    private $callback;

    /**
     * Client constructor.
     * @param string $url
     * @param CacheInterface $cache
     * @param SerializerInterface $serializer
     */
    public function __construct(string $url = 'https://pokeapi.co/api/v2/', CacheInterface $cache = null, SerializerInterface $serializer = null, callable $callback = null)
    {
        $this->baseUrl = $url;
        $this->cache = $cache ?: new FilesystemCache('pokeapi');
        $this->serializer = $serializer ?: PokeApiJmsSerializerBuilder::build($this);
        $this->callback = is_callable($callback) ? $callback : $this->getDefaultCallback();
    }

    /**
     * @param int|string $idOrName
     * @return Ability
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function ability($idOrName) : Ability
    {
        return $this->sendRequest(Ability::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Area
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function area($idOrName) : Area
    {
        return $this->sendRequest(Area::class, $idOrName);
    }


    /**
     * @param int|string $idOrName
     * @return Berry
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function berry($idOrName) : Berry
    {
        return $this->sendRequest(Berry::class, $idOrName);
    }


    /**
     * @param int|string $idOrName
     * @return BerryFirmness
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function berryFirmness($idOrName) : BerryFirmness
    {
        return $this->sendRequest(BerryFirmness::class, $idOrName);
    }


    /**
     * @param int|string $idOrName
     * @return BerryFlavor
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function berryFlavor($idOrName) : BerryFlavor
    {
        return $this->sendRequest(BerryFlavor::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Characteristic
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function characteristic($idOrName) : Characteristic
    {
        return $this->sendRequest(Characteristic::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Color
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function color($idOrName) : Color
    {
        return $this->sendRequest(Color::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return ContestEffect
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function contestEffect($idOrName) : ContestEffect
    {
        return $this->sendRequest(ContestEffect::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return ContestType
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function contestType($idOrName) : ContestType
    {
        return $this->sendRequest(ContestType::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return EggGroup
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function eggGroup($idOrName) : EggGroup
    {
        return $this->sendRequest(EggGroup::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return EncounterCondition
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function encounterCondition($idOrName) : EncounterCondition
    {
        return $this->sendRequest(EncounterCondition::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return EncounterConditionValue
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function encounterConditionValue($idOrName) : EncounterConditionValue
    {
        return $this->sendRequest(EncounterConditionValue::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return EncounterMethod
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function encounterMethod($idOrName) : EncounterMethod
    {
        return $this->sendRequest(EncounterMethod::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return EvolutionChain
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function evolutionChain($idOrName) : EvolutionChain
    {
        return $this->sendRequest(EvolutionChain::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return EvolutionTrigger
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function evolutionTrigger($idOrName) : EvolutionTrigger
    {
        return $this->sendRequest(EvolutionTrigger::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Gender
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function gender($idOrName) : Gender
    {
        return $this->sendRequest(Gender::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Generation
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function generation($idOrName) : Generation
    {
        return $this->sendRequest(Generation::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return GrowthRate
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function growthRate($idOrName) : GrowthRate
    {
        return $this->sendRequest(GrowthRate::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Habitat
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function habitat($idOrName) : Habitat
    {
        return $this->sendRequest(Habitat::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Item
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function item($idOrName) : Item
    {
        return $this->sendRequest(Item::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return ItemAttribute
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function itemAttribute($idOrName) : ItemAttribute
    {
        return $this->sendRequest(ItemAttribute::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return ItemCategory
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function itemCategory($idOrName) : ItemCategory
    {
        return $this->sendRequest(ItemCategory::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return ItemFlingEffect
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function itemFlingEffect($idOrName) : ItemFlingEffect
    {
        return $this->sendRequest(ItemFlingEffect::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return ItemPocket
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function itemPocket($idOrName) : ItemPocket
    {
        return $this->sendRequest(ItemPocket::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Location
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function location($idOrName) : Location
    {
        return $this->sendRequest(Location::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Machine
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function machine($idOrName) : Machine
    {
        return $this->sendRequest(Machine::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Move
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function move($idOrName) : Move
    {
        return $this->sendRequest(Move::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return MoveAilment
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function moveAilment($idOrName) : MoveAilment
    {
        return $this->sendRequest(MoveAilment::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return MoveBattleStyle
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function moveBattleStyle($idOrName) : MoveBattleStyle
    {
        return $this->sendRequest(MoveBattleStyle::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return MoveCategory
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function moveCategory($idOrName) : MoveCategory
    {
        return $this->sendRequest(MoveCategory::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return MoveDamageClass
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function moveDamageClass($idOrName) : MoveDamageClass
    {
        return $this->sendRequest(MoveDamageClass::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return MoveLearnMethod
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function moveLearnMethod($idOrName) : MoveLearnMethod
    {
        return $this->sendRequest(MoveLearnMethod::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return MoveTarget
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function moveTarget($idOrName) : MoveTarget
    {
        return $this->sendRequest(MoveTarget::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Nature
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function nature($idOrName) : Nature
    {
        return $this->sendRequest(Nature::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return PalParkArea
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function palParkArea($idOrName) : PalParkArea
    {
        return $this->sendRequest(PalParkArea::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return PokeathlonStat
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function pokeathlonStat($idOrName) : PokeathlonStat
    {
        return $this->sendRequest(PokeathlonStat::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Pokedex
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function pokedex($idOrName) : Pokedex
    {
        return $this->sendRequest(Pokedex::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Pokemon
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function pokemon($idOrName) : Pokemon
    {
        return $this->sendRequest(Pokemon::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return PokemonForm
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function pokemonForm($idOrName) : PokemonForm
    {
        return $this->sendRequest(PokemonForm::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Region
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function region($idOrName) : Region
    {
        return $this->sendRequest(Region::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Shape
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function shape($idOrName) : Shape
    {
        return $this->sendRequest(Shape::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Species
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function species($idOrName) : Species
    {
        return $this->sendRequest(Species::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Stat
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function stat($idOrName) : Stat
    {
        return $this->sendRequest(Stat::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return SuperContestEffect
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function superContestEffect($idOrName) : SuperContestEffect
    {
        return $this->sendRequest(SuperContestEffect::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Type
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function type($idOrName) : Type
    {
        return $this->sendRequest(Type::class, $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return Version
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function version($idOrName) : Version
    {
        return $this->sendRequest(Version::class,  $idOrName);
    }

    /**
     * @param int|string $idOrName
     * @return VersionGroup
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function versionGroup($idOrName) : VersionGroup
    {
        return $this->sendRequest(VersionGroup::class, $idOrName);
    }

    /**
     * @param string $className
     * @param int|string $identifier
     * @return mixed
     * @throws NetworkException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function sendRequest(string $className, $identifier)
    {
        $uri = $className::POKEAPI_ENDPOINT;
        $uri = str_replace($this->baseUrl, '', $uri);
        
        $url = sprintf(
            "%s%s/",
            $this->baseUrl,
            $uri
        );

        $url .= str_replace($url, '', $identifier);
        $cache_key = urlencode($url);

        if ($this->cache->has($cache_key)) {
            return $this->deserialize($className, $this->cache->get($cache_key));
        }

        $callback = $this->callback;
        $data = $callback($url);

        // TODO: Remove this ugly hack once PokéAPI is fixed
        if ($uri === Pokemon::POKEAPI_ENDPOINT && isset($data['location_area_encounters'])) {
            $prepend = str_replace('/api/v2/', '', $this->baseUrl);
            $data['location_area_encounters'] = $this->fixEncounters($prepend . $data['location_area_encounters']);
        }

        $data = json_encode($data);

        $this->cache->set($cache_key, $data);

        return $this->deserialize($className, $data);
    }

    /**
     * @param string $className
     * @param string $data
     * @return array|\JMS\Serializer\scalar|mixed|object 
     */
    protected function deserialize(string $className, string $data)
    {
        return $this->serializer->deserialize($data, $className, 'json');
    }

    /**
     * TODO: Remove when nasty bug in PokéAPI is fixed.
     * Currently pokemon encounters are inconsistent with the rest of the API. this method fixes this incompatibility.
     * @param string $uri
     * @return array
     */
    private function fixEncounters(string $uri): array
    {
        $callback = $this->callback;

        return $callback($uri);
    }

    private function getDefaultCallback(): callable
    {
        return function ($url) {
            $ch = curl_init();
            $timeout = 5;

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

            $data = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($http_code != 200) {
                throw new NetworkException($url, $data);
            }

            return json_decode($data, true);
        };
    }
}
