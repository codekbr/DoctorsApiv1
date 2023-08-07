<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PivotMedicoPacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            
            'medico_id' => [
                Rule::unique('medico_pacientes')->where(function ($query) {
                    return $query->where('paciente_id', $this->input('paciente_id'));
                }),
                Rule::in($this->route()->parameters('medico_id')),
            ],
            'paciente_id' => Rule::exists('pacientes', 'id')
        ];
    }
    public function attributes()
    {
        return [
            'paciente_id' => 'Paciente'
        ];
    }
    public function messages()
    {
       
        return [
            'medico_id.unique' => "O Paciente $this->paciente_id já está vinculado a o Médico $this->medico_id} ",
            'medico_id.in' => "O medico_id informado no body é diferente do informado na url",
        ];
    }
}
