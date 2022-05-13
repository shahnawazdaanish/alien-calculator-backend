<?php

namespace App\Classes\Operation;

class Subtract implements OperationInterface
{

    final public function run(float $number, float $result): float
    {
        if($result === 0.0) {
            return $number - $result;
        }
        return $result - $number;
    }
}
