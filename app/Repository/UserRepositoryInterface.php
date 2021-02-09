<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Contracts\Auth\Authenticatable;

interface UserRepositoryInterface
{
    public function create(array $attributes = []): Authenticatable;

    public function save(Authenticatable $user): void;
}