<?php

declare(strict_types=1);

namespace App\Doctrine;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Illuminate\Contracts\Hashing\Hasher;

final class UserListener
{
    public function prePersist(User $user, LifecycleEventArgs $event)
    {
        $this->hashPassword($user);
        $this->updateTimestamps($user);
    }

    public function preUpdate(User $user, PreUpdateEventArgs $event)
    {
        $this->hashPassword($user);
        $this->updateTimestamps($user);
    }

    private function hashPassword(User $user): void
    {
        $hasher = app()->get(Hasher::class);

        if (!$hasher->needsRehash($user->getPassword())) {
            return;
        }

        $user->setPassword(
            $hasher->make($user->getPassword())
        );
    }

    private function updateTimestamps(User $user): void
    {
        $dateTime = new DateTime();

        if ($user->getCreatedAt() === null) {
            $user->setCreatedAt($dateTime);
        }

        $user->setUpdatedAt($dateTime);
    }
}