<?php

namespace App\Classes\Operation;

class Multiply implements OperationInterface
{

    final public function run(float $number, float $result): float
    {
        return $result * $number;
    }
}
