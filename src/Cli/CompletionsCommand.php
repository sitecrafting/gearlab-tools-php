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
class CompletionsCommand extends Command {
  protected $client;

  public function configure() {
    $this->setName('completions')
      ->setDescription('Performs a completions query against the GearLab Tools API')
      ->addArgument('prefix', InputArgument::REQUIRED, 'The search prefix to get completions for')
      ->addOption(
        'key',
        'k',
        InputOption::VALUE_REQUIRED,
        'Your GearLab Tools API key'
      )->addOption(
        'base-uri',
        'b',
        InputOption::VALUE_REQUIRED,
        'The base URI of the REST service to query',
        DEFAULT_BASE_URI
      )->addOption(
        'collection',
        'c',
        InputOption::VALUE_REQUIRED,
        'Your collection ID'
      )->addOption(
        'meta-tag',
        'M',
        InputOption::VALUE_OPTIONAL,
        'metaTag to pass to the API'
      );
  }

  public function execute(InputInterface $in, OutputInterface $out) {
    $client = $this->getClient($in);

    $response = $client->completions([
      'prefix'  => $in->getArgument('prefix'),
      'metaTag' => $in->getOption('meta-tag'),
    ]);

    // TODO output formats
    $out->write(json_encode($response, JSON_PRETTY_PRINT));
  }

  protected function getClient(InputInterface $in) : Client {
    // memoize client so we only have to instantiate it once
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
