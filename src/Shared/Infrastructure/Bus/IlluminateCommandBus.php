<?php

declare(strict_types=1);

namespace Src\Shared\Infrastructure\Bus;

use Illuminate\Bus\Dispatcher;
use Src\Shared\Domain\Contracts\CommandBusContract;

class IlluminateCommandBus implements CommandBusContract
{
    public function __construct(
        protected Dispatcher $bus,
    ) {}

    public function dispatch(Command $command): mixed
    {
        return $this->bus->dispatch($command);
    }

    public function register(array $map): void
    {
        $this->bus->map($map);
    }
}