<?php

declare(strict_types=1);

namespace Src\Shared\Infrastructure\Bus;

use Illuminate\Bus\Dispatcher;
use Src\Shared\Domain\Contracts\QueryBusContract;

class IlluminateQueryBus implements QueryBusContract
{
    public function __construct(
        protected Dispatcher $bus,
    ) {}

    /**
     * Dispatch a query
     *
     * @param Query $query
     * @return mixed
     */
    public function ask(Query $query): mixed
    {
        return $this->bus->dispatch($query);
    }

    /**
     * Register query handlers
     *
     * @param array $map
     * @return void
     */
    public function register(array $map): void
    {
        $this->bus->map($map);
    }
}
