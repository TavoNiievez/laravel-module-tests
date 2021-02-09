<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Entity\User;
use App\Http\Controllers\AbstractController;
use App\Providers\RouteServiceProvider;
use App\Repository\UserRepositoryInterface;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;

final class ResetPasswordController extends AbstractController
{
    use ResetsPasswords;

    /** @var string */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function resetPassword(User $user, string $password): void
    {
        $user->setPassword($password);
        $user->setRememberToken(Str::random(10));

        $userRepository = app(UserRepositoryInterface::class);
        $userRepository->save($user);

        $this->guard()->login($user);
    }
}
