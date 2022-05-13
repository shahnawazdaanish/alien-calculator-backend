<?php

use App\Http\Controllers\CalculationController;
use App\Http\Controllers\OperationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("v1")->group(static function () {
    /**
     * Get Operations to show operation list in UI
     */
    Route::get("operations", [OperationController::class, 'index']);

    /**
     * Calculate Operation
     * Submit operation and inputs to get calculated result.
     * @requestmethod POST
     * @request operation
     * @request inputs
     * @response result float
     */
    Route::post("calculate", [CalculationController::class, 'calculate']);
});
