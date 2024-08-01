<?php

namespace Wes\Mvc\Entity;

use Wes\Mvc\Core\Entity;

class EncryptedPassword implements Entity
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): bool
    {
        if (password_verify($this->value, $this->setValue())) {
            return true;
        }

        return false;
    }

    public function setValue(): string
    {
        $options = [
            'cost' => 12,
        ];

        return password_hash($this->value, PASSWORD_DEFAULT, $options);
    }

    public function toString(): string
    {
        return $this->value;
    }
}