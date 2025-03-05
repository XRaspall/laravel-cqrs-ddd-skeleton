<?php

declare(strict_types=1);

arch('globals')
    ->expect(['dd', 'dump'])
    ->not->toBeUsed();

arch('app')
    ->expect(['Src', 'Tests', 'Database'])
    ->toUseStrictTypes();
