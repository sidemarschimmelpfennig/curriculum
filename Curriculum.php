<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curricum_creates';
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        // Dados Pessoais
        'full_Name',
        'CPF',
        'email',
        'address',
        'district',
        'UF',
        'City',
        'CEP',
        'phone',
        'date_of_birth',
        'gender',
        'nationality',
        'linkedin_url',
        'Target_Sectors',
        'Target_Position',
        'Target_outher',
        'photo',
        'curriculum',
        // Formação Acadêmica
        'course',
        'Institution',
        'education_start_date',
        'education_end_date',
        'education_level',
        'company',
        // Experiência Profissional
        'job_description',
        'Enterprise',
        'Position',
        'experience_start_date',
        'experience_end_date',
        'additional_info',
        // Informações adicionais
        'skills',
        'languages',
        'salary_expectation',
    ];
    
}
