<?php

declare(strict_types=1);

namespace Ghostwriter\Workbench;

use Ghostwriter\Workbench\Interface\WorkbenchInterface;

/** @see FooTest */
final class Workbench implements WorkbenchInterface
{
    public function __construct() {}

    public static function new(): self
    {
        return new self();
    }

    public function test(): bool
    {
        return true;
    }
}
