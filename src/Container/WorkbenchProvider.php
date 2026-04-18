<?php

declare(strict_types=1);

namespace Ghostwriter\Workbench\Container;

use Ghostwriter\Container\Interface\BuilderInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\Workbench\Workbench;
use Ghostwriter\Workbench\Interface\WorkbenchInterface;
use Override;
use Throwable;

/**
 * @see WorkbenchProviderTest
 */
final class WorkbenchProvider extends AbstractProvider
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function boot(ContainerInterface $container): void
    {
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function register(BuilderInterface $builder): void
    {
        $builder->alias(WorkbenchInterface::class, Workbench::class);
    }
}
