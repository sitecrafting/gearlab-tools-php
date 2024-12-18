<?php

/**
 * GearLab\Api\Client class
 *
 * @copyright 2019 SiteCrafting, Inc.
 * @author    Coby Tamayo <ctamayo@sitecrafting.com>
 */

namespace GearLab\Api;

use GuzzleHttp\Client as GuzzleClient;
use Swagger\Client\Api;
use Swagger\Client\ApiException;
use Swagger\Client\Model;
use Swagger\Client\Configuration;

/**
 * Central API client for the GearLab Tools REST service
 */
class Client {

  public $key;

  public $baseUri;

  public $collection;

  public $config;

  public $guzzleClient;

  /**
   * Constructor. Expects an array with configuration data, inluded the
   * GearLab Tools API key and collection number.
   *
   * @param array $opts an associative array with some combination of the
   * following keys:
   *
   * - "key" (string) Your API key as provided or configured in GearLab Tools.
   *    Required.
   * - "collection" (int) Your website's Collection ID as provided in GearLab
   *   Tools. Required.
   * - "baseUri" (string) The base URI of the REST service to query. Required.
   */
  public function __construct(array $opts) {
    foreach (['key', 'baseUri', 'collection'] as $k) {
      if (empty($opts[$k])) {
        throw new \InvalidArgumentException(sprintf(
          '%s is required',
          $k
        ));
      }
    }

    $this->key        = $opts['key'];
    $this->baseUri    = $opts['baseUri'];
    $this->collection = $opts['collection'];

    $this->config = $opts['swaggerConfig'] ?? new Configuration();
    $this->config->setHost($this->baseUri);

    $this->guzzleClient = $opts['guzzleClient'] ?? new GuzzleClient();
  }

  /**
   * Perform a search request
   *
   * @param array $opts an associative array with a combination of query
   * parameters. Keys are named exactly as they are in the REST API
   * docs. `key` and `collection` are passed via the constructor. `query` is
   * required; all others are optional.
   * @return array if `query` is set in `$opts`, returns an array like:
   * ```
   * array (
   *  'results' =>
   *  array (
   *    0 =>
   *    array (
   *      'url' => 'https://bouldercolorado.gov/civic-area/trees-in-the-civic-area-2',
   *      'title' => 'Trees in the Civic Area',
   *      'snippet' => 'Updates on plans for trees in the Boulder Civic Area.',
   *      'meta' =>
   *      array (
   *      ),
   *    ),
   *    1 =>
   *    array (
   *      'url' => 'https://bouldercolorado.gov/forestry/best-trees',
   *      'title' => 'Best Trees for Boulder',
   *      'snippet' => 'Select the right tree for the right place.',
   *      'meta' =>
   *      array (
   *      ),
   *    ),
   *    // ...more results here...
   *  ),
   *  'recommendations' =>
   *  array (
   *    0 =>
   *    array (
   *      'url' => 'https://bouldercolorado.gov/open-data/city-of-boulder-public-trees/',
   *      'title' => 'Public Trees',
   *      'snippet' => 'Public Trees managed by the Urban Forestry Division of the Department of Parks and Recreation, City of Boulder. The provided tree data does not include trees on Open Space and Mountain Parks (OSMP) land. City ordinances prohibit the picking of fruit on trees located on OSMP property. For a list of u',
   *      'meta' => NULL,
   *    ),
   *  ),
   *  'resOffset' => 0,
   *  'resCount' => 10,
   *  'resStart' => 1,
   *  'resEnd' => 10,
   *  'total' => 110,
   *  'literalQuery' => false,
   *  'originalQueryPhrase' => 'trees',
   *  'suggestionSupersededQuery' => false,
   *  'supersedingSuggestion' => '',
   *  'suggestionSupersededQuery': 'false',
   *   'supersedingSuggestion': '',
   *   'recommendations': [
   *     {
   *       'res': {
   *         'url': 'https://demo.sitkainsights.com/top-5-php-template-engines',
   *         'title': 'Top 5 PHP Template Engines | Article | SiteCrafting',
   *         'snippet': 'We set out to compare 5 different PHP template engines in order to find one that best suits our needs and can be adopted as a company-wide standard.'
   *       }
   *     }
   *   ],
   *   'curatedResultsEnabled': 'true',
   *   'curatedResultsVersion': '2.0',
   *   'curatedResults': [
   *     {
   *       'template': 'quick_links',
   *       'fields': [
   *         {
   *           'type': 'link',
   *           'order': 0,
   *           'value': [
   *             {
   *               'link_text': 'Check out this PHP blog',
   *               'url': 'www.sitecrafting.com',
   *               'new_window': '1'
   *             },
   *             {
   *               'link_text': 'Main Site',
   *               'url': 'https://www.sitecrafting.com',
   *               'new_window': '1'
   *             }
   *           ]
   *         },
   *         {
   *           'type': 'text',
   *           'order': 1,
   *           'value': [
   *             {
   *               'text': 'Please don't believe everything you read on the internet. '
   *             }
   *           ]
   *         },
   *         {
   *           'type': 'button',
   *           'order': 2,
   *           'value': [
   *             {
   *               'link_text': 'Google Something',
   *               'url': 'https://www.google.com'
   *             }
   *           ]
   *         },
   *         {
   *           'type': 'headline',
   *           'order': 3,
   *           'value': [{ 'headline': 'PHP information' }]
   *         }
   *       ]
   *     },
   *     {
   *       'template': 'quick_links',
   *       'fields': [
   *         { 'type': 'link', 'order': 0, 'value': [] },
   *         {
   *           'type': 'text',
   *           'order': 1,
   *           'value': [
   *             { 'text': 'Here is the text that goes under the headline.' }
   *           ]
   *         },
   *         { 'type': 'button', 'order': 2, 'value': [] },
   *         {
   *           'type': 'headline',
   *           'order': 3,
   *           'value': [
   *             { 'headline': 'This result only has a headline & text' }
   *           ]
   *         }
   *       ]
   *     }
   *   ]
   * }
   * )
   * ```
   * Otherwise, if `query` is not set, returns an empty array.
   */   
  public function search(array $opts) : array {
    if (empty($opts['query'])) {
      return [];
    }

    $response = call_user_func_array(
      [$this->getService('search'), 'search'],
      $this->getSearchParams($opts)
    );

    if (empty($response)) {
      throw new ApiException('Empty or invalid response from search endpoint');
    }

    // drill down into the cruft
    $resultSet = $response->getResSet()[0] ?? null;

    if (empty($resultSet)) {
      return [];
    }
    
    $wrappedResults         = $resultSet->getResults() ?: [];
    $wrappedRecommendations = $resultSet->getRecommendations() ?: [];
    $curatedResults         = $resultSet->getCuratedResults() ?: [];
    
    // NOTE: we are stripping out suggestions from the result data

    $searchResults = array_map(function(Model\SearchResultWrapper $wrapper) : array {
      $result = $wrapper->getRes();
      return [
        'url'     => $result->getUrl(),
        'title'   => $result->getTitle(),
        'snippet' => $result->getSnippet(),
        'meta'    => $result->getMeta(),
      ];
    }, $wrappedResults);

    $recommendations = array_map(function(object $wrapper) : array {
      $recommendation = $wrapper->getRes();
      return [
        'url'     => $recommendation->getUrl(),
        'title'   => $recommendation->getTitle(),
        'snippet' => $recommendation->getSnippet(),
        'meta'    => $recommendation->getMeta(),
      ];
    }, $wrappedRecommendations);

    return [
      'results'                   => $searchResults,
      'recommendations'           => $recommendations,
      'curatedResults'            => $curatedResults,
      'curatedResultsEnabled'     => $resultSet->getCuratedResultsEnabled() !== 'false',
      'curatedResultsVersion'     => $resultSet->getCuratedResultsVersion(),
      'resOffset'                 => $resultSet->getResOffset(),
      'resCount'                  => $resultSet->getResCount(),
      'resStart'                  => $resultSet->getResStart(),
      'resEnd'                    => $resultSet->getResEnd(),
      'total'                     => $resultSet->getTotal(),
      'literalQuery'              => $resultSet->getLiteralQuery() !== 'false',
      'originalQueryPhrase'       => $resultSet->getOriginalQueryPhrase(),
      'suggestionSupersededQuery' => $resultSet->getSuggestionSupersededQuery() !== 'false',
      'supersedingSuggestion'     => $resultSet->getSupersedingSuggestion(),
    ];
  }

  public function completions(array $opts) : array {
    $response = call_user_func_array(
      [$this->getService('completions'), 'completions'],
      $this->getCompletionsParams($opts)
    );

    // drill down into the cruft
    $resultSet = $response->getResSet() ?? null;

    if (empty($resultSet)) {
      return [];
    }

    // map result wrapper objects to arrays
    $results = array_map(function(Model\CompletionsResultWrapper $wrapper) : array {
      $result = $wrapper->getRes();
      return [
        'title' => $result->getTitle(),
      ];
    }, $resultSet->getResults() ?: []);

    return [
      'results' => $results,
    ];
  }

  /**
   * Filter the search $opts into a positional array to be passed to the
   * underlying Swagger client.
   *
   */
  public function getSearchParams(array $opts) : array {
    // Translate from a boolean value to either "true" or "false".
    // Translate anything truthy to "true".
    $literal = ($opts['literalQuery'] ?? false) ? 'true' : 'false';

    return [
      $this->key,
      (string) ($opts['query'] ?? ''),
      $this->collection,
      (int) ($opts['resOffset'] ?? 0),
      (int) ($opts['resLength'] ?? 10),
      (string) ($opts['metaTag'] ?? ''),
      $literal,
    ];
  }

  /**
   * Filter the completions $opts into a positional array to be passed to the
   * underlying Swagger client.
   *
   */
  public function getCompletionsParams(array $opts) : array {
    return [
      $this->key,
      $opts['prefix'] ?? '',
      $this->collection,
      (string) ($opts['metaTag'] ?? ''),
    ];
  }

  protected function getService(string $name) : object {
    $services = [
      'search'      => Api\SearchApi::class,
      'completions' => Api\CompletionsApi::class,
    ];

    if (empty($services[$name])) {
      throw new \InvalidArgumentException('no such service: ' . $name);
    }
    $class = $services[$name];

    return new $class($this->guzzleClient, $this->config);
  }
}
