<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\MedicoRequest;
use App\Models\Medico;

class MedicoController extends BaseController
{
    public function index()
    {
        return response()->json(Medico::all(), 200, [], JSON_NUMERIC_CHECK);
    }

    public function store(MedicoRequest $request)
    {
        return $this->created(Medico::_create($request->all()));
    }

    public function pacientes($medico_id) {
        $medico = Medico::findOrFail($medico_id);
        return response()->json($medico->pacientes, 200, [], JSON_NUMERIC_CHECK);
    }

}
