<?php

namespace App\Http\Controllers;

use App\Classes\Calculator;
use App\Classes\Utility;
use App\Http\Requests\CalculationRequest;
use Illuminate\Http\JsonResponse;

class CalculationController extends Controller
{
    /**
     * @param CalculationRequest $request
     * @return JsonResponse
     */
    final public function calculate(CalculationRequest $request): JsonResponse
    {
        $operation = Utility::getOperationByAlias($request->get('operation'));
        $inputs = $request->get("inputs");

        $this->handleIfOperationIsEmpty($operation);

        $calculator = new Calculator();
        $calculator->{$operation['operation']}(...$inputs);

        return response()->json(['result' => $calculator->getResult()]);
    }

    /**
     * @param array $operation
     * @return void
     */
    final public function handleIfOperationIsEmpty(array $operation)
    {
        if (empty($operation) || !isset($operation['operation'])) {
            throw new \RuntimeException("Operation does not exists in the system");
        }
    }
}
