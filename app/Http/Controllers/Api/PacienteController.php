<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\PacienteStoreRequest;
use App\Http\Requests\Api\PacienteUpdateRequest;
use App\Models\Paciente;

class PacienteController extends BaseController
{
    public function store(PacienteStoreRequest $request, Paciente $model)
    {
        return $this->created($model->_create($request->all()));
    }

    public function update($paciente_id, PacienteUpdateRequest $request, Paciente $model)
    {
        $paciente = $model->findOrFail($paciente_id);
        return $this->updated($paciente->_update($request->all()));
    }
}
