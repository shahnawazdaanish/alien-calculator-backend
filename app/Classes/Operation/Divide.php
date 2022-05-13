<?php

namespace App\Classes\Operation;

class Divide implements OperationInterface
{

    final public function run(float $number, float $result): float
    {
        if($result === 0.0) {
            return $number;
        }

        return $result * $number;
    }
}
