# GearLab Tools PHP SDK

![Travis CI build status](https://api.travis-ci.org/sitecrafting/gearlab-tools-php.svg?branch=master)

The official PHP SDK for the GearLab Tools REST API.

## Contents

* [Release Notes](#release-notes)
* [Requirements](#requirements)
* [Installation](#installation)
* [Tests](#tests)
* [Getting Started](#getting-started)
* [Command Line Interface](#command-line-interface)
* [Architecture](#architecture)

## Release Notes

* v3.0.0 - Added support for curated results
* v2.0.x - Basic site search - `/search` and `/completions`

## Requirements

PHP 7.1 or later

## Installation

### Composer

Install via Composer:

```sh
composer require sitecrafting/gearlab-tools-php
```

## Tests

To run the unit tests:

```sh
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// key, baseUri, and collection are all required.
$client = new Client([
  'key'        => $in->getOption('key'),
  'baseUri'    => $in->getOption('base-uri'),
  'collection' => $in->getOption('collection'),
]);

$searchResults = $client->search([
  'query'        => 'trees',   // required
  'resOffset'    => 10,        // defaults to 0
  'resLength'    => 42,        // defaults to 10
  'metaTag'      => 'SO-META', // defaults to ""
  'literalQuery' => true,      // defaults to false
]);

$searchCompletions = $client->completions([
  'prefix'  => 'spongeb',
  'metaTag' => 'SO-META', // defaults to ""
]);

?>
```

### Example Results

#### Search

```json
array (
  'results' =>
  array (
    0 =>
    array (
      'url' => 'https://bouldercolorado.gov/civic-area/trees-in-the-civic-area-2',
      'title' => 'Trees in the Civic Area',
      'snippet' => 'Updates on plans for trees in the Boulder Civic Area.',
      'meta' =>
      array (
      ),
    ),
    1 =>
    array (
      'url' => 'https://bouldercolorado.gov/forestry/best-trees',
      'title' => 'Best Trees for Boulder',
      'snippet' => 'Select the right tree for the right place.',
      'meta' =>
      array (
      ),
    ),

    /* ... */

    9 =>
    array (
      'url' => 'https://bouldercolorado.gov/forestry/apps',
      'title' => 'Forestry and Parks Web Apps and Maps!',
      'snippet' => 'Forestry Apps and Maps',
      'meta' =>
      array (
      ),
    ),
  ),
  'recommendations' =>
  array (
    0 =>
    array (
      'url' => 'https://bouldercolorado.gov/open-data/city-of-boulder-public-trees/',
      'title' => 'Public Trees',
      'snippet' => 'Public Trees managed by the Urban Forestry Division of the Department of Parks and Recreation, City of Boulder. The provided tree data does not include trees on Open Space and Mountain Parks (OSMP) land. City ordinances prohibit the picking of fruit on trees located on OSMP property. For a list of u',
      'meta' => NULL,
    ),
  ),
  'resOffset' => 0,
  'resCount' => 10,
  'resStart' => 1,
  'resEnd' => 10,
  'total' => 110,
  'literalQuery' => false,
  'originalQueryPhrase' => 'trees',
  'suggestionSupersededQuery' => false,
  'supersedingSuggestion' => '',
  'curatedResultsEnabled': 'true',
  'curatedResultsVersion': '2.0',
  'curatedResults': 
  array (
     0 => (
       'template': 'quick_links',
       'fields': 
       array (
         0 => 
         array (
           'type': 'link',
           'order': 0,
           'value': 
           array (
             0 => 
             array (
               'link_text': 'Check out this PHP blog',
               'url': 'www.sitecrafting.com',
               'new_window': '1'
             ),
             1 => 
              array(
              'link_text': 'Main Site',
              'url': 'https://www.sitecrafting.com',
              'new_window': '1'
             )
           )
         ),
         1 => 
         array (
           'type': 'text',
           'order': 1,
           'value': 
           array( 
             0 =>
             array (
               'text': 'Please don't believe everything you read on the internet. '
             )
           )
         ),
         2 =>
         array (
           'type': 'button',
           'order': 2,
           'value': 
           array (
             0 => 
             array (
               'link_text': 'Google Something',
               'url': 'https://www.google.com'
             )
           )
         ),
         3 => 
         array (
           'type': 'headline',
           'order': 3,
           'value': 
           array (
            0 => 
            array ( 
            'headline': 'PHP information' 
            )
          )
         )
       )
     ),
     1 => (
       'template': 'quick_links',
       'fields': 
       array (
         0 => 
         array (
          'type': 'link', 
          'order': 0, 
          'value': 
          array ()
        ),
         1 => 
         array (
           'type': 'text',
           'order': 1,
           'value': 
           array (
            0 =>
              array ( 
                'text': 'Here is the text that goes under the headline.'
                )
            )
         ),
         2 => 
         array (
            'type': 
            'button', 
            'order': 2, 
            'value': 
            array () 
          ),
         3 => 
          array (
           'type': 'headline',
           'order': 3,
           'value': 
           array (
              0 => 
              array (
              'headline': 'This result only has a headline & text' 
              )
           )
         )
       )
     )
   )
)
```

#### Completions

```json
array (
  'results' =>
  array (
    0 =>
    array (
      'title' => 'Spongebob Squarepants',
    ),
    1 =>
    array (
      'title' => 'Spongebill Roundhat',
    ),
  ),
)
```

## Command Line Interface

With just an API key and a Collection ID, you can perform requests to the API from the command line. Assuming you've cloned the repo and run `composer install`, you can run the following from the repo root:

```
bin/gearlab
```

This will display help text for all available subcommands of the CLI. You can also get help for any subcommand by running `bin/gearlab help <cmd>` or `bin/gearlab <cmd> -h`.

## Architecture

This package incorporates PHP code that is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project from the [GearLab Tool API Spec](https://app.swaggerhub.com/apis-docs/ctamayo/gearlab-tools/v2). The generated code is exported automatically when the spec is saved in Swagger Hub, and is contained entirely in the `swagger/SwaggerClient-php` directory within this repo. The Composer autoloader is configured to autoload this code:

```json
{
    "autoload": {
        "psr-4": {
          "Swagger\\Client\\": "swagger/Swagger-Client-php/lib/",
          "GearLab\\Api\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
          "Swagger\\Client\\" : "swagger/Swagger-Client-php/test/",
          "GearLab\\Api\\": "test/"
        }
    }
}
```

The `GearLab\Api\Client` class serves as the main entrypoint for all API calls, and normalizes the usage of the autogenerated code. For example, it translates array query arguments into positional arguments that the autogen code expects.

- API version: v3
- Build package: io.swagger.codegen.languages.PhpClientCodegen

