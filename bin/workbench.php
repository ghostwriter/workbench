#!/usr/bin/env php
<?php

declare(strict_types=1);

namespace Ghostwriter\Workbench\Console;

use ErrorException;
use Ghostwriter\Container\Container;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use const DIRECTORY_SEPARATOR;
use const STDERR;

use function dirname;
use function file_exists;
use function fwrite;
use function implode;
use function restore_error_handler;
use function set_error_handler;
use function sprintf;

/** @var ?string $_composer_autoload_path */
(static function (string $autoloader): void {
    set_error_handler(static function (int $severity, string $message, string $file, int $line): never {
        throw new ErrorException($message, 255, $severity, $file, $line);
    });

    if (! file_exists($autoloader)) {
        $message = '[ERROR]Cannot locate "' . $autoloader . '"\n please run "composer install"\n';
        fwrite(STDERR, $message);
        exit;
    }

    require $autoloader;

    $container = Container::getInstance();

    try {
        /**
         * #BlackLivesMatter.
         */
        $application = $container->get(Application::class);

        $exitCode = $application->run(new ArgvInput($_SERVER['argv'] ?? []));
    } catch (Throwable $throwable) {
        $output = $container->get(OutputInterface::class);

        $output->writeln(sprintf(
            '[ERROR] %s: %s in %s:%d',
            $throwable::class,
            $throwable->getMessage(),
            $throwable->getFile(),
            $throwable->getLine()
        ));

        $exitCode = $throwable->getCode() ?? 255;
    } finally {
        restore_error_handler();

    }
        exit($exitCode);
})(
    $_composer_autoload_path
        ?? implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'vendor', 'autoload.php'])
);
