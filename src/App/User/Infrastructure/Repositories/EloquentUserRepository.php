<?php

declare(strict_types=1);

namespace Src\App\User\Infrastructure\Repositories;

use Src\App\User\Domain\Contracts\UserRepositoryContract;
use Src\App\User\Domain\Entities\User;
use Src\Shared\Infrastructure\Repositories\EloquentBaseRepository;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryContract
{
    public function __construct(
        User $model
    ){
        parent::__construct($model);
    }
}
