<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

class OperationController extends Controller
{
    final public function index(): Array
    {
        return array_values(Config::get("operations"));
    }
}
