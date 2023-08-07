<?php

namespace App\Http\Requests\Api;

use App\Models\Cidade;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MedicoRequest extends FormRequest
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
            'nome' => 'required|string',
            'especialidade' => 'required|string',
            'cidade_id' => [
                'required',
                'integer',
                Rule::exists(Cidade::class, 'id'),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'nome' => 'Nome',
            'especialidade' => 'Especialidade',
            'cidade_id' => 'Cidade',
        ];  
    }
}
