<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index()
    {
        return response()->json(Cidade::all(), 200, [], JSON_NUMERIC_CHECK);
    }

    public function medicos($cidade_id, Cidade $model)
    {
        $cidade = $model->findOrFail($cidade_id);
        return response()->json($cidade->medicos, 200, [], JSON_NUMERIC_CHECK);
    }
}
