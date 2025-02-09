<?php

declare(strict_types=1);

namespace Src\Shared\Domain\Contracts;

use Src\Shared\Infrastructure\Bus\Query;

interface QueryBusContract
{
    public function ask(Query $query): mixed;

    public function register(array $map): void;
}