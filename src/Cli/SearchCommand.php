<?php

/**
 * GearLab\Api\Cli\GearLabCommand class
 *
 * @copyright 2019 SiteCrafting, Inc.
 * @author    Coby Tamayo <ctamayo@sitecrafting.com>
 */

namespace GearLab\Api\Cli;

use GearLab\Api\Client;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Central class for the `gearlab` CLI command
 */
class SearchCommand extends Command {
  protected $client;

  public function configure() {
    $this->setName('search')
      ->setDescription('Performs a search query against the GearLab Tools API')
      ->addArgument('query', InputArgument::REQUIRED, 'The search query')
      ->addOption(
        'key',
        'k',
        InputOption::VALUE_REQUIRED,
        'Your GearLab Tools API key'
      )->addOption(
        'collection',
        'c',
        InputOption::VALUE_REQUIRED,
        'Your collection ID'
      )->addOption(
        'base-uri',
        'b',
        InputOption::VALUE_REQUIRED,
        'The base URI of the REST service to query',
        'https://stg.search-api-gateway.aws.gearlabnw.net'
      )->addOption(
        'offset',
        'O',
        InputOption::VALUE_OPTIONAL,
        'resOffset to pass to the API',
        0
      )->addOption(
        'count',
        'C',
        InputOption::VALUE_OPTIONAL,
        'resLength to pass to the API',
        10
      )->addOption(
        'meta-tag',
        'M',
        InputOption::VALUE_OPTIONAL,
        'metaTag to pass to the API'
      )->addOption(
        'literal',
        'L',
        InputOption::VALUE_NONE,
        'whether to set literalQuery when querying the API'
      );
  }

  public function execute(InputInterface $in, OutputInterface $out) {
    $client = $this->getClient($in);

    $response = $client->search([
      'query'        => $in->getArgument('query'),
      'resOffset'    => $in->getOption('offset'),
      'resLength'    => $in->getOption('count'),
      'metaTag'      => $in->getOption('meta-tag'),
      'literalQuery' => $in->getOption('literal'),
    ]);

    // TODO output formats
    $out->write(json_encode($response, JSON_PRETTY_PRINT));
  }

  protected function getClient(InputInterface $in) : Client {
    if (!$this->client) {
      $this->client = new Client([
        'key'        => $in->getOption('key'),
        'baseUri'    => $in->getOption('base-uri'),
        'collection' => $in->getOption('collection'),
      ]);
    }

    return $this->client;
  }
}
