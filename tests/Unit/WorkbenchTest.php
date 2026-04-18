<?php

declare(strict_types=1);

namespace Tests\Unit;

use Generator;
use Ghostwriter\Workbench\Workbench;
use Ghostwriter\Workbench\Interface\WorkbenchInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Throwable;

use function is_a;

#[CoversClass(Workbench::class)]
final class WorkbenchTest extends AbstractTestCase
{
    /**
     * @throws Throwable
     */
    #[DataProvider('dataProvider')]
    public function testExample(bool $value): void
    {
        self::assertSame($value, $value);

        self::assertTrue(Workbench::new()->test());
    }

    /**
     * @throws Throwable
     */
    public function testImplementsInterface(): void
    {
        self::assertTrue(is_a(Workbench::class, WorkbenchInterface::class, true));
    }

    /**
     * @return Generator<array{bool}>
     */
    public static function dataProvider(): Generator
    {
        yield from [
            'true' => [true],
            'false' => [false],
        ];
    }
}
