<?php

declare(strict_types=1);

namespace Src\Shared\Domain\Contracts;

use Src\Shared\Infrastructure\Bus\Command;

interface CommandBusContract
{
    public function dispatch(Command $command): mixed;

    public function register(array $map): void;
}
