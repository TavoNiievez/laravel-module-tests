<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use LaravelDoctrine\ORM\Auth\Authenticatable;
use LaravelDoctrine\ORM\Notifications\Notifiable;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable;
    use CanResetPassword;
    use Notifiable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @var DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var DateTime
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): User
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): User
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}