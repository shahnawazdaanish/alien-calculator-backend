<?php

namespace App\Classes\Operation;

class Square implements OperationInterface
{

    final public function run(float $number, float $result): float
    {
        return $number * $number;
    }
}
