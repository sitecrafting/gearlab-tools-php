# Swagger\Client\CompletionsApi

All URIs are relative to *https://virtserver.swaggerhub.com/ctamayo/gearlab-tools/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**completions**](CompletionsApi.md#completions) | **GET** /completions | 


# **completions**
> \Swagger\Client\Model\CompletionsResponse completions($key, $prefix, $collection, $metatag)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\CompletionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$key = "key_example"; // string | The API Key as provided by SiteCrafting/GearLab
$prefix = "prefix_example"; // string | The text that the user has typed in the search box so far. Must be three characters or more. (e.g. \"support nu\" or \"support+nu\")
$collection = 56; // int | Your website's collection ID as provided by SiteCrafting/GearLab
$metatag = "metatag_example"; // string | The metatag for the category of content you wish to narrow your completion results to (e.g. \"calendar-event\")

try {
    $result = $apiInstance->completions($key, $prefix, $collection, $metatag);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompletionsApi->completions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **key** | **string**| The API Key as provided by SiteCrafting/GearLab |
 **prefix** | **string**| The text that the user has typed in the search box so far. Must be three characters or more. (e.g. \&quot;support nu\&quot; or \&quot;support+nu\&quot;) |
 **collection** | **int**| Your website&#39;s collection ID as provided by SiteCrafting/GearLab |
 **metatag** | **string**| The metatag for the category of content you wish to narrow your completion results to (e.g. \&quot;calendar-event\&quot;) | [optional]

### Return type

[**\Swagger\Client\Model\CompletionsResponse**](../Model/CompletionsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

