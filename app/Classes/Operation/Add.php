<?php

namespace App\Classes\Operation;

class Add implements OperationInterface
{

    final public function run(float $number, float $result): float
    {
        return $result + $number;
    }
}
