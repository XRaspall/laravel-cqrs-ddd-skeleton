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

    /**
     * Dispatch a command
     *
     * @param Command $command
     * @return mixed
     */
    public function dispatch(Command $command): mixed
    {
        return $this->bus->dispatch($command);
    }

    /**
     * Register command handlers
     *
     * @param array $map
     * @return void
     */
    public function register(array $map): void
    {
        $this->bus->map($map);
    }
}
