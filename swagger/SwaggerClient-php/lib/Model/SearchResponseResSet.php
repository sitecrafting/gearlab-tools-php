<?php
/**
 * SearchResponseResSet
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * GearLab Tools
 *
 * Authoritative documentation for querying the GearLab Tools API. Client SDKs are generated from this API specification.
 *
 * OpenAPI spec version: v3.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.43
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * SearchResponseResSet Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SearchResponseResSet implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SearchResponse_resSet';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'results' => '\Swagger\Client\Model\SearchResultWrapper[]',
        'recommendations' => '\Swagger\Client\Model\SearchResponseRecommendations[]',
        'res_offset' => 'int',
        'res_start' => 'int',
        'res_end' => 'int',
        'res_count' => 'int',
        'total' => 'int',
        'literal_query' => 'string',
        'original_query_phrase' => 'string',
        'suggestion_superseded_query' => 'string',
        'superseding_suggestion' => 'string',
        'curated_results_enabled' => 'string',
        'curated_results_version' => 'string',
        'curated_results' => '\Swagger\Client\Model\CuratedResult[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'results' => null,
        'recommendations' => null,
        'res_offset' => null,
        'res_start' => null,
        'res_end' => null,
        'res_count' => null,
        'total' => null,
        'literal_query' => null,
        'original_query_phrase' => null,
        'suggestion_superseded_query' => null,
        'superseding_suggestion' => null,
        'curated_results_enabled' => null,
        'curated_results_version' => null,
        'curated_results' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'results' => 'results',
        'recommendations' => 'recommendations',
        'res_offset' => 'resOffset',
        'res_start' => 'resStart',
        'res_end' => 'resEnd',
        'res_count' => 'resCount',
        'total' => 'total',
        'literal_query' => 'literalQuery',
        'original_query_phrase' => 'originalQueryPhrase',
        'suggestion_superseded_query' => 'suggestionSupersededQuery',
        'superseding_suggestion' => 'supersedingSuggestion',
        'curated_results_enabled' => 'curatedResultsEnabled',
        'curated_results_version' => 'curatedResultsVersion',
        'curated_results' => 'curatedResults'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'results' => 'setResults',
        'recommendations' => 'setRecommendations',
        'res_offset' => 'setResOffset',
        'res_start' => 'setResStart',
        'res_end' => 'setResEnd',
        'res_count' => 'setResCount',
        'total' => 'setTotal',
        'literal_query' => 'setLiteralQuery',
        'original_query_phrase' => 'setOriginalQueryPhrase',
        'suggestion_superseded_query' => 'setSuggestionSupersededQuery',
        'superseding_suggestion' => 'setSupersedingSuggestion',
        'curated_results_enabled' => 'setCuratedResultsEnabled',
        'curated_results_version' => 'setCuratedResultsVersion',
        'curated_results' => 'setCuratedResults'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'results' => 'getResults',
        'recommendations' => 'getRecommendations',
        'res_offset' => 'getResOffset',
        'res_start' => 'getResStart',
        'res_end' => 'getResEnd',
        'res_count' => 'getResCount',
        'total' => 'getTotal',
        'literal_query' => 'getLiteralQuery',
        'original_query_phrase' => 'getOriginalQueryPhrase',
        'suggestion_superseded_query' => 'getSuggestionSupersededQuery',
        'superseding_suggestion' => 'getSupersedingSuggestion',
        'curated_results_enabled' => 'getCuratedResultsEnabled',
        'curated_results_version' => 'getCuratedResultsVersion',
        'curated_results' => 'getCuratedResults'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const LITERAL_QUERY_FALSE = 'false';
    const LITERAL_QUERY_TRUE = 'true';
    const SUGGESTION_SUPERSEDED_QUERY_FALSE = 'false';
    const SUGGESTION_SUPERSEDED_QUERY_TRUE = 'true';
    const CURATED_RESULTS_ENABLED_FALSE = 'false';
    const CURATED_RESULTS_ENABLED_TRUE = 'true';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLiteralQueryAllowableValues()
    {
        return [
            self::LITERAL_QUERY_FALSE,
            self::LITERAL_QUERY_TRUE,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSuggestionSupersededQueryAllowableValues()
    {
        return [
            self::SUGGESTION_SUPERSEDED_QUERY_FALSE,
            self::SUGGESTION_SUPERSEDED_QUERY_TRUE,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCuratedResultsEnabledAllowableValues()
    {
        return [
            self::CURATED_RESULTS_ENABLED_FALSE,
            self::CURATED_RESULTS_ENABLED_TRUE,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['results'] = isset($data['results']) ? $data['results'] : null;
        $this->container['recommendations'] = isset($data['recommendations']) ? $data['recommendations'] : null;
        $this->container['res_offset'] = isset($data['res_offset']) ? $data['res_offset'] : null;
        $this->container['res_start'] = isset($data['res_start']) ? $data['res_start'] : null;
        $this->container['res_end'] = isset($data['res_end']) ? $data['res_end'] : null;
        $this->container['res_count'] = isset($data['res_count']) ? $data['res_count'] : null;
        $this->container['total'] = isset($data['total']) ? $data['total'] : null;
        $this->container['literal_query'] = isset($data['literal_query']) ? $data['literal_query'] : 'false';
        $this->container['original_query_phrase'] = isset($data['original_query_phrase']) ? $data['original_query_phrase'] : null;
        $this->container['suggestion_superseded_query'] = isset($data['suggestion_superseded_query']) ? $data['suggestion_superseded_query'] : null;
        $this->container['superseding_suggestion'] = isset($data['superseding_suggestion']) ? $data['superseding_suggestion'] : null;
        $this->container['curated_results_enabled'] = isset($data['curated_results_enabled']) ? $data['curated_results_enabled'] : null;
        $this->container['curated_results_version'] = isset($data['curated_results_version']) ? $data['curated_results_version'] : null;
        $this->container['curated_results'] = isset($data['curated_results']) ? $data['curated_results'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getLiteralQueryAllowableValues();
        if (!is_null($this->container['literal_query']) && !in_array($this->container['literal_query'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'literal_query', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getSuggestionSupersededQueryAllowableValues();
        if (!is_null($this->container['suggestion_superseded_query']) && !in_array($this->container['suggestion_superseded_query'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'suggestion_superseded_query', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getCuratedResultsEnabledAllowableValues();
        if (!is_null($this->container['curated_results_enabled']) && !in_array($this->container['curated_results_enabled'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'curated_results_enabled', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets results
     *
     * @return \Swagger\Client\Model\SearchResultWrapper[]
     */
    public function getResults()
    {
        return $this->container['results'];
    }

    /**
     * Sets results
     *
     * @param \Swagger\Client\Model\SearchResultWrapper[] $results results
     *
     * @return $this
     */
    public function setResults($results)
    {
        $this->container['results'] = $results;

        return $this;
    }

    /**
     * Gets recommendations
     *
     * @return \Swagger\Client\Model\SearchResponseRecommendations[]
     */
    public function getRecommendations()
    {
        return $this->container['recommendations'];
    }

    /**
     * Sets recommendations
     *
     * @param \Swagger\Client\Model\SearchResponseRecommendations[] $recommendations recommendations
     *
     * @return $this
     */
    public function setRecommendations($recommendations)
    {
        $this->container['recommendations'] = $recommendations;

        return $this;
    }

    /**
     * Gets res_offset
     *
     * @return int
     */
    public function getResOffset()
    {
        return $this->container['res_offset'];
    }

    /**
     * Sets res_offset
     *
     * @param int $res_offset the 0-based offset within the entire set of matched results at which the returned search results begin
     *
     * @return $this
     */
    public function setResOffset($res_offset)
    {
        $this->container['res_offset'] = $res_offset;

        return $this;
    }

    /**
     * Gets res_start
     *
     * @return int
     */
    public function getResStart()
    {
        return $this->container['res_start'];
    }

    /**
     * Sets res_start
     *
     * @param int $res_start exactly the same as resOffset, but 1-based for display purposes
     *
     * @return $this
     */
    public function setResStart($res_start)
    {
        $this->container['res_start'] = $res_start;

        return $this;
    }

    /**
     * Gets res_end
     *
     * @return int
     */
    public function getResEnd()
    {
        return $this->container['res_end'];
    }

    /**
     * Sets res_end
     *
     * @param int $res_end the 1-based offset within the entire set of matched results at which the returned search results end
     *
     * @return $this
     */
    public function setResEnd($res_end)
    {
        $this->container['res_end'] = $res_end;

        return $this;
    }

    /**
     * Gets res_count
     *
     * @return int
     */
    public function getResCount()
    {
        return $this->container['res_count'];
    }

    /**
     * Sets res_count
     *
     * @param int $res_count the number of returned search results in the current response; may be less than or equal to the requested `resLength`
     *
     * @return $this
     */
    public function setResCount($res_count)
    {
        $this->container['res_count'] = $res_count;

        return $this;
    }

    /**
     * Gets total
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->container['total'];
    }

    /**
     * Sets total
     *
     * @param int $total the total number of matching search results, independent of `resCount`/`resOffset`/etc.
     *
     * @return $this
     */
    public function setTotal($total)
    {
        $this->container['total'] = $total;

        return $this;
    }

    /**
     * Gets literal_query
     *
     * @return string
     */
    public function getLiteralQuery()
    {
        return $this->container['literal_query'];
    }

    /**
     * Sets literal_query
     *
     * @param string $literal_query whether a literalQuery was requested
     *
     * @return $this
     */
    public function setLiteralQuery($literal_query)
    {
        $allowedValues = $this->getLiteralQueryAllowableValues();
        if (!is_null($literal_query) && !in_array($literal_query, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'literal_query', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['literal_query'] = $literal_query;

        return $this;
    }

    /**
     * Gets original_query_phrase
     *
     * @return string
     */
    public function getOriginalQueryPhrase()
    {
        return $this->container['original_query_phrase'];
    }

    /**
     * Sets original_query_phrase
     *
     * @param string $original_query_phrase the search query originally entered by the end-user
     *
     * @return $this
     */
    public function setOriginalQueryPhrase($original_query_phrase)
    {
        $this->container['original_query_phrase'] = $original_query_phrase;

        return $this;
    }

    /**
     * Gets suggestion_superseded_query
     *
     * @return string
     */
    public function getSuggestionSupersededQuery()
    {
        return $this->container['suggestion_superseded_query'];
    }

    /**
     * Sets suggestion_superseded_query
     *
     * @param string $suggestion_superseded_query whether an alternate search term (e.g. a corrected misspelling) overrode the current query with high certainty
     *
     * @return $this
     */
    public function setSuggestionSupersededQuery($suggestion_superseded_query)
    {
        $allowedValues = $this->getSuggestionSupersededQueryAllowableValues();
        if (!is_null($suggestion_superseded_query) && !in_array($suggestion_superseded_query, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'suggestion_superseded_query', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['suggestion_superseded_query'] = $suggestion_superseded_query;

        return $this;
    }

    /**
     * Gets superseding_suggestion
     *
     * @return string
     */
    public function getSupersedingSuggestion()
    {
        return $this->container['superseding_suggestion'];
    }

    /**
     * Sets superseding_suggestion
     *
     * @param string $superseding_suggestion if an alternate search term overrode the end-user's original query, this will contain the search term with which it was overridden
     *
     * @return $this
     */
    public function setSupersedingSuggestion($superseding_suggestion)
    {
        $this->container['superseding_suggestion'] = $superseding_suggestion;

        return $this;
    }

    /**
     * Gets curated_results_enabled
     *
     * @return string
     */
    public function getCuratedResultsEnabled()
    {
        return $this->container['curated_results_enabled'];
    }

    /**
     * Sets curated_results_enabled
     *
     * @param string $curated_results_enabled toggle to indicate if the curated results are enables for the account
     *
     * @return $this
     */
    public function setCuratedResultsEnabled($curated_results_enabled)
    {
        $allowedValues = $this->getCuratedResultsEnabledAllowableValues();
        if (!is_null($curated_results_enabled) && !in_array($curated_results_enabled, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'curated_results_enabled', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['curated_results_enabled'] = $curated_results_enabled;

        return $this;
    }

    /**
     * Gets curated_results_version
     *
     * @return string
     */
    public function getCuratedResultsVersion()
    {
        return $this->container['curated_results_version'];
    }

    /**
     * Sets curated_results_version
     *
     * @param string $curated_results_version String indicating the version of the curated results that are appended to the resSet. Might be phased out in the future.
     *
     * @return $this
     */
    public function setCuratedResultsVersion($curated_results_version)
    {
        $this->container['curated_results_version'] = $curated_results_version;

        return $this;
    }

    /**
     * Gets curated_results
     *
     * @return \Swagger\Client\Model\CuratedResult[]
     */
    public function getCuratedResults()
    {
        return $this->container['curated_results'];
    }

    /**
     * Sets curated_results
     *
     * @param \Swagger\Client\Model\CuratedResult[] $curated_results curated_results
     *
     * @return $this
     */
    public function setCuratedResults($curated_results)
    {
        $this->container['curated_results'] = $curated_results;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


