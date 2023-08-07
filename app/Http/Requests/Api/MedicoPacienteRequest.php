<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MedicoPacienteRequest extends FormRequest
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
            'medico_id' => Rule::unique('medico_pacientes')->where(function ($query) {
                return $query->where('paciente_id', $this->input('paciente_id'));
            }),
            'paciente_id' => Rule::exists('pacientes', 'id'),
        ];
    }

    public function messages(): array
    {
       
        return [
            'medico_id.unique' => "O Paciente $this->paciente_id já está vinculado a o Médico $this->medico_id} ",
            'paciente_id.exists' => "O Paciente é inválido ou não existe."
        ];
    }
}
