<?php

namespace Wes\Mvc\Entity;

use Wes\Mvc\Core\Entity;

class UserRole implements Entity
{
    private const ALLOWED_ROLES = ['admin', 'seller', 'buyer'];
    private string $role;

    public function __construct(string $role)
    {
        if (!in_array($role, self::ALLOWED_ROLES)) {
            throw new \InvalidArgumentException("Invalid user role.");
        }
        $this->role = $role;
    }

    public function getValue(): string
    {
        return $this->role;
    }

    public function toString()
    {
        // TODO: Implement toString() method.
    }
}