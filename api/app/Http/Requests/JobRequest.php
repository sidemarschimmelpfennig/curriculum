<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Regras para criação de vagas
            'name' => 'required|string|max:120',
            'description' => 'required|string|max:200',
            'departament_id' => 'required|integer|exists:departaments,id',
            'departament_categories_id' => 'required|integer|exists:departament_categories,id',
            'status_id' => 'required|integer|exists:status,id',
            'skills_id' => 'required|integer|exists:skills,id',
            'mobilities_id' => 'required|integer|exists:mobilities,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da vaga é obrigatório.',
            'departament_id.required' => 'O departamento é obrigatório.',
            'departament_categorie_id.required' => 'A categoria do departamento é obrigatória.',
            'status_id.required' => 'O status é obrigatório.',
            'skills_id.required' => 'As habilidades são obrigatórias.',
            'mobilities_id.required' => 'A mobilidade é obrigatória.',
            'description.required' => 'A descrição é obrigatória.',
            
        ];
    }
}
