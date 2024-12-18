<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
            'full_name' => 'required|string|max:200',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:100',
            'additional_info' => 'required|string|max:200',
            'skills' => 'required|string|max:100',
            'file' => 'required|file|mimes:pdf|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'O nome completo é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'phone.required' => 'O telefone é obrigatório.',
            'file.required' => 'O envio do arquivo é obrigatório.'
        ];
    }
}
