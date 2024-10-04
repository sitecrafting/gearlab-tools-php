# Swagger\Client\SearchApi

All URIs are relative to *https://virtserver.swaggerhub.com/ctamayo/gearlab-tools/v2.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**search**](SearchApi.md#search) | **GET** /search | Request pre-indexed search results


# **search**
> \Swagger\Client\Model\SearchResponse search($key, $query, $collection, $res_offset, $res_length, $meta_tag, $literal_query)

Request pre-indexed search results

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\SearchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$key = "key_example"; // string | The API Key as provided by SiteCrafting/GearLab
$query = "query_example"; // string | Search string submitted by end user, e.g. \"Holiday Party\" or \"Holiday+Party\"
$collection = 56; // int | Your website's collection ID as provided by SiteCrafting/GearLab
$res_offset = 56; // int | The number of results to skip over when building the result set - useful for lazy-loading or paginating your results. (e.g. if you are displaying 10 results at a time and wish to display the 3rd page of results, this would be ‘20’ so that you could skip over 20 results to get to results 21-30)
$res_length = 56; // int | The number of results to include in the result set - useful for lazy-loading or paginating your results. (e.g. if you are displaying 10 results at a time this would be ‘10’)
$meta_tag = "meta_tag_example"; // string | Category to limit results to. If this value is not specified, all pages will considered. If this value is specified then the result set will only include pages with the category specified in the meta tag. (e.g. ‘calendar-event’)
$literal_query = "literal_query_example"; // string | Return results for the literal query phrased passed, and do not allow the presence of any “more probable suggestions” to supercede it.

try {
    $result = $apiInstance->search($key, $query, $collection, $res_offset, $res_length, $meta_tag, $literal_query);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SearchApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **key** | **string**| The API Key as provided by SiteCrafting/GearLab |
 **query** | **string**| Search string submitted by end user, e.g. \&quot;Holiday Party\&quot; or \&quot;Holiday+Party\&quot; |
 **collection** | **int**| Your website&#39;s collection ID as provided by SiteCrafting/GearLab |
 **res_offset** | **int**| The number of results to skip over when building the result set - useful for lazy-loading or paginating your results. (e.g. if you are displaying 10 results at a time and wish to display the 3rd page of results, this would be ‘20’ so that you could skip over 20 results to get to results 21-30) | [optional]
 **res_length** | **int**| The number of results to include in the result set - useful for lazy-loading or paginating your results. (e.g. if you are displaying 10 results at a time this would be ‘10’) | [optional]
 **meta_tag** | **string**| Category to limit results to. If this value is not specified, all pages will considered. If this value is specified then the result set will only include pages with the category specified in the meta tag. (e.g. ‘calendar-event’) | [optional]
 **literal_query** | **string**| Return results for the literal query phrased passed, and do not allow the presence of any “more probable suggestions” to supercede it. | [optional]

### Return type

[**\Swagger\Client\Model\SearchResponse**](../Model/SearchResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

