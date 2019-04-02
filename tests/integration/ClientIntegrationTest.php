<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 03.06.18
 * Time: 10:16
 */

namespace tests\integration;

use PokeAPI\Client;
use PHPUnit\Framework\TestCase;
use PokeAPI\Pokemon\Pokemon;
use PokeAPI\Pokemon\Species;
use PokeAPI\Pokemon\Variety;
use Symfony\Component\Cache\Simple\NullCache;

/**
 * Class ClientIntegrationTest
 * @package tests\integration
 */
class ClientIntegrationTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        // we want to avoid caching results
        $cache = new NullCache();
        $this->client = new Client(
            'https://pokeapi.co/api/v2/',
            $cache
        );
    }

    public function testThatWeCanGoFromASpeciesToAPokemon()
    {
        $species = $this->client->species('unown');
        $this->assertInstanceOf(Species::class, $species);
        $this->assertEquals('unown', $species->getName());

        /** @var Variety $variety */
        $variety = $species->getVarieties()->first();
        $this->assertInstanceOf(Variety::class, $variety);

        /** @var Pokemon $pokemon */
        $pokemon = $variety->getPokemon();

        $this->assertInstanceOf(Pokemon::class, $pokemon);
        $this->assertEquals(201, $pokemon->getId());
        $this->assertTrue($pokemon->isDefault());
    }
}
