<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculum'; // Nome da tabela no banco de dados

    protected $fillable = [
        'full_name',
        'cpf',
        'address',
        'district',
        'uf',
        'city',
        'cep',
        'phone',
        'date_of_birth',
        'gender',
        'nationality',
        'linkedin_url',
        'target_sectors',
        'target_position',
        'target_outher',
        'photo',
        'curriculum',
        'email',
        'password',
        'course',
        'institution',
        'education_start_date',
        'education_end_date',
        'education_level',
        'company',
        'job_description',
        'enterprise',
        'position',
        'experience_start_date',
        'experience_end_date',
        'additional_info',
        'skills',
        'languages',
        'salary_expectation',
        'status_id',
        'status',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'create',
    ];

}
