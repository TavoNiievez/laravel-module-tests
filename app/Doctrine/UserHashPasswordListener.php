<?php

declare(strict_types=1);

namespace App\Doctrine;

use App\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Illuminate\Contracts\Hashing\Hasher;

final class UserHashPasswordListener
{
    public function prePersist(LifecycleEventArgs $event): void
    {
        $user = $event->getObject();
        if (!($user instanceof User)) {
            return;
        }

        $this->hashPassword($user);
    }

    public function preUpdate(LifecycleEventArgs $event): void
    {
        $user = $event->getObject();
        if (!($user instanceof User)) {
            return;
        }

        $this->hashPassword($user);
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
}