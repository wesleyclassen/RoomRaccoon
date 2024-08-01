<?php

namespace Wes\Mvc\Entity;

use Wes\Mvc\Core\Entity;

class Stock_Required implements Entity
{

    public function getValue()
    {
        // TODO: Implement getValue() method.
    }

    public function toString()
    {
        // TODO: Implement toString() method.
    }

    public function PleaseReplenishThisProduct(): bool
    {
        // TODO: Implement Replenish() method.

        return false;
    }

    public function DisontinueThisProduct()
    {
    }
}