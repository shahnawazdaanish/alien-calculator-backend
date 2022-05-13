<?php

namespace App\Classes\Operation;

interface OperationInterface
{
    public function run(float $number, float $result):float;
}
