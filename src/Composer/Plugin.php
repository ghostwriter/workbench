<?php

declare(strict_types=1);

namespace Ghostwriter\Workbench\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Override;

final readonly class Plugin implements PluginInterface
{
    /**
     * Apply plugin modifications to Composer.
     */
    #[Override]
    public function activate(Composer $composer, IOInterface $io): void {}

    /**
     * Remove any hooks from Composer.
     */
    #[Override]
    public function deactivate(Composer $composer, IOInterface $io): void {}

    /**
     * Prepare the plugin to be uninstalled.
     */
    #[Override]
    public function uninstall(Composer $composer, IOInterface $io): void {}
}
