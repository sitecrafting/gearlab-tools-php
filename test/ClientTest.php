<?php

/**
 * GearLab\Api\ClientTest class
 *
 * @copyright 2019 SiteCrafting, Inc.
 * @author    Coby Tamayo <ctamayo@sitecrafting.com>
 */

namespace GearLab\Api;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the GearLab\Api\Client class
 */
class ClientTest extends TestCase {
  public function setUp() {
    $this->client = new Client([
      'key' => 'qwerty',
      'baseUri' => 'https://fake.sitecrafting.net',
      'collection' => 1234,
    ]);
  }

  public function testGetSearchParams() {
    $params = $this->client->getSearchParams([
      'query' => 'spongebob squarepants',
    ]);

    $this->assertEquals([
      'qwerty',
      'spongebob squarepants',
      1234,
      0,
      10,
      '',
      'false',
    ], $params);
  }

  public function testGetSearchParamsResOffset() {
    $params = $this->client->getSearchParams([
      'query'     => 'trees',
      'resOffset' => 30,
    ]);

    $this->assertEquals(30, $params[3]);
  }

  public function testGetSearchParamsResLength() {
    $params = $this->client->getSearchParams([
      'query'     => 'trees',
      'resLength' => 17,
    ]);

    $this->assertEquals(17, $params[4]);
  }

  public function testGetSearchParamsMetaTag() {
    $params = $this->client->getSearchParams([
      'query'   => 'trees',
      'metaTag' => 'abracadabra',
    ]);

    $this->assertEquals('abracadabra', $params[5]);
  }

  public function testGetSearchParamsLiteralQuery() {
    $params = $this->client->getSearchParams([
      'query' => 'whatever',
      'literalQuery' => false,
    ]);

    $this->assertEquals('false', $params[6]);

    $params = $this->client->getSearchParams([
      'query' => 'whatever',
      'literalQuery' => true,
    ]);

    $this->assertEquals('true', $params[6]);
  }

  public function testGetCompletionsParams() {
    $params = $this->client->getCompletionsParams([
      'prefix' => 'pneu',
    ]);

    $this->assertEquals([
      'qwerty',
      'pneu',
      1234,
      '',
    ], $params);
  }

  public function testGetCompletionsParamsMetaTag() {
    $params = $this->client->getCompletionsParams([
      'prefix'  => 'squarep',
      'metaTag' => 'SO META',
    ]);

    $this->assertEquals('SO META', $params[3]);
  }
}
