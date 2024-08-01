<?php

namespace Wes\Mvc\Entity;

use Wes\Mvc\Core\Entity;

class Email implements Entity
{
    private string $value;


    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email format.");
        }
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