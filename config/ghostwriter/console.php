<?php

declare(strict_types=1);

use Ghostwriter\Workbench\Console\Command\DiscoverCommand;

return [
    'name' => 'Workbench',
    'package' => 'ghostwriter/workbench',
    'commands' => [
        'discover' => DiscoverCommand::class,
    ],
];
