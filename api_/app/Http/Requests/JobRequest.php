<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        //dump('request');
        return [
            // Regras para criação de vagas
            'name' => 'required',
            //'description' => 'required',
            
            /*'departament_id' => 'required|integer',
            'departament_categories_id' => 'required|integer',
            'status_id' => 'required|integer',
            'skills_id' => 'required|integer',
            'mobilities_id' => 'required|integer', */
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da vaga é obrigatório.',
            /*'departament_id.required' => 'O departamento é obrigatório.',
            'departament_categorie_id.required' => 'A categoria do departamento é obrigatória.',
            'status_id.required' => 'O status é obrigatório.',
            'skills_id.required' => 'As habilidades são obrigatórias.',
            'mobilities_id.required' => 'A mobilidade é obrigatória.',
            'description.required' => 'A descrição é obrigatória.',*/
            
        ];
    }
}
