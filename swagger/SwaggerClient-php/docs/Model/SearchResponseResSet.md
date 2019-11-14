# SearchResponseResSet

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**results** | [**\Swagger\Client\Model\SearchResultWrapper[]**](SearchResultWrapper.md) |  | [optional] 
**recommendations** | [**\Swagger\Client\Model\SearchResponseRecommendations[]**](SearchResponseRecommendations.md) |  | [optional] 
**res_offset** | **int** | the 0-based offset within the entire set of matched results at which the returned search results begin | [optional] 
**res_start** | **int** | exactly the same as resOffset, but 1-based for display purposes | [optional] 
**res_end** | **int** | the 1-based offset within the entire set of matched results at which the returned search results end | [optional] 
**res_count** | **int** | the number of returned search results in the current response; may be less than or equal to the requested &#x60;resLength&#x60; | [optional] 
**total** | **int** | the total number of matching search results, independent of &#x60;resCount&#x60;/&#x60;resOffset&#x60;/etc. | [optional] 
**literal_query** | **string** | whether a literalQuery was requested | [optional] [default to 'false']
**original_query_phrase** | **string** | the search query originally entered by the end-user | [optional] 
**suggestion_superseded_query** | **string** | whether an alternate search term (e.g. a corrected misspelling) overrode the current query with high certainty | [optional] 
**superseding_suggestion** | **string** | if an alternate search term overrode the end-user&#39;s original query, this will contain the search term with which it was overridden | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


