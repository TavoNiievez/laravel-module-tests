<?php

declare(strict_types=1);

namespace App\Repository\Doctrine;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Illuminate\Database\Eloquent\Model;

final class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    public function __construct(EntityManager $entityManager)
    {
        $metadata = new ClassMetadata(\App\Entity\User::class);
        parent::__construct($entityManager, $metadata);
    }

    /**
     * @param array $attributes
     * @return User
     */
    public function create(array $attributes = []): Model
    {
        entity(\App\Entity\User::class)->create($attributes);
        return User::factory()->makeOne($attributes);
    }
}