<?php

namespace App\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddEndpoint extends Command
{
    protected function configure()
    {
        $this->setName('endpoint:add')
            ->setDescription('Adds new endpoint to UMonitor to watch for')
            ->addArgument('endpoint', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('test');
    }
}
