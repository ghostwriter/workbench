<?php

declare(strict_types=1);

namespace Ghostwriter\Workbench\Console\Command;

use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

/** @see DiscoverCommandTest */
#[AsCommand(name: 'discover', description: 'discover command')]
final class DiscoverCommand extends Command
{
    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);
        return self::SUCCESS;
    }
}
