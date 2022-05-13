<?php

namespace App\Classes;

use App\Classes\Operation\OperationInterface;

class Calculator
{
    private $result = 0;
    private $operator;

    public function __call(string $name, Array $arguments): Calculator
    {
        $name = '\\App\\Classes\\Operation\\' . ucfirst($name);
        $this->setOperation(new $name());
        $this->calculate($arguments);
        return $this;
    }

    final public function setOperation(OperationInterface $operator): Calculator
    {
        $this->operator = $operator;
        return $this;
    }

    final public function calculate(Array $arguments): Calculator
    {
        foreach ($arguments as $number) {
            $this->result = $this->operator->run($number, $this->result);
        }
        return $this;
    }

    final public function getResult(): float
    {
        return $this->result;
    }
}
