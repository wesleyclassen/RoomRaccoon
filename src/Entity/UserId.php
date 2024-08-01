<?php

namespace Wes\Mvc\Entity;

use Wes\Mvc\Core\Entity;

class UserId implements Entity
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function toString()
    {
        // TODO: Implement toString() method.
    }
}