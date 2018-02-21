<?php

namespace App\Console\Commands;

use App\Models\Endpoint;
use App\Tasks\PingEndpoint;

use GuzzleHttp\Client;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Run extends Command
{
    protected $guzzle;

    public function __construct(Client $guzzle)
    {
        $this->guzzle = $guzzle;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('run');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $endpoints = Endpoint::get();

        foreach ($endpoints as $endpoint) {
            (new PingEndpoint($endpoint, $this->guzzle))->handle();
        }
    }
}
