<?php

declare(strict_types=1);

namespace Ghostwriter\Workbench\Exception;

use Ghostwriter\Workbench\Interface\ExceptionInterface;
use LogicException;

final class ShouldNotHappenException extends LogicException implements ExceptionInterface {}
