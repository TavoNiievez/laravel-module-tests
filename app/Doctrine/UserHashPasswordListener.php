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

        $hasher = app()->get(Hasher::class);

        if (!$hasher->needsRehash($user->getPassword())) {
            return;
        }

        $user->setPassword(
            $hasher->make($user->getPassword())
        );
    }
}