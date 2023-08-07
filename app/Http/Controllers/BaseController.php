<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public function created($data)
    {
        return response()->json($data, 201, [], JSON_NUMERIC_CHECK);
    }
    
    public function updated($data)
    {
        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }
    
}