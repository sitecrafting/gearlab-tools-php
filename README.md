# GearLab Tools PHP SDK

![Travis CI build status](https://api.travis-ci.org/sitecrafting/gearlab-tools-php.svg?branch=master)

The official PHP SDK for the GearLab Tools REST API.

## Requirements

PHP 7.1 and later

## Installation & Usage
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
    2 =>
    array (
      'url' => 'https://bouldercolorado.gov/planning/university-hill-street-trees-improvements',
      'title' => 'University Hill - Street Trees Improvements',
      'snippet' => 'PROJECT COMPLETED IN OCTOBER 2016! TOTAL FUNDS = $520,000',
      'meta' =>
      array (
      ),
    ),
    3 =>
    array (
      'url' => 'https://bouldercolorado.gov/forestry/tree-crisis-2',
      'title' => 'Boulder\'s Tree Crisis 2019',
      'snippet' => 'Our ash trees are under attack. Emerald Ash Borer (EAB), an invasive beetle from Asia, is killing Boulder\'s ash trees.',
      'meta' =>
      array (
      ),
    ),
    4 =>
    array (
      'url' => 'https://bouldercolorado.gov/newsroom/tree-work-scheduled-nov-1-and-nov-2-for-scott-carpenter-park-parking-lot',
      'title' => 'Tree Work Scheduled Nov. 1 and Nov. 2 for Scott Carpenter Park Parking Lot',
      'snippet' => 'The project team consulted with city foresters and the new parking lot design incorporates, where possible, existing trees determined to be in good condition.',
      'meta' =>
      array (
      ),
    ),
    5 =>
    array (
      'url' => 'https://bouldercolorado.gov/forestry/pledge',
      'title' => 'Pledge to Tree-Imagine Boulder',
      'snippet' => 'Together, let\'s Tree-Imagine Boulder! Take the pledge to help Boulder\'s trees.',
      'meta' =>
      array (
      ),
    ),
    6 =>
    array (
      'url' => 'https://bouldercolorado.gov/forestry/slackline',
      'title' => 'Slacklining',
      'snippet' => 'Information for slacklining in Boulder',
      'meta' =>
      array (
      ),
    ),
    7 =>
    array (
      'url' => 'https://bouldercolorado.gov/forestry/what-you-can-do',
      'title' => 'What You Can Do',
      'snippet' => 'Here are the 5 most important actions you can take ',
      'meta' =>
      array (
      ),
    ),
    8 =>
    array (
      'url' => 'https://bouldercolorado.gov/forestry/emerald-ash-borer',
      'title' => 'Emerald Ash Borer Overview',
      'snippet' => 'Learn more about Emerald Ash Borer\'s presence in Boulder and what you can do about it. EAB is a federally quarantined, invasive tree pest.',
      'meta' =>
      array (
      ),
    ),
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

- API version: v2
- Build package: io.swagger.codegen.languages.PhpClientCodegen

