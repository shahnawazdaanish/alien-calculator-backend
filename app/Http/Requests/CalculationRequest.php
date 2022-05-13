<?php

namespace App\Http\Requests;

use App\Classes\Utility;
use Illuminate\Foundation\Http\FormRequest;

class CalculationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $operation = $this->get("operation");
        $aliases = Utility::getStoredAliases();
        $inputSize = Utility::getInputSizeOfOperation($operation);

        return [
            'operation' => 'required|in:' . implode(',', $aliases),
            'inputs' => 'required|array|min:' . $inputSize . '|max:' . $inputSize
        ];
    }
}
