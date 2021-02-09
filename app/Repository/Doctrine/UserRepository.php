<?php

declare(strict_types=1);

namespace App\Repository\Doctrine;

use App\Entity\User;
use App\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Illuminate\Contracts\Auth\Authenticatable;

final class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    public function __construct(EntityManager $entityManager)
    {
        $metadata = new ClassMetadata(User::class);
        parent::__construct($entityManager, $metadata);
    }

    public function save(Authenticatable $user): void
    {
        $this->_em->persist($user);
        $this->_em->flush();
        $this->_em->clear();
    }

    /**
     * @param array $attributes
     * @return User
     */
    public function create(array $attributes = []): Authenticatable
    {
        return entity(User::class)->create($attributes);
    }
}