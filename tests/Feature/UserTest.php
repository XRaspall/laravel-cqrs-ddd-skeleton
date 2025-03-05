<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Src\App\User\Domain\Entities\User;

it('loggin user', function (): void {
    $user = new User([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => Hash::make('123456'),
    ]);

    $user->save();

    $response = $this->post("/api/login", [
        'email' => 'test@example.com',
        'password' => '123456',
        'device' => 'test'
    ]);

    $response->assertStatus(200);
});

it('logout user', function (): void {
    Sanctum::actingAs(new User([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => Hash::make('123456'),
    ]));

    $this->json('post', 'api/logout')->assertStatus(200);
});
