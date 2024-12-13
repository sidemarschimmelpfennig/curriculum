<?php

namespace App\Models;


use Illuminate\Database\{
    Eloquent\Factories\HasFactory,
    Eloquent\Model

};

class CandidatesVagas extends Model
{
    use HasFactory;

    protected $table = 'candidates_vagas'; // Nome da tabela no banco de dados

    protected $fillable = [
        'job_id',
        'job',
        'candidate_id',
        'full_name',

    ];

    protected $hidden = [
        'updated_at',
		'created_at',

        'job_id',
        'candidate_id'
        
    ];

}
