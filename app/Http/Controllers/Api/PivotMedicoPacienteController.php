<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PivotMedicoPacienteRequest;
use App\Models\Medico;


class PivotMedicoPacienteController extends Controller
{
    public function store($medico_id, PivotMedicoPacienteRequest $request )
    {
        $medico = Medico::findOrFail($medico_id);
        $medico->pacientes()->attach($request->paciente_id);
        $medico->makeVisible(['created_at', 'updated_at', 'deleted_at']);
        return response()->json(['medico' => $medico], 200, [], JSON_NUMERIC_CHECK);
    }
}
