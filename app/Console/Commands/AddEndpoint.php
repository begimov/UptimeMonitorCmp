<?php

namespace App\Console\Commands;

use App\Models\Endpoint;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddEndpoint extends Command
{
    protected function configure()
    {
        $this->setName('endpoint:add')
            ->setDescription('Adds new endpoint to UMonitor to watch for')
            ->addArgument('endpoint', InputArgument::REQUIRED, 'Endpoint URL')
            ->addOption('frequency', 'f', InputOption::VALUE_OPTIONAL, 'Frequency of endpoint checks in minutes', 1);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // TODO: add validation for Endpoint data
        Endpoint::create([
            'uri' => $endpoint = $input->getArgument('endpoint'),
            'frequency' => $input->getOption('frequency')
        ]);

        $output->writeln('<info>New endpoint "' . $endpoint . '" succesfully created</info>');
    }
}
