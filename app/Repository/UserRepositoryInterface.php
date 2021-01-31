<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Contracts\Auth\Authenticatable;

interface UserRepositoryInterface
{
    public function save(Authenticatable $user): void;

    public function create(array $attributes = []): Authenticatable;
}